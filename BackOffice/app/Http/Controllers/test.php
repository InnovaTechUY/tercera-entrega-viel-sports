<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class test extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
       /* $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ]);*/


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return "string";
        }
        return "no string";
    }
}
