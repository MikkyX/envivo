@extends('master')
@section('meta-title','@'.session('twitterUser')->nickname.' - Tweet It Live')
@section('body-id','form')
@section('content')
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="columns">
                <div class="column is-narrow">
                    <figure class="image is-48x48">
                        <img src="{{ str_replace('http','https',session('twitterUser')->avatar) }}"
                    </figure>
                </div>
                <div class="column">
                    <form action="/tweet" method="post" v-on:submit.prevent="postTweet">
                        {!! csrf_field() !!}
                        <h4 class="title is-4" style="margin-bottom: 5px">{{ '@'.session('twitterUser')->nickname }} <span class="is-pulled-right" v-bind:class="lengthTest">@{{ remaining_characters }}</span></h4>
                        <div class="control">
                            <textarea class="textarea" cols="40" id="tweet" name="tweet" rows="4" v-model="tweet" v-on:keyup.enter.prevent="enterPostTweet"></textarea>
                            <span class="help"><input id="press_enter" name="press_enter" type="checkbox" v-model="pressEnterToSend" /> <label for="press_enter">Press Enter to Send</label></span>
                        </div>
                        <div class="control is-horizontal">
                            <div class="control-label">
                                <label class="label">
                                    Suffix:
                                </label>
                            </div>
                            <div class="control">
                                <input class="input" id="suffix_hashtags" name="suffix_hashtags" type="text" v-model="suffixHashtags" />
                            </div>
                        </div>
                        <input class="button is-twitter is-pulled-right" id="send_tweet" type="submit" v-bind:disabled="remaining_characters == 139 || remaining_characters < 0" />
                    </form>
                </div>
            </div>
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