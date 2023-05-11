<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $user = Auth::user(); 
        $order = DB::table('order') -> orderBy('created_at', 'desc') -> simplePaginate(10);
        $member = DB::table('member') -> get();
        return view('admin.order.index', ['members' => $member,'orders' => $order, 'user' => $user]);
    }
    public function edit ($id) {
        $user = Auth::user();
        $order = DB::table('order') -> where('id',$id) -> first();
        return view('admin.order.edit', ['id' => $id,'order' => $order, 'user' => $user]);
    }
    public function update (Request $request, $id) {
        $data = $request -> except('_token') ;
        if ( $data['status'] == 1){
            $data['status'] = 'In Process';
        } else if ($data['status'] == 2){
            $data['status'] = 'Shipped';
        } else if ($data['status'] == 3){
            $data['status'] = 'Delivered';
        } else if ($data['status'] == 4){
            $data['status'] = 'Canceled';
        } else if ($data['status'] == 5){
            $data['status'] = 'Delayed';
        }
        DB::table('order')-> where ('id','=',$id) -> update($data);
        return redirect()-> route('admin.order.index') -> with('success','Edit successfully');
    }
    public function search(Request $request ){
        $search = $request  -> search;
        $order = DB::table('order') -> where('detail','like', '%'.$search.'%') 
                                    -> orWhere('status','like', '%'.$search.'%') 
                                    -> simplePaginate(9);
        $user = Auth::user(); 
        $member = DB::table('member') -> get();
        return view('admin.order.index', ['members' => $member,'orders' => $order,'user' => $user]);
    }
}
