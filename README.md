# API de Gestión de Usuarios – Laravel & Sanctum

Este proyecto implementa una **API RESTful** para la gestión de usuarios, desarrollada con **Laravel 11** y protegida mediante **Laravel Sanctum** para el manejo de tokens.  
Incluye:

- Registro de usuarios  
- Inicio de sesión con generación de token  
- CRUD completo de usuarios  
- Cierre de sesión (invalidación de token)  
- Estadísticas por día, semana y mes  
- Seeders, factories y migraciones completas  

---

## Requisitos Previos

- PHP 8.2 o superior  
- Composer  
- MySQL o MariaDB  
- Postman / Insomnia para pruebas  
- Laravel CLI (opcional)  

---

# Instalación y Configuración

## 1Clonar el repositorio

```bash
git clone <URL-del-repositorio>
cd api-gestion-usuarios
```

---

## Instalar dependencias

```bash
composer install
```

---

## Crear archivo `.env`

```bash
cp .env.example .env
```

Configurar la base de datos:

```env
DB_DATABASE=api_usuarios
DB_USERNAME=root
DB_PASSWORD=
```

Crear la base de datos:

```sql
CREATE DATABASE api_usuarios CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

---

## Registrar rutas API (Laravel 11)

Abrir el archivo:

```text
bootstrap/app.php
```

Y agregar:

```php
api: __DIR__.'/../routes/api.php',
```

Debe quedar así:

```php
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)
```

---

## Generar clave de la aplicación

```bash
php artisan key:generate
```

---

## Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

ó:

```bash
php artisan migrate:fresh --seed
```

Esto crea:

- Usuario administrador:  
  - **email:** `admin@example.com`  
  - **password:** `admin123`  
- 20 usuarios de prueba.

---

## Iniciar el servidor

```bash
php artisan serve
```

La API estará disponible en:

```
http://127.0.0.1:8000/api/
```

---

# Autenticación con Tokens (Sanctum)

Para acceder a rutas protegidas:

1. Hacer login  
2. Copiar el token  
3. En Postman/Insomnia → Authorization → Bearer Token  
4. Pegar token  

---

# Endpoints de la API

---

## Rutas Públicas

### **1. Registro**
`POST /api/register`

Body JSON:

```json
{
  "name": "Test User",
  "username": "test01",
  "email": "test@example.com",
  "password": "123456",
  "password_confirmation": "123456"
}
```

---

### **2. Login**
`POST /api/login`

Body:

```json
{
  "email": "admin@example.com",
  "password": "admin123"
}
```

Respuesta:

```json
{
  "message": "Login exitoso",
  "token": "1|xxxxx",
  "token_type": "Bearer"
}
```

---

# Rutas Protegidas (requieren token)

### **Listar usuarios**
`GET /api/users`

### **Crear usuario**
`POST /api/users`

Body:

```json
{
  "name": "Nuevo Usuario",
  "username": "nuevo",
  "email": "nuevo@example.com",
  "password": "123456",
  "role": "user"
}
```

### **Mostrar usuario**
`GET /api/users/{id}`

### **Actualizar usuario**
`PUT /api/users/{id}`

### **Eliminar usuario**
`DELETE /api/users/{id}`

---

## Estadísticas

### Usuarios por día  
`GET /api/stats/users/daily`

### Usuarios por semana  
`GET /api/stats/users/weekly`

### Usuarios por mes  
`GET /api/stats/users/monthly`

---

## Cerrar sesión

`POST /api/logout`

Invalidará el token actual.

---

# 🧪 Pruebas con Postman / Insomnia

1. Registrar usuario  
2. Hacer login  
3. Copiar token  
4. Pegar token en Authorization  
5. Probar CRUD  
6. Probar estadísticas  
7. Logout  

---

# 🛠 Tecnologías Utilizadas

- Laravel 11  
- Laravel Sanctum  
- PHP 8.2+  
- MySQL  
- Faker  
- Postman / Insomnia  

---

