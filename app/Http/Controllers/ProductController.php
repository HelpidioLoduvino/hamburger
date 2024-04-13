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
}
