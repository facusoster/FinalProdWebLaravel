# 📚 Diccionario de Datos

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# Introducción

El presente documento describe las entidades que conforman la base de datos del proyecto **Rincón del Pan**, detallando el propósito de cada tabla, sus atributos principales y las relaciones existentes entre ellas.

El objetivo del diccionario de datos es servir como referencia técnica durante el mantenimiento y evolución del sistema, complementando el Diagrama Entidad–Relación (DER) y la implementación realizada mediante **Laravel Migrations** y **Eloquent ORM**.

---

# Convenciones

En las tablas siguientes se utilizan las siguientes abreviaturas:

| Abreviatura | Significado |
|-------------|-------------|
| PK | Clave primaria |
| FK | Clave foránea |
| NN | Campo obligatorio (Not Null) |
| AI | Autoincremental |

---

# Tabla: users

## Descripción

Almacena la información de los usuarios registrados en el sistema.

Incluye tanto clientes como administradores.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador del usuario |
| name | VARCHAR | NN | Nombre completo |
| email | VARCHAR | NN, UNIQUE | Correo electrónico |
| password | VARCHAR | NN | Contraseña cifrada |
| role | ENUM / VARCHAR | NN | Rol del usuario |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- 1:N con **addresses**
- 1:N con **orders**
- 1:N con **reviews**
- 1:N con **wishlists**

---

# Tabla: addresses

## Descripción

Almacena las direcciones de envío asociadas a cada usuario.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario propietario |
| street | VARCHAR | NN | Calle |
| city | VARCHAR | NN | Ciudad |
| province | VARCHAR | NN | Provincia |
| postal_code | VARCHAR | NN | Código postal |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:1 con **users**
- 1:N con **orders**

---

# Tabla: categories

## Descripción

Agrupa los productos del catálogo.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| name | VARCHAR | NN | Nombre de la categoría |
| description | TEXT | | Descripción |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:M con **products**

---

# Tabla: products

## Descripción

Representa los productos disponibles para la venta.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| name | VARCHAR | NN | Nombre del producto |
| description | TEXT | | Descripción |
| price | DECIMAL | NN | Precio |
| stock | INTEGER | NN | Stock disponible |
| image | VARCHAR | | Imagen |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:M con **categories**
- 1:N con **order_items**
- 1:N con **reviews**
- 1:N con **wishlists**

---

# Tabla: category_product

## Descripción

Tabla pivote que relaciona productos y categorías.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| product_id | BIGINT | PK, FK | Producto |
| category_id | BIGINT | PK, FK | Categoría |

## Relaciones

- N:1 con **products**
- N:1 con **categories**

---

# Tabla: orders

## Descripción

Representa las compras realizadas por los clientes.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Cliente |
| address_id | BIGINT | FK | Dirección de envío |
| total | DECIMAL | NN | Importe total |
| status | ENUM / VARCHAR | NN | Estado del pedido |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:1 con **users**
- N:1 con **addresses**
- 1:N con **order_items**

---

# Tabla: order_items

## Descripción

Detalle de productos incluidos en un pedido.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| order_id | BIGINT | FK | Pedido |
| product_id | BIGINT | FK | Producto |
| quantity | INTEGER | NN | Cantidad |
| unit_price | DECIMAL | NN | Precio unitario |
| subtotal | DECIMAL | NN | Subtotal |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:1 con **orders**
- N:1 con **products**

---

# Tabla: reviews

## Descripción

Almacena las reseñas realizadas por los clientes sobre los productos adquiridos.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario |
| product_id | BIGINT | FK | Producto |
| rating | INTEGER | NN | Puntuación |
| comment | TEXT | | Comentario |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:1 con **users**
- N:1 con **products**

---

# Tabla: wishlists

## Descripción

Entidad utilizada para implementar el **carrito de compras** del sistema.

> [!note]
> Aunque el nombre de la tabla es **wishlists**, funcionalmente representa el carrito de compras utilizado por los clientes durante el proceso de compra.

## Campos

| Campo | Tipo | Restricciones | Descripción |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario |
| product_id | BIGINT | FK | Producto |
| quantity | INTEGER | NN | Cantidad seleccionada |
| created_at | TIMESTAMP | | Fecha de creación |
| updated_at | TIMESTAMP | | Última modificación |

## Relaciones

- N:1 con **users**
- N:1 con **products**

---

# Estados del Pedido

La entidad **orders** implementa el estado de cada pedido mediante un **Enum de Laravel**, lo que garantiza que únicamente puedan asignarse valores válidos definidos por la aplicación.

Los estados implementados son los siguientes:

| Estado (Enum) | Descripción |
|---------------|-------------|
| `Pending` | Pedido registrado y pendiente de procesamiento. |
| `Processing` | Pedido en preparación o procesamiento. |
| `Sent` | Pedido despachado al cliente. |
| `Delivered` | Pedido entregado correctamente. |
| `Cancelled` | Pedido cancelado antes de su entrega. |

La lógica de negocio controla las transiciones permitidas entre estos estados mediante el Enum y los controladores de la aplicación.

La representación gráfica del ciclo de vida del pedido puede consultarse en:

➡️ [diagramas/25_UML_EstadosPedido](../diagramas/25_UML_EstadosPedido.md)

---

# Resumen General

| Tabla | Propósito |
|--------|-----------|
| users | Usuarios del sistema |
| addresses | Direcciones de envío |
| categories | Categorías del catálogo |
| products | Productos disponibles |
| category_product | Relación productos-categorías |
| orders | Pedidos |
| order_items | Detalle de pedidos |
| reviews | Reseñas |
| wishlists | Carrito de compras |

---

# Documentación Relacionada

Este documento complementa la siguiente documentación:

- [00_AnalisisRequisitos](./00_AnalisisRequisitos.md)
- [01_Arquitectura](./01_Arquitectura.md)
- [02_ModeloDominio](./02_ModeloDominio.md)
- [03_BaseDatos](./03_BaseDatos.md)
- [04_DER](./04_DER.md)
- [07_UML](./07_UML.md)
- [08_ManualTecnico](./08_ManualTecnico.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Consideraciones Finales

El presente diccionario de datos documenta la estructura lógica de la base de datos implementada en **Rincón del Pan**, proporcionando una referencia clara para comprender el propósito de cada entidad, sus atributos y sus relaciones.

Su mantenimiento en paralelo con las migraciones y los modelos Eloquent garantiza la coherencia entre la documentación técnica y la implementación del sistema, facilitando futuras tareas de mantenimiento, ampliación y evolución del proyecto.
