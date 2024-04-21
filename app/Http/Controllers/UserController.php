<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Stock;
use App\Models\Hamburger;
use App\Models\SoftDrink;

class UserController extends Controller
{
    public function showProfile(){
        $id = Session::get('id');

        if($id){
            $client = User::find($id);

            if($client){
                return view('client_profile', compact('client'));
            }
        }
    }

    public function showAdminHome(){

        $id = Session::get('id');

        if($id){

            $admin = User::find($id);
            $stock = Stock::all();
            $soft_drinks = Stock::where('item_type', '=', 'Refrigerante')->get();
            $hamburgers = Hamburger::all();
            $soft_drinks = SoftDrink::all();

            if($admin){
                return view('main_admin', compact('admin',
                'stock',
                'soft_drinks',
                'hamburgers',
                'soft_drinks'));
            }
        }

    }

    public function showAttendantHome(){
        $id = Session::get('id');

        if($id){
            $attendant = User::find($id);

            if($attendant){
                return view ('main_attendant', compact('attendant'));
            }
        }
    }

    public function storeClient(Request $request){
        $validor = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
            'type' => 'required|string'
        ]);

        try {

            if($request->input('password') === $request->input('confirm_password')){

                User::create([
                    'name' => $request->input('name'),
                    'surname' => $request->input('surname'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'type' => $request->input('type')
                ]);

                return redirect()->back()->with('msg', 'Conta criada com sucesso');

            } else {
                return redirect()->back()->withInput('errors', 'Palavra-Passe e Confirmar Palavra-passe não coincidem');
            }

        } catch (Exception $e){
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function login (Request $request) {

        $validator = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ], [
            'email.exists' => 'Email or password is incorrect.',
        ]);

        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                session(['id' =>$user->id, 'type' => $user->type]);
                $sessionType = session('type');
                switch($sessionType){
                    case 'cliente':
                        return redirect('/');
                        break;
                    case 'admin':
                        return redirect('/admin');
                        break;
                    case 'atendente':
                        return redirect('/atendente');
                        break;
                    default:
                        return view('/login')->with('error', 'Erro ao Fazer Login');
                        break;
                }
            } else {
                return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
            }
        }catch (Exception $e){
            return redirect()->back()->withErrors($validator)->withInput();
        }

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
