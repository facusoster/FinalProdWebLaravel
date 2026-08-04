# 🗄️ Diagrama Entidad–Relación (DER)

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# Introducción

El presente documento describe el **Modelo Entidad–Relación (DER)** implementado en **Rincón del Pan**.

El DER constituye la representación lógica de la base de datos y muestra las entidades que conforman el sistema, sus atributos principales y las relaciones existentes entre ellas.

Este modelo fue diseñado durante la etapa de análisis y posteriormente implementado mediante **Migraciones** y **Eloquent ORM**, respetando la estructura relacional definida para el proyecto.

El diagrama detallado se encuentra documentado por separado para facilitar su mantenimiento.

➡️ [diagramas/10_DER](../diagramas/10_DER.md)

---

# Objetivos

El diseño del modelo entidad–relación persigue los siguientes objetivos:

- Representar correctamente el dominio del negocio.
- Mantener la integridad referencial.
- Reducir la redundancia de datos.
- Facilitar el mantenimiento de la base de datos.
- Favorecer la escalabilidad del sistema.
- Integrarse naturalmente con Eloquent ORM.

---

# Entidades Principales

El modelo de datos está compuesto por las siguientes entidades.

| Entidad | Descripción |
|----------|-------------|
| **Users** | Usuarios registrados del sistema (clientes y administradores). |
| **Addresses** | Direcciones de envío pertenecientes a cada usuario. |
| **Products** | Productos comercializados por la tienda. |
| **Categories** | Clasificación de productos del catálogo. |
| **Orders** | Pedidos realizados por los clientes. |
| **OrderItems** | Productos incluidos dentro de un pedido. |
| **Reviews** | Reseñas realizadas por los clientes. |
| **Wishlists** | Entidad utilizada como implementación del carrito de compras. |
| **Category_Product** | Tabla pivote que relaciona productos y categorías. |

---

# Relaciones

## Usuario — Dirección

Un usuario puede registrar múltiples direcciones de envío.

Cardinalidad:

```text
User (1) ──────────────── (N) Address
```

---

## Usuario — Pedido

Cada pedido pertenece a un único usuario.

Cardinalidad:

```text
User (1) ──────────────── (N) Order
```

---

## Dirección — Pedido

Cada pedido utiliza una única dirección de envío.

Una dirección puede ser reutilizada en distintos pedidos.

Cardinalidad:

```text
Address (1) ──────────────── (N) Order
```

---

## Pedido — Detalle del Pedido

Cada pedido contiene uno o más productos.

Esta relación se implementa mediante la entidad **OrderItem**.

Cardinalidad:

```text
Order (1) ──────────────── (N) OrderItem
```

---

## Producto — Detalle del Pedido

Un mismo producto puede formar parte de múltiples pedidos.

Cardinalidad:

```text
Product (1) ──────────────── (N) OrderItem
```

---

## Producto — Categoría

Los productos pueden pertenecer a múltiples categorías y cada categoría puede contener múltiples productos.

Se implementa mediante la tabla pivote:

```text
category_product
```

Cardinalidad:

```text
Product (N) ──────────────── (N) Category
```

---

## Usuario — Reseña

Cada usuario puede publicar múltiples reseñas.

Cardinalidad:

```text
User (1) ──────────────── (N) Review
```

---

## Producto — Reseña

Cada producto puede recibir múltiples reseñas.

Cardinalidad:

```text
Product (1) ──────────────── (N) Review
```

---

## Usuario — Carrito de Compras

La implementación actual utiliza la entidad **Wishlist** para representar el carrito de compras.

Cardinalidad:

```text
User (1) ──────────────── (N) Wishlist
```

---

## Producto — Carrito de Compras

Cada registro del carrito referencia un único producto.

Cardinalidad:

```text
Product (1) ──────────────── (N) Wishlist
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

El modelo implementa integridad referencial mediante claves foráneas administradas por Laravel.

Cada relación fue definida utilizando Migraciones y Eloquent ORM, garantizando la consistencia de los datos.

Las claves foráneas permiten:

- mantener relaciones válidas entre entidades;
- evitar registros huérfanos;
- facilitar la navegación mediante Eloquent;
- preservar la consistencia del modelo.

---

# Normalización

El diseño de la base de datos sigue criterios de normalización para minimizar redundancias y mantener la coherencia de la información.

Entre las decisiones adoptadas se destacan:

- separación de entidades según responsabilidades;
- utilización de tablas pivote para relaciones N:M;
- uso de claves primarias autoincrementales;
- utilización de claves foráneas para mantener la integridad referencial.

---

# Correspondencia con Laravel

Cada entidad del DER posee un modelo Eloquent correspondiente dentro del proyecto.

Las relaciones fueron implementadas mediante:

- `hasMany()`
- `belongsTo()`
- `belongsToMany()`

Esta correspondencia mantiene sincronizado el modelo conceptual con la implementación realizada en Laravel.

---

# Documentación Relacionada

Este documento se complementa con:

- [02_ModeloDominio](./02_ModeloDominio.md)
- [03_BaseDatos](./03_BaseDatos.md)
- [07_UML](./07_UML.md)
- [10_DiccionarioDatos](./10_DiccionarioDatos.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Consideraciones Finales

El Modelo Entidad–Relación representa la estructura lógica sobre la que se construyó la aplicación **Rincón del Pan**.

La implementación mediante **Migraciones**, **Eloquent ORM** y **MySQL** permitió mantener una correspondencia directa entre el análisis funcional, el modelo de dominio y la base de datos, facilitando el mantenimiento, la evolución del proyecto y la incorporación de nuevas funcionalidades.
