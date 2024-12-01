# Документация для API бронирования номеров в отеле

Этот README содержит инструкции для тестирования API бронирования номеров в отеле с помощью Postman. API позволяет создавать, просматривать, обновлять и удалять брони. Работает на фреймворке Laravel 11.

## Содержание
- [API Эндпоинты](#api-эндпоинты)
    - [1. Создать бронь](#1-создать-бронь)
    - [2. Получить бронь по ID](#2-получить-бронь-по-id)
    - [3. Обновить бронь](#3-обновить-бронь)
    - [4. Удалить бронь](#4-удалить-бронь)
    - [5. Получить все брони](#5-получить-все-брони)
    - [6. Получить брони по пользователю](#6-получить-брони-по-пользователю)
- [Тестирование с помощью Postman](#тестирование-с-помощью-postman)

Это аутентифицирует ваши запросы.

## API Эндпоинты

### 1. Создать бронь
- **Метод**: `POST`
- **URL**: `/api/bookings`
- **Тело запроса**:
    - `user_id`: (необязательно) ID пользователя, который создает бронь.
    - `room_id`: ID номера, который бронируется.
    - `check_in_date`: Дата заезда (формат: `YYYY-MM-DD`).
    - `check_out_date`: Дата выезда (формат: `YYYY-MM-DD`).
    - `status`: Статус брони. Возможные значения: `pending`, `confirmed`, `cancelled`.

#### Пример запроса:
```json
{
  "user_id": 1,
  "room_id": 2,
  "check_in_date": "2024-12-01",
  "check_out_date": "2024-12-07",
  "status": "confirmed"
}
```
#### Пример ответа (Успех):
```json
{
    "user_id": 1,
    "room_id": 2,
    "check_in_date": "2024-12-01",
    "check_out_date": "2024-12-07",
    "status": "confirmed",
    "updated_at": "2024-12-01T15:58:53.000000Z",
    "created_at": "2024-12-01T15:58:53.000000Z",
    "id": 52
}
```
#### Пример ответа (Не валид):
```json
{
    "message": "Validation failed",
    "errors": {
        "user_id": [
            "The selected user id is invalid."
        ]
    }
}
```
### 2. Получить бронь по ID
- **Метод**: `GET`
- **URL**: `api/bookings/{id}`
- **Параметры**:
    - `id`: ID брони, которую нужно получить.
   

#### Пример запроса:
```
GET http://localhost:8000/api/bookings/1
```
#### Пример ответа (Успех)
```json
{
  "id": 1,
  "user_id": 1,
  "room_id": 2,
  "check_in_date": "2024-12-01",
  "check_out_date": "2024-12-07",
  "status": "confirmed"
}
```
#### Пример ответа (Ошибка)
```json
{
    "message": "Booking not found"
}
```

### 3. Обновить бронь
- **Метод**: `PUT`
- **URL**: `api/bookings/{id}`
- **Тело запроса**:
    - `user_id`: (необязательно) Обновленный ID пользователя.
    - `room_id`: Обновленный ID комнаты.
    - `check_in_date`: Обновленная дата заезда.
    - `check_out_date`: Обновленная дата выезда.
    - `status`: Обновленный статус брони.

#### Пример запроса 
```json
{
  "room_id": 3,
  "check_in_date": "2024-12-05",
  "check_out_date": "2024-12-10",
  "status": "confirmed"
}
```
#### Пример ответа (Успех)
```json
{
    "message": "Booking updated successfully",
    "booking": {
        "id": 51,
        "check_in_date": "2024-12-04",
        "check_out_date": "2024-12-15",
        "room_id": 8,
        "user_id": 4,
        "status": "pending",
        "created_at": "2024-12-01T13:55:53.000000Z",
        "updated_at": "2024-12-01T16:09:16.000000Z"
    }
}
```
#### Пример ответа (Ошибка)
```json
{
    "message": "Booking not found"
}
```
### 4. Удалить бронь
- **Метод**: `DELETE`
- **URL**: `api/bookings/{id}`
- **Параметры**:
    - `id`: ID брони, которую нужно удалить.

#### Пример запроса
```
DELETE http://localhost:8000/api/bookings/1
```
#### Пример ответа 
```json
{
    "message": "Booking deleted successfully."
}
```
#### Пример ответа (Ошибка)
```json
{
    "message": "Booking not found"
}
```

### 5. Получить все брони
- **Метод**: `GET`
- **URL**: `api/bookings`

#### Пример запроса
```
GET http://localhost:8000/api/bookings
```
#### Пример ответа (Успех)
```json
{
        "id": 1,
        "check_in_date": "2024-12-06",
        "check_out_date": "2024-12-11",
        "room_id": 1,
        "user_id": 2,
        "status": "cancelled",
        "created_at": "2024-12-01T13:48:54.000000Z",
        "updated_at": "2024-12-01T13:48:54.000000Z",
        "user": {
            "id": 2,
            "name": "Shanny Quigley",
            "email": "beer.sam@example.com",
            "email_verified_at": null,
            "created_at": "2024-12-01T13:48:54.000000Z",
            "updated_at": "2024-12-01T13:48:54.000000Z"
        },
        "room": {
            "id": 1,
            "room_number": "398",
            "room_type": "double",
            "status": "available",
            "price": "457.00",
            "created_at": "2024-12-01T13:48:54.000000Z",
            "updated_at": "2024-12-01T13:48:54.000000Z"
        }
    }
```
### 6. Получить все брони по пользователю
- **Метод**: `GET`
- **URL**: `/api/bookings/user/{user_id}`
- **Параметры**: 
  - `user_id`: ID пользователя, чьи брони нужно получить.
#### Пример запроса
```
GET http://localhost:8000/api/bookings/user/1
```
#### Пример Ответа (Успех)
```json
[
    {
        "id": 11,
        "check_in_date": "2024-12-05",
        "check_out_date": "2024-12-11",
        "room_id": 8,
        "user_id": 4,
        "status": "cancelled",
        "created_at": "2024-12-01T13:48:54.000000Z",
        "updated_at": "2024-12-01T13:48:54.000000Z",
        "room": {
            "id": 8,
            "room_number": "391",
            "room_type": "single",
            "status": "available",
            "price": "110.00",
            "created_at": "2024-12-01T13:48:54.000000Z",
            "updated_at": "2024-12-01T13:48:54.000000Z"
        }
    },
    {
        "id": 14,
        "check_in_date": "2024-12-03",
        "check_out_date": "2024-12-07",
        "room_id": 8,
        "user_id": 4,
        "status": "cancelled",
        "created_at": "2024-12-01T13:48:54.000000Z",
        "updated_at": "2024-12-01T13:48:54.000000Z",
        "room": {
            "id": 8,
            "room_number": "391",
            "room_type": "single",
            "status": "available",
            "price": "110.00",
            "created_at": "2024-12-01T13:48:54.000000Z",
            "updated_at": "2024-12-01T13:48:54.000000Z"
        }
    }
]
```
