<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Session;
use Twitter;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function twitterLogin(Request $request)
    {
        // Set some variables we'll use in the call
        $signInTwitter = true;
        $forceLogin    = false;

        // Wipe any previous login
        Twitter::reconfig(['token' => '', 'secret' => '']);

        // Request a token from Twitter
        $token = Twitter::getRequestToken(env('TWITTER_CALLBACK'));

        // Did that work?
        if (isset($token['oauth_token_secret'])) {
            // Request the URL
            $authUrl = Twitter::getAuthorizeURL($token, $signInTwitter, $forceLogin);

            // Store some sessions
            Session::put([
                'oauth_state' => 'start',
                'oauth_request_token' => $token['oauth_token'],
                'oauth_request_token_secret' => $token['oauth_token_secret'],
            ]);

            // Redirect to Twitter auth
            return Redirect::to($authUrl);
        }

        return 'Houston...';
    }

    public function twitterCallback(Request $callback)
    {
        // Welcome back...
        if (Session::has('oauth_request_token')) {
            // Create a request token
            $requestToken = [
                'token' => Session::get('oauth_request_token'),
                'secret' => Session::get('oauth_request_token_secret'),
            ];

            // Set the Twitter config to use this token
            Twitter::reconfig($requestToken);

            // Check for an OAuth verifier in the input
            $oauthVerifier = $callback->has('oauth_verifier') ?
                $callback->input('oauth_verifier') :
                false;

            // Reset the access token using this verifier
            $token = Twitter::getAccessToken($oauthVerifier);

            // Was there a problem with the token?
            if (!isset($token['oauth_token_secret'])) {
                // Yes, there was
                return Redirect::to('/')->with('badFlash','We could not log you in.');
            }

            // Get the user
            $credentials = Twitter::getCredentials();
            if (is_object($credentials) && !isset($credentials->error)) {
                // We made it. Let's go to the form
                Session::put('access_token',$token);
                return Redirect::to('/form');
            }

            // If we're still here, something's gone wrong
            return Redirect::to('/')->with('badFlash','We could not log you in.');
        }
    }
}
