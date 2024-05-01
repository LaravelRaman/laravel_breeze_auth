<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.dashboard',compact('users'));
    }
    public function createUser()
    {
        return view('admin.createuser');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(url('admin/dashboard'));
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}
