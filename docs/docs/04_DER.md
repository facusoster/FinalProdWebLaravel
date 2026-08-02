# 🗂️ Diagrama Entidad-Relación (DER)

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[00_AnalisisRequisitos]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[03_BaseDatos]]
> - [[07_UML]]

---

# Introducción

El Diagrama Entidad-Relación (DER) representa la estructura lógica de la base de datos del proyecto **Sweet Store**.

Su propósito es mostrar las entidades que conforman el sistema, los atributos más relevantes y las relaciones existentes entre ellas, constituyendo el puente entre el análisis funcional y la implementación mediante Eloquent ORM.

El modelo fue diseñado durante la etapa de análisis y posteriormente implementado mediante migraciones de Laravel.

---

# Objetivos

El DER permite:

- Modelar las entidades del negocio.
- Definir las relaciones entre tablas.
- Garantizar la integridad referencial.
- Servir como base para la implementación mediante Eloquent ORM.
- Facilitar futuras tareas de mantenimiento.

---

# Entidades

El sistema se compone de las siguientes entidades:

| Entidad | Descripción |
|----------|-------------|
| Users | Usuarios registrados del sistema (clientes y administradores). |
| Addresses | Direcciones de envío de cada usuario. |
| Categories | Categorías del catálogo. |
| Products | Productos comercializados. |
| Category_Product | Tabla pivote entre categorías y productos. |
| Orders | Pedidos realizados por los clientes. |
| Order_Items | Productos pertenecientes a cada pedido. |
| Reviews | Reseñas realizadas por los clientes. |
| Wishlists | Lista de productos favoritos. |

---

# Relaciones

## User → Address

**Cardinalidad**

```text
1 : N
```

Un usuario puede registrar múltiples direcciones de envío.

---

## User → Orders

```text
1 : N
```

Cada pedido pertenece a un único usuario.

---

## User → Reviews

```text
1 : N
```

Un usuario puede realizar múltiples reseñas.

---

## User ↔ Product (Wishlist)

```text
N : M
```

Implementada mediante la tabla:

```text
wishlists
```

---

## Category ↔ Product

```text
N : M
```

Implementada mediante la tabla pivote:

```text
category_product
```

---

## Order → Order_Items

```text
1 : N
```

Cada pedido posee uno o más productos.

---

## Product → Order_Items

```text
1 : N
```

Un producto puede aparecer en múltiples pedidos.

---

## Product → Reviews

```text
1 : N
```

Cada producto puede recibir múltiples reseñas.

---

# Diagrama Conceptual

```text
                 User
                / |  \
               /  |   \
              /   |    \
     Address Orders Reviews
                 |
                 |
            Order_Items
                 |
              Product
             /      \
            /        \
     Categories    Wishlist
```

---

# Integridad Referencial

La base de datos implementa claves foráneas para garantizar la consistencia entre entidades.

Las relaciones fueron implementadas mediante:

- `foreignId()->constrained()`
- Restricciones de eliminación (`onDelete`)
- Relaciones Eloquent

---

# Reglas de Negocio

El modelo contempla las siguientes reglas:

- Un usuario puede tener múltiples direcciones.
- Un pedido pertenece a un único usuario.
- Un pedido contiene uno o más productos.
- Un producto puede pertenecer a múltiples categorías.
- Un producto puede formar parte de múltiples pedidos.
- Un usuario puede guardar múltiples productos en su Wishlist.
- Un usuario puede publicar reseñas sobre productos.
- Los pedidos siguen un flujo controlado de estados.

---

# Correspondencia con Laravel

Cada entidad del DER posee un modelo Eloquent asociado.

Las relaciones se implementan utilizando:

- belongsTo()
- hasMany()
- belongsToMany()

Esto mantiene una correspondencia directa entre el modelo conceptual y la implementación.

---

# Diagrama Definitivo

> [!todo]
>
> Incorporar aquí el DER definitivo exportado desde la herramienta de modelado utilizada durante el desarrollo (PNG, PDF o SVG).

---

# Diccionario de Datos

El detalle de atributos, claves primarias, claves foráneas y tipos de datos se encuentra documentado en [[03_BaseDatos]].

---

# Resumen

El DER constituye la representación formal del modelo de datos de Sweet Store y sirve como referencia para comprender la organización de la información y las relaciones implementadas mediante Laravel y MySQL.

---

## Documentación relacionada

- [[README]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[07_UML]]