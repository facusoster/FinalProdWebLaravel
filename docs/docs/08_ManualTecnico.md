# âš™ï¸ Manual TÃ©cnico

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32  
> **PatrÃ³n ArquitectÃ³nico:** Modelo - Vista - Controlador (MVC)

---

# IntroducciÃ³n

Este documento describe los aspectos tÃ©cnicos mÃ¡s relevantes de la implementaciÃ³n del proyecto **RincÃ³n del Pan**.

Su objetivo es proporcionar una visiÃ³n general de la estructura del sistema, las tecnologÃ­as utilizadas y las decisiones adoptadas durante el desarrollo, facilitando el mantenimiento, la comprensiÃ³n del cÃ³digo y la incorporaciÃ³n de futuras funcionalidades.

---

# TecnologÃ­as Utilizadas

| TecnologÃ­a | VersiÃ³n |
|------------|---------|
| Laravel | 13.23.0 |
| PHP | 8.3.32 |
| MySQL | 8 |
| Composer | 2.x |
| Bootstrap | 5 |
| Vite | Integrado con Laravel |
| Blade | Motor de plantillas |
| Eloquent ORM | Integrado con Laravel |
| Git | Control de versiones |
| GitHub | Repositorio remoto |
| Docker Desktop | Entorno de base de datos |
| phpMyAdmin | AdministraciÃ³n de MySQL |
| Obsidian | DocumentaciÃ³n tÃ©cnica |
| Mermaid | Diagramas |

---

# Arquitectura

El proyecto sigue el patrÃ³n **Modelo - Vista - Controlador (MVC)** recomendado por Laravel.

Cada componente posee una responsabilidad especÃ­fica:

- **Modelos**: representan las entidades del dominio y gestionan el acceso a la base de datos mediante Eloquent ORM.
- **Vistas**: implementadas con Blade Templates para la presentaciÃ³n de la informaciÃ³n.
- **Controladores**: reciben las solicitudes HTTP, coordinan la lÃ³gica de negocio y generan la respuesta correspondiente.

La documentaciÃ³n completa de la arquitectura puede consultarse en:

- [01_Arquitectura](01_Arquitectura.md)

---

# OrganizaciÃ³n del Proyecto

La estructura principal del proyecto sigue las convenciones establecidas por Laravel.

```text
app/
â”œâ”€â”€ Http/
â”‚   â”œâ”€â”€ Controllers/
â”‚   â”œâ”€â”€ Middleware/
â”‚   â””â”€â”€ Requests/
â”‚
â”œâ”€â”€ Models/
â”‚
bootstrap/
config/
database/
â”‚
â”œâ”€â”€ factories/
â”œâ”€â”€ migrations/
â””â”€â”€ seeders/
â”‚
public/
resources/
â”‚
â”œâ”€â”€ css/
â”œâ”€â”€ js/
â””â”€â”€ views/
â”‚
routes/
storage/
tests/
```

Esta organizaciÃ³n facilita la separaciÃ³n de responsabilidades y mejora la mantenibilidad del cÃ³digo.

---

# Modelos Implementados

El sistema implementa los siguientes modelos Eloquent:

- User
- Address
- Category
- Product
- Order
- OrderItem
- Review
- Wishlist *(utilizada funcionalmente como carrito de compras)*

Cada modelo define:

- Relaciones entre entidades.
- AsignaciÃ³n masiva mediante `fillable`.
- ConversiÃ³n de atributos mediante `casts` cuando corresponde.
- MÃ©todos de navegaciÃ³n entre relaciones.

---

# Base de Datos

La persistencia se implementa mediante **MySQL** utilizando **Eloquent ORM**.

La estructura de la base de datos se encuentra completamente versionada mediante:

- Migraciones.
- Seeders.

La documentaciÃ³n correspondiente puede consultarse en:

- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [10_DiccionarioDatos](10_DiccionarioDatos.md)

---

# Migraciones

Las migraciones permiten construir el esquema completo de la base de datos desde cero.

Se ejecutan mediante:

```bash
php artisan migrate
```

Para recrear completamente el entorno:

```bash
php artisan migrate:fresh --seed
```

---

# Seeders

Los seeders generan informaciÃ³n inicial para facilitar el desarrollo y las pruebas.

Se incluyen registros de:

- Usuarios.
- CategorÃ­as.
- Productos.
- Direcciones.
- Pedidos.
- Detalles de pedidos.
- ReseÃ±as.
- Carrito de compras.

---

# Enrutamiento

Las rutas del sistema se organizan principalmente en:

```text
routes/
â”œâ”€â”€ web.php
â”œâ”€â”€ console.php
```

Las rutas web gestionan:

- AutenticaciÃ³n.
- CatÃ¡logo.
- Productos.
- CategorÃ­as.
- Pedidos.
- Direcciones.
- ReseÃ±as.
- Panel administrativo.

La API REST se encuentra prevista como una etapa posterior del proyecto.

---

# AutenticaciÃ³n y AutorizaciÃ³n

