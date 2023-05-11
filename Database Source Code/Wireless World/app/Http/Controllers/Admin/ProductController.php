<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){
        $result = DB::table('product')  -> orderBy('created_at', 'desc') -> simplePaginate(5);
        $user = Auth::user();
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        return view('admin.product.index', ['categories' => $category,'brands' => $brand,'products' => $result,'user' => $user]);
    }

    public function create (){
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        $parent_category = DB::table('category') -> get();
        $user = Auth::user();
        return view('admin.product.create',['category' => $category,'user' => $user, 'brand' => $brand, 'parent_category' => $parent_category]);
    }

    public function store (StoreRequest $request){
        $data = $request -> except('_token');
        $data['created_at'] = new \DateTime();
        $imageName = time(). '.' .$request->image->extension();
        $request-> image-> move(public_path('images'),$imageName);
        $data['image'] = $imageName;
        DB::table('product') -> insert($data);
        return redirect() -> route('admin.product.index') -> with('Success','Insert successfully');
    }

    public function edit ($id){
        $user = Auth::user();
        $brand = DB::table('brand') -> get();
        $product = DB::table('product') -> where('id', $id) -> first();
        $parent_category = DB::table('category') -> get();
        return view('admin.product.edit', ['id' => $id, 'product' => $product, 'parent_category' => $parent_category,'user' => $user ,'brand' => $brand]);
    }

    public function update (UpdateRequest $request, $id){
        $data = $request -> except('_token','image');
        if (!empty($request-> image)){
            $old_img = DB::table('product') -> where ('id', $id) -> first ();
            $url_old_img = public_path('images/'.$old_img -> image);
            if(file_exists($url_old_img)){
                unlink($url_old_img);
            }
            $imageName = time().'.'.$request-> image-> extension();
            $request -> image -> move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        DB::table('product')-> where ('id','=',$id) -> update($data);
        return redirect()-> route('admin.product.index') -> with('Success','Edit successfully');

    }
    
    public function delete ($id){
        DB::table('product')->where('id', $id) -> delete();
        return redirect()-> route('admin.product.index') -> with('Success','Delete successfully');
    }

    public function search(Request $request ){
        $search = $request  -> search;
        $product = DB::table('product') -> where('name','like', '%'.$search.'%') -> simplePaginate(9);
        $user = Auth::user();
        $brand = DB::table('brand') -> get();
        $category = DB::table('category') -> get();
        return view('admin.product.index', ['categories' => $category,'brands' => $brand,'products' => $product,'user' => $user]);
    }
}
