<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index (){
        $result = DB::table('category') -> get();
        $user = Auth::user();
        return view('admin.category.index', ['category' => $result, 'user' => $user]);
    }

    public function create (){
        $parent_category = DB::table('category') -> get();
        $user = Auth::user();
        return view('admin.category.create', ['parent_category' => $parent_category, 'user' => $user]);
    }

    public function store (StoreRequest $request){      
        $data = $request -> except('_token') ;
        $data['created_at'] = new \DateTime();
        DB::table('category') -> insert($data);
        return redirect() -> route('admin.category.index') -> with('success','Insert successfully');
    }

    public function edit ($id){
        $category = DB::table('category') -> where ('id', $id) -> first();
        $user = Auth::user();
        $parent_category = DB::table('category') -> get();
        return view('admin.category.edit', ['id' => $id, 'category' => $category, 'parent_category' => $parent_category, 'user' => $user]);

    }

    public function update (UpdateRequest $request, $id){
        $data = $request -> except('_token');
        DB::table('category')-> where ('id','=',$id) -> update($data);
        return redirect()-> route('admin.category.index') -> with('success','Edit successfully');
    }
    
    public function delete ($id){
        $category_child = DB::table('category') -> where ('parent', $id) -> count();
        if ($category_child > 0){
            return redirect()-> route('admin.category.index') -> with('success','Cannot delete');
        } else {
            DB::table('category')->where('id', $id) -> delete();
            return redirect()-> route('admin.category.index') -> with('success', 'Delete successfully');
        }
    }
}
