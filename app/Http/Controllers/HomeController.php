<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Pack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class HomeController extends Controller
{
    //

    public function homepage(Request $request) {
        $packs = Pack::all();

        return view('home')->with(compact('packs'));
    }

    public function loginpage(Request $request) {
        return view('login');
    }

    public function loginpagepost(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|bail',
            'password' => 'required|min:8',
        ],[
            'email.required' => "Email obligatoire",
            'email.email' => "Email incorrect",
            'password.min' => "Le mot de passe doit contenir au moins 8 caractères",
            'password.required' => "Mot de passe obligatoire",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('customerhome');
        }

        $user = User::find($request->email);

        if(!$user || !count($user)) return redirect()->back()->withErrors(['msg'=>'Mail ou mot de passe incorrect']);

    }

    public function registerpagepost(Request $request) {

        $request->validate([
            'email' => 'required|unique:users|email|bail',
            'password' => 'required|min:8',
        ],[
            'email.unique' => "Cet utilisateur existe déjà",
            'email.required' => "Email obligatoire",
            'email.email' => "Email incorrect",
            'password.min' => "Le mot de passe doit contenir au moins 8 caractères",
        ]);


        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('customerhome')
        ->withSuccess('Connexion réussi avec succès');
    }

    public function souscriptioncheck(Request $request, $id) {

        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        Session::put('packobject', $id);

        return redirect()->route('souscriptionpaye');

    }

    public function souscriptionpaye(Request $request) {

        $user = Auth::user();
        if(!$user) return redirect()->route('loginpage');

        $id = Session::get('packobject');
        $pack = null;

        if(Session::has('packobject')) $pack = Pack::where('id', $id)->first();
        else return redirect()->route('customerhome');

        return view('userpaye')->with(compact('pack'));
    }

    public function validepack(Request $request, $id) {

        $kkiapay = new \Kkiapay\Kkiapay(
            '2ee121605d3511eea596e938ae1c409a',
            'tpk_2ee121625d3511eea596e938ae1c409a',
            'tsk_2ee148705d3511eea596e938ae1c409a',
            $sandbox = true
        );

        $user = Auth::user();

        if (isset($_GET['transaction_id']) and !empty($_GET['transaction_id'])) {

            $verified = $kkiapay->verifyTransaction($_GET['transaction_id']);

            $pack = Pack::where('id', $id)->first();

            // dd($verified);

            if ($verified->amount == $pack->chiffre) {

                $code = time().$_GET['transaction_id'];

                $sms = 0;
                $abonnement = Abonnement::where('user_id',$user->id)->whereIn('statut',[1,2])->first();
                if($abonnement) $sms = $abonnement->sms;
                $sms+=$pack->sms;

                $newabonnement = Abonnement::create([
                    'code' => $code,
                    'prix' => $pack->chiffre,
                    'sms' => $sms,
                    'pack' => $pack->nom,
                    'pack_code' => $pack->code,
                    'user_id' => $user->id,
                    'achat_id' => 1,
                    'statut' => 1,
                ]);

                if($abonnement) {
                    $abonnement->sms = 0;
                    $abonnement->statut = 0;
                    $abonnement->save();
                }

                // <a href='".$lien."'></a>
                $contenu = "Vous venez reçu de vendre un nouveau pack de $verified->amount Fcfa Félicitation";

                require base_path("vendor/autoload.php");
                $mail = new PHPMailer(true);

                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');   //  sender username
                $mail->Password = env('MAIL_PASSWORD');       // sender password
                $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                $mail->Port = 587;                          // port - 587/465

                $mail->setFrom('contact@smsexpress.pro', 'SMS EXPRESS');
                $mail->addAddress("fabienamoussou20062001@gmail.com");
                $mail->isHTML(true);                // Set email content format to HTML

                $mail->Subject = "FELICITATION";
                $mail->Body    = $contenu;
                $success = $mail->send();

                // dd($success);

                return redirect()->route('customerhome');

                // \Mail::to($pass->email)->send(new \App\Mail\PassMail($qrcode));
            } else {
                echo "Tes sou nous appartiennent désormais, t'as essayé de frauder bye bye (p1nk5h4dow)";
            }
        } else {
            redirect()->route('souscriptionpaye', ['id' => $id]);
        }
    }

    public function registerpage(Request $request) {
        return view('register');
    }

    public function forgetpage(Request $request) {
        return view('forget');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginpage')->withSuccess('Déconnexion réussi');;
    }
}
