# ðŸ›ï¸ UML - Diagrama de Clases

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Clases

---

# Objetivo

Este diagrama representa la estructura estÃ¡tica del sistema **RincÃ³n del Pan**, mostrando las principales clases del dominio y las relaciones existentes entre ellas.

Se encuentra basado en los modelos implementados mediante **Eloquent ORM** y constituye la representaciÃ³n UML mÃ¡s importante del proyecto, ya que resume la organizaciÃ³n del dominio de negocio y su implementaciÃ³n dentro de Laravel.

---

# Diagrama

```mermaid
classDiagram

direction LR

class User{
    +id
    +name
    +email
    +role
}

class Address{
    +id
    +street
    +city
    +province
    +postal_code
}

class Category{
    +id
    +name
    +description
}

class Product{
    +id
    +name
    +description
    +price
    +stock
    +image
}

class Wishlist{
    +id
    +quantity
}

class Order{
    +id
    +total
    +status
}

class OrderItem{
    +id
    +quantity
    +unit_price
    +subtotal
}

class Review{
    +id
    +rating
    +comment
}

User "1" --> "*" Address : hasMany

User "1" --> "*" Order : hasMany

User "1" --> "*" Review : hasMany

User "1" --> "*" Wishlist : hasMany

Order "1" --> "*" OrderItem : contains

Order "*" --> "1" Address : ships_to

OrderItem "*" --> "1" Product : references

Product "*" --> "*" Category : belongsToMany

Product "1" --> "*" Review : hasMany

Product "1" --> "*" Wishlist : in_cart
```

---

# Clases Principales

## User

Representa a los usuarios registrados del sistema.

El atributo **role** diferencia:

- Cliente
- Administrador

Desde esta entidad se originan la mayorÃ­a de las operaciones del sistema.

---

## Address

Modela las direcciones de envÃ­o pertenecientes a un usuario.

Un cliente puede registrar mÃºltiples direcciones para utilizar durante el proceso de compra.

---

## Category

Agrupa los productos del catÃ¡logo segÃºn distintos criterios comerciales.

Un producto puede pertenecer a mÃºltiples categorÃ­as.

---

## Product

Representa los productos disponibles para la venta.

Contiene la informaciÃ³n comercial del catÃ¡logo:

- nombre;
- descripciÃ³n;
- precio;
- stock;
- imagen.

Es una de las clases centrales del dominio.

---

## Wishlist

Aunque conserva este nombre por cuestiones de implementaciÃ³n, esta clase representa el **carrito de compras** del sistema.

Cada instancia relaciona:

- un usuario;
- un producto;
- una cantidad seleccionada.

---

## Order

Representa una compra realizada por un cliente.

Cada pedido registra:

- usuario;
- direcciÃ³n;
- importe total;
- estado.

---

## OrderItem

Representa el detalle de un pedido.

Permite almacenar el precio histÃ³rico de cada producto en el momento de la compra.

---

## Review

Representa la valoraciÃ³n realizada por un cliente sobre un producto adquirido.

Incluye:

- puntuaciÃ³n;
- comentario.

---

# Relaciones

| RelaciÃ³n | Multiplicidad |
|-----------|---------------|
| User â†’ Address | 1:N |
| User â†’ Order | 1:N |
| User â†’ Review | 1:N |
| User â†’ Wishlist | 1:N |
| Order â†’ OrderItem | 1:N |
| Order â†’ Address | N:1 |
| Product â†” Category | N:M |
| Product â†’ Review | 1:N |
| Product â†’ Wishlist | 1:N |
| OrderItem â†’ Product | N:1 |

---

# Correspondencia con Laravel

Cada clase del diagrama corresponde directamente a un **Modelo Eloquent** implementado dentro de:

```text
app/Models/
```

Las asociaciones se implementan mediante:

- `hasMany()`
- `belongsTo()`
- `belongsToMany()`

La relaciÃ³n muchos a muchos entre **Product** y **Category** utiliza la tabla pivote:

```text
category_product
```

---

# Decisiones de DiseÃ±o

Durante el desarrollo se adoptaron las siguientes decisiones:

- Uso de **Eloquent ORM** para la persistencia de datos.
- SeparaciÃ³n de responsabilidades siguiendo el patrÃ³n MVC.
- ImplementaciÃ³n de relaciones mediante mÃ©todos Eloquent.
- ReutilizaciÃ³n de la entidad **Wishlist** para implementar el carrito de compras, evitando duplicar estructuras.
- GestiÃ³n del estado de los pedidos mediante un atributo especÃ­fico (`status`), documentado en el diagrama de estados.

---

# RelaciÃ³n con otros Diagramas

Este diagrama constituye el nÃºcleo de la documentaciÃ³n UML y se complementa con:

- [diagramas/10_DER](10_DER.md)
- [diagramas/11_ModeloDominio](11_ModeloDominio.md)
- [diagramas/22_UML_SecuenciaLogin](22_UML_SecuenciaLogin.md)
- [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md)
- [diagramas/24_UML_ActividadCompra](24_UML_ActividadCompra.md)
- [diagramas/25_UML_EstadosPedido](25_UML_EstadosPedido.md)

---

# DocumentaciÃ³n Relacionada

- [02_ModeloDominio](../docs/02_ModeloDominio.md)
- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [07_UML](../docs/07_UML.md)
- [10_DiccionarioDatos](../docs/10_DiccionarioDatos.md)

---

# Consideraciones Finales

El diagrama de clases resume la estructura lÃ³gica del proyecto **RincÃ³n del Pan**, mostrando las entidades del dominio implementadas mediante **Laravel Eloquent** y las relaciones que mantienen entre sÃ­.

Su objetivo es facilitar la comprensiÃ³n de la organizaciÃ³n interna del sistema y servir como referencia para futuras tareas de mantenimiento, evoluciÃ³n y ampliaciÃ³n de la aplicaciÃ³n.

