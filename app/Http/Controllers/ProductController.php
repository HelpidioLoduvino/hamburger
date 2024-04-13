<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ProductController extends Controller
{
    public function index(){

        $id = Session::get('id');

        if($id){
            $client = User::find($id);

            if($client){
                return view('home', compact('client'));
            }
        } else {
            return view('home');
        }
    }

    public function showOrder(){

        return view('order');
    }

    public function showCart(){
        return view('cart');
    }

    public function showOrderAdmin(){

        $id = Session::get('id');

        if($id){
            $admin = User::find($id);

            if($admin){
                return view('admin_order', compact('admin'));
            }
        } else {
            return view('admin_order');
        }
    }

    public function showSaleAdmin(){

        $id = Session::get('id');

        if($id){
            $admin = User::find($id);

            if($admin){
                return view('admin_sale', compact('admin'));
            }
        } else {
            return view('admin_sale');
        }
    }

    public function showProductAdmin(){
        $id = Session::get('id');

        if($id){
            $admin = User::find($id);

            if($admin){
                return view('admin_product', compact('admin'));
            }
        } else {
            return view('admin_product');
        }
    }

    public function showStockAdmin(){
        $id = Session::get('id');

        if($id){
            $admin = User::find($id);

            if($admin){
                return view('admin_stock', compact('admin'));
            }
        } else {
            return view('admin_stock');
        }
    }

    public function showClientAdmin(){
        $id = Session::get('id');

        if($id){
            $admin = User::find($id);

            if($admin){
                return view('admin_client', compact('admin'));
            }
        } else {
            return view('admin_client');
        }
    }
}
