# 🛠️ Manual de Instalación

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Introducción

Este documento describe el procedimiento recomendado para instalar y ejecutar el proyecto **Rincón del Pan** en un entorno local de desarrollo.

El objetivo es permitir que cualquier integrante del equipo pueda reconstruir completamente el entorno de trabajo utilizando únicamente el repositorio del proyecto y las herramientas necesarias.

La configuración detallada del entorno utilizado durante el desarrollo puede consultarse en:

➡️ [setup-local-dev](docs/setup-local-dev.md)

---

# Requisitos Previos

Antes de comenzar, se recomienda contar con el siguiente software instalado.

| Software | Versión recomendada |
|-----------|---------------------|
| PHP | 8.3.32 o superior |
| Composer | Última versión estable |
| MySQL | 8.x |
| Docker Desktop | Última versión |
| Git | Última versión |
| Visual Studio Code | Opcional |
| Obsidian | Opcional (documentación) |

---

# Clonar el Proyecto

Clonar el repositorio desde GitHub.

```bash
git clone <URL_DEL_REPOSITORIO>
```

Ingresar al directorio del proyecto.

```bash
cd finalLaravel
```

---

# Instalar Dependencias PHP

Instalar todas las dependencias definidas por Composer.

```bash
composer install
```

Este comando descargará automáticamente todos los paquetes definidos en `composer.json`.

---

# Configurar el Archivo .env

Copiar el archivo de ejemplo.

```bash
cp .env.example .env
```

En Windows PowerShell también puede utilizarse:

```powershell
Copy-Item .env.example .env
```

Editar posteriormente el archivo `.env` con los datos correspondientes al entorno local.

Ejemplo:

```dotenv
APP_NAME="Rincón del Pan"

APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nombre_base>
DB_USERNAME=<usuario>
DB_PASSWORD=<contraseña>
```

> [!warning]
> Nunca incluir el archivo `.env` dentro del repositorio Git.

---

# Generar la Clave de Laravel

Laravel requiere generar una clave única para el proyecto.

Ejecutar:

```bash
php artisan key:generate
```

El comando actualizará automáticamente la variable `APP_KEY` del archivo `.env`.

---

# Crear la Base de Datos

Crear previamente una base de datos vacía en MySQL.

Por ejemplo:

```text
rincon_del_pan
```

La base deberá coincidir con el nombre configurado en el archivo `.env`.

---

# Ejecutar las Migraciones

Crear toda la estructura de la base de datos.

```bash
php artisan migrate
```

---

# Cargar Datos Iniciales

Generar los registros de prueba mediante Seeders.

```bash
php artisan db:seed
```

También es posible realizar ambos pasos simultáneamente.

```bash
php artisan migrate --seed
```

Para reconstruir completamente la base de datos:

```bash
php artisan migrate:fresh --seed
```

---

# Instalar Dependencias Front-End

Instalar las dependencias administradas mediante NPM.

```bash
npm install
```

---

# Compilar Recursos

Durante el desarrollo:

```bash
npm run dev
```

Para producción:

```bash
npm run build
```

---

# Iniciar el Servidor

Ejecutar:

```bash
php artisan serve
```

La aplicación estará disponible en:

```text
http://127.0.0.1:8000
```

---

# Usuarios de Prueba

Los usuarios iniciales son creados automáticamente por los Seeders.

Las credenciales exactas pueden consultarse en los archivos de seed correspondientes dentro de:

```text
database/seeders/
```

> [!note]
> En la documentación pública no se incluyen credenciales reales para evitar exponer información sensible.

---

# Estructura Esperada

Una vez finalizada la instalación, el proyecto debería presentar una estructura similar a la siguiente.

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

artisan
composer.json
package.json
vite.config.js
.env
```

---

# Verificación de la Instalación

La instalación puede considerarse correcta cuando:

- Laravel inicia sin errores.
- La página principal responde correctamente.
- La base de datos contiene todas las tablas.
- Los Seeders generan información de prueba.
- Es posible iniciar sesión con usuarios generados por el sistema.
- El panel administrativo funciona correctamente para usuarios con rol de administrador.

---

# Problemas Frecuentes

## Error de conexión con MySQL

Verificar:

- Servicio MySQL iniciado.
- Puerto configurado correctamente.
- Credenciales del archivo `.env`.
- Existencia de la base de datos.

---

## APP_KEY inexistente

Ejecutar nuevamente:

```bash
php artisan key:generate
```

---

## Dependencias faltantes

Actualizar Composer.

```bash
composer install
```

Actualizar dependencias JavaScript.

```bash
npm install
```

---

## Caché de Configuración

Si se modificó el archivo `.env`, limpiar la caché.

```bash
php artisan optimize:clear
```

---

# Actualización del Proyecto

Para actualizar el proyecto desde Git:

```bash
git pull
```

Luego ejecutar nuevamente:

```bash
composer install
npm install
php artisan migrate
```

En caso de existir nuevas migraciones.

---

# Configuración del Entorno

La configuración completa del entorno de desarrollo utilizado durante la realización del proyecto se encuentra documentada en:

➡️ [setup-local-dev](docs/setup-local-dev.md)

Este documento incluye:

- Instalación de PHP.
- Composer.
- Docker Desktop.
- MySQL.
- phpMyAdmin.
- Git.
- GitHub.
- Visual Studio Code.
- Configuración inicial del proyecto Laravel.

---

# Documentación Relacionada

- [[README]]
- [HOME](docs/HOME.md)
- [setup-local-dev](docs/setup-local-dev.md)
- [08_ManualTecnico](docs/docs/08_ManualTecnico.md)
- [03_BaseDatos](docs/docs/03_BaseDatos.md)

---

# Consideraciones Finales

El proyecto **Rincón del Pan** fue desarrollado siguiendo las convenciones oficiales de **Laravel Framework 13** y puede ser reconstruido completamente a partir del repositorio utilizando las migraciones, los seeders y el archivo `.env.example`.

La separación entre el **Manual de Instalación** y el documento **setup-local-dev** permite distinguir el procedimiento general de despliegue del proyecto respecto de la configuración específica del entorno de desarrollo utilizado por el equipo.
