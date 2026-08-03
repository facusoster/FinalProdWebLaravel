# ðŸ›ï¸ Arquitectura del Sistema

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# IntroducciÃ³n

La arquitectura de **RincÃ³n del Pan** fue diseÃ±ada siguiendo el patrÃ³n **Modelo - Vista - Controlador (MVC)** propuesto por Laravel.

Esta arquitectura permite separar claramente las responsabilidades de cada componente del sistema, facilitando el mantenimiento del cÃ³digo, la reutilizaciÃ³n de componentes y la escalabilidad de la aplicaciÃ³n.

Laravel proporciona una estructura organizada para el desarrollo de aplicaciones web modernas, integrando herramientas para autenticaciÃ³n, acceso a datos, enrutamiento, validaciones, middleware y renderizado de vistas.

---

# Objetivos de la Arquitectura

La arquitectura del proyecto busca:

- Separar la lÃ³gica de negocio de la interfaz de usuario.
- Mantener una organizaciÃ³n clara del cÃ³digo fuente.
- Facilitar el mantenimiento y la evoluciÃ³n del sistema.
- Aprovechar las funcionalidades nativas del framework Laravel.
- Centralizar el acceso a la base de datos mediante Eloquent ORM.
- Implementar un sistema seguro de autenticaciÃ³n y autorizaciÃ³n.
- Favorecer la reutilizaciÃ³n de componentes.

---

# PatrÃ³n MVC

El proyecto implementa el patrÃ³n **Modelo - Vista - Controlador (MVC)**.

## Modelo (Model)

Los modelos representan las entidades del dominio y encapsulan el acceso a la base de datos mediante **Eloquent ORM**.

Entre sus responsabilidades se encuentran:

- Definir relaciones entre entidades.
- Gestionar la persistencia de datos.
- Configurar atributos (`fillable`, `casts`, etc.).
- Representar el modelo de negocio.

Modelos principales:

- User
- Address
- Product
- Category
- Order
- OrderItem
- Review
- Wishlist *(utilizada como carrito de compras)*

---

## Vista (View)

La capa de presentaciÃ³n fue desarrollada utilizando **Blade Templates**, el motor de plantillas incluido en Laravel.

Las vistas permiten:

- Reutilizar componentes mediante layouts.
- Mantener una interfaz consistente.
- Separar la presentaciÃ³n de la lÃ³gica del negocio.

La interfaz utiliza **Bootstrap** para proporcionar un diseÃ±o responsive y una experiencia de usuario homogÃ©nea.

---

## Controlador (Controller)

Los controladores reciben las solicitudes HTTP, coordinan la lÃ³gica de la aplicaciÃ³n y devuelven la respuesta correspondiente.

Sus principales responsabilidades son:

- Procesar solicitudes.
- Validar datos de entrada.
- Invocar modelos.
- Renderizar vistas.
- Gestionar redirecciones.

Ejemplos de controladores implementados:

- AuthController
- ProductController
- CategoryController
- OrderController
- ReviewController
- WishlistController
- AddressController

---

# Arquitectura General

La interacciÃ³n entre los distintos componentes puede resumirse de la siguiente manera:

```text
Cliente
    â”‚
    â–¼
Routes (web.php)
    â”‚
    â–¼
Controllers
    â”‚
    â–¼
Models (Eloquent ORM)
    â”‚
    â–¼
MySQL
    â”‚
    â–²
Blade Views
    â”‚
    â–²
Respuesta HTTP
```

El flujo de ejecuciÃ³n comienza con una solicitud del usuario, continÃºa mediante las rutas definidas en Laravel, es procesado por el controlador correspondiente y, cuando es necesario, interactÃºa con la base de datos mediante Eloquent ORM antes de devolver una vista al navegador.

---

# Componentes Principales

## Rutas

Las rutas constituyen el punto de entrada de la aplicaciÃ³n.

Se organizan principalmente en:

- `routes/web.php`
- `routes/console.php`

Las rutas permiten asociar cada URL con el controlador correspondiente y aplicar middleware cuando es necesario.

