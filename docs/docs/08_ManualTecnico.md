# ⚙️ Manual Técnico

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[03_BaseDatos]]
> - [[09_ManualInstalacion]]
> - [[setup-local-dev]]

---

# Introducción

Este documento describe la implementación técnica del proyecto **Sweet Store**, desarrollado utilizando Laravel bajo el patrón Modelo–Vista–Controlador (MVC).

Su objetivo es brindar una visión de la estructura interna del sistema, las tecnologías utilizadas y las decisiones adoptadas durante el desarrollo.

---

# Objetivos

Este manual permite:

- Comprender la organización del proyecto.
- Facilitar el mantenimiento del código.
- Documentar la estructura técnica.
- Servir como referencia para futuros desarrolladores.

---

# Tecnologías Utilizadas

## Backend

- PHP 8
- Laravel 12

## Base de Datos

- MySQL 8
- Eloquent ORM

## Frontend

- Blade Templates
- Bootstrap

## Herramientas

- Composer
- Docker WSL
- Docker Compose
- Git
- GitHub
- Visual Studio Code

---

# Organización del Proyecto

El proyecto mantiene la estructura estándar de Laravel.

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
```

---

# Modelos

Cada entidad del dominio se implementa mediante un modelo Eloquent.

Entre ellas:

- User
- Address
- Product
- Category
- Order
- OrderItem
- Review
- Wishlist

Las relaciones se implementan utilizando los métodos nativos de Eloquent.

---

# Controladores

Los controladores gestionan las solicitudes HTTP y coordinan la interacción entre modelos y vistas.

Entre los principales módulos implementados se encuentran:

- Autenticación
- Productos
- Categorías
- Pedidos
- Direcciones
- Wishlist
- Reseñas

---

# Middleware

El proyecto utiliza middleware para controlar el acceso a determinadas funcionalidades.

Entre ellos:

- Autenticación de usuarios.
- Restricción por rol de administrador.

---

# Persistencia

La persistencia se implementa mediante:

- Migraciones.
- Seeders.
- Claves foráneas.
- Relaciones Eloquent.

No se utilizan consultas SQL manuales como mecanismo principal de acceso a datos.

---

# Gestión de Recursos

Los recursos estáticos del proyecto incluyen:

- Imágenes de productos.
- Hojas de estilo.
- Archivos JavaScript.
- Plantillas Blade.

---

# Seguridad

El sistema implementa:

- Autenticación basada en sesiones.
- Protección CSRF.
- Hash de contraseñas.
- Validación de formularios.
- Middleware de autorización.

---

# Control de Versiones

Durante el desarrollo se utilizó Git para el versionado del código fuente.

Las principales prácticas adoptadas fueron:

- Commits frecuentes.
- Versionado del código.
- Exclusión de archivos sensibles mediante `.gitignore`.
- Publicación del proyecto en GitHub.

---

# Entorno de Desarrollo

La preparación del entorno se documenta en:

[[setup-local-dev]]

---

# Posibles Mejoras

Como evolución del proyecto podrían incorporarse:

- Services para encapsular lógica de negocio.
- Policies de Laravel.
- Jobs y Queues.
- Cache.
- API REST completa.
- Pruebas automatizadas.
- Integración continua (CI/CD).

---

# Resumen

El proyecto fue desarrollado siguiendo la arquitectura propuesta por Laravel, manteniendo una estructura modular, organizada y fácilmente mantenible, apoyándose en Eloquent ORM, Blade y MySQL como tecnologías principales.

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[03_BaseDatos]]
- [[09_ManualInstalacion]]
- [[setup-local-dev]]