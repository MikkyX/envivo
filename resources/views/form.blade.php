@extends('master')
@section('meta-title','@'.session('twitterUser')->nickname.' - Tweet It Live')
@section('body-id','form')
@section('header')
    <div class="col-xs-12 col-md-9"></div>
    <div class="col-xs-4 col-md-1"><i class="fa fa-heart"></i>&nbsp;&nbsp;0</div>
    <div class="col-xs-4 col-md-1"><i class="fa fa-retweet"></i>&nbsp;&nbsp;0</div>
    <div class="col-xs-4 col-md-1"><a class="btn btn-danger" href="/logout">Log Out</a></div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-3"><!-- spacer --></div>
            <div class="col-xs-1 text-right">
                <img src="{{ str_replace('http','https',session('twitterUser')->avatar) }}" />
            </div>
            <div class="col-xs-5">
                <form action="/tweet" method="post" v-on:submit.prevent="postTweet">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-xs-9">
                            {{ '@'.session('twitterUser')->nickname }}
                        </div>
                        <div class="col-xs-3 text-right">
                            <span v-bind:class="lengthTest">@{{ remaining_characters }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group">
                                <div class="input-group-addon">Prefix:</div>
                                <input class="form-control" id="prefix_hashtags" name="prefix_hashtags" type="text" v-model="prefixHashtags" />
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group">
                                <div class="input-group-addon">Suffix:</div>
                                <input class="form-control" id="suffix_hashtags" name="suffix_hashtags" type="text" v-model="suffixHashtags" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="sr-only" for="tweet">Tweet text:</label>
                            <textarea class="form-control" id="tweet" name="tweet" rows="4" v-model="tweet" v-on:keyup.enter.prevent="enterPostTweet"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <span class="help-block"><label><input id="press_enter" name="press_enter" type="checkbox" v-model="pressEnterToSend" /> Press Enter to Send</label></span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <input class="btn btn-success" id="send_tweet" type="submit" v-bind:disabled="remaining_characters >= 139 || remaining_characters < 0" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-3"><!-- spacer --></div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
    <script>
        new Vue({
            el: 'body',
            data: {
                pressEnterToSend: true,
                suffixHashtags: '',
                tweet: '',
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
                    // Return allowed length, minus length of tweet, length of suffix, and 1 for space
                    return this.tweetMaxLength - this.tweet.length - this.suffixHashtags.length - 1
                }
            },
            methods: {
                enterPostTweet: function() {
                    if (this.pressEnterToSend) {
                        this.postTweet();
                    }
                },
                postTweet: function() {
                    this.$http.post('/tweet',{
                        '_token': document.querySelector('input[name=_token]').value,
                        'tweet': document.getElementById('tweet').value,
                        'suffix_hashtags': document.getElementById('suffix_hashtags').value
                    }).then((response) => {
                        if (response.body == 'OK') {
                            // Tweet sent successfully!
                            // Reset the form for the next one
                            this.tweet = '';
                            document.getElementById('tweet').focus();
                        }
                    });
                }
            }
        });
    </script>
@endpush