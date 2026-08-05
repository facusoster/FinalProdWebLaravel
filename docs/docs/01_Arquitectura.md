# 🏛️ Arquitectura del Sistema

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Introducción

La arquitectura de **Rincón del Pan** fue diseñada siguiendo el patrón **Modelo - Vista - Controlador (MVC)** propuesto por Laravel.

Esta arquitectura permite separar claramente las responsabilidades de cada componente del sistema, facilitando el mantenimiento del código, la reutilización de componentes y la escalabilidad de la aplicación.

Laravel proporciona una estructura organizada para el desarrollo de aplicaciones web modernas, integrando herramientas para autenticación, acceso a datos, enrutamiento, validaciones, middleware y renderizado de vistas.

---

# Objetivos de la Arquitectura

La arquitectura del proyecto busca:

- Separar la lógica de negocio de la interfaz de usuario.
- Mantener una organización clara del código fuente.
- Facilitar el mantenimiento y la evolución del sistema.
- Aprovechar las funcionalidades nativas del framework Laravel.
- Centralizar el acceso a la base de datos mediante Eloquent ORM.
- Implementar un sistema seguro de autenticación y autorización.
- Favorecer la reutilización de componentes.
- Facilitar la incorporación de nuevos módulos sin afectar la arquitectura existente.

---

# Patrón MVC

El proyecto implementa el patrón **Modelo - Vista - Controlador (MVC)**.

## Modelo (Model)

Los modelos representan las entidades del dominio y encapsulan el acceso a la base de datos mediante **Eloquent ORM**.

Entre sus responsabilidades se encuentran:

- Definir relaciones entre entidades.
- Gestionar la persistencia de datos.
- Configurar atributos (`fillable`, `casts`, etc.).
- Representar las reglas del dominio.
- Utilizar Enumerations (Enum) para atributos con estados controlados, como el estado de los pedidos.

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

La capa de presentación fue desarrollada utilizando **Blade Templates**, el motor de plantillas incluido en Laravel.

Las vistas permiten:

- Reutilizar componentes mediante layouts.
- Mantener una interfaz consistente.
- Separar la presentación de la lógica del negocio.
- Mostrar mensajes de validación y errores de forma uniforme.

La interfaz utiliza **Bootstrap** para proporcionar un diseño responsive y una experiencia de usuario homogénea.

---

## Controlador (Controller)

Los controladores reciben las solicitudes HTTP, coordinan la lógica de la aplicación y devuelven la respuesta correspondiente.

Sus principales responsabilidades son:

- Procesar solicitudes HTTP.
- Delegar la lógica de negocio.
- Invocar modelos Eloquent.
- Renderizar vistas Blade.
- Devolver respuestas JSON en los endpoints de la API REST.
- Gestionar redirecciones.

Ejemplos de controladores implementados:

- AuthController
- ProductController
- CategoryController
- OrderController
- ReviewController
- WishlistController
- AddressController
- Api\ProductApiController

---

# Arquitectura General

La interacción entre los distintos componentes puede resumirse de la siguiente manera:

```text
                Navegador Web
                      │
        ┌─────────────┴─────────────┐
        │                           │
        ▼                           ▼
 routes/web.php              routes/api.php
        │                           │
        └─────────────┬─────────────┘
                      ▼
                 Middleware
                      │
                      ▼
                 Controllers
                      │
                      ▼
              Models (Eloquent)
                      │
                      ▼
                    MySQL
                      ▲
                      │
          Blade Views / JSON Response
                      │
                      ▼
              Respuesta HTTP
```

El flujo comienza con una solicitud del cliente. Dependiendo del tipo de recurso solicitado, Laravel direcciona la petición hacia las rutas web o hacia los endpoints de la API. Luego de atravesar los middleware correspondientes, el controlador ejecuta la lógica necesaria, interactúa con los modelos Eloquent y devuelve una vista Blade o una respuesta JSON.

---

# Componentes Principales

## Rutas

Las rutas constituyen el punto de entrada de la aplicación.

Se organizan principalmente en:

- `routes/web.php`
- `routes/api.php`
- `routes/console.php`

Las rutas permiten asociar cada URL con el controlador correspondiente y aplicar middleware cuando es necesario.

