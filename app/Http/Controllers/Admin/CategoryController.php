<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        
    }

    //  ***** Admin Functions ***** //

    // Show Admin homepage
    public function admin() {
        $categories = Category::orderBy('id','DESC')->paginate(15);
        return view('dashboard.category.category',compact('categories'));
    }
    
    public function create() {
        return view('dashboard.category.category-add');
    }
    

    public function store(Request $request) {

        $category = new Category;
        $last_cat = Category::latest('id')->first();
        if ($last_cat == NULL) {
            $i = 1;
        } else {
            $i = $last_cat->id + 1;
        }
        $request->validate([
            'category_title' => 'required',
            'img' => 'required'
        ],
        [
            'category_title.required' => 'هذا الحقل مطلوب',
            'img.required' => 'هذا الحقل مطلوب',
            
        ]);
        
        $category_title = $request->category_title;
        $data = [
            'ar' => [
                'name' => $category_title,
            ]
        ];
        
        if($request->file('img')){
            $image=$request->file('img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/category/';
            $destinationPath = 'images/category';
            // $destinationPath = '/images/category';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['img']);
            $name = $path.time().$input['img'];
            
          $data['img'] =  $name;
        }

        $category->create($data);

        return redirect('/admin/categories')->with('message','تم إضافة تصنيف جديد بنجاح');

    }
    
    public function show($id) {
    }

    
    public function edit($id) {
        $category = Category::where('id',$id)->first();
        return view('dashboard.category.category-edit',compact('category'));
    }
    
    public function update(Request $request, $id) {
        
        $category = Category::where('id',$id)->first();

        $request->validate([
            'category_title' => 'required',
        ],
        [
            'category_title.required' => 'هذا الحقل مطلوب',
        ]);
        
        $category_title = $request->category_title;
        $data = [
            'ar' => [
                'name' => $category_title,
            ]
        ];

        if($request->file('img')){

            if(\File::exists($category->img)){
                \File::delete($category->img);
             }
            $image=$request->file('img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/category/';
            $destinationPath = 'images/category';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['img']);
            $name = $path.time().$input['img'];
            
          $data['img'] =  $name;
        }

        $category->update($data);

        return redirect()->back()->with('message','تم تعديل بيانات التصنيف بنجاح');
    }

    public function destroy($id) {
        $category = Category::where('id',$id)->first();
            if(\File::exists($category->img)){
                \File::delete($category->img);
            }
        $category->delete();
        return redirect('/admin/categories')->with('message','تم حذف التصنيف بنجاح');
    }
}
