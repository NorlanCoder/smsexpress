<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Envoi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function customerhome(Request $request) {
        $user = Auth::user();

        $abonnement = Abonnement::where('user_id',$user->id)->where('statut',1)->first();
        // echo($abonnement);
        return view('customer.customerhome')->with(compact('abonnement'));
    }

    public function customersouscription(Request $request) {
        $user = Auth::user();

        $abonnements = Abonnement::where('user_id',$user->id)->where('statut',1)->get();

        return view('customer.historiquesouscription')->with(compact('abonnements'));
    }

    public function customertransaction(Request $request) {
        $user = Auth::user();

        $envois = Envoi::where('user_id',$user->id)->where('statut',1)->get();

        return view('customer.historiquetransaction')->with(compact('envois'));
    }

    public function customerprofile(Request $request) {
        return view('customer.customerprofile');
    }

    public function customercontacts(Request $request) {
        return view('customer.addresscontact');
    }

    public function customeroffre(Request $request) {
        return view('customer.customerhome');
    }
}
