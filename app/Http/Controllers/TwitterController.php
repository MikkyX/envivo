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

    public function index()
    {
//        $twitterUser = session('twitterUser');
//        print_r($twitterUser->token);
//        //dd(session('twitterUser'));

        return view('form');
    }

    public function postTweet(Request $tweetForm)
    {
        Twitter::reconfig([
            'token'  => session('twitterUser')->token,
            'secret' => session('twitterUser')->tokenSecret,
        ]);

        // Set up the basic Tweet object
        $tweet = [
            'format' => 'json',
        ];

        // Build the tweet text and add that on
        $tweetText = trim($tweetForm->prefix_hashtags.' '. $tweetForm->tweet.' '.$tweetForm->suffix_hashtags);
        $tweet['status'] = $tweetText;

        // Check for image
        if ($tweetForm->file('image')->isValid()) {
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
            return Twitter::postTweet($tweet);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
