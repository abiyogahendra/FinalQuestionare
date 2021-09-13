<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontPageController extends Controller
{
    function IndexFrontPage(){
        return view('front-page');
    }
}