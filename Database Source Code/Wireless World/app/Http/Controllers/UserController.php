<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class UserController extends Controller
{
    public function getLogin (){
        if (Auth::check()){
            return redirect() -> route('admin');
        }
        return view('user.login');
    }

    public function postLogin( Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials) ) {
            $request->session()->regenerate();
            if(Auth::user()-> level == 1){
                return redirect()->route('admin');
            } else {
                return redirect()->route('index');
            } 
        }  else {
            return redirect() -> route('getLogin') -> with('error','Member does not exist');
        }
 
    }

    public function logout(){
        Auth::logout();

        return redirect() -> route('getLogin');
    }

    public function getRegister(){
        return view('user.register');
    }

    public function postRegister( Request $request){
        $data = $request -> except('_token');
        $data['password'] = bcrypt($request -> password);
        $data["level"] = 2;
        $data['created_at'] = new \DateTime();
        $imageName = time(). '.' .$request->avatar->extension();
        $request->avatar-> move(public_path('images'),$imageName);
        $data['avatar'] = $imageName;
        DB::table('member') -> insert($data);
        return redirect() -> route('getLogin') -> with('success','Register Successfully');
    }

    public function getPassword (){
        return view('user.password');
    }

   public function postPassword (Request $request){
        $member = DB::table('member') -> where('email',$request -> email) -> first();
        $mail = $request -> email;
        $name = $member -> username;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = bcrypt($randomString);
        DB::table('member')-> where ('id','=',$member -> id) -> update(['password' => $password]);
        Mail::send('email.password', compact('name','randomString') ,function ($email) use ($mail){
            $email -> subject('Forgot Password');
            $email -> to($mail);
        });
        return redirect() -> route('getLogin') -> with('success','Please check your email!');
   }
}
