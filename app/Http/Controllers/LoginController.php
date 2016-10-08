<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function twitterLogin()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            dd($user);
        } catch (\Exception $e) {
            die('Did you deny the app access?');
        }
    }
}
