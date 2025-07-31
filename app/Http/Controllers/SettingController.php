<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SettingController extends Controller
{
    public function location()
    {
        $schoolName = config('app.school_name', 'SMK Example');
        $schoolAddress = config('app.school_address', 'Jl. Contoh No. 123');

        return view('settings.location', compact('schoolName', 'schoolAddress'));
    }

    public function updateLocation(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string',
        ]);

        config(['app.school_name' => $request->school_name]);
        config(['app.school_address' => $request->school_address]);

        return redirect()->route('settings.location')->with('success', 'School information updated successfully.');
    }

    public function users()
    {
        $users = User::where('role', '!=', 'user')->paginate(10);
        return view('settings.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:superadmin,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('settings.users')->with('success', 'User created successfully.');
    }

    public function destroyUser(User $user)
    {
        if ($user->role === 'superadmin' && User::where('role', 'superadmin')->count() <= 1) {
            return redirect()->route('settings.users')->with('error', 'Cannot delete the last superadmin.');
        }

        $user->delete();
        return redirect()->route('settings.users')->with('success', 'User deleted successfully.');
    }
}
