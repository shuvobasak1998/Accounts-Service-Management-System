<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendServiceController extends Controller
{
    public function serviceDetails($slug){
        return view('frontend.pages.service-details');
    }
}