---

## Middleware

Los middleware permiten interceptar las solicitudes HTTP antes de que lleguen al controlador.

En el proyecto se utilizan para:

- Verificar autenticaciÃ³n.
- Restringir acceso segÃºn el rol del usuario.
- Proteger funcionalidades administrativas.

Esta separaciÃ³n evita duplicar controles de seguridad dentro de los controladores.

---

## Eloquent ORM

Toda la persistencia de datos se implementa mediante **Eloquent ORM**.

Las principales ventajas de esta aproximaciÃ³n son:

- Consultas orientadas a objetos.
- Relaciones entre modelos.
- IntegraciÃ³n con migraciones.
- Mayor legibilidad del cÃ³digo.
- Independencia respecto del motor de base de datos.

---

## Migraciones

La estructura de la base de datos se administra mediante migraciones versionadas.

Esto permite:

- Crear la base de datos desde cero.
- Mantener un historial de cambios.
- Compartir la estructura entre todos los integrantes del proyecto.
- Automatizar el despliegue en distintos entornos.

---

## Seeders

Los seeders generan informaciÃ³n inicial para facilitar las pruebas del sistema.

Incluyen datos como:

- Usuarios.
- CategorÃ­as.
- Productos.
- Direcciones.
- Pedidos.
- ReseÃ±as.

Esto permite disponer rÃ¡pidamente de un entorno funcional para desarrollo y demostraciÃ³n.

---

# Seguridad

Laravel incorpora mÃºltiples mecanismos de seguridad utilizados por el proyecto.

Entre ellos:

- ProtecciÃ³n CSRF.
- Hash seguro de contraseÃ±as mediante Bcrypt.
- GestiÃ³n de sesiones.
- Middleware de autenticaciÃ³n.
- AutorizaciÃ³n basada en roles.
- ProtecciÃ³n frente a asignaciÃ³n masiva mediante `fillable`.

---

# OrganizaciÃ³n del Proyecto

La estructura principal del proyecto sigue la organizaciÃ³n recomendada por Laravel.

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

Esta organizaciÃ³n facilita la separaciÃ³n de responsabilidades y mantiene una estructura consistente durante todo el desarrollo.

---

# Principios Aplicados

Durante el desarrollo se procurÃ³ respetar las siguientes buenas prÃ¡cticas:

- SeparaciÃ³n de responsabilidades.
- ReutilizaciÃ³n de componentes.
- OrganizaciÃ³n modular.
- Uso del ORM de Laravel.
- Evitar consultas SQL embebidas.
- ConfiguraciÃ³n mediante archivos `.env`.
- Control de versiones con Git.
- DocumentaciÃ³n paralela al desarrollo.

---

# RelaciÃ³n con la DocumentaciÃ³n

La arquitectura presentada en este documento se complementa con los siguientes apartados de la documentaciÃ³n:

- [00_AnalisisRequisitos](00_AnalisisRequisitos.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [07_UML](07_UML.md)
- [08_ManualTecnico](08_ManualTecnico.md)

Los diagramas correspondientes pueden consultarse en:

- [diagramas/01_ArquitecturaMVC](../diagramas/01_ArquitecturaMVC.md)
- [diagramas/02_Componentes](../diagramas/02_Componentes.md)
- [diagramas/03_Deployment](../diagramas/03_Deployment.md)

---

# Consideraciones Finales

La arquitectura de **RincÃ³n del Pan** se apoya en las convenciones establecidas por Laravel, aprovechando las herramientas que ofrece el framework para desarrollar una aplicaciÃ³n organizada, mantenible y escalable.

La adopciÃ³n del patrÃ³n MVC, junto con Eloquent ORM, Blade Templates, Middleware y Migraciones, permitiÃ³ estructurar el proyecto de forma consistente y mantener una clara separaciÃ³n entre la lÃ³gica de negocio, el acceso a los datos y la presentaciÃ³n.

Este enfoque facilita futuras ampliaciones del sistema y simplifica tanto el mantenimiento como la incorporaciÃ³n de nuevas funcionalidades.

