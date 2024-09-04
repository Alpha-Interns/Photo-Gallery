<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Ensure only authenticated users can access these methods
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display the user's profile
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('users.show', compact('user'));
    }

    // Show the form for editing the user's profile
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // Update the user's profile
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        // Validate input
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully.');
    }

    // Optional: Delete user account
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        // Optionally, delete related data (galleries, photos, etc.)

        $user->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
