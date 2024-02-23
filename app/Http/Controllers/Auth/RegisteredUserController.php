<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'image' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'imgs/';
            $file->move($path, $file_name);
            $validated['image'] = $path . '/' . $file_name;
        }
        // dd($request->hasFile('image'));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
