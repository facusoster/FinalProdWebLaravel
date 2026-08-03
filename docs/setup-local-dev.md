# ðŸ’» Setup del Entorno de Desarrollo

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32  
> **Sistema Operativo utilizado:** Windows 11

---

# IntroducciÃ³n

Este documento describe el entorno de desarrollo utilizado durante la implementaciÃ³n del proyecto **RincÃ³n del Pan**.

No se trata de un procedimiento obligatorio para ejecutar la aplicaciÃ³n, sino de una guÃ­a que documenta las herramientas, configuraciones y decisiones adoptadas durante el desarrollo.

El objetivo es facilitar la reproducciÃ³n del entorno por parte de otros integrantes del equipo o futuros desarrolladores.

> [!note]
> Para instalar Ãºnicamente el proyecto consultar [09_ManualInstalacion](docs/09_ManualInstalacion.md).

---

# Entorno Utilizado

| Software | VersiÃ³n |
|-----------|----------|
| Windows | 11 |
| PHP | 8.3.32 |
| Laravel | 13.23.0 |
| Composer | 2.x |
| Docker Desktop | Ãšltima versiÃ³n estable |
| MySQL | 8.x |
| phpMyAdmin | Incluido en Docker |
| Git for Windows | Ãšltima versiÃ³n |
| Visual Studio Code | Ãšltima versiÃ³n |
| Windows Terminal | Ãšltima versiÃ³n |
| Obsidian | DocumentaciÃ³n |
| GitHub | Repositorio remoto |

---

# 1. InstalaciÃ³n de PHP

Descargar PHP para Windows desde el sitio oficial:

https://windows.php.net/download/

Extraer el contenido en:

```text
C:\php\
```

Agregar la carpeta al `PATH` del sistema.

Verificar la instalaciÃ³n:

```bash
php --version
```

Resultado esperado:

```text
PHP 8.3.32
```

---

# 2. InstalaciÃ³n de Composer

Descargar Composer desde:

https://getcomposer.org/download/

Finalizada la instalaciÃ³n verificar:

```bash
composer --version
```

Composer detectarÃ¡ automÃ¡ticamente la instalaciÃ³n de PHP.

---

# 3. InstalaciÃ³n de Docker Desktop

Descargar Docker Desktop desde:

https://www.docker.com/

Verificar:

```bash
docker --version
```

Luego comprobar que Docker se encuentre ejecutÃ¡ndose correctamente.

---

# 4. Base de Datos con Docker Compose

El entorno utiliza contenedores Docker para MySQL y phpMyAdmin.

Levantar los servicios:

```bash
docker compose up -d
```

Verificar:

```bash
docker ps
```

Servicios esperados:

| Servicio | Puerto |
|----------|---------|
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

# 5. CreaciÃ³n del Proyecto Laravel

Crear el proyecto mediante Composer.

```bash
composer create-project laravel/laravel finalLaravel
```

Ingresar al directorio:

```bash
cd finalLaravel
```

---

# 6. ConfiguraciÃ³n del Archivo .env

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

Configurar la conexiÃ³n a la base de datos.

