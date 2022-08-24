<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home user</title>
</head>
<body>
    <a href="{{route('formne')}}" target="_blank" rel="noopener noreferrer">Form</a>
    <h1>Nội dung</h1>
    <h2>{{$abc}}</h2>
    @for($i = 0; $i < 5; $i++)
    <h3>Dòng thứ {{$i}}</h3>
    @endfor

    @foreach($array as $key => $item)
    <h2>Chỉ số {{$key}} - Giá trị: {{$item}}</h2>
    @endforeach
</body>
</html>