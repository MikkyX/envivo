<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweet It Live - Compose</title>
</head>
<body>
    <form action="/post" enctype="multipart/form-data" method="post">
        {!! csrf_field() !!}
        Prefix hashtags:<br />
        <input id="prefix_hashtags" name="prefix_hashtags" type="text" /><br />
        Tweet (max 140 characters):<br />
        <textarea cols="40" id="tweet" name="tweet" rows="4"></textarea><br />
        Suffix hashtags:<br />
        <input id="suffix_hashtags" name="suffix_hashtags" type="text" /><br />
        Image:<br />
        <input id="image" name="image" type="file" /><br />
        <input type="submit" />
    </form>
</body>
</html>