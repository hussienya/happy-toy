<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Item;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $items = Item::all();
        $items_count = count($items);
        $users_count = count($users);
        return view('dashboard.index',compact('items_count','users_count'));
    }
}