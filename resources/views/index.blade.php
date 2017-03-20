@extends('master')
@section('meta-title','Tweet live from your conference, meeting or event, quickly and easily - This is Envivo Social')
@section('body-id','homepage')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
        <div class="row">
            <div class="col-xs-12 text-center" id="homepageContent">
                <h1>Social. Sped Up.</h1>
                <p>Envivo Social makes it fast and easy to share live updates from your conference, meeting or event with your followers.</p>
                <p>If you've got something to share, what are you waiting for?</p>
                <p>
                    <a class="btn btn-lg btn-info" href="/twitter/login">
                        <i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign in with Twitter
                    </a>
                </p>
            </div>
        </div>
@endsection
@section('footer')
    @include('partials.default-footer')
@endsection