# ðŸ§© Modelo de Dominio

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **PatrÃ³n:** Domain Model

---

# Objetivo

Este diagrama representa el **Modelo de Dominio** del proyecto **RincÃ³n del Pan**.

Su finalidad es mostrar las entidades principales del negocio y las relaciones conceptuales entre ellas, independientemente de los detalles de implementaciÃ³n de la base de datos o del framework utilizado.

A diferencia del DER, este modelo se centra en los conceptos del dominio del negocio y cÃ³mo colaboran para satisfacer los requisitos funcionales del sistema.

---

# Diagrama

```mermaid
classDiagram

class Usuario {
    +id
    +nombre
    +email
    +rol
}

class Direccion {
    +calle
    +ciudad
    +provincia
    +codigoPostal
}

class Categoria {
    +nombre
    +descripcion
}

class Producto {
    +nombre
    +descripcion
    +precio
    +stock
}

class Pedido {
    +total
    +estado
}

class ItemPedido {
    +cantidad
    +precioUnitario
    +subtotal
}

class Resena {
    +rating
    +comentario
}

class Carrito {
    +cantidad
}

Usuario "1" --> "*" Direccion : posee
Usuario "1" --> "*" Pedido : realiza
Usuario "1" --> "*" Resena : escribe
Usuario "1" --> "*" Carrito : agrega

Pedido "1" --> "*" ItemPedido : contiene

ItemPedido "*" --> "1" Producto : referencia

Producto "*" --> "*" Categoria : pertenece

Producto "1" --> "*" Resena : recibe

Producto "1" --> "*" Carrito : agregado
```

---

# DescripciÃ³n del Modelo

El dominio de **RincÃ³n del Pan** gira en torno a la gestiÃ³n de una tienda virtual de productos de panaderÃ­a y pastelerÃ­a.

El sistema permite que los clientes exploren el catÃ¡logo, seleccionen productos, gestionen un carrito de compras, realicen pedidos y posteriormente puedan dejar reseÃ±as sobre los productos adquiridos.

Por otro lado, los administradores administran el catÃ¡logo y supervisan los pedidos generados por los clientes.

---

# Entidades del Dominio

## Usuario

Representa a toda persona registrada dentro del sistema.

Dependiendo de su rol puede actuar como:

- Cliente
- Administrador

Desde esta entidad se originan la mayorÃ­a de las operaciones del negocio.

---

## DirecciÃ³n

Representa una direcciÃ³n de entrega asociada a un usuario.

Cada cliente puede registrar mÃºltiples direcciones para utilizarlas durante el proceso de compra.

---

## CategorÃ­a

Permite organizar los productos del catÃ¡logo.

Una categorÃ­a puede contener mÃºltiples productos y un producto puede pertenecer a varias categorÃ­as.

---

## Producto

Es la entidad central del catÃ¡logo.

Cada producto posee:

- Nombre
- DescripciÃ³n
- Precio
- Stock disponible
- Imagen

Los productos pueden:

- pertenecer a categorÃ­as;
- formar parte de pedidos;
- recibir reseÃ±as;
- agregarse al carrito de compras.

---

## Carrito

Durante la implementaciÃ³n del proyecto se reutilizÃ³ la entidad **Wishlist** para representar el carrito de compras.

Cada registro almacena:

- Usuario propietario.
- Producto seleccionado.
- Cantidad.

Este diseÃ±o permitiÃ³ reutilizar la estructura existente sin modificar la lÃ³gica general del sistema.

---

## Pedido

Representa una compra realizada por un cliente.

Cada pedido mantiene un estado que describe su ciclo de vida dentro del proceso comercial.

Estados posibles:

- Pendiente
- Pagado
- Enviado
- Entregado
- Cancelado

---

## Item del Pedido

Representa cada producto incluido dentro de un pedido.

Almacena:

- Producto
- Cantidad
- Precio unitario
- Subtotal

Esta entidad permite conservar el historial de precios aun cuando el valor del producto cambie posteriormente.

---

## ReseÃ±a

Permite que un cliente califique y comente un producto adquirido.

Cada reseÃ±a pertenece simultÃ¡neamente a:

- un usuario;
- un producto.

---

# Relaciones del Dominio

Las relaciones principales entre entidades son las siguientes:

| RelaciÃ³n | Tipo |
|----------|------|
| Usuario â†’ DirecciÃ³n | Uno a Muchos |
| Usuario â†’ Pedido | Uno a Muchos |
| Usuario â†’ ReseÃ±a | Uno a Muchos |
| Usuario â†’ Carrito | Uno a Muchos |
| Pedido â†’ ItemPedido | Uno a Muchos |
| ItemPedido â†’ Producto | Muchos a Uno |
| Producto â†” CategorÃ­a | Muchos a Muchos |
| Producto â†’ ReseÃ±a | Uno a Muchos |
| Producto â†’ Carrito | Uno a Muchos |

---

# Reglas de Negocio Representadas

El modelo refleja las principales reglas funcionales del sistema:

- Un cliente puede registrar mÃºltiples direcciones.
- Un cliente puede realizar mÃºltiples pedidos.
- Cada pedido pertenece a un Ãºnico cliente.
- Todo pedido contiene al menos un producto.
- Un producto puede integrar distintos pedidos.
- Un producto puede pertenecer a varias categorÃ­as.
- Los clientes pueden agregar productos al carrito antes de confirmar la compra.
- Los clientes pueden publicar reseÃ±as sobre productos adquiridos.
- Los administradores gestionan productos, categorÃ­as y pedidos.

---

# Diferencias con el DER

El **Modelo de Dominio** representa los conceptos del negocio y las relaciones entre ellos.

El **Diagrama Entidadâ€“RelaciÃ³n (DER)** incorpora ademÃ¡s aspectos especÃ­ficos de persistencia como:

- claves primarias;
- claves forÃ¡neas;
- tablas pivote;
- tipos de datos;
- implementaciÃ³n fÃ­sica de la base de datos.

Por esta razÃ³n ambos diagramas son complementarios y cumplen funciones diferentes dentro de la documentaciÃ³n del proyecto.

---

# DocumentaciÃ³n Relacionada

Este diagrama complementa:

- [02_ModeloDominio](../docs/02_ModeloDominio.md)
- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [10_DiccionarioDatos](../docs/10_DiccionarioDatos.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)

---

# Consideraciones Finales

El Modelo de Dominio de **RincÃ³n del Pan** ofrece una visiÃ³n conceptual del funcionamiento del negocio, identificando las entidades fundamentales y las relaciones que permiten implementar el proceso de compra de un comercio electrÃ³nico.

Este modelo constituye el punto de partida para el diseÃ±o de la base de datos, la implementaciÃ³n de los modelos Eloquent y el desarrollo de la lÃ³gica de negocio siguiendo el patrÃ³n MVC propuesto por Laravel.

