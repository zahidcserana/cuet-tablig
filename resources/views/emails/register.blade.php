<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuet-Register</title>
</head>
<body>
    Welcome {{$name}}, Click link below to activate your account.
    <a href="http://cuetian.com/activation/{{$email}}/{{$code}}">Click Here</a>
<br>
<br>
<div>
    Your Login Authentication: <br>
        Username: {{$email}} <br>
        Password: {{$password}}
</div>
</body>
</html>