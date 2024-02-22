<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class SocialteController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try{
            $google_user=Socialite::driver('google')->user();
            $user=User::where('social_id',$google_user->getId())->first();
            if(!$user){
                $new_user=User::create([
                    'name'=> $google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'social_id'=>$google_user->getId(),
                    'social_type'=> 'google',
                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }else{
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        }catch(\Throwable $th){
            dd("something went wrong! " . $th->getMessage());

        }
    }
    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();

    //         $findUser = User::where('social_id', $user->id)->first();

    //         if ($findUser) {
    //             Auth::login($findUser);
    //             return response()->json($findUser);
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->id,
    //                 'social_type' => 'google',
    //                 'password' => Hash::make('my-google'),
    //             ]);
    //             Auth::login($newUser);
    //             return response()->json($newUser);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'An error occurred while processing the request.'], 500);
    //     }
    // }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user);
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return response()->json($findUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->id,
                'social_type' => 'facebook',
                'password' => Hash::make('my-facebook'),
            ]);
            Auth::login($newUser);
            return response()->json($newUser);
        }
    }
}
