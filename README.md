# 🍰 Sweet Store

Sistema de comercio electrónico desarrollado con **Laravel** como trabajo práctico integrador de la materia **Desarrollo de Aplicaciones Web con Laravel** perteneciente a la **Tecnicatura Superior en Análisis de Sistemas** de la **Escuela Da Vinci**.

El proyecto implementa una tienda online especializada en productos de pastelería, aplicando arquitectura MVC, Eloquent ORM, migraciones, seeders, autenticación, autorización, Blade, bases de datos relacionales y una API REST como componente complementario.

---

# Información del Proyecto

| Dato | Información |
|------|-------------|
| Institución | Escuela Da Vinci |
| Carrera | Tecnicatura Superior en Análisis de Sistemas |
| Materia | Desarrollo de Aplicaciones Web con Laravel |
| Proyecto | Sweet Store |
| Integrantes | Facundo Nahuel Soster · Julián Verdirame |
| Profesor | Nicolás Ariel Calderón |

---

# Objetivos

El objetivo del proyecto es desarrollar una aplicación web funcional utilizando Laravel y MySQL, aplicando buenas prácticas de desarrollo, documentación y organización del código, siguiendo los requerimientos establecidos por la cátedra.

---

# Alcance Funcional

## Cliente

- Registro e inicio de sesión.
- Navegación por categorías.
- Consulta del catálogo.
- Gestión de Wishlist.
- Gestión de direcciones.
- Realización de pedidos.
- Historial de compras.
- Publicación de reseñas.

## Administrador

- CRUD de categorías.
- CRUD de productos.
- Gestión de pedidos.
- Actualización del estado de pedidos.

---

# Arquitectura

El proyecto sigue el patrón **Modelo – Vista – Controlador (MVC)** utilizando Laravel.

La lógica de negocio se implementa mediante:

- Modelos Eloquent.
- Controladores.
- Middleware.
- Blade Templates.
- Migraciones.
- Seeders.

La arquitectura completa puede consultarse en:

➡️ [[docs/01_Arquitectura]]

---

# Modelo de Datos

Las entidades principales son:

- Users
- Addresses
- Categories
- Products
- Category_Product
- Orders
- Order_Items
- Reviews
- Wishlists

La documentación correspondiente puede consultarse en:

- [[docs/02_ModeloDominio]]
- [[docs/03_BaseDatos]]
- [[docs/04_DER]]

---

# API REST

Como componente adicional solicitado por la materia, el proyecto contempla la implementación de una API REST con un conjunto reducido de endpoints.

Estado actual:

🚧 En desarrollo

Documentación:

➡️ [[docs/06_API_REST]]

---

# Instalación

```bash
git clone <repositorio>

cd SweetStore

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

npm install

npm run dev

php artisan serve
```

---

# Entorno de Desarrollo Recomendado

Durante el desarrollo del backend se utilizó un entorno basado en:

- Docker
- MySQL 8
- phpMyAdmin

La configuración completa del entorno local puede consultarse en:

➡️ [[docs/setup-local-dev]]

---

# Documentación

La documentación del proyecto se encuentra organizada dentro de la carpeta **docs**.

- [[docs/HOME]]
- [[docs/00_AnalisisRequisitos]]
- [[docs/01_Arquitectura]]
- [[docs/02_ModeloDominio]]
- [[docs/03_BaseDatos]]
- [[docs/04_DER]]
- [[docs/05_CasosUso]]
- [[docs/06_API_REST]]
- [[docs/07_UML]]
- [[docs/08_ManualTecnico]]
- [[docs/09_ManualInstalacion]]

---

# Estado del Proyecto

| Componente | Estado |
|------------|:------:|
| Relevamiento | ✅ |
| Arquitectura | ✅ |
| Base de Datos | ✅ |
| Backend Laravel | 🚧 |
| API REST | 🚧 |
| Documentación | 🚧 |

---

# Licencia

Este proyecto fue desarrollado con fines académicos como trabajo práctico para la materia **Desarrollo de Aplicaciones Web con Laravel** de la **Escuela Da Vinci**.