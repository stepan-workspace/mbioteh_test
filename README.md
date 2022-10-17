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
 - Реализация - 6 часов

---

Запуск проекта:
```bash
$ cd ./docker/
$ make build
$ make up
```
перейти в браузер по 127.0.0.1

---

Зависимости:
 - PHP 8.1
 - Nginx 1.23
