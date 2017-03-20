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
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="/css/til.css" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/97d3813f05.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
    <title>@yield('meta-title')</title>
    <meta name="description" content="The best way to share live updates from any event" />
</head>
<body id="@yield('body-id','body')">
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-93742701-1', 'auto');
    ga('send', 'pageview');
    </script>
    <header>
        <div class="container">
            <div class="row">
                @yield('header')
            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
    @yield('notifications')
    @stack('scripts')
</body>
</html>