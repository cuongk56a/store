<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{   
    private $slider;
    private $category;
    private $product;
    private $user;

    public function __construct(Slider $slider, Category $category, Product $product, User $user)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->user = $user;
    }

    public function index(){
        $sliders = $this->slider->latest()->get();
        $categorys = $this->category->where('parent_id', 0)->get();
        $productFeature = $this->product->latest()->take(6)->get();
        $productRecommed = $this->product->latest('views_count')->take(6)->get();
        return view('auth.home', compact('sliders', 'categorys', 'productFeature', 'productRecommed'));
    }

    public function getCategoryProduct($slug, $categoryId){
        $categorys = $this->category->where('parent_id', 0)->get();
        $products = $this->product->where('category_id',$categoryId)->paginate(12);
        return view('auth.product.category', compact('categorys','products'));
    }

    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $remember = $request->has('remember_me') ? true:false;
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:32',
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu từ 6 kí tự trở lên',
            'password.max'=>'Mật khẩu không được quá 32 kí tự'
        ]);
        if(Auth::attempt($credentials, $remember)){
            return redirect()->route('home')->with('thongbao', 'Đăng nhập thành công');
        }else{
            return back()->with('thongbao','Sai tài khoản hoặc mật khẩu');
        }
    }

    public function postRegister(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password'=>'required|min:6',
            ],[
                'name.required' => 'Tên bắt buộc phải nhập',
                'email.required' => 'Email bắt buộc phải nhập',
                'email.email' => 'Email không đúng định dạng',
                'emmail.unique' => 'Email đã tồn tại',
                'password.required' =>'Mật khẩu bắt buộc phải nhập',
                'password.min' =>'Mật khẩu phải trên 6 ký tự',
            ]);
            DB::beginTransaction();
            $user=$this->user->create([
                'name' => $request->names,
                'email' => $request->emails,
                'password' => $request->passwords
            ]);
            $user->userRole()->attach(2);
            DB::commit();
            return redirect()->route('getLogin')->with('thongbao','Tạo tài khoản thành công!');
        }catch(Exception $e){
            DB::rollBack();
            Log::error('Message: '.$e->getMessage(). '-- Line: '.$e->getLine());
            return back()->with('thongbao','Tạo tài khảo không thành công!');;
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount(){
        return view('auth.account');
    }
}
