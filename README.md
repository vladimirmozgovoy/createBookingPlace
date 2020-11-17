

# Тестовое задание 

Суть задания
Сделать тонкий клиент на одном из популярных фреймворков (желательно на Laravel),
во фронтенде должны быть страницы:
● список мероприятий
● детальная страница мероприятия со списком событий
● детальная страница события со схемой зала и возможностью выбрать и
забронировать места, для брони нужно запросить имя покупателя
● после бронирования вывести id брони, пришедшее из API
База данных не нужна, ничего сохранять не нужно.

Еще Вам известно, что через некоторое время поставщик билетов (шлюз) может
измениться - список методов будет такой же, реализация API другая. Смена
поставщика должна быть максимально простой.

# Решение задания 

![image-20201117214908805](/home/vladimir/.config/Typora/typora-user-images/image-20201117214908805.png)

В настройках config/app.php я добавил сущность поставщика , в которой мы можем добавлять поставщиков , с параметрами их API .Название поставщика храниться в  файле .env , следовательно таким образом мы можем поменять поставщика в считанные минуты.

![image-20201117215213113](/home/vladimir/.config/Typora/typora-user-images/image-20201117215213113.png)



## Методы

### Список мероприятий

#### Запрос

GET api/meetings

#### Ответ

```javascript
{"response":[{"id":1,"name":"Show #1"},{"id":2,"name":"Show #2"}...}
```

| Параметр | Тип     | Описание             |
| -------- | ------- | -------------------- |
| id       | integer | ID мероприятия       |
| name     | string  | Название мероприятия |

### Список событий мероприятия

#### Запрос

GET api/meetings/{meetingId:\d+}/events

| Параметр  | Тип     | Описание       |
| --------- | ------- | -------------- |
| meetingId | integer | ID мероприятия |

#### Ответ

```javascript
{"response":[{"id":46,"showId":10,"date":"2019-08-22 20:26:38"},{"id":47,"showId":10,"date":"2019-09-01 20:26:38"}...}
```

| Параметр  | Тип     | Описание       |
| --------- | ------- | -------------- |
| id        | integer | ID события     |
| meetingId | integer | ID мероприятия |
| date      | string  | Дата события   |

### Список мест события

#### Запрос

GET api/events/{eventId:\d+}/places

| Параметр | Тип     | Описание   |
| -------- | ------- | ---------- |
| eventId  | integer | ID события |

#### Ответ

```javascript
{"response":[{"id":1,"x":0,"y":0,"width":20,"height":20,"is_available":true},{"id":2,"x":0,"y":30,"width":20,"height":20,"is_available":true},...}
```

| Параметр     | Тип     | Описание       |
| ------------ | ------- | -------------- |
| id           | integer | ID места       |
| x            | float   | Координата X   |
| y            | float   | Координата Y   |
| width        | float   | Ширина         |
| height       | float   | Высота         |
| is_available | boolean | Место доступно |


### Забронировать места события

#### Запрос

POST api/events/{eventId:\d+}/reserve

##### GET параметры:

| Параметр | Тип     | Описание   |
| -------- | ------- | ---------- |
| eventId  | integer | ID события |

##### POST параметры:

| Параметр | Тип    | Описание       |
| -------- | ------ | -------------- |
| name     | string | Имя покупателя |
| places   | array  | Список ID мест |

#### Ответ

```javascript
{
"response": {
"success": true,
"reservation_id": "5d519fe58e3cf"
}
}
```

| Параметр       | Тип     | Описание               |
| -------------- | ------- | ---------------------- |
| success        | boolean | Результат бронирования |
| reservation_id | string  | ID резерва             |

# Развертка проекта 

Развернуть проект можно просто через докер.

> docker-compose up

Порт для nginx прописан 3552

![image-20201117215942910](/home/vladimir/.config/Typora/typora-user-images/image-20201117215942910.png)

# Front-end 

Front-end написан , внутри приложения с помощью view модулей . Я не выбрал SPA , потому что не было времени его разворачивать .

