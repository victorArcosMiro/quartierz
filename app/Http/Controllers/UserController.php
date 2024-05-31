<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function ban(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->banned = true;
        $user->save();
        return redirect()->route('user')->with('success', 'User banned successfully');
    }

    public function userUnban($id)
    {
        $user = User::findOrFail($id);
        $user->banned = false;
        $user->save();
        return redirect()->route('user')->with('success', 'User ban revoked successfully');
    }
}
