<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
  
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

   
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

     public function updatePhoto(Request $request): JsonResponse
    {
        // 1. Validate the file
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $user = $request->user();

        // 2. Find or create the ContactInfo record for the user
        $contactInfo = $user->contactInfo()->firstOrCreate(
            ['user_id' => $user->id]
        );

        // 3. Delete the old photo if it exists
        if ($contactInfo->photo_path) {
            Storage::disk('public')->delete($contactInfo->photo_path);
        }

        // 4. Store the new photo and get its path
        $path = $request->file('photo')->store('photos', 'public');

        // 5. Save the new path to the database
        $contactInfo->update(['photo_path' => $path]);

       // NEW JSON RETURN
return response()->json([
    'message' => 'Photo uploaded successfully!',
    'photo_path' => $path 
]);
    }
}
