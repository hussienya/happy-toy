<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\About;
use App\Category;
use Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
  
    //  ***** Admin Functions ***** //

    // Show About edit page   
    public function show() {
        $about = About::all()->first();
        return view('dashboard.about.about',compact('about'));

    }
    
    public function update(Request $request) {
        
        $about = About::all()->first();

        $request->validate([
            'about_desc' => 'required',
            // 'about_img' => 'max:2000'
        ],
        [
            'about_desc.required' => 'هذا الحقل مطلوب',
            // 'about_img.uploaded' => 'أقصى حجم للصورة 2M'
        ]);
        
        $about_desc = $request->about_desc;
        $data = [
            'ar' => [
                'description' => $about_desc,
            ]
        ];

        if($request->file('about_img')){
            
             if(\File::exists($about->img)){
                \File::delete($about->img);
             }
            $image=$request->file('about_img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/about/';
            $destinationPath = 'images/about';
            $img = Image::make($image->getRealPath());
            $img->resize(445, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['img']);
       
            // $destinationPath = public_path('/images/about');
            // $image->move($destinationPath,  $input['img']);
            $name = $path.time().$input['img'];
            
          $data['img'] =  $name;
        }

        $about->update($data);

        return redirect()->back()->with('message','تم تعديل بيانات صفحة من نحن بنجاح');
    }

}
