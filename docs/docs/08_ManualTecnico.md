# ⚙️ Manual Técnico

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32  
> **Patrón Arquitectónico:** Modelo - Vista - Controlador (MVC)

---

# Introducción

Este documento describe los aspectos técnicos más relevantes de la implementación del proyecto **Rincón del Pan**.

Su objetivo es proporcionar una visión general de la estructura del sistema, las tecnologías utilizadas y las decisiones adoptadas durante el desarrollo, facilitando el mantenimiento, la comprensión del código y la incorporación de futuras funcionalidades.

---

# Tecnologías Utilizadas

| Tecnología | Versión |
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
| phpMyAdmin | Administración de MySQL |
| Obsidian | Documentación técnica |
| Mermaid | Diagramas |

---

# Arquitectura

El proyecto sigue el patrón **Modelo - Vista - Controlador (MVC)** recomendado por Laravel.

Cada componente posee una responsabilidad específica:

- **Modelos**: representan las entidades del dominio y gestionan el acceso a la base de datos mediante Eloquent ORM.
- **Vistas**: implementadas con Blade Templates para la presentación de la información.
- **Controladores**: reciben las solicitudes HTTP, coordinan la lógica de negocio y generan la respuesta correspondiente.

La documentación completa de la arquitectura puede consultarse en:

- [01_Arquitectura](docs/docs/01_Arquitectura.md)

---

# Organización del Proyecto

La estructura principal del proyecto sigue las convenciones establecidas por Laravel.

```text
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   └── Requests/
│
├── Models/
│
bootstrap/
config/
database/
│
├── factories/
├── migrations/
└── seeders/
│
public/
resources/
│
├── css/
├── js/
└── views/
│
routes/
storage/
tests/
```

Esta organización facilita la separación de responsabilidades y mejora la mantenibilidad del código.

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
- Asignación masiva mediante `fillable`.
- Conversión de atributos mediante `casts` cuando corresponde.
- Métodos de navegación entre relaciones.

---

# Base de Datos

La persistencia se implementa mediante **MySQL** utilizando **Eloquent ORM**.

La estructura de la base de datos se encuentra completamente versionada mediante:

- Migraciones.
- Seeders.

La documentación correspondiente puede consultarse en:

- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [10_DiccionarioDatos](docs/docs/10_DiccionarioDatos.md)

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

Los seeders generan información inicial para facilitar el desarrollo y las pruebas.

Se incluyen registros de:

- Usuarios.
- Categorías.
- Productos.
- Direcciones.
- Pedidos.
- Detalles de pedidos.
- Reseñas.
- Carrito de compras.

---

# Enrutamiento

Las rutas del sistema se organizan principalmente en:

```text
routes/
├── web.php
├── console.php
```

Las rutas web gestionan:

- Autenticación.
- Catálogo.
- Productos.
- Categorías.
- Pedidos.
- Direcciones.
- Reseñas.
- Panel administrativo.

La API REST se encuentra prevista como una etapa posterior del proyecto.

---

# Autenticación y Autorización

El sistema implementa autenticación basada en sesiones utilizando los mecanismos provistos por Laravel.

El acceso a las funcionalidades privadas se controla mediante middleware.

Se distinguen dos tipos de usuarios:

- Cliente.
- Administrador.

Los administradores poseen permisos para gestionar el catálogo y actualizar el estado de los pedidos.

---

# Middleware

Los middleware permiten interceptar solicitudes antes de llegar a los controladores.

Se utilizan para:

- Verificar autenticación.
- Restringir acceso según el rol.
- Proteger el panel administrativo.

Esta estrategia evita duplicar validaciones dentro de los controladores.

---

# Gestión de Archivos

Los productos pueden almacenar imágenes asociadas.

Laravel administra estos recursos mediante el sistema de almacenamiento configurado para el proyecto.

Las vistas acceden a las imágenes utilizando las herramientas proporcionadas por el framework.

---

# Motor de Plantillas

La interfaz de usuario fue desarrollada utilizando **Blade Templates**.

Se emplean:

- Layouts reutilizables.
- Componentes compartidos.
- Directivas Blade.
- Secciones (`@section`).
- Herencia mediante `@extends`.

Esto permite mantener una interfaz consistente y reducir la duplicación de código.

---

# Front-End

El proyecto utiliza **Bootstrap** como framework CSS.

La compilación de recursos se realiza mediante **Vite**, integrado de forma nativa con Laravel.

El diseño busca ofrecer una experiencia de uso adecuada tanto en equipos de escritorio como en dispositivos móviles.

---

# Configuración del Entorno

La configuración de la aplicación se centraliza en el archivo `.env`.

Entre las variables más relevantes se encuentran:

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

El desarrollo del proyecto se gestionó utilizando Git.

Las principales prácticas adoptadas fueron:

- Commits frecuentes.
- Repositorio remoto en GitHub.
- Exclusión de archivos sensibles mediante `.gitignore`.
- Versionado de la documentación junto con el código fuente.

---

# Documentación Técnica

Toda la documentación se encuentra desarrollada en formato Markdown y organizada dentro de la carpeta `docs`.

La documentación incluye:

- Relevamiento de requisitos.
- Arquitectura.
- Modelo de dominio.
- Base de datos.
- DER.
- Casos de uso.
- UML.
- Manual de instalación.
- Diccionario de datos.
- Diagramas Mermaid.

---

# Mantenimiento

Para mantener la documentación sincronizada con el proyecto se recomienda:

- Actualizar la documentación junto con cada cambio funcional.
- Mantener los diagramas Mermaid alineados con la implementación.
- Registrar nuevas entidades o relaciones en el diccionario de datos.
- Versionar toda modificación mediante Git.

---

# Mejoras Futuras

Entre las funcionalidades previstas para futuras versiones se encuentran:

- Implementación de la API REST solicitada por la asignatura.
- Documentación de la colección de Postman.
- Incorporación de pruebas automatizadas.
- Mejoras en la gestión del carrito de compras.
- Optimización de consultas mediante Eloquent.
- Incorporación de nuevas funcionalidades administrativas.

---

# Documentación Relacionada

- [00_AnalisisRequisitos](docs/docs/00_AnalisisRequisitos.md)
- [01_Arquitectura](docs/docs/01_Arquitectura.md)
- [02_ModeloDominio](docs/docs/02_ModeloDominio.md)
- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [05_CasosUso](docs/docs/05_CasosUso.md)
- [07_UML](docs/07_UML.md)
- [09_ManualInstalacion](docs/docs/09_ManualInstalacion.md)
- [10_DiccionarioDatos](docs/docs/10_DiccionarioDatos.md)

---

# Consideraciones Finales

La implementación de **Rincón del Pan** sigue las buenas prácticas recomendadas por Laravel, manteniendo una estructura organizada, modular y fácilmente mantenible.

La utilización de **Laravel Framework 13**, **PHP 8.3**, **Eloquent ORM**, **Blade**, **Bootstrap**, **Migraciones** y **Seeders** permitió desarrollar una aplicación consistente y alineada con los objetivos planteados durante la etapa de análisis.

La documentación técnica acompaña al código fuente y constituye una herramienta fundamental para comprender la arquitectura del sistema, facilitar su mantenimiento y apoyar futuras ampliaciones del proyecto.
