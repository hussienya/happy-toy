<?php

namespace App\Http\Controllers\API;

use App\Providers\RouteServiceProvider;

use App\Http\Controllers\Controller;    
    use App\SizeItem;
    use App\Notification;
    use Illuminate\Support\Str;
    use Illuminate\Http\Request;
    use App\User;
    use App\Brand;
    use App\BrandItem;
    use App\Category;
    use App\CategoryItem;
    use App\Color;
    use App\Item;
    use App\ColorItem;
    use App\ItemImage;
    use App\ItemSize;    
    use App\ItemType;
    use App\Size;
    use App\Slider;    
    use Carbon\Carbon;
    use App\cart;
    use App\Type;
    use Illuminate\Support\Facades\Storage;
    use JWTAuth;
    use Image;
    use Validator;
    use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function allCategories(){
        $categories = Category::all();
        return response()->json([
            'status'  =>'1',
            'details' => $categories,
        ]);
    }
    public function allTypes(){
        $types = Type::all();
        return response()->json([
            'status'  =>'1',
            'details' => $types,
        ]);
    }
    public function allSize(){
        $sizes = SIze::all();
        return response()->json([
            'status'  =>'1',
            'details' => $sizes,
        ]);
    }
    public function addItem(Request $request){

        $validator = Validator::make($request->all(), [
            'category'            => ['required'],
            'colors'              => ['required'],
            'brand'               => ['required'],
            'maker'               => ['required'],
            'item_title_ar'       => ['required'],
            'item_subtitle_ar'    => ['required'],
            'item_description_ar' => ['required'],
            'item_title_en'       => ['required'],
            'item_subtitle_ar'    => ['required'],
            'item_description_en' => ['required'],

        ]);
        if($validator->fails()){
            return response()->json([
                'status'       => '0',
                'details'      => $validator->errors(), 422
            ]);
        }
        $item_title_en        = $request->item_title_en;
        $item_subtitle_en     = $request->item_subtitle_en;
        $item_description_en  = $request->item_description_en;
        $data = [
            'price'           => $request->price,
            'new_price'       => $request->new_price,
            'real_price'      => $request->real_price,
            'count'           => $request->count,
            'maker'           => $request->maker,
            'ar' => [
                'title'       => $request->item_title_ar,
                'subtitle'    => $request->item_subtitle_ar,
                'description' => $request->item_description_ar,
            ],
            'en' => [
                'title'       => $item_title_en,
                'subtitle'    => $item_subtitle_en,
                'description' => $item_description_en,
            ]
        ];
        
        $item = Item::create($data);
        $item_categories = $request->category;
        if(!$item_categories == NULL) {
            $items_Array = explode("," , $item_categories);
            foreach($items_Array as $cat) {
                CategoryItem::insert( [
                    'category_id'=>  $cat,
                    'item_id'=> $item->id
                ]);
            }
        }
    
        $items_type = $request->type;
        if(!$items_type == NULL) {
            $items_type = explode("," , $items_type);
            foreach($items_type as $type) {
                ItemType::insert( [
                    'type_id'=>  $type,
                    'item_id'=> $item->id
                ]);
            }
        }
        $items_size = $request->size;
        if(!$items_size == NULL) {
            $items_size = explode("," , $items_size);
            foreach($items_size as $size) {
                ItemSize::insert( [
                    'size_id'=> $size,
                    'item_id'=> $item->id
                ]);
            }
        }
        $items_color = $request->colors;
        if(!$items_color == NULL) {
            $items_color = explode("," , $items_color);
            foreach($items_color as $color) {
                ColorItem::insert( [
                    'color_id'=>  $color,
                    'item_id'=> $item->id
                ]);
            }
        }
        if($request->file('image')){
            $path = 'images/items/'.$item->id.'/';
            if(!(\File::exists($path))){
                \File::makeDirectory($path);
            } 
            $files=$request->file('image');
            foreach($files as $file) {
                $input['image'] = $file->getClientOriginalName();
                $destinationPath = 'images/items/';
                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['image']);
                $name = $path.$input['image'];
                ItemImage::insert( [
                    'img'=>  $name,
                    'item_id'=> $item->id
                ]);
            }
        } 
        return response()->json([
            'status'  =>'1',
            'details' => 'تم إضافة المنتج بنجاح'
        ]);
    }
    public function itemCategory($id){
        $items_category = CategoryItem::where('category_id',$id)->get();
        $items =[];
        foreach($items_category as $item_category){
            $item = Item::where('id',$item_category->item_id)->first();
            $images = ItemImage::where('item_id',$item_category->item_id)->get();
            $final = array('item'=>$item , 'images'=>$images);
            array_push($items , $final);
        }
        return response()->json([
            'status'  =>'1',
            'details' => $items,
        ]);
    }
    public function itemType($id){
        $items_type = ItemType::where('type_id',$id)->get();
        $items =[];
        foreach($items_type as $item_type){
            $item = Item::where('id',$item_type->item_id)->first();
            $images = ItemImage::where('item_id',$item_type->item_id)->get();
            $final = array('item'=>$item , 'images'=>$images);
            array_push($items , $final);
        }
        return response()->json([
            'status'  =>'1',
            'details' => $items,
        ]);
    }
    public function itemSize($id){
        $items_size = ItemSize::where('size_id',$id)->get();
        $items =[];
        foreach($items_size as $item_size){
            $item = Item::where('id',$item_size->item_id)->first();
            $images = ItemImage::where('item_id',$item_size->item_id)->get();
            $final = array('item'=>$item , 'images'=>$images);
            array_push($items , $final);
        }
        return response()->json([
            'status'  =>'1',
            'details' => $items,
        ]);
    }
    public function updateitem(Request $request , $id){
        $items_details = Item::where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'category'            => ['required'],
            'colors'              => ['required'],
            'maker'               => ['required'],
            'item_title_ar'       => ['required'],
            'item_subtitle_ar'    => ['required'],
            'item_description_ar' => ['required'],
            'item_title_en'       => ['required'],
            'item_subtitle_ar'    => ['required'],
            'item_description_en' => ['required'],

        ]);
        if($validator->fails()){
            return response()->json([
                'status'       => '0',
                'details'      => $validator->errors(), 422
            ]);
        }
        $item_title_en        = $request->item_title_en;
        $item_subtitle_en     = $request->item_subtitle_en;
        $item_description_en  = $request->item_description_en;
        $data = [
            'price'           => $request->price,
            'new_price'       => $request->new_price,
            'real_price'      => $request->real_price,
            'count'           => $request->count,
            'maker'           => $request->maker,
            'ar' => [
                'title'       => $request->item_title_ar,
                'subtitle'    => $request->item_subtitle_ar,
                'description' => $request->item_description_ar,
            ],
            'en' => [
                'title'       => $item_title_en,
                'subtitle'    => $item_subtitle_en,
                'description' => $item_description_en,
            ]
        ];
        
        $items_details->update($data);
        $item_categories = $request->category;
        if(!$item_categories == NULL) {            
            $items_Array = explode("," , $item_categories);            
            $Category_Itemes = CategoryItem::where('item_id',$id)->get();
            foreach($Category_Itemes as $Category_Item )
            {             
                $Category_Item->delete();             
            }
            foreach($items_Array as $cat) {
                $Category_Itemes = CategoryItem::where('category_id',$cat)->exists();                
                if (!$Category_Itemes) {
                    $data =[
                        'category_id'=>  $cat,
                        'item_id'=> $id
                    ];
                    CategoryItem::insert( $data);                    
                }
            }
        }
    
        $items_type = $request->type;
        if(!$items_type == NULL) {
            $items_Array = explode("," , $items_type);
            $Type_Itemes = ItemType::where('item_id',$id)->get();            
            foreach($Type_Itemes as $Type_Item )
            {             
                $Type_Item->delete();             
            }
            foreach($items_Array as $cat) {                
                $Type_Itemes = ItemType::where('type_id',$cat)->exists();
                if (!$Type_Itemes) {
                    $data =[
                        'type_id'=>  $cat,
                        'item_id'=> $id
                    ];
                    ItemType::insert($data);                    
                }
            }
        }
        $items_size = $request->size;
        if(!$items_size == NULL) {
            $size_Array = explode("," , $items_size);            
            $size_Itemes = ItemSize::where('item_id',$id)->get();
            foreach($size_Itemes as $size_Item )
            {             
                $size_Item->delete();             
            }
            foreach($size_Array as $cat) {            
                $size_Itemes = ItemSize::where('size_id',$cat)->exists();
                if (!$size_Itemes) {
                    $data =[
                        'size_id'=>  $cat,
                        'item_id'=> $id
                    ];
                    ItemSize::insert( $data);                    
                }
            }
        }
        $items_color = $request->colors;
        if(!$items_color == NULL) {
            $color_Array = explode("," , $items_color);
            $color_Itemes = ColorItem::where('item_id',$id)->get();
            foreach($color_Itemes as $color_Item )
            {             
                $color_Item->delete();             
            }
            foreach($color_Array as $cat) {               
                $color_Itemess = ItemSize::where('size_id',$cat)->exists();
                if (!$color_Itemess) {
                    $data =[
                        'color_id'=>  $cat,
                        'item_id'=> $id
                    ];
                    ColorItem::insert($data);                    
                }
            }
                      
        }
        if($request->file('image')){
            $Item_Images = ItemImage::where('item_id',$id)->get();
            foreach ($Item_Images as $Item_Image) {
                $image_path = public_path($Item_Image->img);                
                if(\File::exists($image_path)){
                    unlink($image_path);                                        
                }                
                $Item_Image->delete();
            }
            $path = 'images/items/'.$id.'/';
            if(!(\File::exists($path))){
                \File::makeDirectory($path);
            } 
            //$files=$request->file('image');
            foreach($request->allFiles() as $file) {
                $input['image'] = $file->getClientOriginalName();
                $destinationPath = 'images/items/';
                $img = Image::make($file->getRealPath(),75);
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['image']);
                $name = $path.$input['image'];
                ItemImage::insert( [
                    'img'=>  $name,
                    'item_id'=> $id
                ]);
            }            
        } 
        return response()->json([
            'status'  =>'1',
            'details' => 'تم نعديل المنتج بنجاح',
        ]);

    }
    public function cart(Request $request,$user_id){
        $items_size = $request->item;
        $cart_num  = cart::where('user_id',$user_id)->where('item_id',$items_size)->where('status',0)->exists();
        if (!$cart_num) {
            $Item = Item::where('id',$items_size)->exists();
            if ($Item) {
                $items_details = Item::where('id',$items_size)->get();
            foreach($items_details as $items_detail){
                $price = $items_detail->new_price ; 
            }
            $amount = $request->amount;
            $data = [
                'item_id' =>$items_size,
                'user_id' =>$user_id,
                'price' => $price,
                'amount' => $amount,
                'status' => 0,
            ];
                cart::insert($data);
            }
        return response()->json([
            'status'  =>'1',
            'details' => 'تم اضافة المنتج',
        ]);        
        }else{
            return response()->json([
                'status'  =>'0',
                'details' => 'هذا المنتج موجود مسبقا',
            ]);
        }
        // $items_size = $request->item;
        // $items=[];
        // if(!$items_size == NULL) {
        //     $item_Array = explode("," , $items_size); 
        //     foreach($item_Array as $item_count){
            //     $Item = Item::where('id',$item_count)->exists();
            //     if ($Item) {
            //         $items_details = Item::where('id',$item_count)->get();
            //     foreach($items_details as $items_detail){
            //         $price = $items_detail->new_price ; 
            //     }
            //     $amount = $request->amount;
            //     $data = [
            //         'item_id' =>$item_count,
            //         'user_id' =>$user_id,
            //         'price' => $price,
            //         'amount' => $amount,
            //         'status' => 0,
            //     ];
            //         cart::insert($data);
            //     }                
            //     $last_card = cart::orderBy('id', 'desc')->first();
            //     // foreach($last_card as $last){
            //     //     $last_id = $last->id;
            //     // }
            //     $cart_num  = cart::where('user_id',$user_id)->where('id',$last_card->id)->get();
            //     // $total_price =
            //     $final = array('item'=>$cart_num);
            //     array_push($items , $final);                
            // }            
            // return response()->json([
            //     'status'  =>'1',
            //     'details' => $items,
            // ]);        
       // }
    }
    public function see_all_order(Request $request,$user_id){
        $total_price = 0;
        $cart_num  = cart::where('user_id',$user_id)->where('status',0)->get();
        foreach($cart_num as $cart_number){
            $price_one = $cart_number->price * $cart_number->amount;

            $total_price += $price_one;

        }
        $data = [
            'cart_num'=>$cart_num,
            'total_price'=>$total_price
        ];
        return response()->json([
            'status'  =>'0',
            'details' => $data,
        ]);
    }
    public function confirm_cart(Request $request,$user_id){        
        $cart_num = cart::where('user_id',$user_id)->where('status',0)->get();
        $i = 0;
        foreach($cart_num as $cart){
            $amount_id = $request->amount;
            $amount_Array = explode("," , $amount_id);            
            DB::table('cart')
                    ->where('user_id', $user_id)
                    ->where('id', $cart->id)
                    ->update(['status' => 1,'amount'=>$amount_Array[$i]]);
            $i++;
        }        
        
        return response()->json([
            'status'  =>'1',
            'details' => 'تم تأكيد الطلب',
        ]);
    }
}

