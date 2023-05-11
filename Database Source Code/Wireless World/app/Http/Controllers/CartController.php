<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cart;
use Mail;

class CartController extends Controller
{
    public function addCart ($id){
        $product = DB::table('product') -> where('id', $id) -> first();
        Cart::add($id,$product -> name, 1, $product -> price);
        return redirect() -> route('cart');
    }

    public function deleteCart($id){
        Cart::remove($id);
        return redirect() -> route('cart');
    }

    public function minusCart($id){
        $qty = Cart::get($id) -> qty;
        $qty = $qty - 1;
        Cart::update($id, $qty);
        return redirect() -> route('cart');
    }

    public function plusCart($id){
        $qty = Cart::get($id) -> qty;
        $qty = $qty + 1;
        Cart::update($id, $qty);
        return redirect() -> route('cart');
    }

    public function cart (){
        $cart = Cart::content();
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user();
        $totalCart = Cart::subtotal();
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();   
        return view('cart', ['totalCart' => $totalCart,'category' => $category, 'user' => $user, 'brand' => $brand, 'cart' => $cart, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }

    public function addWishlist ($id){
        $product = DB::table('product') -> where('id', $id) -> first();
        Cart::instance('wishlist') -> add($id, $product -> name, 1, $product -> price);
        return redirect() -> route('wishlist');
    }

    public function wishlist (){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user(); 
        $countCart = Cart::count();
        $countWishlist = Cart::instance('wishlist')->count();
        $wishlist = Cart::instance('wishlist') -> content();
        return view('wishlist', ['wishlist' => $wishlist ,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }

    public function getOrder (){
        $cart = Cart::content();
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user(); 
        $countCart = Cart::count();
        $totalCart = Cart::subtotal();
        $countWishlist = Cart::instance('wishlist')->count();
        return view('order', ['totalCart' => $totalCart,'category' => $category, 'cart' => $cart, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }

    public function postOrder (Request $request){
        $data = $request -> except('_token');
        $data['created_at'] = new \DateTime();
        $data['status'] = 'In Process'; 
        $data['customer_id'] = Auth::user() -> id;
        $data['price'] =  Cart::subtotal(); 
        DB::table('order') -> insert($data);
        $mail = Auth::user() -> email;
        $name = Auth::user() -> fullname;
        $price = $data['price'];
        $address = Auth::user() -> address;
        $detail = $request -> detail;
        $phone = $request -> phone;
        Mail::send('email.order', compact('phone','address','detail','name','data','mail','price'),function ($email) use ($mail){
            $email -> subject('Thank you for your order');
            $email -> to($mail);
        });
        Cart::destroy();
        return redirect() -> route('listOrder');
    }

    public function listOrder (){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $user = Auth::user(); 
        $countCart = Cart::count();
        $totalCart = Cart::subtotal();
        $countWishlist = Cart::instance('wishlist')->count();
        $order = DB::table('order') -> where('customer_id',Auth::user() -> id)-> orderBy('created_at', 'desc') -> simplePaginate(5);
        return view('listOrder',['orders' => $order,'totalCart' => $totalCart,'category' => $category, 'user' => $user, 'brand' => $brand, 'countCart' => $countCart, 'countWishlist' => $countWishlist]);
    }

}
