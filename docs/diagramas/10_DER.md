# ðŸ—„ï¸ Diagrama Entidadâ€“RelaciÃ³n (DER)

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# Objetivo

Este documento presenta el **Diagrama Entidadâ€“RelaciÃ³n (DER)** correspondiente a la base de datos del proyecto **RincÃ³n del Pan**.

El diagrama representa la estructura lÃ³gica del sistema, mostrando las entidades principales, sus atributos mÃ¡s relevantes y las relaciones existentes entre ellas.

Este modelo fue posteriormente implementado mediante **Laravel Migrations** y administrado utilizando **Eloquent ORM**.

---

# Diagrama

```mermaid
erDiagram

    USERS {
        bigint id PK
        string name
        string email
        string password
        string role
    }

    ADDRESSES {
        bigint id PK
        bigint user_id FK
        string street
        string city
        string province
        string postal_code
    }

    CATEGORIES {
        bigint id PK
        string name
        text description
    }

    PRODUCTS {
        bigint id PK
        string name
        text description
        decimal price
        integer stock
        string image
    }

    CATEGORY_PRODUCT {
        bigint product_id FK
        bigint category_id FK
    }

    ORDERS {
        bigint id PK
        bigint user_id FK
        bigint address_id FK
        decimal total
        string status
    }

    ORDER_ITEMS {
        bigint id PK
        bigint order_id FK
        bigint product_id FK
        integer quantity
        decimal unit_price
        decimal subtotal
    }

    REVIEWS {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
        integer rating
        text comment
    }

    WISHLISTS {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
        integer quantity
    }

    USERS ||--o{ ADDRESSES : posee

    USERS ||--o{ ORDERS : realiza

    USERS ||--o{ REVIEWS : escribe

    USERS ||--o{ WISHLISTS : agrega

    PRODUCTS ||--o{ REVIEWS : recibe

    PRODUCTS ||--o{ ORDER_ITEMS : pertenece

    PRODUCTS ||--o{ WISHLISTS : contiene

    ORDERS ||--|{ ORDER_ITEMS : incluye

    ADDRESSES ||--o{ ORDERS : destino

    PRODUCTS }o--o{ CATEGORIES : clasificado

    CATEGORY_PRODUCT }o--|| PRODUCTS : relacion

    CATEGORY_PRODUCT }o--|| CATEGORIES : relacion
```

---

# DescripciÃ³n de las Entidades

## Users

Almacena la informaciÃ³n de los usuarios registrados en el sistema.

Incluye tanto clientes como administradores, diferenciados mediante el atributo **role**.

---

## Addresses

Contiene las direcciones de envÃ­o asociadas a cada usuario.

Un usuario puede registrar mÃºltiples direcciones.

---

## Categories

Agrupa los productos del catÃ¡logo segÃºn distintos criterios comerciales.

---

## Products

Representa los productos disponibles para la venta.

Cada producto posee informaciÃ³n descriptiva, precio, stock e imagen.

---

## Category_Product

Tabla pivote encargada de implementar la relaciÃ³n **Muchos a Muchos** entre productos y categorÃ­as.

Permite que:

- un producto pertenezca a varias categorÃ­as;
- una categorÃ­a contenga mÃºltiples productos.

---

## Orders

Representa cada compra realizada por un cliente.

Cada pedido mantiene su estado mediante el atributo **status**.

---

## Order_Items

Detalle de productos pertenecientes a un pedido.

Cada registro almacena:

- producto
- cantidad
- precio unitario
- subtotal

---

## Reviews

Permite que los clientes califiquen y comenten productos adquiridos.

Cada reseÃ±a pertenece simultÃ¡neamente a un usuario y a un producto.

---

## Wishlists

Aunque conserva el nombre **wishlists**, esta entidad fue reutilizada durante el desarrollo para implementar el **carrito de compras** del sistema.

Cada registro representa un producto agregado por un usuario junto con la cantidad seleccionada.

---

# Relaciones Principales

| RelaciÃ³n | Cardinalidad |
|-----------|--------------|
| User â†’ Addresses | 1:N |
| User â†’ Orders | 1:N |
| User â†’ Reviews | 1:N |
| User â†’ Wishlists | 1:N |
| Order â†’ OrderItems | 1:N |
| Product â†’ OrderItems | 1:N |
| Product â†’ Reviews | 1:N |
| Product â†’ Wishlists | 1:N |
| Product â†” Category | N:M |

---

# Reglas de Negocio Representadas

El modelo contempla las siguientes reglas principales:

- Un usuario puede registrar mÃºltiples direcciones.
- Un usuario puede realizar mÃºltiples pedidos.
- Cada pedido pertenece a una Ãºnica direcciÃ³n de envÃ­o.
- Un pedido contiene uno o mÃ¡s productos.
- Un producto puede formar parte de mÃºltiples pedidos.
- Un producto puede pertenecer a mÃºltiples categorÃ­as.
- Un usuario puede agregar productos al carrito de compras.
- Un usuario puede publicar reseÃ±as sobre productos.

---

# Correspondencia con Laravel

El modelo fue implementado utilizando las siguientes caracterÃ­sticas del framework:

- Laravel Migrations.
- Foreign Keys.
- Eloquent ORM.
- Relaciones `hasMany()`.
- Relaciones `belongsTo()`.
- Relaciones `belongsToMany()`.
- Tabla pivote `category_product`.

---

# DocumentaciÃ³n Relacionada

Este diagrama complementa:

- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [10_DiccionarioDatos](../docs/10_DiccionarioDatos.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)

---

# Consideraciones Finales

El modelo entidadâ€“relaciÃ³n implementado en **RincÃ³n del Pan** constituye la base estructural del sistema, definiendo las entidades necesarias para gestionar usuarios, productos, pedidos, categorÃ­as, reseÃ±as, direcciones y el carrito de compras.

Su implementaciÃ³n mediante migraciones y relaciones Eloquent garantiza la integridad referencial de la base de datos y facilita la evoluciÃ³n futura del proyecto.