---

## Middleware

Los middleware permiten interceptar las solicitudes HTTP antes de que lleguen al controlador.

En el proyecto se utilizan para:

- Verificar autenticación.
- Restringir acceso según el rol del usuario.
- Proteger funcionalidades administrativas.
- Garantizar que únicamente usuarios autenticados puedan acceder al catálogo, realizar pedidos y consultar información privada.


Esta separación evita duplicar controles de seguridad dentro de los controladores.

---

## Eloquent ORM

Toda la persistencia de datos se implementa mediante **Eloquent ORM**.

Las principales ventajas de esta aproximación son:

- Consultas orientadas a objetos.
- Relaciones entre modelos.
- Integración con migraciones.
- Integración con Seeders y Factories.
- Mayor legibilidad del código.
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

Los seeders generan información inicial para facilitar las pruebas del sistema.

Incluyen datos como:

- Usuarios (Administrador y Cliente).
- Categorías.
- Productos.
- Direcciones.
- Pedidos con distintos estados.
- Reseñas.

Esto permite disponer rápidamente de un entorno funcional para desarrollo y demostración.

---

## API REST

Como complemento de la aplicación web, el proyecto incorpora una API REST desarrollada utilizando los componentes nativos de Laravel.

Actualmente expone endpoints para:

- Listado de productos.
- Detalle de productos.
- Consulta de pedidos del usuario autenticado.

Las respuestas se generan en formato **JSON**, utilizando los códigos de estado HTTP correspondientes.

---


# Seguridad

Laravel incorpora múltiples mecanismos de seguridad utilizados por el proyecto.

Entre ellos:

- Protección CSRF.
- Hash seguro de contraseñas mediante Bcrypt.
- Gestión de sesiones.
- Middleware de autenticación.
- Autorización basada en roles.
- Protección frente a asignación masiva mediante `fillable`.
- Validaciones mediante Form Requests.
- Protección de rutas administrativas.

---

# Organización del Proyecto

La estructura principal del proyecto sigue la organización recomendada por Laravel.

```text
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
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
│
├── web.php
├── api.php
└── console.php
│
storage/
tests/
```

Esta organización facilita la separación de responsabilidades y mantiene una estructura consistente durante todo el desarrollo.

---

# Principios Aplicados

Durante el desarrollo se procuró respetar las siguientes buenas prácticas:

- Separación de responsabilidades.
- Arquitectura MVC.
- Reutilización de componentes.
- Organización modular.
- Uso del ORM de Laravel.
- Evitar consultas SQL embebidas.
- Configuración mediante archivos `.env`.
- Uso de migraciones, seeders y factories.
- Control de versiones con Git.
- Documentación paralela al desarrollo.


---

# Relación con la Documentación

La arquitectura presentada en este documento se complementa con los siguientes apartados de la documentación:

- [00_AnalisisRequisitos](./00_AnalisisRequisitos.md)
- [02_ModeloDominio](./02_ModeloDominio.md)
- [03_BaseDatos](./03_BaseDatos.md)
- [04_DER](./04_DER.md)
- [06_API_REST](./06_API_REST.md)
- [07_UML](./07_UML.md)
- [08_ManualTecnico](./08_ManualTecnico.md)

Los diagramas correspondientes pueden consultarse en:

- [diagramas/01_ArquitecturaMVC](../diagramas/01_ArquitecturaMVC.md)
- [diagramas/02_Componentes](../diagramas/02_Componentes.md)
- [diagramas/03_Deployment](../diagramas/03_Deployment.md)

---

# Consideraciones Finales

La arquitectura de **Rincón del Pan** se apoya en las convenciones establecidas por Laravel, aprovechando las herramientas que ofrece el framework para desarrollar una aplicación organizada, mantenible y escalable.

La adopción del patrón MVC, junto con Eloquent ORM, Blade Templates, Middleware y Migraciones, permitió estructurar el proyecto de forma consistente y mantener una clara separación entre la lógica de negocio, el acceso a los datos y la presentación.

Este enfoque facilita futuras ampliaciones del sistema y simplifica tanto el mantenimiento como la incorporación de nuevas funcionalidades.
