<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое задание </title>
</head>
<body>
    <h3>Список всех событий мероприятия </h3>
    @foreach ($events as $event)
        <a href = "/events/{{$event->id}}/places" >Событие {{ $event->id }}</a>
    @endforeach
</body>
</html>
