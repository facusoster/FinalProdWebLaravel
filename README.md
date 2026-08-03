# 🍞 Rincón del Pan

> Proyecto Final de la materia **Desarrollo de Aplicaciones Web con Laravel**  
> Tecnicatura Superior en Análisis de Sistemas — Escuela Da Vinci

---

# Descripción

**Rincón del Pan** es una aplicación web desarrollada con **Laravel 13** que implementa un sistema de comercio electrónico para una panadería y pastelería artesanal.

El proyecto fue realizado como trabajo integrador de la materia **Desarrollo de Aplicaciones Web con Laravel**, aplicando el patrón de arquitectura **MVC**, el framework **Laravel**, **Eloquent ORM**, **Blade**, **Bootstrap**, **MySQL** y herramientas modernas de desarrollo.

El sistema permite que los clientes puedan explorar el catálogo de productos, administrar una lista de favoritos, realizar pedidos, gestionar direcciones de envío y publicar reseñas sobre productos adquiridos. Asimismo, incorpora un panel de administración para la gestión del catálogo y de los pedidos.

La documentación del proyecto fue desarrollada en paralelo al código fuente y reúne el análisis funcional, el diseño de la base de datos, la arquitectura de software y la documentación técnica necesaria para comprender la implementación.

---

# Información del Proyecto

| Dato        | Información                                  |
| ----------- | -------------------------------------------- |
| Institución | Escuela Da Vinci                             |
| Carrera     | Tecnicatura Superior en Análisis de Sistemas |
| Materia     | Desarrollo de Aplicaciones Web con Laravel   |
| Proyecto    | Rincón del Pan                               |
| Integrantes | Facundo Nahuel Soster · Julián Verdirame     |
| Profesor    | Nicolás Ariel Calderón                       |

---

# Objetivos

## Objetivo General

Desarrollar una aplicación web utilizando Laravel y MySQL que permita gestionar un sistema de e-commerce aplicando buenas prácticas de programación, arquitectura MVC, ORM, documentación técnica y control de versiones.

## Objetivos Específicos

- Implementar una arquitectura basada en el patrón MVC.
- Aplicar Eloquent ORM para la persistencia de datos.
- Utilizar migraciones y seeders para administrar la base de datos.
- Implementar autenticación y autorización mediante roles.
- Gestionar productos, categorías y pedidos.
- Aplicar validaciones sobre los formularios del sistema.
- Documentar el proceso de análisis, diseño e implementación.
- Utilizar Git como sistema de control de versiones.

---

# Características principales

## Clientes

- Registro de usuarios.
- Inicio y cierre de sesión.
- Navegación del catálogo.
- Consulta de productos.
- Gestión de direcciones.
- Gestión de productos favoritos (Carrito de compras).
- Realización de pedidos.
- Consulta del historial de pedidos.
- Publicación de reseñas.

## Administradores

- Gestión de categorías.
- Gestión de productos.
- Administración de pedidos.
- Actualización del estado de los pedidos.

---

# Tecnologías utilizadas

| Tecnología         | Uso                         |
| ------------------ | --------------------------- |
| Laravel 13.23.0    | Framework principal         |
| PHP 8.3.32         | Backend                     |
| MySQL 8            | Base de datos               |
| Eloquent ORM       | Persistencia                |
| Blade              | Motor de plantillas         |
| Bootstrap          | Interfaz de usuario         |
| Vite               | Compilación de recursos     |
| Composer           | Gestión de dependencias PHP |
| Docker Desktop     | Entorno de base de datos    |
| phpMyAdmin         | Administración de MySQL     |
| Git                | Control de versiones        |
| GitHub             | Repositorio del proyecto    |
| Visual Studio Code | Entorno de desarrollo       |

---

# Arquitectura

El sistema fue desarrollado siguiendo el patrón **Modelo - Vista - Controlador (MVC)** propuesto por Laravel.

La lógica de negocio se encuentra organizada mediante:

- Controllers
- Models
- Blade Views
- Middleware
- Eloquent ORM
- Migraciones
- Seeders

La arquitectura completa se encuentra documentada en:

➡️ [01_Arquitectura](docs/docs/01_Arquitectura.md)

---

# Modelo de Dominio

El dominio del sistema está compuesto por las siguientes entidades principales:

- Users
- Addresses
- Products
- Categories
- Orders
- OrderItems
- Reviews
- Wishlists

Estas entidades representan el funcionamiento completo del e-commerce y sus relaciones de negocio.

Más información:

[02_ModeloDominio](docs/docs/02_ModeloDominio.md)

---

# Base de Datos

La persistencia del sistema fue implementada utilizando MySQL y Laravel Eloquent ORM.

Características principales:

- Migraciones versionadas.
- Relaciones mediante claves foráneas.
- Seeders para datos iniciales.
- Integridad referencial.
- Relaciones N:M mediante tablas pivote.

La documentación correspondiente se encuentra en:

- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [10_DiccionarioDatos](docs/docs/10_DiccionarioDatos.md)

---

# Documentación

