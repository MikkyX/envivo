@extends('master')
@section('meta-title','@'.$user->screen_name.' - Envivo Social')
@section('body-id','form')
@section('header')
    <div class="col-xs-6">
        <a href="/"><img src="/images/logo.svg" title="envivo social" /></a>
    </div>
    <div class="col-xs-6 text-right">
        <a class="btn btn-danger" href="/logout">
            <i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log Out
        </a>
    </div>
@endsection
@section('content')
        <form action="/tweet" enctype="multipart/form-data" id="tweetForm" method="post" v-on:submit.prevent="postTweet">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" data-intro="Welcome to Envivo Social! Would you like a quick overview?" data-step="1" id="theForm">
                <div class="row">
                    <div class="col-xs-9 col-sm-6">
                        <h2><img src="{{ $user->profile_image_url_https }}" /> {{ '@'.$user->screen_name }}</h2>
                    </div>
                    <div class="col-xs-3 col-sm-6 text-right">
                        <h2 class="charCount" data-intro="This shows your remaining character count" data-step="2" v-bind:class="lengthTest">@{{ remaining_characters }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="input-group" data-intro="Anything entered in here will appear at the beginning of every tweet you publish..." data-step="3">
                            <div class="input-group-addon">Prefix:</div>
                            <input class="form-control" id="prefix_hashtags" name="prefix_hashtags" type="text" v-model="prefixHashtags" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="input-group" data-intro="...and anything entered in here will appear at the END of every tweet you publish" data-step="4">
                            <div class="input-group-addon">Suffix:</div>
                            <input class="form-control" id="suffix_hashtags" name="suffix_hashtags" type="text" v-model="suffixHashtags" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="sr-only" for="tweet">Tweet text:</label>
                        <textarea class="form-control" data-intro="This is your main tweet body, where you type your tweet contents" data-step="5" id="tweet" name="tweet" placeholder="Tweet body..." rows="4" v-model="tweet" v-on:keydown.enter.prevent.stop="enterPostTweet"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="visible-md-block visible-lg-block">
                            <h6>Options:</h6>
                            <span class="help-block"><label><input id="press_enter" name="press_enter" type="checkbox" v-model="pressEnterToSend" /> Press Enter to Send</label></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h6>Upload Image:</h6>
                        <input  data-intro="If you need to attach an image to your tweet, you can do so here" data-step="6" id="image" name="image" type="file" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p><input class="btn btn-block btn-success" data-intro="Finally, this button makes the magic happen. Happy tweeting!" data-step="7" id="send_tweet" type="submit" value="Send" v-bind:disabled="remaining_characters >= 138 || remaining_characters < 0 || tweetInProgess" /></p>
                    </div>
                </div>
            </div>
        </div>
        </form>
@endsection
@section('footer')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Envivo Footer Ad -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6161058486796813"
                         data-ad-slot="1484127481"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 footerLinks">
                    <a href="/about">About</a>
                    <a href="/privacy">Privacy</a>
                    <a href="/terms">Terms</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
@section('notifications')
    <div id="notifications">
        <div class="alert @{{ notification.alertClass }}" transition="fade" v-for="notification in notifications">
            <strong>@{{ notification.title }}</strong><br />
            <small>@{{ notification.content }}</small>
        </div>
    </div>
@endsection
@push('scripts')
    @if($onboard)
    <script src="/js/intro.min.js"></script>
    @endif
    <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
    <script>
        @if($onboard)
        // Start the intro
        introJs().start();
        @endif

        // All vue from here
        Vue.component('notification',{
            props: ['alertClass','message'],
            template: '<div class="alert @{{ alertClass }}">@{{ message }}</div>'
        });

        new Vue({
            el: 'body',
            data: {
                notifications: [],
                pressEnterToSend: true,
                prefixHashtags: '',
                suffixHashtags: '',
                tweet: '',
                tweetInProgress: false,
                tweetMaxLength: 140
            },
            computed: {
                lengthTest: function() {
                    return {
                        'length-ok': this.remaining_characters > 0,
                        'over-limit': this.remaining_characters <= 0
                    };
                },
                remaining_characters: function() {
                    // Start at maxLength
                    remaining = this.tweetMaxLength;

                    // Remove prefix (plus space)
                    if (this.prefixHashtags.length) {
                        remaining -= this.prefixHashtags.length + 1;
                    }

                    // Remove suffix (plus space)
                    if (this.suffixHashtags.length) {
                        remaining -= this.suffixHashtags.length + 1;
                    }

                    // Remove tweet
                    remaining -= this.tweet.length;

                    // Return
                    return remaining;
                }
            },
            methods: {
                enterPostTweet: function() {
                    if (this.pressEnterToSend) {
                        this.postTweet();
                    }
                },
                postTweet: function() {
                    formData = new FormData(document.getElementById('tweetForm'));
                    this.tweetInProgress = true;

                    this.$http.post('/tweet',formData).then((response) => {
                        if (response.body == 'OK') {
                            // Tweet sent successfully!
                            // Add a notification
                            this.notifications.push({
                                'alertClass': 'alert-success',
                                'title': 'Tweet sent successfully!',
                                'content': this.tweet.substring(0,30)+'...'
                            });

                            // Reset the form for the next one
                            this.tweet = '';
                            document.getElementById('image').value = '';
                            document.getElementById('tweet').focus();
                        } else {
                            // Add an error notification
                            this.notifications.push({
                                'alertClass': 'alert-danger',
                                'title': 'Error sending tweet',
                                'content': response.body
                            });
                        }

                        // Either way, something should've been pushed so we
                        // need to set a timer to remove it
                        // Source: http://stackoverflow.com/questions/38399050/vue-equivalent-of-settimeout
                        var self = this;
                        setTimeout(function() {
                            self.notifications.shift();
                        },5000);

                        // Release the submit button
                        this.tweetInProgress = false;
                    });
                }
            }
        });
    </script>
    <script src="/js/iii.js"></script>
@endpush