<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        unset($validated['img']); // jangan biarkan fill() menyentuh img

        $request->user()->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('img')) {
            if ($request->user()->img && str_starts_with($request->user()->img, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $request->user()->img));
            }

            $path = $request->file('img')->store('avatars', 'public');
            $request->user()->img = '/storage/' . $path;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 1. Validasi konfirmasi password
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // 2. Hapus foto profil dari storage jika ada
        if ($user->img && str_starts_with($user->img, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $user->img));
        }

        // 3. Logout user
        Auth::logout();

        // 4. Hapus data user dari database
        $user->delete();

        // 5. Invalidate session & regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 6. Redirect ke halaman utama
        return Redirect::to('/');
    }
}