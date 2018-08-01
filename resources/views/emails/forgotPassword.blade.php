<!DOCTYPE html>
<html>
<head>
    <title>successfully Registerd with Trans Data</title>
</head>
 
<body>
<h2>Registerd successfully {{$user['first_name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account and set password.
<br/>
<a href="{{url('user/forgotPassword')}}">Verify Email</a>
</body>
 
</html>