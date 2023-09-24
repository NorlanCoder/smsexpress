<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function customerhome(Request $request) {
        return view('customer.customerhome');
    }

    public function customersouscription(Request $request) {
        return view('customer.historiquesouscription');
    }

    public function customertransaction(Request $request) {
        return view('customer.historiquetransaction');
    }

    public function customerprofile(Request $request) {
        return view('customer.customerprofile');
    }

    public function customeroffre(Request $request) {
        return view('customer.customerhome');
    }
}
