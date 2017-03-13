@extends('master')
@section('meta-title','Tweet It Live - The best app for tweeting from your event')
@section('body-id','homepage')
@section('header')
    <div class="col-xs-12 col-md-6">
    </div>
    <div class="col-xs-12 col-md-6 headerLinks text-center">
        <a href="/about">About</a>
        <a href="/privacy">Privacy</a>
        <a href="/terms">Terms</a>
        <a class="btn btn-info hidden-xs" href="/twitter/login">
            <i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign in with Twitter
        </a>
    </div>
@endsection
@section('content')
        <div class="row">
            <div class="col-xs-12 text-center">
                <p>Start here...</p>
                <p>
                    <a class="btn btn-lg btn-info" href="/twitter/login">
                        <i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign in with Twitter
                    </a>
                </p>
            </div>
        </div>
@endsection