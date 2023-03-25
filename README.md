## job-fibo

### Инструкция

>\>cd job-fibo
* ## Сборка проекта

>\>make build
* ## Запуск проекта

>\>make up
* ## Зайти в котейнер

>\>make laravel
* ## Установить laravel

>\>composer install
* ## Установить npm

>\>npm install
* ## Настроить laravel

>\>cat .env.example \> .env

* ## Миграция

>\>php artisan migrate
* ## Собрать проект

>\>npm run build
* ## Выход из контейнера

>\>exit
* ## Перегрузить проект

>\>make down
>\>make up

* ## Добавить путь к сайту

Добавить строку в /etc/hosts  

10.10.54.10     fibo.loc


Набрать в браузере: http://fibo.loc

* ## Остановить проекта

>\>make down
