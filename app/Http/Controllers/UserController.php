<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
use App\Models\Abonnement;
use App\Models\Contact;
use App\Models\Envoi;
use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //

    public function customerhome(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');
        $abonnement = Abonnement::where('user_id',$user->id)->whereIn('statut',[1,2])->first();
        // dd($abonnement);
        return view('customer.customerhome')->with(compact('abonnement'));
    }

    public function customersouscription(Request $request) {
        $user = Auth::user();
        $packs = Pack::all();
        if(!$user) return redirect()->route('loginpage');
        $abonnements = Abonnement::where('user_id',$user->id)->whereIn('statut',[0,1])->get();

        return view('customer.historiquesouscription')->with(compact('abonnements','packs'));
    }

    public function customertransaction(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');
        $envois = Envoi::where('user_id',$user->id)->whereIn('statut',[0,1])->get();

        return view('customer.historiquetransaction')->with(compact('envois'));
    }

    public function customerprofile(Request $request) {
        return view('customer.customerprofile');
    }

    public function customercontacts(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $contacts  = Contact::where('user_id',$user->id)->get();
        $abonnement = Abonnement::where('user_id',$user->id)->whereIn('statut',[1,2])->first();
        $pro = false;

        if($abonnement){
            if($abonnement->pack_code == 'wnRmikryhuzLNY7tlUCkW6GusdWQUOysALjdjt9vp7xaJkhXgNdoC5vvK028efIuDXAQtqgIbGTLsCzeJEzrmbZ2m9DTvuYMWKcE') {
                $pro = true;
            }
        }

        return view('customer.addresscontact')->with(compact('contacts','pro'));
    }

    // Add Contact
    public function customeraddcontact(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $request->validate([
            'nom' => 'required',
            'phone' => 'required',
        ],[
            'nom.required' => "Nom obligatoire",
            'phone.required' => "Telephone obligatoire",
        ]);

        Contact::create([
            'nom' => $request->nom,
            'numero' => $request->phone,
            'user_id' => $user->id,
        ]);

        return redirect()->route('customercontacts');

    }

    public function customeraddcontactexcel(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $abonnement = Abonnement::where('user_id',$user->id)->where('statut',1)->first();

        if($abonnement){
            if($abonnement->pack_code != 'wnRmikryhuzLNY7tlUCkW6GusdWQUOysALjdjt9vp7xaJkhXgNdoC5vvK028efIuDXAQtqgIbGTLsCzeJEzrmbZ2m9DTvuYMWKcE') {
                return redirect()->back()->withErrors(['msg'=>"Cette fonctionnalité est disponible uniquement pour les comptes ayant un compte pro"]);
            }
        } else {
            return redirect()->back()->withErrors(['msg'=>"Cette fonctionnalité est disponible uniquement pour les comptes ayant un compte pro"]);
        }

        $request->validate([
            'file-excel' => 'required|file|mimes:xls,xlsx',
        ]);

        if ($request->hasFile('file-excel')) {
            $file = $request->file('file-excel');
            $fileName = time().$file->getClientOriginalName();

            // Enregistrez le fichier dans le répertoire de stockage
            Storage::put('public/contact/' .$fileName, file_get_contents($file));
            $path = Storage::path('public/contact/' . $fileName);

            // $path = asset('storage/contact/'.$fileName);
            $objetImport = new ContactsImport();
            Excel::import($objetImport, $path);

            // return 'Le fichier a été téléversé avec succès.';
        }

        return redirect()->back()->withErrors(['msg'=>"Contact enregistré avec succès"]);

    }

    public function customerdeletecontact(Request $request, $id) {

        $contact =Contact::find($id);
        if($contact) $contact->delete();

        return redirect()->route('customercontacts');

    }

    public function customeroffre(Request $request) {
        $packs = Pack::all();
        return view('customer.customeroffre')->with(compact('packs'));
    }

    public function customerconfirmdeletenvois(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        Session::put('envoisDelete', $user->id.'delete');

        return redirect()->route('customerdeletenvois');

    }

    public function customerdeletenvois(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $confirmDelete = null;
        if(Session::has('envoisDelete')) $confirmDelete = Session::get('envoisDelete');
        else return redirect()->route('customertransaction');

        if($user->id == $confirmDelete[0])  Envoi::where('user_id',$user->id)->delete();
        Session::remove('envoisDelete');

        return redirect()->route('customertransaction');
    }

    public function customerconfirmdeletsouscription(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        Session::put('souscriptionDelete', $user->id.'delete');

        return redirect()->route('customerdeletsouscription');

    }

    public function customerdeletsouscription(Request $request) {
        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $confirmDelete = null;
        if(Session::has('souscriptionDelete')) $confirmDelete = Session::get('souscriptionDelete');
        else return redirect()->route('customersouscription');

        if($user->id == $confirmDelete[0]) {
           Abonnement::where('user_id',$user->id)->update(['statut' => 2]);
        }
        Session::remove('souscriptionDelete');

        return redirect()->route('customersouscription');
    }

    // public function customerdeleteconfirmonesouscription(Request $request, $code) {
    //     $user = Auth::user();
    //     if(!$user) return redirect()->route('loginpage');

    //     Session::put('solosouscriptionDelete', $user->id.'delete');

    //     return redirect()->route('customerdeletsouscription');
    // }

    // Fonction envoi de message
    public function customermessagesend(Request $request) {
        $request->validate([
            'expediteur' => 'required|string',
            'destinataire' => 'required|string',
            'message' => 'required|string'
        ]);

        $basic  = new \Vonage\Client\Credentials\Basic("0a76023f", "ZFwu3vakhVbYLDdm");
        $client = new \Vonage\Client($basic);

        // Identification du nombre de cmessage à défalquer
        $nb_caracteres = strlen($request->message);
        $nb_message = $nb_caracteres/100;

        if($nb_caracteres%100) $nb_message+=1;

        // Information de l'utilisateur connecté
        $user = Auth::user();
        $user_info = Abonnement::where('user_id',$user->id)
        ->whereIn('statut',[1,2])
        ->first();

        // Si l'utilisateur n'est pas éligible à un envoi le rediriger sans envoyer de message
        if(!$user_info || !$user_info->sms) return redirect()->back()->withErrors(['msg'=>"Veuillez souscrire à un abonnement pour envoyer des messages"]);
        if((!$user_info->sms && $user_info->pack == 'Pro') || (($user_info->sms < $nb_message) && $user_info->pack != 'Pro')) return redirect()->back()->withErrors(['msg'=>"Vous n'avez pas assez de messages pour envoyer ce message"]);
        if((strpos($request->destinataire,',')) && $user_info->pack != 'Pro') return redirect()->back()->withErrors(['msg'=>"Veuillez entrer un bon numéro"]);


        // Processus d'envois du message
        if(strpos($request->destinataire,',')) {
            $tableau = explode(',', $request->destinataire);
            $tableau = array_map('trim', $tableau);

            for ($i=0; $i < count($tableau); $i++) {

                $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS("22999015705", $request->expediteur, utf8_encode($request->message))
                );

                $message = $response->current();

                if ($message->getStatus() == 0) {
                    Envoi::create([
                        'expediteur' => $request->expediteur,
                        'destinataire' => $tableau[$i],
                        'message' => $request->message,
                        'user_id' => $user->id,
                    ]);

                    if($user_info->pack == 'Pro') {
                        $user_info->sms = ($user_info->sms - 1);
                    } else {
                        $user_info->sms = ($user_info->sms - $nb_message);
                    }
                    $user_info->save();
                } else {
                    return redirect()->back()->withErrors(['error'=>"Erreur lors de l'envois du message veuillez réessayer."]);
                }

            }

        } else {

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS("22999015705", $request->expediteur, utf8_encode($request->message))
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                Envoi::create([
                    'expediteur' => $request->expediteur,
                    'destinataire' => $request->destinataire,
                    'message' => $request->message,
                    'user_id' => $user->id,
                ]);

                if($user_info->pack == 'Pro') {
                    $user_info->sms = ($user_info->sms - 1);
                } else {
                    $user_info->sms = ($user_info->sms - $nb_message);
                }

                $user_info->save();
            } else {
                return redirect()->back()->withErrors(['error'=>"Erreur lors de l'envois du message veuillez réessayer."]);
            }


        }

        return redirect()->back()->withErrors(['success'=>"Message envoyé avec succès"]);

    }

    public function customerdeleteonesouscription(Request $request, $code) {

        $abonnement =Abonnement::where('code', $code);
        if($abonnement) $abonnement->delete();

        return redirect()->route('customersouscription');
    }
}
