# MeepleClub — Proyecto guía UT4 DWES

Proyecto didáctico de **2º DAW / Desarrollo Web en Entorno Servidor** para trabajar estado, cookies, sesiones, autenticación, autorización, seguridad y depuración en PHP.

## Requisitos

- PHP 8.4 o superior dentro de la rama 8.x.
- PhpStorm recomendado.
- Composer opcional. Se incluye `composer.json`, aunque no existen dependencias externas.

## Arranque

Desde la raíz:

```bash
php -S localhost:8000 -t public
```

O con Composer:

```bash
composer serve
```

Abrir:

```text
http://localhost:8000
```

> Es importante utilizar `-t public`. Así `app/`, `config/`, `data/` y `views/` quedan fuera del directorio público del servidor.

## Credenciales de desarrollo

| Rol | Email | Contraseña |
|---|---|---|
| Administrador | `ada@meeple.local` | `Admin123!` |
| Usuario | `linus@meeple.local` | `User123!` |

## Arquitectura

```text
MeepleClub/
├── public/                  # Document root: lo accesible desde el navegador
│   ├── index.php
│   ├── preferences.php
│   ├── login.php
│   ├── dashboard.php
│   ├── admin.php
│   ├── logout.php
│   └── assets/
│       └── styles.css
│
├── app/                     # Lógica de aplicación reutilizable
│   ├── bootstrap.php
│   ├── auth.php
│   ├── security.php
│   └── view.php
│
├── config/                  # Configuración centralizada
│   └── app.php
│
├── data/                    # Persistencia simulada para la UT4
│   └── users.php
│
├── views/                   # Presentación HTML
│   ├── layout/
│   │   ├── header.php
│   │   └── footer.php
│   └── pages/
│       ├── home.php
│       ├── preferences.php
│       ├── login.php
│       ├── dashboard.php
│       └── admin.php
│
├── tools/                   # Utilidades que no forman parte de la web pública
│   └── generate_hash.php
│
├── composer.json
├── .gitignore
└── README.md
```

## Responsabilidad de cada carpeta

### `public/`

Es el **único directorio expuesto al navegador**. Sus archivos actúan como pequeños controladores: reciben la petición, validan/procesan y delegan la representación en una vista.

### `app/`

Contiene lógica PHP reutilizable:

- `bootstrap.php`: configuración inicial e inicio de sesión.
- `auth.php`: autenticación, autorización y ciclo de sesión.
- `security.php`: escape HTML y CSRF.
- `view.php`: carga de plantillas.

### `config/`

Centraliza valores de configuración, como timeout de sesión o temas permitidos.

### `data/`

Simula la persistencia durante UT4. Más adelante esta responsabilidad se trasladaría a una base de datos/repositorio.

### `views/`

Contiene la presentación. Las páginas de `public/` preparan los datos; las vistas se encargan principalmente de generar HTML.

### `tools/`

Utilidades de desarrollo que no deben publicarse como parte de la aplicación web.

## Flujo de una petición

Ejemplo de login:

```text
Navegador
   ↓ POST /login.php
public/login.php
   ↓
app/bootstrap.php
   ↓
app/auth.php + app/security.php
   ↓
Sesión / usuarios de data/
   ↓
views/pages/login.php o redirección
   ↓
Respuesta HTTP
```

## Decisión pedagógica

Esto **no pretende ser un MVC completo**. Es una arquitectura deliberadamente pequeña para introducir tres ideas fundamentales:

1. separar lo público de lo interno;
2. separar lógica de presentación;
3. agrupar responsabilidades relacionadas.

Cuando el proyecto crezca, estas ideas podrán evolucionar hacia controllers, services, repositories, routers, namespaces, POO y frameworks.

## Seguridad incluida

- `password_hash()` / `password_verify()`.
- `session_regenerate_id(true)` tras login.
- `session.use_strict_mode`.
- cookie de sesión con `HttpOnly` y `SameSite=Lax`.
- `Secure` cuando la petición utiliza HTTPS.
- timeout por inactividad.
- CSRF en formularios que modifican estado.
- control de acceso en servidor.
- escape HTML mediante `e()`.
- errores genéricos de login.
- `public/` como document root.

## Usuarios y hashes

Para crear un nuevo hash:

```bash
php tools/generate_hash.php "NuevaContraseña"
```

El script está fuera de `public/`, por lo que no se expone como endpoint web.
