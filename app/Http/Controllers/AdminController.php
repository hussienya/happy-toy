<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class AdminController extends Controller
{
    
    public function index() {
        
        return view('admin.index');
    }

    
    //  ***** Admin Functions ***** //

    // Show Admin homepage
    public function create() {
        $items = Item::all();
        $items_count = count($items);
        return view('dashboard.index',compact('items_count'));
    }

    
    public function store(Request $request) {
        
    }

    
    public function show($id) {
        
    }

    
    public function edit($id) {
        
    }

    
    public function update(Request $request, $id) {
        
    }

    public function destroy($id) {
        
    }
}
