<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.1/css/bulma.min.css" rel="stylesheet" type="text/css" />
    <title>Tweet It Live - Compose</title>
    @if (env('APP_ENV') == 'local')
    <script src="/js/vue.js"></script>
    @else

    @endif
    <style type="text/css">
        h4.title {
            margin-bottom: 2px;
        }

        .length-ok {
            color: #00cc00;
        }

        .over-limit {
            color: #cc0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php print_r(session('twitterUser')) ?>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="columns">
                <div class="column is-narrow">
                    <figure class="image is-48x48">
                        <img src="{{ str_replace('http','https',session('twitterUser')->avatar) }}"
                    </figure>
                </div>
                <div class="column">
                    <form action="/post" enctype="multipart/form-data" method="post">
                        {!! csrf_field() !!}
                        <h4 class="title is-4" style="margin-bottom: 5px">{{ '@'.session('twitterUser')->nickname }}: <span class="is-pulled-right" v-bind:class="lengthTest">@{{ remaining_characters }}</span></h4>
                        <textarea class="textarea" cols="40" id="tweet" name="tweet" rows="4" v-model="tweet"></textarea><br />
                        Suffix tweets with:
                        <input class="input" id="suffix_hashtags" name="suffix_hashtags" type="text" v-model="suffix_hashtags" /><br />
                        Image:<br />
                        <input id="image" name="image" type="file" /><br />
                        <input class="button is-primary is-pulled-right" id="send_tweet" type="submit" v-bind:disabled="remaining_characters < 0" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: 'body',
            data: {
                tweet: '',
                suffix_hashtags: '',
                tweet_max_length: 140
            },
            computed: {
                lengthTest: function() {
                    return {
                        'length-ok': this.remaining_characters > 0,
                        'over-limit': this.remaining_characters <= 0
                    };
                },
                remaining_characters: function() {
                    // Return allowed length, minus length of tweet, length of suffix, and 1 for space
                    return this.tweet_max_length - this.tweet.length - this.suffix_hashtags.length - 1
                }
            }
        });
    </script>
</body>
</html>