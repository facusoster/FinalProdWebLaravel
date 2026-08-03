# ðŸ›’ UML - Diagrama de Secuencia: Realizar Pedido

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Secuencia

---

# Objetivo

Este diagrama representa la interacciÃ³n entre los principales componentes del sistema durante el proceso de creaciÃ³n de un pedido.

El flujo comienza cuando un cliente confirma la compra de los productos agregados al carrito y finaliza cuando el pedido queda registrado en la base de datos con su correspondiente detalle.

Este proceso constituye una de las funcionalidades principales del sistema.

---

# Diagrama

```mermaid
sequenceDiagram

actor Cliente

participant Navegador
participant Routes
participant OrderController
participant Wishlist
participant Order
participant OrderItem
participant Product
participant MySQL

Cliente->>Navegador: Confirmar compra

Navegador->>Routes: POST /orders

Routes->>OrderController: store()

OrderController->>Wishlist: Obtener productos del carrito

Wishlist->>MySQL: SELECT carrito

MySQL-->>Wishlist: Productos seleccionados

Wishlist-->>OrderController: Lista de productos

OrderController->>OrderController: Calcular total

OrderController->>Order: Crear pedido

Order->>MySQL: INSERT order

MySQL-->>Order: Pedido creado

loop Por cada producto

    OrderController->>OrderItem: Crear detalle

    OrderItem->>MySQL: INSERT order_item

    MySQL-->>OrderItem: Registro creado

    OrderController->>Product: Actualizar stock

    Product->>MySQL: UPDATE stock

    MySQL-->>Product: Stock actualizado

end

OrderController->>Wishlist: Vaciar carrito

Wishlist->>MySQL: DELETE carrito

MySQL-->>Wishlist: Carrito vacÃ­o

OrderController-->>Navegador: Redirect ConfirmaciÃ³n

Navegador-->>Cliente: Pedido realizado
```

---

# DescripciÃ³n del Flujo

El proceso comienza cuando el cliente confirma la compra de los productos almacenados en su carrito.

El controlador recupera los productos seleccionados, calcula el importe total del pedido y registra una nueva orden en la base de datos.

Posteriormente genera un registro en **OrderItem** por cada producto adquirido, actualiza el stock disponible y finalmente elimina los productos del carrito.

Una vez completado el proceso, el usuario es redirigido a la pantalla de confirmaciÃ³n.

---

# Participantes

## ðŸ‘¤ Cliente

Usuario autenticado que realiza la compra.

---

## ðŸŒ Navegador

EnvÃ­a la solicitud HTTP y presenta la respuesta generada por Laravel.

---

## ðŸ›£ï¸ Routes

Reciben la solicitud y la derivan al controlador correspondiente.

---

## ðŸŽ® OrderController

Coordina todo el proceso de creaciÃ³n del pedido.

Entre sus responsabilidades se encuentran:

- obtener el carrito;
- calcular el total;
- crear el pedido;
- generar el detalle;
- actualizar el stock;
- finalizar la operaciÃ³n.

---

## ðŸ›’ Wishlist

Aunque mantiene este nombre en la implementaciÃ³n, representa el **carrito de compras** del sistema.

Contiene los productos seleccionados por el cliente antes de confirmar la compra.

---

## ðŸ“¦ Order

Representa el pedido principal generado durante la compra.

Incluye informaciÃ³n como:

- cliente;
- direcciÃ³n;
- estado;
- importe total.

---

## ðŸ“„ OrderItem

Representa cada uno de los productos incluidos dentro del pedido.

Cada registro almacena:

- producto;
- cantidad;
- precio unitario;
- subtotal.

---

## ðŸž Product

Modelo encargado de representar los productos del catÃ¡logo.

Durante este proceso actualiza el stock disponible luego de registrar la venta.

---

## ðŸ—„ï¸ MySQL

Persistencia de toda la informaciÃ³n relacionada con el pedido y sus detalles.

---

# Operaciones Realizadas

Durante el proceso se ejecutan las siguientes acciones principales:

- Recuperar el contenido del carrito.
- Calcular el importe total.
- Crear el pedido.
- Registrar los productos adquiridos.
- Actualizar el stock.
- Vaciar el carrito.
- Confirmar la operaciÃ³n al usuario.

---

# Reglas de Negocio Representadas

El flujo refleja las siguientes reglas del sistema:

- Solo un usuario autenticado puede generar pedidos.
- El pedido debe contener al menos un producto.
- Cada producto genera un registro independiente en **OrderItem**.
- El stock debe actualizarse inmediatamente despuÃ©s de registrar la compra.
- Una vez confirmado el pedido, el carrito queda vacÃ­o.

---

# RelaciÃ³n con Laravel

En este proceso participan los siguientes componentes del framework:

- Routes
- Middleware `auth`
- OrderController
- Modelos Eloquent
- Relaciones `hasMany()` y `belongsTo()`
- MySQL

---

# RelaciÃ³n con otros Diagramas

Este diagrama complementa:

- [diagramas/20_UML_CasosUso](20_UML_CasosUso.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)
- [diagramas/24_UML_ActividadCompra](24_UML_ActividadCompra.md)
- [diagramas/25_UML_EstadosPedido](25_UML_EstadosPedido.md)

---

# DocumentaciÃ³n Relacionada

- [05_CasosUso](../docs/05_CasosUso.md)
- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El proceso de creaciÃ³n de pedidos constituye el nÃºcleo funcional de **RincÃ³n del Pan**.

El diagrama muestra cÃ³mo colaboran los distintos componentes del sistema para transformar el contenido del carrito de compras en un pedido persistente, manteniendo la consistencia de la informaciÃ³n mediante la creaciÃ³n del pedido, sus Ã­tems asociados y la actualizaciÃ³n del stock de los productos.

