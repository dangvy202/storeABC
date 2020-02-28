<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function get_insert_product(){
        return view('admin.insert_pro');
    }
    
    public function insert_product(Request $r){
        $inputs = $r->all();

        $rules = [
            'product_name' => 'required|min:4|max:255',
            'product_price' => 'required|numeric|min:0|max:1000000000',
            'product_code' => 'required|min:4|max:255',
            'img1' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'img2' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];

        $message = [
            'product_name.required' => '(*) Không được để trống',
            'product_name.min' => '(*) Lớn hơn 4 ký tự',
            'product_name.max' => '(*) Không quá 255 ký tự',
            'product_price.required' => '(*) Không được để trống',
            'product_price.numeric' => '(*) Không phải là số',
            'product_price.min' => '(*) Lớn hơn 4 ký tự',
            'product_price.max' => '(*) Không quá 10 ký tự',
            'product_code.required' => '(*) Không được để trống',
            'product_code.min' => '(*) Lớn hơn 4 ký tự',
            'product_code.max' => '(*) Không quá 255 ký tự',
            'img1.required' => '(*) Không được để trống',
            'img1.image' => '(*) Không phải là file ảnh',
            'img1.mimes' => '(*) .jpge, .jpg, .png, .gif',
            'img1.max' => '(*) File tối đa 2M',
            'img2.required' => '(*) Không được để trống',
            'img2.image' => '(*) Không phải là file ảnh',
            'img2.mimes' => '(*) .jpge, .jpg, .png, .gif',
            'img2.max' => '(*) File tối đa 2M'
        ];

        $validator = Validator::make($inputs, $rules, $message);

        if($validator->fails()){
            return redirect('admin/insert-product')->withErrors($validator)->withInput();
        } else{
            $image1 = $r->file('img1');
            $image2 = $r->file('img2');

            $temp_img1 = '1_'.time().'.'.$image1->getClientOriginalExtension();
            $temp_img2 = '2_'.time().'.'.$image2->getClientOriginalExtension();

            $path = public_path('\images\product');

            $image1->move($path,  $temp_img1);
            $image2->move($path,  $temp_img2);

            $data = new Product;
            $data->product_name = $r->product_name;
            $data->product_price = $r->product_price;
            $data->product_code = $r->product_code;
            $data->product_img1 = $temp_img1;
            $data->product_img2 = $temp_img2;
            $data->save();
            
            return redirect('admin/product');
        }
    }

    public function get_product(){
        $data = Product::orderBy('id', 'adsc')->get();
        return view('admin.product', compact('data'));
    }

    public function del_product($id){
        $data = Product::destroy($id);
        return redirect('admin/product');
    }

    public function edit_product($id){
        $data = Product::find($id);
        return view('admin.edit_pro', compact('data'));
    }

    public function upadte_product(Request $r, $id){
        
        $inputs = $r->all();

        $rules = [
            'product_name' => 'required|min:4|max:255',
            'product_price' => 'required|numeric|min:0|max:1000000000',
            'product_code' => 'required|min:4|max:255',
            'img1' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'img2' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];

        $message = [
            'product_name.required' => '(*) Không được để trống',
            'product_name.min' => '(*) Lớn hơn 4 ký tự',
            'product_name.max' => '(*) Không quá 255 ký tự',
            'product_price.required' => '(*) Không được để trống',
            'product_price.numeric' => '(*) Không phải là số',
            'product_price.min' => '(*) Lớn hơn 4 ký tự',
            'product_price.max' => '(*) Không quá 10 ký tự',
            'product_code.required' => '(*) Không được để trống',
            'product_code.min' => '(*) Lớn hơn 4 ký tự',
            'product_code.max' => '(*) Không quá 255 ký tự',
            'img1.required' => '(*) Không được để trống',
            'img1.image' => '(*) Không phải là file ảnh',
            'img1.mimes' => '(*) .jpge, .jpg, .png, .gif',
            'img1.max' => '(*) File tối đa 2M',
            'img2.required' => '(*) Không được để trống',
            'img2.image' => '(*) Không phải là file ảnh',
            'img2.mimes' => '(*) .jpge, .jpg, .png, .gif',
            'img2.max' => '(*) File tối đa 2M'
        ];

        $validator = Validator::make($inputs, $rules, $message);

        if($validator->fails()){
            return redirect('admin/edit-product/'.$id)->withErrors($validator)->withInput();
        } else{
            $image1 = $r->file('img1');
            $image2 = $r->file('img2');

            $temp_img1 = '1_'.time().'.'.$image1->getClientOriginalExtension();
            $temp_img2 = '2_'.time().'.'.$image2->getClientOriginalExtension();

            $path = public_path('\images\product');

            $image1->move($path,  $temp_img1);
            $image2->move($path,  $temp_img2);

            $data = Product::find($id);
            $data->product_name = $r->product_name;
            $data->product_price = $r->product_price;
            $data->product_code = $r->product_code;
            $data->product_img1 = $temp_img1;
            $data->product_img2 = $temp_img2;
            $data->save();
            
            return redirect('admin/product');
            
        }
    }

    public function get_home_product_limit(){
        $data = Product::orderBy('id', 'desc')->take(6)->get();
        return view('home', compact('data'));
    }

    public function get_pro_product_limit(){
        $data = Product::orderBy('id', 'desc')->take(9)->get();
        return view('product', compact('data'));
    }

    public function get_product_detail($id){
        $data = Product::find($id);
        return view('product_detail', compact('data'));
    }
}
