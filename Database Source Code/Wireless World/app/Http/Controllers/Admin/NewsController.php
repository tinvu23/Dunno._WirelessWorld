<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index (){
        $new = DB::table('news')  -> orderBy('created_at', 'desc') -> simplePaginate(5);
        $user = Auth::user();
        return view('admin.news.index', ['news' => $new,'user' => $user]);
    }

    public function create (){
        $user = Auth::user();
        return view('admin.news.create',['user' => $user]);
    }

    public function store (Request $request){
        $data = $request -> except('_token');
        $data['created_at'] = new \DateTime();
        if($request -> type == 1){
            $data['type'] = 'Top Sellers';
        } else if ($request -> type == 2){
            $data['type'] = 'Best Budgets';
        } else if ($request -> type == 3){
            $data['type'] = 'New Techonogies';
        }
        $imageName = time(). '.' .$request->image->extension();
        $request-> image-> move(public_path('images'),$imageName);
        $data['image'] = $imageName;
        DB::table('news') -> insert($data);
        return redirect() -> route('admin.news.index') -> with('Success','Insert successfully');
    }

    public function edit ($id){
        $user = Auth::user();
        $new = DB::table('news') -> where('id', $id) -> first();
        return view('admin.news.edit', ['id' => $id, 'new' => $new,'user' => $user ]);
    }

    public function update (Request $request, $id){
        $data = $request -> except('_token','image');
        if($request -> type == 1){
            $data['type'] = 'Top Sellers';
        } else if ($request -> type == 2){
            $data['type'] = 'Best Budgets';
        } else if ($request -> type == 3){
            $data['type'] = 'New Techonogies';
        }
        if (!empty($request-> image)){
            $old_img = DB::table('news') -> where ('id', $id) -> first ();
            $url_old_img = public_path('images/'.$old_img -> image);
            if(file_exists($url_old_img)){
                unlink($url_old_img);
            }
            $imageName = time().'.'.$request-> image-> extension();
            $request -> image -> move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        DB::table('news')-> where ('id','=',$id) -> update($data);
        return redirect()-> route('admin.news.index') -> with('Success','Edit successfully');

    }
    
    public function delete ($id){
        DB::table('news')->where('id', $id) -> delete();
        return redirect()-> route('admin.news.index') -> with('Success','Delete successfully');
    }

    public function search(Request $request ){
        $search = $request  -> search;
        $new = DB::table('news') -> where('title','like', '%'.$search.'%') -> simplePaginate(9);
        $user = Auth::user();
        return view('admin.news.index', ['news' => $new,'user' => $user]);
    }
}