El sistema implementa autenticaciÃ³n basada en sesiones utilizando los mecanismos provistos por Laravel.

El acceso a las funcionalidades privadas se controla mediante middleware.

Se distinguen dos tipos de usuarios:

- Cliente.
- Administrador.

Los administradores poseen permisos para gestionar el catÃ¡logo y actualizar el estado de los pedidos.

---

# Middleware

Los middleware permiten interceptar solicitudes antes de llegar a los controladores.

Se utilizan para:

- Verificar autenticaciÃ³n.
- Restringir acceso segÃºn el rol.
- Proteger el panel administrativo.

Esta estrategia evita duplicar validaciones dentro de los controladores.

---

# GestiÃ³n de Archivos

Los productos pueden almacenar imÃ¡genes asociadas.

Laravel administra estos recursos mediante el sistema de almacenamiento configurado para el proyecto.

Las vistas acceden a las imÃ¡genes utilizando las herramientas proporcionadas por el framework.

---

# Motor de Plantillas

La interfaz de usuario fue desarrollada utilizando **Blade Templates**.

Se emplean:

- Layouts reutilizables.
- Componentes compartidos.
- Directivas Blade.
- Secciones (`@section`).
- Herencia mediante `@extends`.

Esto permite mantener una interfaz consistente y reducir la duplicaciÃ³n de cÃ³digo.

---

# Front-End

El proyecto utiliza **Bootstrap** como framework CSS.

La compilaciÃ³n de recursos se realiza mediante **Vite**, integrado de forma nativa con Laravel.

El diseÃ±o busca ofrecer una experiencia de uso adecuada tanto en equipos de escritorio como en dispositivos mÃ³viles.

---

# ConfiguraciÃ³n del Entorno

La configuraciÃ³n de la aplicaciÃ³n se centraliza en el archivo `.env`.

Entre las variables mÃ¡s relevantes se encuentran:

- APP_NAME
- APP_ENV
- APP_KEY
- APP_DEBUG
- APP_URL
- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

El archivo `.env` no forma parte del repositorio por motivos de seguridad.

---

# Control de Versiones

El desarrollo del proyecto se gestionÃ³ utilizando Git.

Las principales prÃ¡cticas adoptadas fueron:

- Commits frecuentes.
- Repositorio remoto en GitHub.
- ExclusiÃ³n de archivos sensibles mediante `.gitignore`.
- Versionado de la documentaciÃ³n junto con el cÃ³digo fuente.

---

# DocumentaciÃ³n TÃ©cnica

Toda la documentaciÃ³n se encuentra desarrollada en formato Markdown y organizada dentro de la carpeta `docs`.

La documentaciÃ³n incluye:

- Relevamiento de requisitos.
- Arquitectura.
- Modelo de dominio.
- Base de datos.
- DER.
- Casos de uso.
- UML.
- Manual de instalaciÃ³n.
- Diccionario de datos.
- Diagramas Mermaid.

---

# Mantenimiento

Para mantener la documentaciÃ³n sincronizada con el proyecto se recomienda:

- Actualizar la documentaciÃ³n junto con cada cambio funcional.
- Mantener los diagramas Mermaid alineados con la implementaciÃ³n.
- Registrar nuevas entidades o relaciones en el diccionario de datos.
- Versionar toda modificaciÃ³n mediante Git.

---

# Mejoras Futuras

Entre las funcionalidades previstas para futuras versiones se encuentran:

- ImplementaciÃ³n de la API REST solicitada por la asignatura.
- DocumentaciÃ³n de la colecciÃ³n de Postman.
- IncorporaciÃ³n de pruebas automatizadas.
- Mejoras en la gestiÃ³n del carrito de compras.
- OptimizaciÃ³n de consultas mediante Eloquent.
- IncorporaciÃ³n de nuevas funcionalidades administrativas.

---

# DocumentaciÃ³n Relacionada

- [00_AnalisisRequisitos](00_AnalisisRequisitos.md)
- [01_Arquitectura](01_Arquitectura.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [05_CasosUso](05_CasosUso.md)
- [07_UML](07_UML.md)
- [09_ManualInstalacion](09_ManualInstalacion.md)
- [10_DiccionarioDatos](10_DiccionarioDatos.md)

---

# Consideraciones Finales

La implementaciÃ³n de **RincÃ³n del Pan** sigue las buenas prÃ¡cticas recomendadas por Laravel, manteniendo una estructura organizada, modular y fÃ¡cilmente mantenible.

La utilizaciÃ³n de **Laravel Framework 13**, **PHP 8.3**, **Eloquent ORM**, **Blade**, **Bootstrap**, **Migraciones** y **Seeders** permitiÃ³ desarrollar una aplicaciÃ³n consistente y alineada con los objetivos planteados durante la etapa de anÃ¡lisis.

La documentaciÃ³n tÃ©cnica acompaÃ±a al cÃ³digo fuente y constituye una herramienta fundamental para comprender la arquitectura del sistema, facilitar su mantenimiento y apoyar futuras ampliaciones del proyecto.

