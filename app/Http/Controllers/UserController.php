<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    //
    public function create(Request $request)
    {
        $req = $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'user',
        ]);

        // with message?
        return redirect()->route('register.show')->with('message', 'User created successfully!');
    }
    public function createAdmin(Request $request)
    {
        $req = $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'admin',
        ]);

        // with message?
        return response()->json(['message' => 'User created successfully!'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);



        if (Auth::attempt($credentials)) {
            $id = Auth::user();
            session(['id_users' => $id->getAuthIdentifier()]);

            if(Auth::user()->role['role'] == 'admin'){
                return redirect()->intended('dashboard/users/'.$id->getAuthIdentifier());
            }
            return redirect()->intended('dashboard/akun/' . $id->getAuthIdentifier());
        }

        return back()->with('error', 'Username atau password salah.');
    }


    public function dashboard()
    {
        return view('users.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
