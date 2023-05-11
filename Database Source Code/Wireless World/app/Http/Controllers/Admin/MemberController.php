<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class MemberController extends Controller
{
    public function index (){
        $result = DB::table('member')  -> simplePaginate(5);
        $user = Auth::user(); 
        return view('admin.member.index', ['members' => $result, 'user' => $user]);
    }
    public function create (){
        $user = Auth::user();
        return view('admin.member.create', ['user' => $user]);
    }
    public function store (StoreRequest $request){
        $data = $request -> except('_token');
        $data['password'] = bcrypt($request -> password);
        $data['created_at'] = new \DateTime();
        $imageName = time(). '.' .$request->avatar->extension();
        $request-> avatar-> move(public_path('images'),$imageName);
        $data['avatar'] = $imageName;
        DB::table('member') -> insert($data);
        return redirect() -> route('admin.member.index') -> with('success','Insert successfully');
    }
    public function edit ($id){
        $user = Auth::user();
        $member = DB::table('member') -> where('id', $id) -> first();
        $edit_myself = null;
        if(Auth::user()-> id == $id){
            $edit_myself = true;
        } else {
            $edit_myself = false;
        }
        if(Auth::user()->id != 1 && ($id == 1 || ($member -> level == 1 && $edit_myself == false) )){
            return redirect() -> route('admin.member.index') -> with('success','Cannot edit');
        }
        return view('admin.member.edit', ['id' => $id, 'member' => $member, 'user' => $user]);
    }
    public function update (UpdateRequest $request, $id){
        $data = $request -> except('password','_token','avatar');
        if(!empty($request->password)){
            $data['password'] = bcrypt($request -> password);
        }
        if (!empty($request-> avatar)){
            $old_avatar = DB::table('member') -> where ('id', $id) -> first ();
            $url_old_avatar = public_path('images/'.$old_avatar -> avatar);
            if(file_exists($url_old_avatar)){
                unlink($url_old_avatar);
            }
            $imageName = time().'.'.$request-> avatar-> extension();
            $request -> avatar -> move(public_path('images'), $imageName);
            $data['avatar'] = $imageName;
        }
        DB::table('member')-> where ('id','=',$id) -> update($data);
        return redirect()-> route('admin.member.index') -> with('success','Edit successfully');
    }
    public function delete ($id){
        $data = DB::table('member') -> where('id',$id) -> first();
        if (($id == 1) || (Auth::user() -> id != 1 && $data -> level == 1)) {
            return redirect() -> route('admin.member.index') -> with('success','Cannot delete');
        }
        DB::table('member')->where('id', $id) -> delete();
        return redirect()-> route('admin.member.index') -> with('success','Delete successfully');
    }
    public function search(Request $request ){
        $search = $request  -> search;
        $member = DB::table('member')   -> where('username','like', '%'.$search.'%') 
                                        -> orWhere('fullname','like', '%'.$search.'%')
                                        -> orWhere('phone','like', '%'.$search.'%')
                                        -> orWhere('email','like', '%'.$search.'%')
                                        -> simplePaginate(9);
        $user = Auth::user();
        return view('admin.member.index', ['members' => $member,'user' => $user]);
    }
}
