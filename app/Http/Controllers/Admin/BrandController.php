<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Brand;
use Image;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    //  ***** Admin Functions ***** //

    // Show Admin homepage
    public function admin() {
        $brands = Brand::orderBy('id','DESC')->paginate(15);
        return view('dashboard.brand.brand',compact('brands'));
    }
    
    public function create() {
        return view('dashboard.brand.brand-add');
    }
    

    public function store(Request $request) {

        $brand = new Brand;
        $request->validate([
            'img' => 'required'
        ],
        [
            'img.required' => 'هذا الحقل مطلوب',
            
        ]);
                
        if($request->file('img')){
            $image=$request->file('img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/brands/';
            $destinationPath = 'images/brands';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['img']);
            $name = $path.$input['img'];
            
          $data['img'] =  $name;
        }

        $brand->create($data);

        return redirect('/admin/brands')->with('message','تم إضافة علامة تجارية جديدة  بنجاح');

    }
    
    public function show($id) {
    }

    
    public function edit($id) {
        $brand = Brand::where('id',$id)->first();
        return view('dashboard.brand.brand-edit',compact('brand'));
    }
    
    public function update(Request $request, $id) {
        
        $brand = Brand::where('id',$id)->first();

        if($request->file('img')){

            if(\File::exists($brand->img)){
                \File::delete($brand->img);
             }
            $image=$request->file('img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/brands/';
            $destinationPath = 'images/brands';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['img']);
            $name = $path.$input['img'];
            
          $data['img'] =  $name;
        }

        $brand->update($data);

        return redirect()->back()->with('message','تم تعديل بيانات العلامة التجارية بنجاح');
    }

    public function destroy($id) {
        $brand = Brand::where('id',$id)->first();
        if(\File::exists(public_path($brand->img))){
            \File::delete(public_path($brand->img));
        }
        $brand->delete();
        return redirect('/admin/brands')->with('message','تم حذف العلامة التجارية بنجاح');
    }

}
