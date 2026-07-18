<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = User::findOrFail(Auth::id());
        return view('user.index', compact('data'));
    }

    public function password(Request $request)
    {
        $validated = $request->validate([
            'password_old' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::findOrFail(Auth::id());

        if (!password_verify($validated['password_old'], $user->password)) {
            return back()->withErrors(['password_old' => 'Password lama tidak benar']);
        }

        $user->password = bcrypt($validated['password']);
        $user->save();

        return back()->with('success', 'Password berhasil diubah');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'clear_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail(Auth::id());
        $logoPath = $user->avatar;
        if ($request->hasFile('avatar')) {
            if ($logoPath && file_exists(storage_path('app/public/' . $logoPath))) {
                unlink(storage_path('app/public/' . $logoPath));
            }
            $logoPath = $request->file('avatar')->store('avatars', 'public');
        }
        $validated['avatar'] = $logoPath;
        $user->update($validated);

        return back()->with('success', 'Data berhasil diubah');
    }
}
