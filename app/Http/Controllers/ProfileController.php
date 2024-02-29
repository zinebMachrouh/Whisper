<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
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


    //  public function edit(Request $request)
    //  {
    //      $url = $this->generateTemporaryUrl('profile_link_' . auth()->id(), function() {
    //          return URL::temporarySignedRoute(
    //              'profile.edit',
    //              now()->addHour(),
    //              ['profile_user' => auth()->id()]
    //          );
    //      });

    //      $qrCode = Cache::remember('profile_qrcode_' . auth()->id(), now()->addHour(), function () use ($url) {
    //          return QrCode::size(200)->generate($url);
    //      });

    //      return view('profile.edit', [
    //          'user' => $request->user(),
    //          'url' => $url,
    //          'qrCode' => $qrCode,
    //      ]);
    //  }

    //  private function generateTemporaryUrl($cacheKey, $callback)
    //  {
    //      if (Cache::has($cacheKey)) {
    //          return Cache::get($cacheKey);
    //      } else {
    //          $url = $callback();
    //          Cache::put($cacheKey, $url, now()->addHour());
    //          return $url;
    //      }
    //  }
    public function edit(Request $request)
    {
        $url = $this->generateTemporaryUrl('profile_link_' . auth()->id(), now()->addMinutes(15), function() {
            return URL::temporarySignedRoute(
                'profile.edit',
                now()->addHour(),
                ['profile_user' => auth()->id()]
            );
        });

        $qrCode = Cache::remember('profile_qrcode_' . auth()->id(), now()->addMinutes(15), function () use ($url) {
            return QrCode::size(200)->generate($url);
        });

        return view('profile.edit', [
            'user' => $request->user(),
            'url' => $url,
            'qrCode' => $qrCode,
        ]);
    }

    private function generateTemporaryUrl($cacheKey, $expires, $callback)
    {
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        } else {
            $url = $callback();
            Cache::put($cacheKey, $url, $expires);
            return $url;
        }
    }

/** /
     * user profile :
     */

    public function profile(Request $request, $id): view
    {
        $user = $request->user();
        $friend = User::find($id);
        return view('profile.profile', compact('friend', 'user'));
    }

/** /
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
