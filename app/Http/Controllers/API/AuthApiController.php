<?php
namespace App\Http\Controllers\API;
    use App\Http\Controllers\Controller;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Auth\Events\Registered;
    use Illuminate\Http\Request;
    use App\User;
    use App\Brand;
    use App\BrandItem;
    use App\Category;
    use App\CategoryItem;
    use App\Color;
    use App\Item;
    use App\ItemColor;
    use App\ItemImage;
    use App\ItemSize;
    use App\ItemType;
    use App\Size;
    use App\SizeItem;
    use App\Slider;
    use App\Type;
    use App\Notification;
    use Illuminate\Support\Str;
    use Mail;
    use App\Traits\FileManagement;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use JWTAuth;
    use Image;
    use Validator;
class AuthApiController extends Controller
{
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name'          => ['required', 'string', 'max:255'],
            'last_name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8','confirmed'],
            'phone'         => ['required'],
        ]);

        if($request->file('image')){
            $image=$request->file('image');
            $input['image'] = $image->getClientOriginalName();
            $path = 'storage/profiles/';
            $destinationPath = 'storage/profiles';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['image']);
            $name = $path.time().$input['image'];
            return response()->json($name);

          $request['img'] =  $name;
        }

        if($validator->fails()){
            return response()->json([
                'status'       => '0',
                'details'      => $validator->errors(), 422
            ]);
        }
        $user =  User::create([
            'first_name'    => $request['first_name'],
            'last_name'     => $request['last_name'],
            'email'         => $request['email'],
            'password'      => Hash::make($request['password']),
            'phone'         => $request['phone'],
        ]);
        return response()->json($user);
        
        $token = Str::random(64);
        $email =  $user->email;
        UserVerify::create([
              'user_id' => $user->id, 
              'token' => $token
            ]);
        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($email){
              $message->to($email);
              $message->subject('Email Verification Mail');
          });
          return response()->json($user);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json([
                'status'   => '0',
                'details'  => 'Either email or password is wrong.'
            ]);
            
        }
        return $this->createNewToken($token);
    }
    protected function createNewToken($token){
        return response()->json([
            'status'       => '1',
            'access_token' => $token,
            'token_type'   => 'bearer',
            'details'      => auth()->user()
        ]);
    }
    public function updateProfile(Request $request , $id) {
        $user = User::where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'first_name'         => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'password'     => ['required', 'string', 'min:8','confirmed'],
        ]);
        if($request->file('image')){
            $image=$request->file('image');
            $input['image'] = $image->getClientOriginalName();
            $path = 'storage/profiles/';
            $destinationPath = 'storage/profiles';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['image']);
            $name = $path.time().$input['image'];
          $request['img'] =  $name;
        }

        if($validator->fails()){
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        $data =[
            'first_name'   => $request['first_name'],
            'last_name'    => $request['last_name'],
            'password'     => Hash::make($request['password']),
            'phone'        => $request['phone'],
            'zip_code'     => $request['zip_code'],
            'address'      => $request['address'],
            'country'      => $request['country'],
            'city'         => $request['city'],
        ];

        $user->update($data);
          return response()->json([
            'status'   => '1',
            'details'  => $user
        ]);
    }
    
}
