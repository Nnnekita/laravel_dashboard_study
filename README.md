# Блог о комплектующих ПК

Учебный проект — блог про аппаратные комплектующие персональных компьютеров.

**Стек:** Laravel 13, Breeze (Blade), Tailwind CSS v3, SQLite/MySQL

## Функционал

- Регистрация и авторизация
- Админ-панель (доступна только пользователям с флагом `is_admin`)
- CRUD категорий
- CRUD постов (с картинками, категориями, датой публикации)

## Установка

### 1. Клонировать репозиторий

```bash
git clone https://github.com/Nnnekita/laravel_dashboard_study.git
cd laravel_dashboard_study
```

### 2. Настроить окружение

```bash
cp .env.example .env
```

При необходимости измени настройки базы данных в `.env`.  
По умолчанию используется SQLite — установка не требуется.

### 3. Установить зависимости PHP

```bash
composer install
```

### 4. Сгенерировать ключ приложения

```bash
php artisan key:generate
```

### 5. Создать базу данных

**SQLite** (по умолчанию):

```bash
touch database/database.sqlite
```

**MySQL** — создай базу и укажи в `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_dashboard
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Выполнить миграции

```bash
php artisan migrate
```

### 7. Установить frontend-зависимости

```bash
npm install
```

### 8. Собрать frontend

```bash
npm run build
```

### 9. Создать симлинк для изображений

```bash
php artisan storage:link
```

### 10. Запустить

```bash
php artisan serve
```

Открой `http://localhost:8000`

## Создание администратора

1. Зарегистрируйся через `/register`
2. Сделай пользователя админом:

```bash
php artisan tinker
```

```php
$user = User::first();
$user->is_admin = true;
$user->save();
exit;
```

3. Войди в систему и перейди в админ-панель:
   - `/admin/categories` — управление категориями
   - `/admin/posts` — управление постами

## Разработка

Для разработки с автоматической пересборкой CSS:

```bash
php artisan serve & npm run dev
```
