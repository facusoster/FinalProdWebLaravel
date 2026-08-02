# 🚀 Manual de Instalación

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[08_ManualTecnico]]
> - [[setup-local-dev]]

---

# Introducción

Este documento describe el procedimiento necesario para instalar y ejecutar el proyecto Sweet Store en un entorno local.

La guía contempla la instalación desde un repositorio limpio utilizando Composer, Docker y las herramientas estándar del ecosistema Laravel.

---

# Requisitos

Antes de comenzar es necesario contar con:

- PHP 8 o superior
- Composer
- Docker Desktop
- Docker Compose
- Git
- Node.js
- npm

La instalación detallada de estas herramientas se encuentra documentada en:

[[setup-local-dev]]

---

# Obtener el Proyecto

Clonar el repositorio:

```bash
git clone <URL_DEL_REPOSITORIO>
```

Ingresar al proyecto:

```bash
cd <NOMBRE_DEL_PROYECTO>
```

---

# Instalar Dependencias PHP

```bash
composer install
```

---

# Instalar Dependencias Frontend

```bash
npm install
```

---

# Configurar Variables de Entorno

Copiar el archivo de ejemplo:

```bash
cp .env.example .env
```

Editar las variables correspondientes a la base de datos.

---

# Generar la Clave

```bash
php artisan key:generate
```

---

# Levantar la Base de Datos

Si se utiliza Docker:

```bash
docker compose up -d
```

Verificar:

```bash
docker ps
```

---

# Ejecutar Migraciones

```bash
php artisan migrate --seed
```

Este proceso crea todas las tablas y carga información inicial.

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

# Ejecutar el Proyecto

```bash
php artisan serve
```

Acceder mediante:

```text
http://127.0.0.1:8000
```

---

# Credenciales de Prueba

Las credenciales utilizadas durante el desarrollo son generadas mediante los Seeders.

Por motivos de seguridad, no se incluyen usuarios ni contraseñas reales en esta documentación.

En caso de ser necesario, consultar la implementación de los Seeders correspondientes dentro de la carpeta:

```text
database/seeders/
```

---

# Verificación

Luego de la instalación se recomienda comprobar:

- Acceso al sitio.
- Conexión con la base de datos.
- Ejecución correcta de las migraciones.
- Datos cargados mediante Seeders.
- Funcionamiento del proceso de autenticación.

---

# Resolución de Problemas

## Error de conexión con MySQL

Verificar:

- Docker en ejecución.
- Variables del archivo `.env`.
- Puerto configurado.
- Estado del contenedor MySQL.

---

## Error al ejecutar Composer

Verificar:

```bash
php -v

composer --version
```

---

## Error de permisos

Ejecutar nuevamente:

```bash
php artisan storage:link
```

si la aplicación utiliza almacenamiento público.

---

# Actualización del Proyecto

Para obtener los últimos cambios:

```bash
git pull

composer install

php artisan migrate
```

---

# Resumen

El proyecto puede instalarse completamente utilizando las herramientas estándar del ecosistema Laravel. Gracias al uso de migraciones, seeders y Docker, cualquier desarrollador puede reconstruir el entorno de trabajo de forma reproducible y consistente.

---

## Documentación relacionada

- [[README]]
- [[08_ManualTecnico]]
- [[setup-local-dev]]