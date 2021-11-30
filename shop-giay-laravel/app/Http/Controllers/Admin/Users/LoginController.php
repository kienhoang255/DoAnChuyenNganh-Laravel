<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',[
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    // public function store(Request $request){
    //     $this -> validate($request,[
    //         'email' => 'required|email:filter'
    //     ]);
    // }

    public function store(Request $request){
        $this -> validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email'=> $request -> input('email'),
            'password' => $request -> input('password')
            ],$request -> input('remember'))){

            return redirect() -> route('admin');
        }
        session()->flash('error', 'Email & mật khẩu không chính xác!');
        session()->flash('success', 'Thành công!');
        return redirect() -> back();
    }


}
