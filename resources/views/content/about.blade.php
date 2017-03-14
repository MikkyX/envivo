@extends('master')
@section('meta-title','About - Envivo Social')
@section('body-id','content')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <h1 class="page-header">About</h1>

            <p>Envivo Social is the fastest and best way to provide updates to your social networks from conferences, meetings and other events requiring up to the minute updates as fast as you can get them out.</p>
            <p>By allowing you to pre-populate hashtag prefixes and suffixes, Envivo lets you concentrate on getting the info out to your followers - fast. As simple as hitting the Enter key and then getting straight to the next update. No waiting, no pasting.</p>

            <h2>Support</h2>
            <p>If you are having trouble using Envivo Social, please <a href="https://github.com/MikkyX/envivo/issues">open an issue</a>. Try to be as explicit as possible about what was happening when the issue occurred, and provide as much detail as possible about your browser / operating system combination.</p>

            <h2>Contributing</h2>
            <p>Thank you for considering contributing to Envivo! If you would like to contribute, please <a href="https://github.com/MikkyX/envivo/pulls">create a pull request</a> and I will review it as soon as I can.</p>

            <p>Please don't get offended if your request is declined or I don't get to it for a while!</p>

            <h2>Security Vulnerabilities</h2>
            <p>If you discover a security vulnerability, please send an e-mail to Michael Price at mikkyx@gmail.com. I will review your report and act upon it as soon as I am able, and thank you in advance for reporting it to me.</p>

            <h2>Credits</h2>
            <ul>
                <li>Written and maintained by <a href="https://twitter.com/mikkyx">Michael Price</a></li>
                <li>Built with <a href="https://laravel.com">Laravel</a> and <a href="https://vuejs.org">vue.js</a></li>
                <li>Deployed with <a href="https://forge.laravel.com/">Forge</a></li>
                <li>Background imagery courtesy of <a href="https://stocksnap.io/">StockSnap</a>, under a CC0 licence.</li>
            </ul>
        </div>
    </div>
@endsection
@section('footer')
    @include('partials.default-footer')
@endsection