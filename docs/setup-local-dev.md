# 💻 Setup Local de Desarrollo

> [!info]
> Este documento describe el entorno de desarrollo utilizado durante la implementación del proyecto **Rincón del Pan**.
>
> La configuración presentada tiene como objetivo permitir que cualquier desarrollador pueda reproducir el entorno de trabajo desde cero.
>
> Toda la información sensible (usuarios, contraseñas, repositorios, credenciales y datos personales) fue anonimizada para su publicación en GitHub.

---

# Objetivo

Documentar paso a paso la preparación del entorno de desarrollo utilizado para implementar el proyecto.

El objetivo es que cualquier integrante del equipo pueda clonar el repositorio y disponer de un ambiente funcional utilizando las mismas herramientas.

---

# Herramientas Utilizadas

- Windows 11
- Visual Studio Code
- PHP 8.x
- Composer
- Docker en WSL
- Docker Compose
- MySQL 8
- phpMyAdmin
- Git for Windows
- Windows Terminal
- GitHub

---

# Arquitectura del Entorno Local

```text
                 Visual Studio Code
                        │
                        ▼
                 Proyecto Laravel
                        │
        ┌───────────────┴───────────────┐
        │                               │
        ▼                               ▼
     PHP 8.x                        Docker WSL
                                        │
                         ┌──────────────┴──────────────┐
                         ▼                             ▼
                     MySQL 8                    phpMyAdmin
```

---

# 1. Instalación de PHP

Descargar PHP para Windows desde el sitio oficial.

Extraer el contenido en una carpeta similar a:

```text
C:\php\
```

Agregar la carpeta al **PATH** del sistema.

Verificar la instalación:

```bash
php -v
```

La salida deberá mostrar la versión instalada de PHP.

---

# 2. Instalación de Composer

Descargar Composer desde su sitio oficial.

Durante la instalación, Composer detectará automáticamente la instalación de PHP.

Verificar:

```bash
composer --version
```

---

# 3. Instalación de Docker Desktop

Instalar Docker dentro de WSL.

Una vez iniciado el servicio, verificar que Docker funcione correctamente:

```bash
docker --version
```

y

```bash
docker compose version
```

---

# 4. Base de Datos con Docker

El proyecto utiliza contenedores Docker para ejecutar MySQL y phpMyAdmin.

Levantar el entorno:

```bash
docker compose up -d
```

Verificar los contenedores:

```bash
docker ps
```

Servicios disponibles:

| Servicio | Puerto |
|----------|:------:|
| MySQL | 3306 |
| phpMyAdmin | 8080 |

Acceder a phpMyAdmin:

```text
http://localhost:8080
```

Ejemplo simplificado del contenedor:

```yaml
services:

  mysql:
    image: mysql:8.0

    container_name: TU-CONTENEDOR-MYSQL

    restart: always

    environment:
      MYSQL_ROOT_PASSWORD: <ACA_PONE_TU_PASSWORD>

      MYSQL_DATABASE: <NOMBRE_BASE>

      MYSQL_USER: <USUARIO_APLICACION>

      MYSQL_PASSWORD: <PASSWORD_APLICACION>

    ports:
      - "3306:3306"

    volumes:
      - mysql_data:/var/lib/mysql

  phpmyadmin:

    image: phpmyadmin/phpmyadmin

    container_name: TU-CONTENEDOR-PHPMYADMIN

    restart: always

    environment:
      PMA_HOST: mysql
      PMA_USER: root
      PMA_PASSWORD: <ACA_PONE_TU_PASSWORD>

    ports:
      - "8080:80"

volumes:

  mysql_data:
```

---

# 5. Creación del Proyecto Laravel

Crear un nuevo proyecto utilizando Composer.

```bash
composer create-project laravel/laravel <NOMBRE_DEL_PROYECTO>
```

Ingresar al directorio:

```bash
cd <NOMBRE_DEL_PROYECTO>
```

---

# 6. Configuración del Archivo `.env`

Editar las variables correspondientes a la conexión con MySQL.

Ejemplo:

