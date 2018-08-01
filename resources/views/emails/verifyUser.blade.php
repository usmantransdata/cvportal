<!DOCTYPE html>
<html>
<head>
    <title>successfully Registerd with Trans Data</title>
</head>
 
<body>
<h2>Registerd successfully {{$data['first_name']}}</h2>
<br/>
Your registered email-id is {{$data['email']}} , Please click on the below link to verify your email account and set password.
<br/>
<a href="{{url('user/verify', $data->verifyUser->token)}}">Verify Email</a>
</body>
 
</html>