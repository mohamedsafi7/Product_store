<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin',
        ]);

        // Create user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('getProduct'); 


    }

    public function login(Request $request)
{
    // Validation
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to authenticate the user
    if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentication successful
        $user = auth()->user();
        if ($user->role === 'admin') {
            // Redirect admin to admin panel
            return redirect()->route('admin'); // Replace 'admin.panel' with your actual admin panel route name
        } else {
            // Redirect user to getproduct route
            return redirect()->route('getProduct'); // Replace 'getProduct' with your actual route name for user redirection
        }
    } else {
        // Authentication failed
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

public function logoutUser(Request $request)
{
    try {
        // Revoke the current user's token
        $request->user()->tokens()->delete();

        // Unset session variable
        // session()->forget('authenticated');

        // Redirect to the login view after logout
        return Redirect::route('login')->with([
            'status' => true,
            'message' => 'User logged out successfully',
        ]);
    } catch (\Throwable $th) {
        return Redirect::route('login')->with([
            'status' => false,
            'message' => $th->getMessage(),
        ]);
    }
}

}
