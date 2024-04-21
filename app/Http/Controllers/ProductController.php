<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Stock;
use App\Models\SoftDrink;
use App\Models\Hamburger;

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

    public function storeStock(Request $request){
        $validator = $request->validate([
            'item' => 'required|string',
            'total' => 'required|numeric'

        ]);

        try {

            Stock::create([
                'item' => $request->input('item'),
                'total' => $request->input('total'),
                'available' => $request->input('total'),
                'item_type' => $request->input('item_type'),
                'date' => $request->input('date')
            ]);

            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function storeBurger(Request $request){
        $validator = $request->validate([
            'burger_name' => 'required|string',
            'burger_descr' => 'required|string',
            'burger_price' => 'required|numeric',
        ]);

        try {

            if($request->hasFile('burger_img')){
                $image = $request->file('burger_img');
                $imagePath = $image->store('images', 'public');

                Hamburger::create([
                    'burger_name' => $request->input('burger_name'),
                    'burger_descr' => $request->input('burger_descr'),
                    'burger_price' => $request->input('burger_price'),
                    'burger_img' => $imagePath
                ]);

                return redirect()->back();

            }

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function storeSoftDrink(Request $request){
        $validator = $request->validate([
            'drink_name' => 'required|string',
            'drink_price' => 'required|numeric',
        ]);

        $stock_id = Stock::where('item', trim($request->input('drink_name')))->first();

        try {
            SoftDrink::create([
                'stock_id' => $stock_id->id,
                'drink_name' => $request->input('drink_name'),
                'drink_descr' => $request->input('drink_descr'),
                'drink_price' => $request->input('drink_price')
            ]);

            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
