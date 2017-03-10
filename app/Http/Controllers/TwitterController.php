<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use File;
use Redirect;
use Session;
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
        // Retrieve the user
        $user = Twitter::getCredentials();

        return view('form',[
            'user' => $user
        ]);
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

        // Build the tweet text and add that on
        $tweetText = trim($tweetForm->tweet).' '.trim($tweetForm->suffix_hashtags);
        $tweet['status'] = $tweetText;

        // Check for image
        if ($tweetForm->has('image') && $tweetForm->file('image')->isValid()) {
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
            return 'OK';
        } catch (\Exception $e) {
            return 'ERR:'.$e->getMessage();
        }
    }

    public function logout()
    {
        Session::forget('access_token');
        return Redirect::to('/')->with('goodFlash','You have been logged out.');
    }
}
