# Тестовое задание

> Написать `REST API` для генерации рандомного числа используя PHP-фреймворк на выбор. Каждой генерации присваивать уникальный id по которому можно получить результат генерации. На выходе 2 публичных `API` метода: `generate()` и `retrieve(id)`.
> 
> Также сделать хотя бы один из следующих пунктов:
> 
> - Добавить доставку приложения через `docker-compose`
> 
> - Добавить авторизацию через `basic auth`;
> 
> - Добавить консольную команду, которая бы делала то же самое, что и апи (`get`/`set`);
> 
> - Ежедневно генерировать отчёт (в виде .txt-файла) со списком всех сгенерированных чисел;
> 
> - Ежедневно отправлять на admin@admin.admin письмо со списком всех сгенерированных чисел

---
## Время разработки
 - Окружение - 2 часа
 - Реализация - 2 дня
 - Отладка - 4 часа

---
## Зависимости:
 - docker version 20.10.19, build d85ef84
 - docker-compose version 1.29.2, build unknown

---
## Копирование проекта:
```bash
$ git clone git@github.com:stepan-workspace/mbioteh_test.git
$ cd ./mbioteh_test/
```

## Настройка среды и запуск:
```bash
$ cd ./docker/
$ cp .env.dist .env
$ make build
$ make up
```

## Настройка проекта:
```bash
$ docker exec -it mbioteh_test_php bash
# cd app/
# cp .env.dist .env
# composer install
# php bin/console doctrine:schema:update --force

```

После настройки перейти в браузер по 127.0.0.1 на главную страницу проекта (стартовая Symfony)

---
## Работа с проектом:

 - http://127.0.0.1/api - список доступных API (API Platform)
 - http://127.0.0.1/api/generate - генерация случайного числа (запись в БД)
 - http://127.0.0.1/api/retrieve/[id] - плучение элемента по `Id` (`Id` необходимо указать)

**Консольные команды:**
```bash
$ docker exec -it mbioteh_test_php bash
# cd app/
```
 - список доступных команд:
```bash
# php bin/console
```
 - генерация случайного числа (запись в БД):
```bash
# php bin/console number:generate
```
*результат будет выведен на экран*

 - плучение элемента по `Id` (`Id` необходимо указать):
 ```bash
 # php bin/console number:retrieve [id]
 ```

## Резальтат:

Цель основной задачи выполнена. Две дополнительные задачи из пяти выполнены.

Стек:
 - **Docker** 20.10, **docker-compose** 1.29,
 - **PHP 8**.1, **Nginx** 1.23, **MariaDB** 10.5,
 - **Symfony 6.1**