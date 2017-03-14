@extends('master')
@section('meta-title','Tweet It Live - The best app for tweeting from your event')
@section('body-id','homepage')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
        <div class="row">
            <div class="col-xs-12 text-center" id="homepageContent">
                <h1>Social. Sped Up.</h1>
                <p>Envivo Social makes it fast and easy to share live updates from your conference, meeting or event with your followers.</p>
                <p>Got something to share? What are you waiting for?</p>
                <p>
                    <a class="btn btn-lg btn-info" href="/twitter/login">
                        <i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign in with Twitter
                    </a>
                </p>
            </div>
        </div>
@endsection
@section('footer')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-9">
                    <p>v{{ config('release.version') }} - Made with love, Laravel and Vue.js by <a href="https://www.mikkyx.co.uk">Michael Price</a></p>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <p>
                        <a href="https://github.com/mikkyx/envivo" title="View the code on GitHub"><i class="fa fa-github fa-2x"></i></a>&nbsp;&nbsp;
                        <a href="https://twitter.com/envivosocial" title="Tweet us"><i class="fa fa-twitter fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endsection