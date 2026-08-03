# ðŸ“š Diccionario de Datos

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# IntroducciÃ³n

El presente documento describe las entidades que conforman la base de datos del proyecto **RincÃ³n del Pan**, detallando el propÃ³sito de cada tabla, sus atributos principales y las relaciones existentes entre ellas.

El objetivo del diccionario de datos es servir como referencia tÃ©cnica durante el mantenimiento y evoluciÃ³n del sistema, complementando el Diagrama Entidadâ€“RelaciÃ³n (DER) y la implementaciÃ³n realizada mediante **Laravel Migrations** y **Eloquent ORM**.

---

# Convenciones

En las tablas siguientes se utilizan las siguientes abreviaturas:

| Abreviatura | Significado |
|-------------|-------------|
| PK | Clave primaria |
| FK | Clave forÃ¡nea |
| NN | Campo obligatorio (Not Null) |
| AI | Autoincremental |

---

# Tabla: users

## DescripciÃ³n

Almacena la informaciÃ³n de los usuarios registrados en el sistema.

Incluye tanto clientes como administradores.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador del usuario |
| name | VARCHAR | NN | Nombre completo |
| email | VARCHAR | NN, UNIQUE | Correo electrÃ³nico |
| password | VARCHAR | NN | ContraseÃ±a cifrada |
| role | ENUM / VARCHAR | NN | Rol del usuario |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- 1:N con **addresses**
- 1:N con **orders**
- 1:N con **reviews**
- 1:N con **wishlists**

---

# Tabla: addresses

## DescripciÃ³n

Almacena las direcciones de envÃ­o asociadas a cada usuario.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario propietario |
| street | VARCHAR | NN | Calle |
| city | VARCHAR | NN | Ciudad |
| province | VARCHAR | NN | Provincia |
| postal_code | VARCHAR | NN | CÃ³digo postal |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:1 con **users**
- 1:N con **orders**

---

# Tabla: categories

## DescripciÃ³n

Agrupa los productos del catÃ¡logo.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| name | VARCHAR | NN | Nombre de la categorÃ­a |
| description | TEXT | | DescripciÃ³n |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:M con **products**

---

# Tabla: products

## DescripciÃ³n

Representa los productos disponibles para la venta.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| name | VARCHAR | NN | Nombre del producto |
| description | TEXT | | DescripciÃ³n |
| price | DECIMAL | NN | Precio |
| stock | INTEGER | NN | Stock disponible |
| image | VARCHAR | | Imagen |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:M con **categories**
- 1:N con **order_items**
- 1:N con **reviews**
- 1:N con **wishlists**

---

# Tabla: category_product

## DescripciÃ³n

Tabla pivote que relaciona productos y categorÃ­as.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| product_id | BIGINT | PK, FK | Producto |
| category_id | BIGINT | PK, FK | CategorÃ­a |

## Relaciones

- N:1 con **products**
- N:1 con **categories**

---

# Tabla: orders

## DescripciÃ³n

Representa las compras realizadas por los clientes.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Cliente |
| address_id | BIGINT | FK | DirecciÃ³n de envÃ­o |
| total | DECIMAL | NN | Importe total |
| status | ENUM / VARCHAR | NN | Estado del pedido |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:1 con **users**
- N:1 con **addresses**
- 1:N con **order_items**

---

# Tabla: order_items

## DescripciÃ³n

Detalle de productos incluidos en un pedido.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| order_id | BIGINT | FK | Pedido |
| product_id | BIGINT | FK | Producto |
| quantity | INTEGER | NN | Cantidad |
| unit_price | DECIMAL | NN | Precio unitario |
| subtotal | DECIMAL | NN | Subtotal |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:1 con **orders**
- N:1 con **products**

---

# Tabla: reviews

## DescripciÃ³n

Almacena las reseÃ±as realizadas por los clientes sobre los productos adquiridos.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario |
| product_id | BIGINT | FK | Producto |
| rating | INTEGER | NN | PuntuaciÃ³n |
| comment | TEXT | | Comentario |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:1 con **users**
- N:1 con **products**

---

# Tabla: wishlists

## DescripciÃ³n

Entidad utilizada para implementar el **carrito de compras** del sistema.

> [!note]
> Aunque el nombre de la tabla es **wishlists**, funcionalmente representa el carrito de compras utilizado por los clientes durante el proceso de compra.

## Campos

| Campo | Tipo | Restricciones | DescripciÃ³n |
|--------|------|---------------|-------------|
| id | BIGINT | PK, AI | Identificador |
| user_id | BIGINT | FK | Usuario |
| product_id | BIGINT | FK | Producto |
| quantity | INTEGER | NN | Cantidad seleccionada |
| created_at | TIMESTAMP | | Fecha de creaciÃ³n |
| updated_at | TIMESTAMP | | Ãšltima modificaciÃ³n |

## Relaciones

- N:1 con **users**
- N:1 con **products**

---

# Estados del Pedido

La entidad **orders** implementa un ciclo de vida basado en estados.

| Estado | DescripciÃ³n |
|---------|-------------|
| Pendiente | Pedido generado, pendiente de procesamiento |
| Pagado | Pago registrado |
| Enviado | Pedido despachado |
| Entregado | Pedido entregado al cliente |
| Cancelado | Pedido cancelado |

La representaciÃ³n grÃ¡fica puede consultarse en:

âž¡ï¸ [diagramas/25_UML_EstadosPedido](../diagramas/25_UML_EstadosPedido.md)

---

# Resumen General

| Tabla | PropÃ³sito |
|--------|-----------|
| users | Usuarios del sistema |
| addresses | Direcciones de envÃ­o |
| categories | CategorÃ­as del catÃ¡logo |
| products | Productos disponibles |
| category_product | RelaciÃ³n productos-categorÃ­as |
| orders | Pedidos |
| order_items | Detalle de pedidos |
| reviews | ReseÃ±as |
| wishlists | Carrito de compras |

---

# DocumentaciÃ³n Relacionada

Este documento complementa la siguiente documentaciÃ³n:

- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [07_UML](07_UML.md)
- [08_ManualTecnico](08_ManualTecnico.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Consideraciones Finales

El presente diccionario de datos documenta la estructura lÃ³gica de la base de datos implementada en **RincÃ³n del Pan**, proporcionando una referencia clara para comprender el propÃ³sito de cada entidad, sus atributos y sus relaciones.

Su mantenimiento en paralelo con las migraciones y los modelos Eloquent garantiza la coherencia entre la documentaciÃ³n tÃ©cnica y la implementaciÃ³n del sistema, facilitando futuras tareas de mantenimiento, ampliaciÃ³n y evoluciÃ³n del proyecto.

