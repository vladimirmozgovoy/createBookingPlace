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
    <h3>Забронируйте место </h3>
    Введите свое имя

    <input id = "name" type="text" name="name">
    <table>
        @foreach ($places as $place)
        <tr>
            @foreach($place as $item)

            <td onclick="getPlace(this)" id = "{{$item->id}}" @if(!$item->is_available) style="background-color: #2d3748" @endif  >{{$item->id}}</td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <button onclick="toBookPlace()">Забронировать места</button>

</body>
</html>
<style>
    table{
        width: 50%;
        height: 80%;
    }
    th {
        text-align: center; /* Выравнивание по левому краю */
        background: #ccc; /* Цвет фона ячеек */
        padding: 5px; /* Поля вокруг содержимого ячеек */
        border: 1px solid black; /* Граница вокруг ячеек */
    }
    td {
        padding: 5px; /* Поля вокруг содержимого ячеек */
        border: 1px solid black; /* Граница вокруг ячеек */
    }

</style>
<script>
let places = [] ;
function getPlace(obj) {
    obj.style.backgroundColor = "green";
    places.push(obj.id);

}
function toBookPlace(){

    const request = new XMLHttpRequest();
    let name = document.getElementById('name').value
    const url = "/events/{{$id}}/reserve";

    let params = "name=" + name;
    for (let i = 0; i < places.length; i++) {
      params = params+'&places['+i+']='+places[i];
      params = encodeURI(params);
        // ещё какие-то выражения
    }

    request.responseType =	"json";
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(params);
    request.addEventListener("readystatechange", () => {

        if (request.readyState === 4 && request.status === 200) {
            let obj = request.response;
            if(obj.code == 200){
                alert("Комнаты успешно забронированы");
                console.log(obj);
            }
        }
    });



}

</script>
