# ðŸ§© Modelo de Dominio

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# IntroducciÃ³n

El modelo de dominio describe las entidades principales que conforman **RincÃ³n del Pan** y las relaciones funcionales existentes entre ellas.

Su objetivo es representar el funcionamiento del negocio desde una perspectiva conceptual, independientemente de la implementaciÃ³n fÃ­sica de la base de datos.

Este documento constituye el puente entre el relevamiento de requisitos y el diseÃ±o de la base de datos, permitiendo comprender cÃ³mo interactÃºan los distintos actores con la informaciÃ³n administrada por el sistema.

---

# Dominio del Negocio

**RincÃ³n del Pan** es una aplicaciÃ³n web de comercio electrÃ³nico orientada a la comercializaciÃ³n de productos de panaderÃ­a y pastelerÃ­a.

El sistema permite que un cliente:

- Se registre e inicie sesiÃ³n.
- Explore el catÃ¡logo de productos.
- Agregue productos a su carrito de compras.
- Gestione direcciones de envÃ­o.
- Realice pedidos.
- Consulte el historial de compras.
- Publique reseÃ±as sobre productos adquiridos.

Por otra parte, un administrador dispone de un panel para gestionar el catÃ¡logo y supervisar el estado de los pedidos.

---

# Entidades del Dominio

El dominio del sistema se encuentra compuesto por las siguientes entidades.

## User

Representa a los usuarios registrados en la aplicaciÃ³n.

Existen dos perfiles principales:

- Cliente
- Administrador

Responsabilidades:

- AutenticaciÃ³n.
- GestiÃ³n de direcciones.
- GestiÃ³n del carrito de compras.
- GestiÃ³n de pedidos.
- PublicaciÃ³n de reseÃ±as.

Relaciones:

- 1:N con Address.
- 1:N con Order.
- 1:N con Review.
- 1:N con Wishlist.

---

## Address

Representa una direcciÃ³n de envÃ­o perteneciente a un usuario.

Permite registrar mÃºltiples domicilios para facilitar futuras compras.

Relaciones:

- N:1 con User.
- 1:N con Order.

---

## Product

Representa un artÃ­culo comercializado por la tienda.

Cada producto almacena informaciÃ³n como:

- Nombre.
- DescripciÃ³n.
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

Agrupa los productos del catÃ¡logo segÃºn su clasificaciÃ³n comercial.

Ejemplos:

- Panificados
- Facturas
- Tortas
- PastelerÃ­a

Relaciones:

- N:M con Product.

---

## Order

Representa una compra realizada por un cliente.

Cada pedido posee:

- Usuario asociado.
- DirecciÃ³n de envÃ­o.
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

Representa la valoraciÃ³n realizada por un cliente sobre un producto adquirido.

Cada reseÃ±a contiene:

- PuntuaciÃ³n.
- Comentario.

Relaciones:

- N:1 con User.
- N:1 con Product.

---

## Wishlist

En la implementaciÃ³n actual del proyecto, esta entidad se utiliza como **carrito de compras**.

Permite asociar productos seleccionados por el cliente antes de confirmar un pedido.

> [!note]
> Aunque el nombre tÃ©cnico de la entidad y de la tabla es **Wishlist**, funcionalmente representa el **carrito de compras** del sistema.

Relaciones:

- N:1 con User.
- N:1 con Product.

---

# Relaciones del Dominio

| Entidad | RelaciÃ³n | Entidad |
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

Durante el anÃ¡lisis del dominio se establecieron las siguientes reglas principales:

- Un usuario puede registrar mÃºltiples direcciones de envÃ­o.
- Un producto puede pertenecer a varias categorÃ­as.
- Una categorÃ­a puede contener mÃºltiples productos.
- Cada pedido pertenece a un Ãºnico cliente.
- Un pedido debe contener al menos un producto.
- Cada pedido registra el importe total de la compra.
- Un cliente Ãºnicamente puede consultar sus propios pedidos.
- Solo los administradores pueden gestionar el catÃ¡logo.
- Solo los administradores pueden modificar el estado de un pedido.
- Un cliente puede publicar reseÃ±as Ãºnicamente sobre productos adquiridos.
- El carrito de compras pertenece exclusivamente al usuario autenticado.

---

# Modelo Conceptual

El dominio fue diseÃ±ado para representar las operaciones habituales de un comercio electrÃ³nico, manteniendo una separaciÃ³n clara entre:

- GestiÃ³n de usuarios.
- GestiÃ³n del catÃ¡logo.
- GestiÃ³n de pedidos.
- GestiÃ³n del carrito.
- GestiÃ³n de direcciones.
- GestiÃ³n de reseÃ±as.

Cada mÃ³dulo mantiene responsabilidades bien definidas y se comunica mediante relaciones establecidas en el modelo de datos.

---

# Correspondencia con Laravel

Cada entidad del dominio posee su correspondiente modelo Eloquent dentro del proyecto.

Los modelos implementan las relaciones utilizando:

- hasMany()
- belongsTo()
- belongsToMany()

Esta correspondencia permite mantener alineado el modelo conceptual con la implementaciÃ³n fÃ­sica de la aplicaciÃ³n.

---

# RelaciÃ³n con la DocumentaciÃ³n

El modelo de dominio se complementa con los siguientes documentos:

- [00_AnalisisRequisitos](00_AnalisisRequisitos.md)
- [01_Arquitectura](01_Arquitectura.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [05_CasosUso](05_CasosUso.md)
- [07_UML](07_UML.md)

Diagramas relacionados:

- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Conclusiones

El modelo de dominio define la estructura conceptual de **RincÃ³n del Pan** y constituye la base para el diseÃ±o de la base de datos y la implementaciÃ³n de la lÃ³gica de negocio.

Su correcta definiciÃ³n permitiÃ³ construir una aplicaciÃ³n organizada, coherente y alineada con los requisitos funcionales establecidos durante la etapa de anÃ¡lisis.

