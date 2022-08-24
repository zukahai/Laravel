<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="/form" method="post">
        <input type="text" name="name" id="name" placeholder="Name">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
        <input type="submit" value="Gửi">
    </form>

    <a href="<?php echo route('pagehome', ['page'=>3])?>">Click to form</a>
</body>
</html>