Toda la documentación técnica del proyecto se encuentra organizada dentro de la carpeta **docs**.

| Documento | Descripción |
|-----------|-------------|
| [00_AnalisisRequisitos](docs/docs/00_AnalisisRequisitos.md) | Relevamiento de requisitos funcionales y no funcionales. |
| [01_Arquitectura](docs/docs/01_Arquitectura.md) | Arquitectura general del sistema. |
| [02_ModeloDominio](docs/docs/02_ModeloDominio.md) | Modelo de dominio y entidades principales. |
| [03_BaseDatos](docs/docs/03_BaseDatos.md) | Implementación de la base de datos. |
| [04_DER](docs/docs/04_DER.md) | Modelo Entidad-Relación. |
| [05_CasosUso](docs/docs/05_CasosUso.md) | Casos de uso del sistema. |
| [07_UML](docs/docs/07_UML.md)| Diagramas UML del proyecto. |
| [08_ManualTecnico](docs/docs/08_ManualTecnico.md) | Documentación técnica de implementación. |
| [09_ManualInstalacion](docs/docs/09_ManualInstalacion.md) | Instalación y configuración del entorno. |
| [10_DiccionarioDatos](docs/docs/10_DiccionarioDatos.md) | Diccionario de datos de la base de datos. |
| [setup-local-dev](docs/setup-local-dev.md) | Preparación del entorno de desarrollo. |

---

# Diagramas

Los diagramas del proyecto se encuentran organizados dentro de la carpeta **diagramas**.

Entre ellos se incluyen:

- [Arquitectura MVC](docs/diagramas/01_ArquitecturaMVC.md)
- [Componentes](docs/diagramas/02_Componentes.md)
- [Deployment](docs/diagramas/03_Deployment.md)
- [DER](docs/diagramas/10_DER.md)
- [Modelo de Dominio](docs/diagramas/11_ModeloDominio.md)
- [UML Casos de Uso](docs/diagramas/20_UML_CasosUso.md)
- [UML de Clases](docs/diagramas/21_UML_Clases.md)
- [UML de Secuencia Login](docs/diagramas/22_UML_SecuenciaLogin.md)
- [UML de Secuencia Pedido](docs/diagramas/23_UML_SecuenciaPedido.md)
- [UML de Actividades Compra](docs/diagramas/24_UML_ActividadCompra.md)
- [UML de Estados](docs/diagramas/25_UML_EstadosPedido.md)

---

# Instalación rápida

## Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
```

## Instalar dependencias

```bash
composer install
```

## Instalar dependencias Front-End

```bash
npm install
```

## Configurar el entorno

```bash
cp .env.example .env
```

Editar el archivo `.env` con los parámetros correspondientes a la base de datos.

## Generar la clave de la aplicación

```bash
php artisan key:generate
```

## Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

## Compilar recursos

```bash
npm run dev
```

## Ejecutar la aplicación

```bash
php artisan serve
```

---

# Credenciales de prueba

Las credenciales utilizadas para las pruebas son generadas mediante los **Seeders** del proyecto.

Consultar:

- [09_ManualInstalacion](docs/docs/09_ManualInstalacion.md)

---

# API REST

La implementación de la API REST forma parte de los requisitos del trabajo práctico y será incorporada en una etapa posterior del desarrollo.

Su documentación estará disponible en:

- [06_API_REST](docs/docs/06_API_REST.md)

---

# Estructura del Proyecto

```text
app/
bootstrap/
config/
database/
docs/
│
├── diagramas/
├── README.md
├── HOME.md
├── 00_AnalisisRequisitos.md
├── 01_Arquitectura.md
├── 02_ModeloDominio.md
├── 03_BaseDatos.md
├── 04_DER.md
├── 05_CasosUso.md
├── 07_UML.md
├── 08_ManualTecnico.md
├── 09_ManualInstalacion.md
├── 10_DiccionarioDatos.md
└── setup-local-dev.md
public/
resources/
routes/
storage/
tests/
```

---

# Buenas prácticas aplicadas

- Arquitectura MVC.
- Uso de Eloquent ORM.
- Separación de responsabilidades.
- Migraciones versionadas.
- Seeders para datos de prueba.
- Middleware para autenticación y autorización.
- Control de versiones mediante Git.
- Documentación técnica en Markdown.
- Diagramas generados mediante Mermaid.
- Navegación documental mediante Obsidian.

---

# Estado del Proyecto

Actualmente el proyecto cuenta con:

- Arquitectura MVC completamente implementada.
- Base de datos normalizada.
- CRUD de categorías.
- CRUD de productos.
- Gestión de pedidos.
- Gestión de direcciones.
- Wishlist.
- Sistema de reseñas.
- Panel administrativo.
- Documentación técnica integral.

La implementación de la API REST corresponde a una etapa posterior para completar los requisitos de la asignatura.

---

# Licencia

Este proyecto fue desarrollado con fines académicos como trabajo práctico para la materia **Desarrollo de Aplicaciones Web con Laravel** de la **Escuela Da Vinci**.
