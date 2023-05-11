<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Mail;

class HomeController extends Controller
{

    public function index(){
        $category = DB::table('category') -> get();
        $brand = DB::table('brand') -> get();
        $featured = DB::table('product') -> orderBy('created_at', 'desc') -> where('featured','=',1) -> take(8) -> get();
        $product = DB::table('product') -> orderBy('created_at', 'desc') -> where('featured','=',2) -> take(8) -> get();
        $user = Auth::user();
        $brandLogo = DB::table('brand') -> take(8) -> get();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('index', ['brandLogo' => $brandLogo,'category' => $category, 'featureds' => $featured, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist,'products' => $product]);
    }
    public function getContact (){
        $category = DB::table('category') -> get();
        $brand = DB::table('brand') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('contact', ['category' => $category, 'brand' => $brand, 'user' => $user, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function postContact (Request $request){
        $data = $request -> except('_token') ;
        $data['created_at'] = new \DateTime();
        DB::table('contact') -> insert($data);
        return redirect() -> route('getContact') -> with('success','Send successfully');
    } 
    public function about (){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('about', ['category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function gallery (){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('gallery', ['category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function detail ($id){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $product = DB::table('product') -> where('id',$id) -> first();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();
        $rating = DB::table('rating') -> where('product_id', $id) -> get();
        $star = DB::table('rating') -> where('product_id', $id) ->avg('star');
        $like = DB::table('product') -> where('category_id', $product -> category_id) -> orWhere('brand_id', $product -> brand_id) -> take(4) -> get();
        return view('detail', ['star'=> $star,'ratings' => $rating,'like' => $like,'category' => $category, 'user' => $user, 'brand' => $brand, 'id' => $id, 'product' => $product, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function user (){
        $id = Auth::user() -> id;
        $member = DB::table('member') -> where('id',$id) -> first();
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('user', ['id' => $id,'category' => $category, 'user' => $user, 'brand' => $brand, 'member' => $member, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function category($id){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $product = DB::table('product') -> where ('category_id',$id) -> simplePaginate(9);
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $rating = DB::table('rating') -> where('product_id', $id) -> get();
        $star = DB::table('rating') -> where('product_id', $id) ->avg('star');
        return view('shop', ['star'=> $star,'ratings' => $rating,'category' => $category, 'user' => $user, 'brand' => $brand, 'products' => $product, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function brand($id){
        $brand = DB::table('brand') -> get();
        $breadcrumb = DB::table('brand') -> where('id', $id) -> first();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $product = DB::table('product') -> where ('brand_id',$id) -> simplePaginate(12);
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('brand', ['breadcrumb' => $breadcrumb,'category' => $category, 'user' => $user, 'brand' => $brand, 'products' => $product, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function newsletter(Request $request){
        $data = $request -> except('_token');
        $data['created_at'] = new \DateTime();
        DB::table('newsletter') -> insert($data);
        $mail = $request -> email;
        $name = 'Wireless World';
        Mail::send('email.newsletter', compact('name'), function($email) use($mail){
            $email -> subject('Sign Up Newsletter');
            $email -> to($mail);
        });
        return redirect() -> route('index') -> with('success','Send successfully');
    }
    public function rating ($id, Request $request){
        $data = $request -> except('_token');
        $data['product_id'] = $id;
        $data['created_at'] = new \DateTime();
        DB::table('rating') -> insert($data);
        return redirect() -> route('detail',['id'=> $id]);
    }
}
