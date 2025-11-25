<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the edit profile form
    public function edit()
    {
        return view('profile.edit');
    }

    // Update the user's profile picture
    public function update(Request $request)
    {
        $$request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan validasi [cite: 10]
        ]);

        $user = Auth::user(); // Menggunakan facade Auth [cite: 10]

        // Delete the old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture); // Menggunakan Storage facade [cite: 11]
        }

        // Store the new profile picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public'); // Simpan file [cite: 12]
        $user->profile_picture = $path;
        $user->save(); // Simpan perubahan di database [cite: 12]

        return redirect()->route('profile.edit')->with('success', 'Profile picture updated successfully!');
    }

    // Show the user's profile
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Delete the user's profile picture
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profile picture deleted successfully!');
    }
}
