<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;
class PagesController extends Controller
{
    public function news(){
        $type = "";
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $new = DB::table('news') -> simplePaginate(5);
        return view('page.new', ['type' => $type,'news' => $new,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function seller(){
        $type = "Top Sellers";
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $new = DB::table('news')-> where('type','Top Sellers') -> simplePaginate(5);
        return view('page.new', ['type' => $type,'news' => $new,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function budget(){
        $type = "Best Budgets";
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $new = DB::table('news')-> where('type','Best Budgets') -> simplePaginate(5);
        return view('page.new', ['type' => $type,'news' => $new,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function technology(){
        $type = "New Technologies";
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $new = DB::table('news')-> where('type','New Technologies') -> simplePaginate(5);
        return view('page.new', ['type' => $type,'news' => $new,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function pages($id){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        $new = DB::table('news')-> where('id',$id) -> first();
        return view('page.detail', ['new' => $new,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
}
