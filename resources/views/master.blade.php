<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2>Twitter App</h2>
                    <p>v{{ config('release.version') }} - Made with love, Laravel and Vue.js by <a href="https://www.mikkyx.co.uk">Michael Price</a></p>
                    <p>
                        <a href="https://github.com/mikkyx/tweetitlive" title="Source code on GitHub"><i class="fa fa-github fa-2x"></i></a>&nbsp;&nbsp;
                        <a href="https://twitter.com/mikkyx" title="Tweet me!"><i class="fa fa-twitter fa-2x"></i></a>
                    </p>
                    <p>
                        <a href="/about">About</a> | <a href="/privacy">Privacy Policy</a> | <a href="/terms">Terms</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div id="notifications">
        <div class="alert @{{ notification.alertClass }}" transition="fade" v-for="notification in notifications">
            <strong>@{{ notification.title }}</strong><br />
            <small>@{{ notification.content }}</small>
        </div>
    </div>
    @stack('scripts')
</body>
</html>