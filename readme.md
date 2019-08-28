# Goodline test php-backend

### Установка

1. Клонировать репозиторий
```
$ git clone https://github.com/SergeyGluxov/goodlineTest.git
```

2. Перейдите в директорию
```
$ cd goodlineTest
```

3. Установите composer
```
~/goodlineTest $composer install
```

4. Сгенерируйте ключ APP_KEY
```
~/goodlineTest $php artisan key:generate
```

5. Измените имя файла .env.example на .env и измените содержимое, предварительно создав БД для:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=secret
```

6. Выполните миграции:
```
~/goodlineTest $php artisan migrate
```

### Карта маршрутов

##### Авторизация

- POST /login
- POST /login
- GET /logout

##### Паста

- GET /
- POST /
