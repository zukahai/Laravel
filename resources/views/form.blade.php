<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="/form" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo old('name', 'Default')?>">
        <input type="file" name="file" id="file" value="Chọn file">
        <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
        <input type="submit" value="Gửi">
    </form>

    <a href="<?php echo route('pagehome', ['page'=>3])?>">Click to form</a>
</body>
</html>