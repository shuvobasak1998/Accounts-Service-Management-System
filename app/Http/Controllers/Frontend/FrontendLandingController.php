<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendLandingController extends Controller
{

    public function landingPage(){
        return view('frontend.pages.landing');
    }
}
