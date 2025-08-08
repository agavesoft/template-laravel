# 🚀 Template Laravel - Agavesoft

[![Laravel](https://img.shields.io/badge/Laravel-12.21.0-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4+-blue.svg)](https://php.net)
[![React](https://img.shields.io/badge/React-19.0.0-blue.svg)](https://reactjs.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.7+-blue.svg)](https://typescriptlang.org)
[![Pest](https://img.shields.io/badge/Testing-Pest-green.svg)](https://pestphp.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

> Template moderno de Laravel con React, TypeScript, Filament y todas las herramientas necesarias para proyectos empresariales.

## 📋 Tabla de Contenidos

- [🎯 Características](#-características)
- [🛠️ Stack Tecnológico](#️-stack-tecnológico)
- [📦 Instalación](#-instalación)
- [🚀 Desarrollo](#-desarrollo)
- [🧪 Testing](#-testing)
- [📚 Estructura del Proyecto](#-estructura-del-proyecto)
- [⚙️ Configuración](#️-configuración)
- [🤝 Contribución](#-contribución)

## 🎯 Características

### 🔐 **Autenticación y Autorización**
- Sistema completo de roles y permisos con **Spatie Laravel Permission**
- Integración con **Filament** para gestión de usuarios
- API authentication con **Laravel Sanctum**

### 🎨 **Frontend Moderno**
- **React 19** + **TypeScript**
- **Inertia.js** para SPA experience
- **Tailwind CSS 4** + **shadcn/ui** + **Radix UI**
- **Vite** para desarrollo rápido

### 📊 **Panel de Administración**
- **Filament 3.3** completamente configurado
- Gestión de roles y permisos
- Sistema de logs y auditoría
- Manejo de medios y archivos

### 🔧 **Características Avanzadas**
- Sistema de **tags** (Spatie Laravel Tags)
- **Media Library** para gestión de archivos
- **Activity Log** para auditoría
- Soporte para **Amazon S3**
- Sistema de **colas** configurado
- **Soft deletes** con tracking

### 🧪 **Testing y Calidad**
- **Pest** como framework de testing
- Coverage reports configurados
- **ESLint** + **Prettier** para código limpio
- **Laravel Pint** para PHP

## 🛠️ Stack Tecnológico

### Backend
- **Laravel 12.21.0** - Framework PHP
- **PHP 8.4+** - Lenguaje de programación
- **SQLite/MySQL** - Base de datos
- **Laravel Sanctum** - API Authentication

### Frontend
- **React 19** - Librería de UI
- **TypeScript 5.7+** - Superset de JavaScript
- **Inertia.js 2** - Modern monolith
- **Tailwind CSS 4** - Framework CSS
- **Vite 7** - Build tool

### Admin Panel
- **Filament 3.3** - Admin panel
- **Spatie Laravel Permission** - Roles y permisos
- **Spatie Media Library** - Gestión de medios

### Testing
- **Pest 3.8** - Testing framework
- **Laravel Dusk** - Browser testing (opcional)

## 📦 Instalación

### Prerrequisitos
- PHP 8.4+
- Composer 2.0+
- Node.js 18+
- npm/yarn

### 1. Clonar el repositorio
```bash
git clone https://github.com/agavesoft/template-laravel.git
cd template-laravel
```

### 2. Instalar dependencias
```bash
# Dependencias PHP
composer install

# Dependencias Node.js
npm install
```

### 3. Configuración inicial
```bash
# Copiar archivo de entorno
cp .env.example .env

# Generar key de aplicación
php artisan key:generate

# Crear base de datos SQLite (o configurar MySQL en .env)
touch database/database.sqlite

# Ejecutar migraciones
php artisan migrate --seed

# Crear enlace de storage
php artisan storage:link
```

### 4. Configurar Filament
```bash
# Crear usuario administrador
php artisan make:filament-user
```

## 🚀 Desarrollo

### Comandos Disponibles

#### Servidor de Desarrollo
```bash
# Desarrollo completo (Laravel + Vite + Queue + Logs)
composer run dev

# Solo Laravel
php artisan serve

# Solo Vite
npm run dev
```

#### Base de Datos
```bash
# Ejecutar migraciones
php artisan migrate

# Ejecutar seeders
php artisan db:seed

# Refresh completo
php artisan migrate:refresh --seed
```

#### Frontend
```bash
# Desarrollo
npm run dev

# Build para producción
npm run build

# Build con SSR
npm run build:ssr

# Linting
npm run lint

# Formateo
npm run format
```

### Tasks Predefinidas

El proyecto incluye tasks de VS Code para operaciones comunes:

- **Servidor**: Laravel con/sin debug
- **Base de datos**: Migraciones, seeders, rollbacks
- **Modelos**: Crear modelos con controladores y migraciones
- **Utils**: Rutas, middleware, eventos, etc.

## 🧪 Testing

### Ejecutar Tests
```bash
# Todos los tests
php artisan test

# Tests con coverage
php artisan test --coverage

# Coverage en formato Cobertura XML
php artisan test --coverage-cobertura coverage/cobertura.xml

# Tests específicos
php artisan test --filter=UserTest
```

### Estructura de Tests
```
tests/
├── Feature/        # Tests de integración
├── Unit/          # Tests unitarios
├── Fixtures/      # Datos de prueba
├── Pest.php       # Configuración de Pest
└── TestCase.php   # Clase base para tests
```

## 📚 Estructura del Proyecto

```
app/
├── Console/Commands/     # Comandos Artisan
├── Filament/Resources/   # Recursos de Filament
├── Http/
│   ├── Controllers/      # Controladores
│   ├── Middleware/       # Middleware
│   └── Requests/         # Form Requests
├── Models/              # Modelos Eloquent
├── Policies/           # Políticas de autorización
├── Providers/          # Service Providers
├── Services/           # Lógica de negocio
└── Traits/             # Traits reutilizables

resources/
├── css/                # Estilos CSS
├── js/                 # Código React/TypeScript
└── views/              # Vistas Blade (SSR)

config/
├── filament*.php       # Configuración Filament
├── permission.php      # Configuración permisos
└── media-library.php   # Configuración medios
```

## ⚙️ Configuración

### Variables de Entorno Importantes

```env
# Base de datos
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite

# Sanctum
APP_SANCTUM_STATEFUL_DOMAINS=localhost

# Filament
FILAMENT_EMAILS="admin@example.com"

# Storage (S3)
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket

# Spatie
MEDIA_DISK=local
ACTIVITY_LOGGER_ENABLED=true

# Queue
QUEUE_CONNECTION=database
```

### Configuración de Desarrollo

1. **Herd/Valet**: El proyecto está optimizado para trabajar con Laravel Herd
2. **Xdebug**: Configurado para debugging (puerto 9003)
3. **Hot Reload**: Vite configurado para desarrollo rápido

## 📖 Uso

### Crear Nuevo Recurso

```bash
# Crear modelo completo (modelo, migración, controlador, seeder)
php artisan make:model Product -mcrs

# Crear recurso de Filament
php artisan make:filament-resource Product
```

> [!NOTE]
> Esto ya viene configurado por defecto al momento de crear un modelo

### Trabajar con Permisos

```php
// En un modelo
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}

// En código
$user->assignRole('admin');
$user->givePermissionTo('edit articles');
```

### Activity Log

```php
// En un modelo
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use LogsActivity;
    
    protected static $logAttributes = ['name', 'price'];
}
```

## 🔧 Personalización

### Cambiar Tema de Filament

```php
// config/filament.php
'theme' => [
    'primary' => 'blue',
    'secondary' => 'gray',
],
```

### Añadir Middleware Global

```php
// app/Http/Kernel.php
protected $middleware = [
    // ...
    \App\Http\Middleware\YourMiddleware::class,
];
```

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -am 'Añade nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

### Estándares de Código

- **PHP**: Seguir PSR-12, usar Laravel Pint
- **JavaScript/TypeScript**: Seguir configuración ESLint/Prettier
- **Tests**: Escribir tests para nueva funcionalidad

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

## 📞 Soporte

- **Documentación**: [Laravel Docs](https://laravel.com/docs)
- **Filament**: [Filament Docs](https://filamentphp.com/docs)
- **Issues**: [GitHub Issues](https://github.com/agavesoft/template-laravel/issues)

---

<div align="center">
  <strong>Desarrollado con ❤️ por <a href="https://agavesoft.com.mx">Agavesoft</a></strong>
</div>