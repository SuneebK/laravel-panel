<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{   
    // User login 
    public function index()
    {
        return view('auth.login');
    }


    // user login data confirm with fileds validation match or not
    public function postLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }


    // user registration
    public function registration()
    {
        return view('auth.registration');
    }

    
    // user registeration data fileds validation
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }


    // user registeration data store
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    // login or registeration after dashboard
    public function dashboard()
    {
        if(Auth::check()){
            return view('pages.dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    // logout 
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    


}
