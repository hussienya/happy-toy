<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\About;
use App\Category;


class AboutController extends Controller
{
    
    public function index(){
        $about = About::all()->first();
        $categories = Category::all();
        return view('front_views.about',compact('about','categories'));
    }

    
}
