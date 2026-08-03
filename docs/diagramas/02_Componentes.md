# ðŸ§© Componentes del Sistema

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Objetivo

Este diagrama representa los principales componentes que conforman la aplicaciÃ³n **RincÃ³n del Pan** y la forma en que interactÃºan entre sÃ­.

A diferencia del diagrama de Arquitectura MVC, este documento ofrece una visiÃ³n de alto nivel de los mÃ³dulos funcionales del sistema.

Complementa la documentaciÃ³n desarrollada en:

- [01_Arquitectura](../docs/01_Arquitectura.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Diagrama

```mermaid
flowchart LR

    U["ðŸ‘¤ Usuario"]

    subgraph Frontend
        B["ðŸ–¥ï¸ Blade Templates"]
        BS["ðŸŽ¨ Bootstrap"]
        V["âš¡ Vite"]
    end

    subgraph Backend
        R["ðŸŒ Routes"]
        MW["ðŸ›¡ï¸ Middleware"]
        C["ðŸŽ® Controllers"]
        M["ðŸ“¦ Models"]
        E["ðŸ”— Eloquent ORM"]
    end

    subgraph Persistencia
        DB[("ðŸ—„ï¸ MySQL")]
        MIG["ðŸ› ï¸ Migrations"]
        SD["ðŸŒ± Seeders"]
    end

    U --> B
    B --> BS
    B --> V

    B --> R

    R --> MW
    MW --> C
    C --> M
    M --> E
    E --> DB

    MIG --> DB
    SD --> DB
```

---

# DescripciÃ³n General

La aplicaciÃ³n se encuentra organizada en tres grandes bloques:

- Front-End
- Back-End
- Persistencia

Cada uno posee responsabilidades claramente definidas, favoreciendo la separaciÃ³n de responsabilidades y el mantenimiento del proyecto.

---

# Componentes

## ðŸ‘¤ Usuario

Representa al cliente o administrador que interactÃºa con el sistema mediante un navegador web.

Todas las acciones comienzan a partir de una solicitud realizada por el usuario.

---

## ðŸ–¥ï¸ Blade Templates

Las vistas fueron desarrolladas utilizando **Blade**, el motor de plantillas oficial de Laravel.

Responsabilidades:

- Mostrar informaciÃ³n.
- Renderizar formularios.
- Reutilizar layouts.
- Organizar componentes visuales.

---

## ðŸŽ¨ Bootstrap

Framework CSS utilizado para construir la interfaz grÃ¡fica.

Permite:

- DiseÃ±o responsive.
- Componentes reutilizables.
- Consistencia visual.

---

## âš¡ Vite

Administrador de recursos estÃ¡ticos utilizado por Laravel.

Se encarga de:

- Compilar CSS.
- Compilar JavaScript.
- Optimizar recursos.
- Recarga automÃ¡tica durante el desarrollo.

---

## ðŸŒ Routes

Definen las rutas disponibles de la aplicaciÃ³n.

Las solicitudes HTTP ingresan por este componente antes de ser derivadas al controlador correspondiente.

---

## ðŸ›¡ï¸ Middleware

Interceptan las solicitudes HTTP antes de llegar al controlador.

Implementan:

- AutenticaciÃ³n.
- AutorizaciÃ³n.
- RestricciÃ³n de acceso segÃºn el rol.

---

## ðŸŽ® Controllers

Coordinan la lÃ³gica de la aplicaciÃ³n.

Entre sus responsabilidades se encuentran:

- Procesar solicitudes.
- Consultar modelos.
- Validar informaciÃ³n.
- Retornar vistas.

---

## ðŸ“¦ Models

Representan las entidades del dominio utilizando **Eloquent ORM**.

Principales modelos:

- User
- Product
- Category
- Order
- OrderItem
- Review
- Address
- Wishlist *(utilizada como carrito de compras)*

---

## ðŸ”— Eloquent ORM

Capa de persistencia proporcionada por Laravel.

Permite:

- Consultar registros.
- Gestionar relaciones.
- Crear objetos.
- Actualizar informaciÃ³n.
- Eliminar registros.

Todo ello sin necesidad de escribir consultas SQL manuales.

---

## ðŸ—„ï¸ MySQL

Motor de base de datos utilizado para almacenar toda la informaciÃ³n del sistema.

La estructura se encuentra completamente versionada mediante migraciones.

---

## ðŸ› ï¸ Migrations

Definen el esquema de la base de datos.

Permiten:

- Crear tablas.
- Modificar estructuras.
- Versionar cambios.
- Reconstruir el esquema completo.

---

## ðŸŒ± Seeders

Generan informaciÃ³n inicial para facilitar el desarrollo y las pruebas.

Incluyen datos de ejemplo para:

- Usuarios.
- Productos.
- CategorÃ­as.
- Pedidos.
- Direcciones.
- ReseÃ±as.
- Carrito de compras.

---

# Flujo General

El funcionamiento de la aplicaciÃ³n puede resumirse de la siguiente manera:

1. El usuario interactÃºa con la interfaz.
2. Blade envÃ­a la solicitud.
3. Laravel resuelve la ruta correspondiente.
4. El Middleware valida permisos.
5. El Controller ejecuta la lÃ³gica.
6. Los Models consultan la base de datos mediante Eloquent.
7. La informaciÃ³n regresa al Controller.
8. Blade genera la respuesta HTML.
9. El navegador presenta el resultado al usuario.

---

# RelaciÃ³n con la Arquitectura

Este diagrama representa una vista lÃ³gica de los principales componentes del sistema.

Mientras que:

- [diagramas/01_ArquitecturaMVC](01_ArquitecturaMVC.md)

describe el patrÃ³n MVC,

este documento muestra cÃ³mo se relacionan los distintos mÃ³dulos que conforman la aplicaciÃ³n.

---

# DocumentaciÃ³n Relacionada

- [01_Arquitectura](../docs/01_Arquitectura.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)
- [diagramas/01_ArquitecturaMVC](01_ArquitecturaMVC.md)
- [diagramas/03_Deployment](03_Deployment.md)

---

# Consideraciones Finales

El proyecto **RincÃ³n del Pan** se apoya en los componentes principales del ecosistema Laravel para construir una aplicaciÃ³n modular y organizada.

La integraciÃ³n entre Blade, Bootstrap, Vite, Middleware, Controladores, Modelos, Eloquent ORM y MySQL permite implementar una arquitectura consistente, fÃ¡cilmente mantenible y alineada con las buenas prÃ¡cticas recomendadas por el framework.

