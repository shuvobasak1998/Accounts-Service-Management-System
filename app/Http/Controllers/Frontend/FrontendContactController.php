<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    public function contactPage(){
        return view('frontend.pages.contact');
    }
}
