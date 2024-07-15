<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Confirmation</title>
</head>
<body>
	Hello {{ $user->name }},
    <h1>Thanks for signing up to Naysabd</h1> 
    <p>Please click this link to verify your email address and activate your account:</p> 
    <p>
        <a href="www.naysabd.com/register/verify/{{$user->email_token}}">confirm account</a>
    </p> 
    <p>Thank you!</p> <br>
    <p><strong>Regards,</strong></p>
    <p>Naysabd</p>
</body>
</html>