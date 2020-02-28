<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Cookie;

class UserController extends Controller
{
    public function insert_user(Request $r){
        $inputs = $r->all();

        $rules = [
            'username' => 'required|unique:user|max:255|min:4',
            'password' => 'required|min:8',
            'fullname' => 'required|max:55',
            'email'    => 'required|email',
            'address'  => 'required|max:255|min:4',
            'phone'    => ['required', 'regex:/^(01[2689]|09)[0-9]{8}$/']
        ];

        $message = [
                'username.required' => '(*) Không được để trống',
                'username.unique' => '(*) Đã tồn tại',
                'username.max' => '(*) Không quá 255 ký tự',
                'username.regix' => '(*) Không được có các ký tự đặc biệt và khoảng trắng',
                'password.required' => '(*) Không được để trống',
                'password.min' => '(*) 8 ký tự trở lên',
                'fullname.required' => '(*) Không được để trống',
                'fullname.max' => '(*) Không quá 55 ký tự',
                'email.required' => '(*) Không được để trống',
                'email.email' => '(*) Nhập đúng email',
                'address.required' => '(*) Không được để trống',
                'address.min' => '(*) 4 ký tự trở lên',
                'address.max' => '(*) Không quá 255 ký tự',
                'phone.required' => '(*) Không được để trống',
                'phone.regex' => '(*) Nhập đúng số điện thoại'
        ];

        $validator = Validator::make($inputs, $rules, $message);

        if($validator->fails()){
            return redirect('register')->withErrors($validator)->withInput();
        } else{
            $data = new User;
            $data->username = $r->username;
            $data->password = $r->password;
            $data->fullname = $r->fullname;
            $data->email    = $r->email;
            $data->address  = $r->address;
            $data->phone    = $r->phone;
            $data->save();
            $minutes = 30;
            Cookie::queue('username', $username, $minutes);
            return redirect('home');
        }
    }
    
    public function login(Request $r){
        $username = $r->input('username');
        $password = $r->input('password');
        
        $data = User::whereRaw('username = ? and password = ?', [$username, $password])->count();

        if($data == 0){
            return redirect('login')->with('error', '(*) Tên người dùng hoặc mật khẩu không đúng');
        } else{
            $minutes = 30;
            Cookie::queue('username', $username, $minutes);
            return redirect('home');
        }

    }

    public function logout(){
        $cookie = Cookie::forget('username');
        return redirect('home')->withCookie($cookie);
    }
}
