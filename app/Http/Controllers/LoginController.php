<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Member;
use App\Product;
use App\Loan;
use Session;

class LoginController extends Controller
{
    public function index(){
        $users = Auth::user();
        $userCount = User::all();
        $members = Member::all();
        $products = Product::all();
        $loans = Loan::all();
        return view('frontend.index', ['users' => $users, 'userCount' => $userCount, 'members' => $members, 'products' => $products, 'loans' => $loans]);
    }
    
    public function signin(){
        return view('users.signin');
    }
    
    public function postSignin(Request $request){
          $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6',
        ]);
   
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->route('dashboard');
                
        }
        Session::flash('error', 'Your username/password combination was incorrect');
        return redirect()->back();
        
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
