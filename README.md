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

### 2. Установить зависимости PHP

```bash
composer install
```

### 3. Выполнить миграции

```bash
php artisan migrate
```

### 4. Установить frontend-зависимости

```bash
npm install
```

### 5. Собрать frontend

```bash
npm run build
```

### 6. Создать симлинк для изображений

```bash
php artisan storage:link
```

### 7. Запустить

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
