<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }


    public function create(Request $request, $id)
    {
        $user = new User();
        $data = $this->validate($request, [
            'password' => 'required',
            'email' => 'required'
        ]);
        $data['id']=$id;
        $user->updateUserDetal($data);
        $user->password =$data['password'];
        $user->email =$data['email'];
        return redirect('/home');

    }

}
