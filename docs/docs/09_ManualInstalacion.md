# ðŸ› ï¸ Manual de InstalaciÃ³n

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# IntroducciÃ³n

Este documento describe el procedimiento recomendado para instalar y ejecutar el proyecto **RincÃ³n del Pan** en un entorno local de desarrollo.

El objetivo es permitir que cualquier integrante del equipo pueda reconstruir completamente el entorno de trabajo utilizando Ãºnicamente el repositorio del proyecto y las herramientas necesarias.

La configuraciÃ³n detallada del entorno utilizado durante el desarrollo puede consultarse en:

âž¡ï¸ [setup-local-dev](../setup-local-dev.md)

---

# Requisitos Previos

Antes de comenzar, se recomienda contar con el siguiente software instalado.

| Software | VersiÃ³n recomendada |
|-----------|---------------------|
| PHP | 8.3.32 o superior |
| Composer | Ãšltima versiÃ³n estable |
| MySQL | 8.x |
| Docker Desktop | Ãšltima versiÃ³n |
| Git | Ãšltima versiÃ³n |
| Visual Studio Code | Opcional |
| Obsidian | Opcional (documentaciÃ³n) |

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

Este comando descargarÃ¡ automÃ¡ticamente todos los paquetes definidos en `composer.json`.

---

# Configurar el Archivo .env

Copiar el archivo de ejemplo.

```bash
cp .env.example .env
```

En Windows PowerShell tambiÃ©n puede utilizarse:

```powershell
Copy-Item .env.example .env
```

Editar posteriormente el archivo `.env` con los datos correspondientes al entorno local.

Ejemplo:

```dotenv
APP_NAME="RincÃ³n del Pan"

APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nombre_base>
DB_USERNAME=<usuario>
DB_PASSWORD=<contraseÃ±a>
```

> [!warning]
> Nunca incluir el archivo `.env` dentro del repositorio Git.

---

# Generar la Clave de Laravel

Laravel requiere generar una clave Ãºnica para el proyecto.

Ejecutar:

```bash
php artisan key:generate
```

El comando actualizarÃ¡ automÃ¡ticamente la variable `APP_KEY` del archivo `.env`.

---

# Crear la Base de Datos

Crear previamente una base de datos vacÃ­a en MySQL.

Por ejemplo:

```text
rincon_del_pan
```

La base deberÃ¡ coincidir con el nombre configurado en el archivo `.env`.

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

TambiÃ©n es posible realizar ambos pasos simultÃ¡neamente.

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

Para producciÃ³n:

```bash
npm run build
```

---

# Iniciar el Servidor

Ejecutar:

```bash
php artisan serve
```

La aplicaciÃ³n estarÃ¡ disponible en:

```text
http://127.0.0.1:8000
```

---

# Usuarios de Prueba

Los usuarios iniciales son creados automÃ¡ticamente por los Seeders.

Las credenciales exactas pueden consultarse en los archivos de seed correspondientes dentro de:

```text
database/seeders/
```

> [!note]
> En la documentaciÃ³n pÃºblica no se incluyen credenciales reales para evitar exponer informaciÃ³n sensible.

---

# Estructura Esperada

Una vez finalizada la instalaciÃ³n, el proyecto deberÃ­a presentar una estructura similar a la siguiente.

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

# VerificaciÃ³n de la InstalaciÃ³n

La instalaciÃ³n puede considerarse correcta cuando:

- Laravel inicia sin errores.
- La pÃ¡gina principal responde correctamente.
- La base de datos contiene todas las tablas.
- Los Seeders generan informaciÃ³n de prueba.
- Es posible iniciar sesiÃ³n con usuarios generados por el sistema.
- El panel administrativo funciona correctamente para usuarios con rol de administrador.

---

# Problemas Frecuentes

## Error de conexiÃ³n con MySQL

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

## CachÃ© de ConfiguraciÃ³n

Si se modificÃ³ el archivo `.env`, limpiar la cachÃ©.

```bash
php artisan optimize:clear
```

---

# ActualizaciÃ³n del Proyecto

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

# ConfiguraciÃ³n del Entorno

La configuraciÃ³n completa del entorno de desarrollo utilizado durante la realizaciÃ³n del proyecto se encuentra documentada en:

âž¡ï¸ [setup-local-dev](../setup-local-dev.md)

Este documento incluye:

- InstalaciÃ³n de PHP.
- Composer.
- Docker Desktop.
- MySQL.
- phpMyAdmin.
- Git.
- GitHub.
- Visual Studio Code.
- ConfiguraciÃ³n inicial del proyecto Laravel.

---

# DocumentaciÃ³n Relacionada

- [README](../../README.md)
- [HOME](../HOME.md)
- [setup-local-dev](../setup-local-dev.md)
- [08_ManualTecnico](08_ManualTecnico.md)
- [03_BaseDatos](03_BaseDatos.md)

---

# Consideraciones Finales

El proyecto **RincÃ³n del Pan** fue desarrollado siguiendo las convenciones oficiales de **Laravel Framework 13** y puede ser reconstruido completamente a partir del repositorio utilizando las migraciones, los seeders y el archivo `.env.example`.

La separaciÃ³n entre el **Manual de InstalaciÃ³n** y el documento **setup-local-dev** permite distinguir el procedimiento general de despliegue del proyecto respecto de la configuraciÃ³n especÃ­fica del entorno de desarrollo utilizado por el equipo.

