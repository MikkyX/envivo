/**
 * Created by MikkyX on 09/10/2016.
 */

/**
 * Submit the new tweet form via AJAX
 */
document.getElementById('send_tweet').onclick = function() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST','/post',true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send(
        '_token='+document.getElementsByName('_token')[0].value
        +'&suffix_hashtags='+encodeURIComponent(document.getElementById('suffix_hashtags').value)
        +'&tweet='+document.getElementById('tweet').value
    );

    return false;
}