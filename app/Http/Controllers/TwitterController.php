<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use File;
use Twitter;

class TwitterController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Show the form for sending tweets
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // We need the access token session here
        if (session()->has('access_token')) {
            // Retrieve the user
            $user = Twitter::getCredentials();

            // We also need the copy from the database
            $userFromDb = \App\User::where('twitter_id',$user->id_str)->first();

            return view('form', [
                'onboard' => ($userFromDb->login_count == 1),
                'user'    => $user
            ]);
        }

        return redirect('/')->with('badFlash','Your login has timed out.');
    }

    /**
     * Receive the AJAX request and attempt to send a tweet through the API
     *
     * @param Request $tweetForm
     * @return string
     */
    public function postTweet(Request $tweetForm)
    {
        // Set up the basic Tweet object
        $tweet = [
            'format' => 'json',
        ];

        // Build the tweet text and add prefix and suffix
        $tweetText = trim($tweetForm->tweet);

        if (trim($tweetForm->prefix_hashtags)) {
            $tweetText = trim($tweetForm->prefix_hashtags).' '.$tweetText;
        }

        if (trim($tweetForm->suffix_hashtags)) {
            $tweetText = $tweetText.' '.trim($tweetForm->suffix_hashtags);
        }

        $tweet['status'] = $tweetText;

        // Check for image
        if ($tweetForm->hasFile('image') && $tweetForm->file('image')->isValid()) {
            // Upload to Twitter
            $uploadedImage = Twitter::uploadMedia([
                'media' => File::get($tweetForm->file('image')->path()),
            ]);

            if ($uploadedImage) {
                $tweet['media_ids'] = $uploadedImage->media_id_string;
            }
        }

        // Post the tweet
        try {
            Twitter::postTweet($tweet);

            // Increment tweet count
            \App\User::find(session('user_id'))->increment('tweet_count');

            return 'OK';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();
        return redirect('/')->with('goodFlash','You have been logged out.');
    }
}
