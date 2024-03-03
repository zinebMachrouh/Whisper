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
    public function profile(Request $request, $id)
    {
        $user = $request->user();
        $friend = User::find($id);

        // Générer le lien d'invitation et le code QR
        $url = $this->generateInvitationLink();
        $qrCode = $this->generateQRCode($url);

        return view('profile.profile', compact('friend', 'user', 'url', 'qrCode'));
    }

    private function generateInvitationLink()
    {
        $cacheKey = 'profile_link_' . auth()->id();

        return Cache::remember($cacheKey, now()->addHour(), function () {
            return URL::temporarySignedRoute(
                'chatify',
                now()->addHour(),
                ['profile_user' => auth()->id()]
            );
        });
    }

    private function generateQRCode($url)
    {
        $cacheKey = 'profile_qrcode_' . auth()->id();

        return Cache::remember($cacheKey, now()->addHour(), function () use ($url) {
            return QrCode::size(200)->generate($url);
        });
    }

/** /
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

