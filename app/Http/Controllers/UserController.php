<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function customerhome(Request $request) {
        return view('customer.customerhome');
    }
}
