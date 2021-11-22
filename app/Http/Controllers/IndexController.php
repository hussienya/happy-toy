<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;
use App\Brand;
use Mail;

class IndexController extends Controller {
    
    public function index() {
        $slides = Slider::all();
        $categories_item = Category::orderBy('id','ASC')->take(10)->get();
        $items = Item::orderBy('id','DESC')->take(16)->get();
        $categories = Category::all();
        $new_items = Item::orderBy('created_at','DESC')->take(8)->get();
        $sale_items = Item::whereNotNull('new_price')->take(8)->get();
        $brands = Brand::all();
        return view('front_views.index',compact('slides','categories','items','categories_item','new_items','sale_items','brands'));

    }
    public function contact() {
        $slides = Slider::all();
        $categories_item = Category::orderBy('id','DESC')->take(10)->get();
        $items = Item::orderBy('id','DESC')->take(16)->get();
        $categories = Category::all();
        return view('front_views.contact',compact('slides','categories','items','categories_item'));

    }
    
    // send email
    public function sendContact(Request $request) {
      $data = array('name'=> $request->name, 'email' => $request->email, 'subject' => $request->subject, 'message_txt' =>$request->message );
      
     
      
      Mail::send('front_views.mail', $data, function($message) use ($data) {
         $message->to('info@happytoyeg.com', 'Message from website')->subject
            ($data['subject']);
         $message->from($data['email'], $data['name']);
      });
      
      echo "شكرا لك...تم إرسال رسالتك بنجاح... سنتواصل معك بأقرب وقت ممكن";
   }
}
