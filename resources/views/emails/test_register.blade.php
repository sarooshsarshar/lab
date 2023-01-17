<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <div>
        <h2>MIR LABORATARY GUJRAT</h2>
        <p>Your Registration Number and Pin Code is given below. you can see your report on our website.</p>
        <h3>Thanks for Using our Services!</h3>
        Registration ID: {{ $data["id"] }}
        PIN: {{ $data["pin"] }}
    </div>
</body>
</html>