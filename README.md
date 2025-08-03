# Todoist - Менеджер задач на PHP
## Проект создан для демонстрации работы с PHP без фреймворков.


![PHP Version](https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?logo=composer&logoColor=white)
![MVC](https://img.shields.io/badge/MVC-Architecture-FF6F00)
![PHPUnit](https://img.shields.io/badge/PHPUnit-3C7780?logo=phpunit&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green)
<img width="1919" height="862" alt="image" src="https://github.com/user-attachments/assets/3af6eda5-c009-40cc-9080-b8088b0caaed" />


Простое и эффективное веб-приложение для управления задачами с авторизацией.

## Особенности

- Создание и управление задачами
- Фильтрация задач по датам
- CLI-интерфейс для управления из терминала
- Чистая MVC архитектура без фреймворков
- Поддержка MySQL

## Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/your-username/todoist.git
cd todoist
```

2. Настройте подключение в config.php:
```bash
mysql -u root -p < install/install.sql
```

3. Настройте подключение в config.php:
```php
'DB_HOST' => 'localhost',
'DB_USER' => 'root',
'DB_PASSWORD' => 'your_password',
'DB_NAME' => 'todoist',
```

4. Запустите сервер:
```bash
php -S localhost:8000 -t public/
```

5. Откройте в браузере:
```
http://localhost:8000
```

## CLI Команды
```bash
# Добавить задачу
php commands/add.php "Купить молоко"

# Список задач
php commands/list.php

# Отметить выполненной
php commands/done.php 123

# Удалить задачу
php commands/remove.php 123
```

## Структура проекта
```
Todoist/
├── public/            # Веб-точка входа
│   ├── index.php      # Главная
│   ├── login.php      # Авторизация
│   └── style.css      # Стили
├── Repository/        # Работа с данными
│   └── TodoRepository.php
├── services/          # Бизнес-логика
│   ├── database.php   # Подключение к БД
│   └── template-service.php
├── models/            # Сущности
│   └── Todo.php
└── views/             # Шаблоны
```

