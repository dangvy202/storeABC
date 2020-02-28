<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;

class ContactController extends Controller
{
    public function send_mail(Request $r){
        $inputs = $r->all();

        $rules = [
            'fullname' => 'required|max:55',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(01[2689]|09)[0-9]{8}$/'],
            'desc' => 'required|min:4'
        ];

        $message = [
            'fullname.required' => '(*) Không được để trống',
            'fullname.max' => '(*) Không quá 55 ký tự',
            'email.required' => '(*) Không được để trống',
            'email.email' => '(*) Nhập đúng Email',
            'phone.required' => '(*) Không được để trống',
            'phone.regex' => '(*) Nhập đúng số điện thoại',
            'desc.required' => '(*) Không được để trống',
            'desc.min' => '(*) Không nhỏ hơn 4 ký tự'
        ];

        $validator = Validator::make($inputs, $rules, $message);

        if($validator->fails()){
            return redirect('contact')->withErrors($validator)->withInput();
        } else{
            $data = ['fullname'=>$r->fullname, 'email'=>$r->email, 'phone'=>$r->phone, 'content'=>$r->desc];
            Mail::send('tempmail', $data, function($message) use ($data){
                $message->from('congtre0908@gmail.com', 'Naturale');
                $message->to($data['email'], 'User')->subject('Thư cảm ơn!');
            });
            // Thông báo và trở về trang liên hệ
            echo "
                <script>
                    alert('Cảm ơn bạn!');
                    window.location = '".url('/contact')."'
                </script>
            ";
            }
        }
}
