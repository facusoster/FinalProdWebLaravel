# ðŸ—„ï¸ Diagrama Entidadâ€“RelaciÃ³n (DER)

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# IntroducciÃ³n

El presente documento describe el **Modelo Entidadâ€“RelaciÃ³n (DER)** implementado en **RincÃ³n del Pan**.

El DER constituye la representaciÃ³n lÃ³gica de la base de datos y muestra las entidades que conforman el sistema, sus atributos principales y las relaciones existentes entre ellas.

Este modelo fue diseÃ±ado durante la etapa de anÃ¡lisis y posteriormente implementado mediante **Migraciones** y **Eloquent ORM**, respetando la estructura relacional definida para el proyecto.

El diagrama detallado se encuentra documentado por separado para facilitar su mantenimiento.

âž¡ï¸ [diagramas/10_DER](../diagramas/10_DER.md)

---

# Objetivos

El diseÃ±o del modelo entidadâ€“relaciÃ³n persigue los siguientes objetivos:

- Representar correctamente el dominio del negocio.
- Mantener la integridad referencial.
- Reducir la redundancia de datos.
- Facilitar el mantenimiento de la base de datos.
- Favorecer la escalabilidad del sistema.
- Integrarse naturalmente con Eloquent ORM.

---

# Entidades Principales

El modelo de datos estÃ¡ compuesto por las siguientes entidades.

| Entidad | DescripciÃ³n |
|----------|-------------|
| **Users** | Usuarios registrados del sistema (clientes y administradores). |
| **Addresses** | Direcciones de envÃ­o pertenecientes a cada usuario. |
| **Products** | Productos comercializados por la tienda. |
| **Categories** | ClasificaciÃ³n de productos del catÃ¡logo. |
| **Orders** | Pedidos realizados por los clientes. |
| **OrderItems** | Productos incluidos dentro de un pedido. |
| **Reviews** | ReseÃ±as realizadas por los clientes. |
| **Wishlists** | Entidad utilizada como implementaciÃ³n del carrito de compras. |
| **Category_Product** | Tabla pivote que relaciona productos y categorÃ­as. |

---

# Relaciones

## Usuario â€” DirecciÃ³n

Un usuario puede registrar mÃºltiples direcciones de envÃ­o.

Cardinalidad:

```text
User (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Address
```

---

## Usuario â€” Pedido

Cada pedido pertenece a un Ãºnico usuario.

Cardinalidad:

```text
User (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Order
```

---

## DirecciÃ³n â€” Pedido

Cada pedido utiliza una Ãºnica direcciÃ³n de envÃ­o.

Una direcciÃ³n puede ser reutilizada en distintos pedidos.

Cardinalidad:

```text
Address (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Order
```

---

## Pedido â€” Detalle del Pedido

Cada pedido contiene uno o mÃ¡s productos.

Esta relaciÃ³n se implementa mediante la entidad **OrderItem**.

Cardinalidad:

```text
Order (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) OrderItem
```

---

## Producto â€” Detalle del Pedido

Un mismo producto puede formar parte de mÃºltiples pedidos.

Cardinalidad:

```text
Product (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) OrderItem
```

---

## Producto â€” CategorÃ­a

Los productos pueden pertenecer a mÃºltiples categorÃ­as y cada categorÃ­a puede contener mÃºltiples productos.

Se implementa mediante la tabla pivote:

```text
category_product
```

Cardinalidad:

```text
Product (N) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Category
```

---

## Usuario â€” ReseÃ±a

Cada usuario puede publicar mÃºltiples reseÃ±as.

Cardinalidad:

```text
User (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Review
```

---

## Producto â€” ReseÃ±a

Cada producto puede recibir mÃºltiples reseÃ±as.

Cardinalidad:

```text
Product (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Review
```

---

## Usuario â€” Carrito de Compras

La implementaciÃ³n actual utiliza la entidad **Wishlist** para representar el carrito de compras.

Cardinalidad:

```text
User (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Wishlist
```

---

## Producto â€” Carrito de Compras

Cada registro del carrito referencia un Ãºnico producto.

Cardinalidad:

```text
Product (1) â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ (N) Wishlist
```

---

# Relaciones Resumidas

| Entidad | Cardinalidad | Entidad |
|----------|--------------|----------|
| User | 1 : N | Address |
| User | 1 : N | Order |
| Address | 1 : N | Order |
| Order | 1 : N | OrderItem |
| Product | 1 : N | OrderItem |
| Product | N : M | Category |
| User | 1 : N | Review |
| Product | 1 : N | Review |
| User | 1 : N | Wishlist |
| Product | 1 : N | Wishlist |

---

# Integridad Referencial

El modelo implementa integridad referencial mediante claves forÃ¡neas administradas por Laravel.

Cada relaciÃ³n fue definida utilizando Migraciones y Eloquent ORM, garantizando la consistencia de los datos.

Las claves forÃ¡neas permiten:

- mantener relaciones vÃ¡lidas entre entidades;
- evitar registros huÃ©rfanos;
- facilitar la navegaciÃ³n mediante Eloquent;
- preservar la consistencia del modelo.

---

# NormalizaciÃ³n

El diseÃ±o de la base de datos sigue criterios de normalizaciÃ³n para minimizar redundancias y mantener la coherencia de la informaciÃ³n.

Entre las decisiones adoptadas se destacan:

- separaciÃ³n de entidades segÃºn responsabilidades;
- utilizaciÃ³n de tablas pivote para relaciones N:M;
- uso de claves primarias autoincrementales;
- utilizaciÃ³n de claves forÃ¡neas para mantener la integridad referencial.

---

# Correspondencia con Laravel

Cada entidad del DER posee un modelo Eloquent correspondiente dentro del proyecto.

Las relaciones fueron implementadas mediante:

- `hasMany()`
- `belongsTo()`
- `belongsToMany()`

Esta correspondencia mantiene sincronizado el modelo conceptual con la implementaciÃ³n realizada en Laravel.

---

# DocumentaciÃ³n Relacionada

Este documento se complementa con:

- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [07_UML](07_UML.md)
- [10_DiccionarioDatos](10_DiccionarioDatos.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Consideraciones Finales

El Modelo Entidadâ€“RelaciÃ³n representa la estructura lÃ³gica sobre la que se construyÃ³ la aplicaciÃ³n **RincÃ³n del Pan**.

La implementaciÃ³n mediante **Migraciones**, **Eloquent ORM** y **MySQL** permitiÃ³ mantener una correspondencia directa entre el anÃ¡lisis funcional, el modelo de dominio y la base de datos, facilitando el mantenimiento, la evoluciÃ³n del proyecto y la incorporaciÃ³n de nuevas funcionalidades.

