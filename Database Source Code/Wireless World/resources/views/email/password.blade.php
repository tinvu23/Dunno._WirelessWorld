<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .container{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container">
            <h2>New Password </h2>
            <h4>We have received a request to reset your password.</h4>
            <p>Hi {{ $name}},</p>
            <p>This is your new password: {{ $randomString}} </p>
            <p></p>
        </div>
    </div>
</body>
</html>