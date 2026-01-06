<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function singleBlog(){
        return view('frontend.pages.single-blog');
    }
}
