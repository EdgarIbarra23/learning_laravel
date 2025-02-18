<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📌 Acerca del Proyecto

Este proyecto fue diseñado para mi práctica y aprendizaje en el desarrollo con Laravel. Incluye 3 tablas principales: **roles**, **users** y **tasks**, y abarca diversas prácticas esenciales en el desarrollo backend.

### 🔹 Características principales
- ✅ **Estructuración del Proyecto:** Organización de carpetas y archivos.
- ✅ **Manejo de Respuestas HTTP:** Estructura adecuada de respuestas y manejo de errores.
- ✅ **Migraciones:**
  - Creación de migraciones.
  - Definición de relaciones entre tablas.
  - Ejecución de migraciones.
- ✅ **CRUD Completo:**
  - Servicio de Creación (Create).
  - Servicio de Lectura (Read) con relaciones.
  - Servicio de Actualización (Update).
  - Servicio de Eliminación (Delete)
- ✅ **Autenticación y Autorización:**
  - Servicio de Inicio de Sesión (Login).
  - Servicio para obtener la información del usuario autenticado.
  - Servicio de Cierre de Sesión (Logout).
  - Validación de autenticación para proteger endpoints.
  - Asignación y gestión de Roles de usuario.
  - Autorización de peticiones según roles (restricción de acciones según permisos asignados).
- ✅ **Notificaciones y Comunicación:**
  - Envío de Emails.
  - Envío de Notificaciones.

#

### 🚀 Instalación y Ejecución

### 1️⃣ Clonar el Repositorio

```bash
  git clone https://github.com/EdgarIbarra23/learning_laravel.git
```

### 2️⃣ Configuración Inicial

#### 🔹 Para usuarios SIN Docker

1. Instalar las dependencias con Composer

```bash
    composer install
```

2. Copiar el archivo de entorno

```bash
    cp .env.example .env
```

3. Generar la clave de aplicación

```bash
    php artisan key:generate
```

4. Ejecutar las migraciones

```bash
    php artisan migrate
```

5. Generar las claves de Passport

```bash
    php artisan passport:keys
```

6. Crear un cliente personal para Passport

```bash
    php artisan passport:client --personal
```

7. Iniciar el servidor

```bash
    php artisan serve
```

#

### 🌐 Acceso a la API

Después de completar los pasos de instalación, la API estará disponible en:

```bash
  http://localhost:8000/api
```

### 🌐 Acceso a la Documentación

La documentación de la API estará disponible en:

```bash
  http://localhost:8000/docs/api
```