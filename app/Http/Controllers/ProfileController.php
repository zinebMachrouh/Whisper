<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }

    public function profile(Request $request, $id): view
    {
        $user = $request->user();
        $friend = User::find($id);
        return view('profile.profile', compact('friend', 'user'));
    }

    public function showLink(Request $request): View
    {
        $user = $request->user();
        return view('profile.partials.link', compact('user'));
    }

    public function updatePage(Request $request): View{
        $user = $request->user();
        return view('profile.partials.update-profile-information-form', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $validated = $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'imgs/';
            $file->move($path, $file_name);
            $validated['image'] = $path . '/' . $file_name;
        }
        // if(isset($request->identifiant)){
        //     return redirect()->back()->with('messageError', 'that identifaiant already exist');
        // }

        $validated['identifiant_unique'] = $request->username . '#' . $request->identifiant;
    
        $request->user()->save();
        
        return Redirect()->back();
    }

    /**
     * Delete the user's account.
     */
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
}
