<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function edit(Request $request)
    {
        $user = $request->user();
        
        return view('profile.edit', compact('user'));
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

    private function generateInvitationUrl()
    {
        $cachedUrl = Cache::get('profile_link_' . auth()->id());

        if (!$cachedUrl) {
            $url = URL::temporarySignedRoute(
                'profile.edit',
                now()->addHour(),
                ['profile_user' => auth()->id()]
            );

            Cache::put('profile_link_' . auth()->id(), $url, now()->addHour());
        } else {
            $url = $cachedUrl;
        }

        return $url;
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
