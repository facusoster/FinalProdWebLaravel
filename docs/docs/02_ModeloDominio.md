# 🧩 Modelo de Dominio

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Introducción

El modelo de dominio describe las entidades principales que conforman **Rincón del Pan** y las relaciones funcionales existentes entre ellas.

Su objetivo es representar el funcionamiento del negocio desde una perspectiva conceptual, independientemente de la implementación física de la base de datos.

Este documento constituye el puente entre el relevamiento de requisitos y el diseño de la base de datos, permitiendo comprender cómo interactúan los distintos actores con la información administrada por el sistema.

---

# Dominio del Negocio

**Rincón del Pan** es una aplicación web de comercio electrónico orientada a la comercialización de productos de panadería y pastelería.

El sistema permite que un cliente:

- Se registre e inicie sesión.
- Explore el catálogo de productos.
- Agregue productos a su carrito de compras.
- Gestione direcciones de envío.
- Realice pedidos.
- Consulte el historial de compras.
- Publique reseñas sobre productos adquiridos.

Por otra parte, un administrador dispone de un panel para gestionar el catálogo y supervisar el estado de los pedidos.

---

# Entidades del Dominio

El dominio del sistema se encuentra compuesto por las siguientes entidades.

## User

Representa a los usuarios registrados en la aplicación.

Existen dos perfiles principales:

- Cliente
- Administrador

Responsabilidades:

- Autenticación.
- Gestión de direcciones.
- Gestión del carrito de compras.
- Gestión de pedidos.
- Publicación de reseñas.

Relaciones:

- 1:N con Address.
- 1:N con Order.
- 1:N con Review.
- 1:N con Wishlist.

---

## Address

Representa una dirección de envío perteneciente a un usuario.

Permite registrar múltiples domicilios para facilitar futuras compras.

Relaciones:

- N:1 con User.
- 1:N con Order.

---

## Product

Representa un artículo comercializado por la tienda.

Cada producto almacena información como:

- Nombre.
- Descripción.
- Precio.
- Stock disponible.
- Imagen.

Relaciones:

- N:M con Category.
- 1:N con OrderItem.
- 1:N con Review.
- 1:N con Wishlist.

---

## Category

Agrupa los productos del catálogo según su clasificación comercial.

Ejemplos:

- Panificados
- Facturas
- Tortas
- Pastelería

Relaciones:

- N:M con Product.

---

## Order

Representa una compra realizada por un cliente.

Cada pedido posee:

- Usuario asociado.
- Dirección de envío.
- Estado.
- Total de la compra.

Relaciones:

- N:1 con User.
- N:1 con Address.
- 1:N con OrderItem.

---

## OrderItem

Representa el detalle de cada producto incluido dentro de un pedido.

Cada registro almacena:

- Producto.
- Cantidad.
- Precio unitario.
- Subtotal.

Relaciones:

- N:1 con Order.
- N:1 con Product.

---

## Review

Representa la valoración realizada por un cliente sobre un producto adquirido.

Cada reseña contiene:

- Puntuación.
- Comentario.

Relaciones:

- N:1 con User.
- N:1 con Product.

---

## Wishlist

En la implementación actual del proyecto, esta entidad se utiliza como **carrito de compras**.

Permite asociar productos seleccionados por el cliente antes de confirmar un pedido.

> [!note]
> Aunque el nombre técnico de la entidad y de la tabla es **Wishlist**, funcionalmente representa el **carrito de compras** del sistema.

Relaciones:

- N:1 con User.
- N:1 con Product.

---

# Relaciones del Dominio

| Entidad | Relación | Entidad |
|----------|----------|----------|
| User | 1:N | Address |
| User | 1:N | Order |
| User | 1:N | Review |
| User | 1:N | Wishlist |
| Address | 1:N | Order |
| Order | 1:N | OrderItem |
| Product | 1:N | OrderItem |
| Product | N:M | Category |
| Product | 1:N | Review |
| Product | 1:N | Wishlist |

---

# Reglas del Negocio

Durante el análisis del dominio se establecieron las siguientes reglas principales:

- Un usuario puede registrar múltiples direcciones de envío.
- Un producto puede pertenecer a varias categorías.
- Una categoría puede contener múltiples productos.
- Cada pedido pertenece a un único cliente.
- Un pedido debe contener al menos un producto.
- Cada pedido registra el importe total de la compra.
- Un cliente únicamente puede consultar sus propios pedidos.
- Solo los administradores pueden gestionar el catálogo.
- Solo los administradores pueden modificar el estado de un pedido.
- Un cliente puede publicar reseñas únicamente sobre productos adquiridos.
- El carrito de compras pertenece exclusivamente al usuario autenticado.

---

# Modelo Conceptual

El dominio fue diseñado para representar las operaciones habituales de un comercio electrónico, manteniendo una separación clara entre:

- Gestión de usuarios.
- Gestión del catálogo.
- Gestión de pedidos.
- Gestión del carrito.
- Gestión de direcciones.
- Gestión de reseñas.

Cada módulo mantiene responsabilidades bien definidas y se comunica mediante relaciones establecidas en el modelo de datos.

---

# Correspondencia con Laravel

Cada entidad del dominio posee su correspondiente modelo Eloquent dentro del proyecto.

Los modelos implementan las relaciones utilizando:

- hasMany()
- belongsTo()
- belongsToMany()

Esta correspondencia permite mantener alineado el modelo conceptual con la implementación física de la aplicación.

---

# Relación con la Documentación

El modelo de dominio se complementa con los siguientes documentos:

- [00_AnalisisRequisitos](docs/docs/00_AnalisisRequisitos.md)
- [01_Arquitectura](docs/docs/01_Arquitectura.md)
- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [05_CasosUso](docs/docs/05_CasosUso.md)
- [[07_UML]]

Diagramas relacionados:

- [diagramas/11_ModeloDominio](docs/diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](docs/diagramas/21_UML_Clases.md)

---

# Conclusiones

El modelo de dominio define la estructura conceptual de **Rincón del Pan** y constituye la base para el diseño de la base de datos y la implementación de la lógica de negocio.

Su correcta definición permitió construir una aplicación organizada, coherente y alineada con los requisitos funcionales establecidos durante la etapa de análisis.
