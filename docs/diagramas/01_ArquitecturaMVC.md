# ðŸ›ï¸ Arquitectura MVC

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32  
> **PatrÃ³n ArquitectÃ³nico:** Modelo - Vista - Controlador (MVC)

---

# Objetivo

Este diagrama representa la arquitectura general de **RincÃ³n del Pan**, desarrollada siguiendo el patrÃ³n **MVC (Modelâ€“Viewâ€“Controller)** propuesto por Laravel.

Su propÃ³sito es mostrar el flujo de una solicitud desde que un usuario interactÃºa con la aplicaciÃ³n hasta que se genera la respuesta HTML correspondiente.

Este diagrama complementa la explicaciÃ³n desarrollada en [01_Arquitectura](../docs/01_Arquitectura.md).

---

# Diagrama

```mermaid
flowchart LR

    A["ðŸ‘¤ Usuario"] --> B["ðŸŒ Routes<br/>routes/web.php"]

    B --> C["ðŸ›¡ï¸ Middleware"]

    C --> D["ðŸŽ® Controllers"]

    D --> E["ðŸ“¦ Models<br/>Eloquent ORM"]

    E --> F[("ðŸ—„ï¸ MySQL")]

    D --> G["ðŸ–¥ï¸ Blade Views"]

    G --> H["ðŸ“„ HTML"]

    H --> A

    D -. Utiliza .-> I["ðŸ“„ Form Requests"]

    D -. Consulta .-> J["âš™ï¸ Config"]

    K["ðŸ› ï¸ Migrations"] --> F

    L["ðŸŒ± Seeders"] --> F
```

---

# DescripciÃ³n del Flujo

El procesamiento de una solicitud dentro del sistema sigue las siguientes etapas:

1. El usuario realiza una peticiÃ³n desde el navegador.
2. Laravel identifica la ruta correspondiente en `routes/web.php`.
3. Los **Middleware** verifican autenticaciÃ³n y permisos antes de permitir el acceso.
4. El **Controller** recibe la solicitud y coordina la lÃ³gica de negocio.
5. Cuando es necesario acceder a informaciÃ³n persistente, el controlador utiliza los **Models**, que interactÃºan con la base de datos mediante **Eloquent ORM**.
6. El controlador obtiene los datos necesarios y los envÃ­a a una **Vista Blade**.
7. Blade genera el HTML final que serÃ¡ enviado nuevamente al navegador.

---

# Componentes

## ðŸ‘¤ Usuario

Representa al actor que interactÃºa con el sistema mediante un navegador web.

Puede tratarse de:

- Cliente
- Administrador

---

## ðŸŒ Routes

Las rutas definen los puntos de entrada de la aplicaciÃ³n.

Su funciÃ³n consiste en asociar una URL con el controlador responsable de procesar la solicitud.

Archivo principal:

```text
routes/web.php
```

---

## ðŸ›¡ï¸ Middleware

Los Middleware interceptan las solicitudes HTTP antes de llegar al controlador.

Entre sus responsabilidades se encuentran:

- Verificar autenticaciÃ³n.
- Validar permisos.
- Restringir el acceso al panel administrativo.

---

## ðŸŽ® Controllers

Los controladores implementan la lÃ³gica de aplicaciÃ³n.

Sus responsabilidades incluyen:

- Recibir solicitudes HTTP.
- Validar informaciÃ³n.
- Coordinar la lÃ³gica de negocio.
- Consultar modelos.
- Seleccionar la vista correspondiente.

---

## ðŸ“¦ Models

Los modelos representan las entidades del dominio.

La persistencia se implementa mediante **Eloquent ORM**, permitiendo trabajar con objetos en lugar de consultas SQL directas.

Los principales modelos del proyecto son:

- User
- Address
- Category
- Product
- Order
- OrderItem
- Review
- Wishlist *(utilizada como carrito de compras)*

---

## ðŸ—„ï¸ Base de Datos

Toda la informaciÃ³n se almacena en una base de datos **MySQL**.

La estructura se administra mediante:

- Migraciones
- Seeders
- Relaciones Eloquent

---

## ðŸ–¥ï¸ Blade Views

Blade es el motor de plantillas utilizado por Laravel.

Permite:

- Reutilizar layouts.
- Crear componentes.
- Organizar vistas.
- Separar presentaciÃ³n y lÃ³gica.

---

## ðŸ“„ Form Requests

Las validaciones de formularios se implementan mediante **Form Requests**, manteniendo los controladores limpios y favoreciendo la reutilizaciÃ³n de reglas de validaciÃ³n.

---

## âš™ï¸ ConfiguraciÃ³n

Laravel centraliza la configuraciÃ³n del sistema mediante:

- Archivos ubicados en `config/`
- Variables definidas en `.env`

Esto permite desacoplar la configuraciÃ³n del cÃ³digo fuente.

---

## ðŸ› ï¸ Migraciones

Las migraciones permiten construir la estructura completa de la base de datos desde cero.

Facilitan el versionado del esquema y el trabajo colaborativo.

---

## ðŸŒ± Seeders

Los Seeders generan informaciÃ³n inicial para el desarrollo y las pruebas.

Incluyen registros de:

- Usuarios
- CategorÃ­as
- Productos
- Direcciones
- Pedidos
- ReseÃ±as
- Carrito de compras

---

# CaracterÃ­sticas de la Arquitectura

La implementaciÃ³n sigue las recomendaciones oficiales de Laravel:

- SeparaciÃ³n clara de responsabilidades.
- Uso de Eloquent ORM.
- Motor de plantillas Blade.
- Middleware para autenticaciÃ³n y autorizaciÃ³n.
- Migraciones versionadas.
- Seeders para datos de prueba.
- ConfiguraciÃ³n mediante variables de entorno.
- OrganizaciÃ³n modular del proyecto.

---

# DocumentaciÃ³n Relacionada

- [01_Arquitectura](../docs/01_Arquitectura.md)
- [02_ModeloDominio](../docs/02_ModeloDominio.md)
- [03_BaseDatos](../docs/03_BaseDatos.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

La arquitectura implementada en **RincÃ³n del Pan** adopta el patrÃ³n **MVC** propuesto por Laravel, promoviendo una estructura organizada, mantenible y escalable.

La separaciÃ³n entre rutas, middleware, controladores, modelos, vistas y base de datos facilita la evoluciÃ³n del proyecto y permite incorporar nuevas funcionalidades respetando las buenas prÃ¡cticas del framework.

