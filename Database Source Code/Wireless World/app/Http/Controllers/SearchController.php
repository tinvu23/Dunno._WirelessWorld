<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;
class SearchController extends Controller
{
    public function search (Request $request){
        $search = $request  -> search;
        $product = DB::table('product') -> where('name','like', '%'.$search.'%') -> simplePaginate(9);
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();  
        return view('shop',['category' => $category, 'user' => $user, 'brand' => $brand, 'products' => $product, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }
    public function ajaxSearch (Request $request){
        $search = $request -> search;
        $product = DB::table('product') -> where('name','like', '%'.$search.'%') -> get();
        return $product;
    }
}
