<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    function IndexRegistration(){
        return view('registration.registration');
    }
}