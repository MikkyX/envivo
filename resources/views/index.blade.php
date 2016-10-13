@extends('master')
@section('meta-title','Tweet It Live - The best app for tweeting from your event')
@section('body-id','homepage')

@section('content')
    <div id="start-here">
        <p>Start here...</p>
        <p>
            <a class="button is-twitter is-large" href="/twitter/login">
                <span class="icon is-medium">
                    <i class="fa fa-twitter"></i>
                </span>
                <span>Sign in with Twitter</span>
            </a>
        </p>
        <p><a href="/about">About</a> | <a href="/privacy">Privacy Policy</a> | <a href="/terms">T&amp;Cs</a></p>
    </div>
@endsection