```env
APP_NAME=SweetStore

APP_ENV=local

APP_DEBUG=true

APP_URL=http://localhost:8000

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=<NOMBRE_BASE>

DB_USERNAME=<USUARIO_BASE>

DB_PASSWORD=<PASSWORD_BASE>
```

> [!warning]
> Nunca subir el archivo `.env` al repositorio.
>
> El proyecto únicamente debe incluir `.env.example`.

---

# 7. Generar la Clave de Laravel

Ejecutar:

```bash
php artisan key:generate
```

Laravel generará automáticamente la clave utilizada para cifrado y sesiones.

---

# 8. Verificación del Servidor

Iniciar el servidor integrado de Laravel.

```bash
php artisan serve
```

Acceder mediante el navegador:

```text
http://127.0.0.1:8000
```

---

# 9. Instalación de Git

Instalar **Git for Windows** utilizando la configuración recomendada.

Opciones sugeridas durante el asistente:

| Opción | Valor recomendado |
|---------|-------------------|
| Editor | Visual Studio Code |
| Rama inicial | Valor por defecto |
| Cliente SSH | Bundled OpenSSH |
| Terminal | Windows Default Console |
| Credential Manager | Git Credential Manager |
| Integración | Windows Terminal |

---

# 10. Integración con Windows Terminal

Agregar un perfil para Git Bash dentro de Windows Terminal.

Ejemplo:

```json
{
    "commandline": "C:/Program Files/Git/bin/bash.exe --login -i",
    "guid": "{GENERAR-UN-GUID-PROPIO}",
    "icon": "C:/Program Files/Git/mingw64/share/git/git-for-windows.ico",
    "name": "Git Bash",
    "startingDirectory": "%USERPROFILE%"
}
```

En caso de existir perfiles duplicados, eliminar aquellos que no sean necesarios.

---

# 11. Inicializar el Repositorio Git

Dentro del proyecto:

```bash
git init
```

---

# 12. Configurar la Identidad de Git

Configurar la identidad global del desarrollador.

```bash
git config --global user.name "<TU_NOMBRE>"

git config --global user.email "<TU_CORREO>"
```

Verificar:

```bash
git config --global --list
```

> [!note]
> Cada integrante del equipo debe utilizar su propia identidad de Git.

---

# 13. Primer Commit

Agregar todos los archivos del proyecto:

```bash
git add .
```

Crear el primer commit:

```bash
git commit -m "Proyecto iniciado"
```

---

# 14. Publicación en GitHub

Crear previamente un repositorio vacío.

Vincular el repositorio local:

```bash
git remote add origin <URL_DEL_REPOSITORIO>
```

Renombrar la rama principal:

```bash
git branch -M main
```

Publicar el proyecto:

```bash
git push -u origin main
```

La autenticación puede gestionarse mediante **Git Credential Manager**.

---

# 15. Verificación del Repositorio

Una vez publicado el proyecto verificar que se encuentren versionados archivos como:

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
artisan
composer.json
package.json
```

Y confirmar que **NO** se encuentren publicados:

```text
.env

vendor/

node_modules/

.idea/

.vscode/

storage/logs/

bootstrap/cache/*.php
```

---

# Buenas Prácticas

- No almacenar credenciales en el repositorio.
- Versionar únicamente `.env.example`.
- Utilizar migraciones para crear la base de datos.
- Utilizar seeders para generar datos iniciales.
- Mantener actualizado el archivo `.gitignore`.
- Realizar commits pequeños y descriptivos.
- Documentar cualquier cambio relevante en la Wiki del proyecto.

---

# Posibles Mejoras

En futuras versiones del entorno podrían incorporarse:

- Laravel Sail.
- Redis.
- Mailpit para pruebas de correo.
- Contenedor específico para PHP.
- Contenedor Nginx o Apache.
- Pipeline de integración continua (CI/CD).

---

# Resumen

El entorno de desarrollo documentado permite reproducir de manera consistente la implementación de **Rincón del Pan**, manteniendo una separación clara entre el código fuente y la configuración específica de cada desarrollador.

La anonimización de credenciales y configuraciones sensibles garantiza que este documento pueda formar parte del repositorio público del proyecto sin comprometer la seguridad ni exponer información personal.

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[08_ManualTecnico]]
- [[09_ManualInstalacion]]
