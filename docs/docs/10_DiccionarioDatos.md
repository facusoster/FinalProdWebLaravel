# 📖 Diccionario de Datos

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[02_ModeloDominio]]

---

# Introducción

El presente documento describe las entidades implementadas en la base de datos del proyecto **Rincón del Pan**, detallando el propósito de cada tabla, sus atributos principales y las relaciones existentes entre ellas.

Su objetivo es servir como referencia para desarrolladores y facilitar el mantenimiento y evolución del sistema.

---

# Convenciones

| Abreviatura | Significado |
|-------------|-------------|
| PK | Primary Key |
| FK | Foreign Key |
| NN | Not Null |
| AI | Auto Increment |

---

# Users

Representa los usuarios registrados del sistema.

## Clave primaria

- **id**

## Campos principales

| Campo | Tipo | Descripción |
|--------|------|-------------|
| id | bigint | Identificador del usuario. |
| name | string | Nombre del usuario. |
| email | string | Correo electrónico. |
| password | string | Contraseña cifrada. |
| role | enum/string | Rol del usuario (cliente o administrador). |
| created_at | timestamp | Fecha de creación. |
| updated_at | timestamp | Fecha de modificación. |

## Relaciones

- 1:N con Addresses.
- 1:N con Orders.
- 1:N con Reviews.
- N:M con Products mediante Wishlists.

---

# Addresses

Direcciones de envío registradas por los usuarios.

## Relaciones

- FK → Users

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| user_id | Usuario propietario. |
| street | Calle. |
| city | Ciudad. |
| province | Provincia. |
| postal_code | Código postal. |

---

# Categories

Clasificación de productos.

## Relaciones

- N:M con Products.

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| name | Nombre de la categoría. |
| description | Descripción. |

---

# Products

Productos disponibles en el catálogo.

## Relaciones

- N:M con Categories.
- 1:N con Reviews.
- 1:N con Order_Items.
- N:M con Users mediante Wishlists.

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| name | Nombre del producto. |
| description | Descripción. |
| price | Precio unitario. |
| stock | Cantidad disponible. |
| image | Imagen del producto. |

---

# Category_Product

Tabla pivote que implementa la relación muchos a muchos entre categorías y productos.

## Relaciones

- FK → Categories
- FK → Products

---

# Orders

Representa los pedidos realizados por los clientes.

## Relaciones

- FK → Users
- FK → Addresses
- 1:N con Order_Items

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| user_id | Cliente. |
| address_id | Dirección de envío. |
| total | Importe total. |
| status | Estado del pedido. |

### Estados permitidos

```text
Pendiente
Pagado
Enviado
Entregado
Cancelado
```

---

# Order_Items

Detalle de productos pertenecientes a un pedido.

## Relaciones

- FK → Orders
- FK → Products

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| order_id | Pedido asociado. |
| product_id | Producto. |
| quantity | Cantidad. |
| unit_price | Precio unitario. |
| subtotal | Importe parcial. |

---

# Reviews

Reseñas realizadas por los clientes.

## Relaciones

- FK → Users
- FK → Products

## Campos principales

| Campo | Descripción |
|--------|-------------|
| id | Identificador. |
| rating | Calificación. |
| comment | Comentario. |

---

# Wishlists

Lista de productos favoritos de cada usuario.

Implementa una relación muchos a muchos entre usuarios y productos.

## Relaciones

- FK → Users
- FK → Products

---

# Resumen General

| Tabla | Propósito |
|---------|-----------|
| Users | Usuarios del sistema. |
| Addresses | Direcciones de envío. |
| Categories | Clasificación del catálogo. |
| Products | Productos disponibles. |
| Category_Product | Relación entre productos y categorías. |
| Orders | Pedidos realizados. |
| Order_Items | Detalle de pedidos. |
| Reviews | Valoraciones de productos. |
| Wishlists | Productos favoritos. |

---

# Consideraciones

La estructura de la base de datos fue implementada mediante migraciones de Laravel y relaciones Eloquent ORM, garantizando integridad referencial y facilitando la evolución del esquema mediante control de versiones.

---

## Documentación relacionada

- [[README]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]