Ejemplo:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<NOMBRE_BASE_DE_DATOS>
DB_USERNAME=<USUARIO_MYSQL>
DB_PASSWORD=<CONTRASEÃ‘A_MYSQL>
```

> [!warning]
> Nunca almacenar credenciales reales en el repositorio Git.
>
> El archivo `.env` debe permanecer excluido mediante `.gitignore`.

---

# 7. Generar la Clave de Laravel

Ejecutar:

```bash
php artisan key:generate
```

Este comando crea automÃ¡ticamente la variable `APP_KEY`.

---

# 8. Verificar el Funcionamiento

Iniciar el servidor integrado.

```bash
php artisan serve
```

Acceder a:

```text
http://127.0.0.1:8000
```

Si aparece la pantalla inicial de Laravel, el entorno se encuentra correctamente configurado.

---

# 9. InstalaciÃ³n de Git

Instalar **Git for Windows** utilizando las opciones recomendadas.

Durante la instalaciÃ³n se utilizaron las siguientes configuraciones:

| OpciÃ³n | ConfiguraciÃ³n |
|---------|---------------|
| Editor | Visual Studio Code |
| Rama inicial | Let Git decide |
| Cliente SSH | Bundled OpenSSH |
| Terminal | Windows Default Console |
| Credential Manager | Git Credential Manager |
| IntegraciÃ³n | Windows Terminal |

---

# 10. IntegraciÃ³n con Windows Terminal

Agregar manualmente el perfil de Git Bash.

```json
{
    "commandline": "C:/Program Files/Git/bin/bash.exe --login -i",
    "guid": "{00000000-0000-0000-0000-000000000001}",
    "icon": "C:/Program Files/Git/mingw64/share/git/git-for-windows.ico",
    "name": "Git Bash",
    "startingDirectory": "%USERPROFILE%"
}
```

Eliminar perfiles duplicados si existieran.

---

# 11. Inicializar Git

Dentro del proyecto ejecutar:

```bash
git init
```

---

# 12. Configurar la Identidad de Git

Cada desarrollador deberÃ¡ configurar su propia identidad.

Ejemplo:

```bash
git config --global user.name "<TU_NOMBRE>"
git config --global user.email "<TU_EMAIL>"
```

Verificar:

```bash
git config --global --list
```

> [!note]
> Reemplazar los valores por la identidad personal de cada desarrollador.

---

# 13. Primer Commit

Agregar todos los archivos:

```bash
git add .
```

Crear el commit inicial:

```bash
git commit -m "Proyecto iniciado"
```

---

# 14. Crear el Repositorio Remoto

Crear un nuevo repositorio en GitHub.

Asociarlo al proyecto:

```bash
git remote add origin <URL_DEL_REPOSITORIO>
```

Renombrar la rama principal:

```bash
git branch -M main
```

Enviar los cambios:

```bash
git push -u origin main
```

La autenticaciÃ³n puede realizarse mediante **Git Credential Manager**.

---

# 15. Verificar el Repositorio

Confirmar que el repositorio contiene los archivos principales:

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/

artisan
composer.json
package.json
vite.config.js
```

Y verificar que **NO** se encuentren versionados:

```text
.env
vendor/
node_modules/
```

---

# Herramientas Utilizadas Durante el Desarrollo

AdemÃ¡s del stack principal, se utilizaron las siguientes herramientas:

- Visual Studio Code
- GitHub
- Git Bash
- Windows Terminal
- Docker Desktop
- phpMyAdmin
- Obsidian
- Mermaid
- Composer

---

# Buenas PrÃ¡cticas Adoptadas

Durante el desarrollo del proyecto se siguieron las siguientes recomendaciones:

- Utilizar Git desde el inicio del proyecto.
- Versionar el cÃ³digo mediante commits frecuentes.
- Mantener el archivo `.env` fuera del repositorio.
- Utilizar migraciones y seeders para reconstruir la base de datos.
- Mantener la documentaciÃ³n en formato Markdown junto con el cÃ³digo fuente.
- Gestionar los diagramas mediante Mermaid para facilitar su mantenimiento y versionado.

---

# DocumentaciÃ³n Relacionada

- [README](../README.md)
- [HOME](HOME.md)
- [09_ManualInstalacion](docs/09_ManualInstalacion.md)
- [08_ManualTecnico](docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El entorno descrito en este documento corresponde al utilizado durante el desarrollo de **RincÃ³n del Pan**.

La combinaciÃ³n de **Laravel Framework 13.23.0**, **PHP 8.3.32**, **Docker Desktop**, **MySQL**, **Git** y **Visual Studio Code** permitiÃ³ disponer de un entorno de desarrollo moderno, reproducible y alineado con las buenas prÃ¡cticas recomendadas para proyectos Laravel.

Este documento complementa el **Manual de InstalaciÃ³n**, documentando el proceso completo de preparaciÃ³n del entorno local utilizado por el equipo de desarrollo, sin exponer informaciÃ³n sensible ni credenciales privadas.

