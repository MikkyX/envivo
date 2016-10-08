<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

        // Post the tweet
        try {
            return Twitter::postTweet([
                'format' => 'json',
                'status' => $tweetForm->tweet,
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
