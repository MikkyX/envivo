<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="/css/til.css" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/97d3813f05.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
    <title>@yield('meta-title')</title>
    <meta name="description" content="The best way to share live updates from any event" />
</head>
<body id="@yield('body-id','body')">
    <header>
        <div class="container">
            <div class="row">
                @yield('header')
            </div>
        </div>
    </header>
    <div class="container">
        @if (Session::has('goodFlash'))
        @endif
        @yield('content')
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p>v{{ config('release.version') }} - Made with love, Laravel and Vue.js by <a href="https://www.mikkyx.co.uk">Michael Price</a></p>
                    <p>
                        <a href="https://github.com/mikkyx/tweetitlive" title="Source code on GitHub"><i class="fa fa-github fa-2x"></i></a>&nbsp;&nbsp;
                        <a href="https://twitter.com/mikkyx" title="Tweet me!"><i class="fa fa-twitter fa-2x"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @yield('notifications')
    @stack('scripts')
</body>
</html>