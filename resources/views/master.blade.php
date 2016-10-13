<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.1/css/bulma.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/til.css" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/97d3813f05.js"></script>
    @if (env('APP_ENV') == 'local')
    <script src="/js/vue.js"></script>
    @else
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
    @endif
    <title>@yield('meta-title')</title>
    <meta name="description" content="A web application for tweeting live from your conference or event" />
</head>
<body id="@yield('body-id','body')">
    <header class="level">
        <div class="level-left">

        </div>
        <div class="level-right">
            @if (session('twitterUser'))
            <i class="fa fa-heart"></i>&nbsp;&nbsp;0
            &nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fa fa-retweet"></i>&nbsp;&nbsp;0
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="button is-danger" href="/logout">Log Out</a>
            @else
            Something Else
            @endif
        </div>
    </header>
    @yield('content')
    <footer>
        <h1 class="title is-3">Tweet It Live!</h1>
        <p>v{{ config('release.version') }} - Made with love, Laravel and Vue.js by <a href="https://www.michaelprice.co.uk">Michael Price</a></p>
        <p>
            <a href="https://github.com/MikkyX/tweetitlive" title="Source code on GitHub"><i class="fa fa-github fa-2x"></i></a>&nbsp;&nbsp;
            <a href="https://twitter.com/michaelprice_uk" title="Tweet me!"><i class="fa fa-twitter fa-2x"></i></a>
        </p>
    </footer>
    <div id="notifications">
        <div class="notification is-success">Tweet sent successfully!</div>
        <div class="notification is-danger">I couldn't send your last tweet!<br />[170] Status missing</div>
        <div class="notification is-info">@Official_Darlo retweeted 'Martin Gray signs...'</div>
        <div class="notification is-primary">@Official_Darlo liked 'Martin Gray signs...'</div>
    </div>
    @stack('scripts')
</body>
</html>