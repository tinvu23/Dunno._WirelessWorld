<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use Illuminate\Http\Request;
class BrandController extends Controller
{
    public function index (){
        $result = DB::table('brand') -> simplePaginate(7);
        $user = Auth::user();
        return view('admin.brand.index', ['brands' => $result, 'user' => $user]);
    }
    public function create (){
        $user = Auth::user();
        return view('admin.brand.create', ['user' => $user]);
    }
    public function store (StoreRequest $request){      
        $data = $request -> except('_token') ;
        $data['created_at'] = new \DateTime();
        $logo = time(). '.' .$request->logo->extension();
        $request-> logo-> move(public_path('images'),$logo);
        $data['logo'] = $logo;
        $banner = time(). '.' .$request->banner->extension();
        $request-> banner-> move(public_path('images'),$banner);
        $data['banner'] = $banner;
        DB::table('brand') -> insert($data);
        return redirect() -> route('admin.brand.index') -> with('success','Insert successfully');
    }
    public function edit ($id){
        $brand = DB::table('brand') -> where('id',$id) ->first() ;
        $user = Auth::user();
        return view('admin.brand.edit', ['brand' => $brand, 'user' => $user,'id' => $id]);
    }
    public function update (UpdateRequest $request, $id){
        $data = $request -> except('_token');
        if (!empty($request-> logo)){
            $old_logo = DB::table('brand') -> where ('id', $id) -> first ();
            $url_old_logo = public_path('images/'.$old_logo -> logo);
            if(file_exists($url_old_logo)){
                unlink($url_old_logo);
            }
            $logo = time().'.'.$request-> logo-> extension();
            $request -> logo -> move(public_path('images'), $logo);
            $data['logo'] = $logo;
        }
        if (!empty($request-> banner)){
            $old_banner = DB::table('brand') -> where ('id', $id) -> first ();
            $url_old_banner = public_path('images/'.$old_banner -> banner);
            if(file_exists($url_old_banner)){
                unlink($url_old_banner);
            }
            $banner = time().'.'.$request-> banner-> extension();
            $request -> banner -> move(public_path('images'), $banner);
            $data['banner'] = $banner;
        }
        DB::table('brand') -> where('id',$id) -> update($data);
        return redirect()-> route('admin.brand.index') -> with('success','Edit successfully');
    } 
    public function delete ($id){
        DB::table('brand') -> where('id',$id) -> delete();
        return redirect()-> route('admin.brand.index') -> with('success','Delete successfully');
    }
    public function search(Request $request ){
        $search = $request  -> search;
        $brand = DB::table('brand') -> where('name','like', '%'.$search.'%') -> simplePaginate(9);
        $user = Auth::user();
        return view('admin.brand.index', ['brands' => $brand,'user' => $user]);
    }
}
