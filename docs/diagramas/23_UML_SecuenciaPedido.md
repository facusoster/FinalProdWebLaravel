# 🛒 UML - Diagrama de Secuencia: Realizar Pedido

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Secuencia

---

# Objetivo

Este diagrama representa la interacción entre los principales componentes del sistema durante el proceso de creación de un pedido.

El flujo comienza cuando un cliente confirma la compra de los productos agregados al carrito y finaliza cuando el pedido queda registrado en la base de datos con su correspondiente detalle.

Durante este proceso, el pedido se crea con el estado inicial **Pending**, definido mediante el **Enum `OrderStatus`** implementado en Laravel.

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

OrderController->>Order: Crear pedido (status = Pending)

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

MySQL-->>Wishlist: Carrito vacío

OrderController-->>Navegador: Redirect Confirmación

Navegador-->>Cliente: Pedido realizado
```

---

# Descripción del Flujo

El proceso comienza cuando el cliente confirma la compra de los productos almacenados en su carrito.

El controlador recupera los productos seleccionados, calcula el importe total y registra una nueva orden en la base de datos utilizando el estado inicial **Pending**.

Posteriormente genera un registro en **OrderItem** por cada producto adquirido, actualiza el stock disponible y finalmente elimina los productos del carrito.

Una vez completado el proceso, el usuario es redirigido a la pantalla de confirmación.

---

# Participantes

## 👤 Cliente

Usuario autenticado que realiza la compra.

---

## 🌐 Navegador

Envía la solicitud HTTP y presenta la respuesta generada por Laravel.

---

## 🛣️ Routes

Reciben la solicitud y la derivan al controlador correspondiente.

---

## 🎮 OrderController

Coordina todo el proceso de creación del pedido.

Entre sus responsabilidades se encuentran:

- obtener el carrito;
- calcular el total;
- crear el pedido;
- asignar el estado inicial del pedido;
- generar el detalle;
- actualizar el stock;
- finalizar la operación.

---

## 🛒 Wishlist

Aunque mantiene este nombre en la implementación, representa el **carrito de compras** del sistema.

Contiene los productos seleccionados por el cliente antes de confirmar la compra.

---

## 📦 Order

Representa el pedido principal generado durante la compra.

Incluye información como:

- cliente;
- dirección;
- estado;
- importe total.

El atributo **status** se implementa mediante el **Enum `OrderStatus`**, iniciando el ciclo de vida del pedido con el valor **Pending**.

---

## 📄 OrderItem

Representa cada uno de los productos incluidos dentro del pedido.

Cada registro almacena:

- producto;
- cantidad;
- precio unitario;
- subtotal.

---

## 🍞 Product

Modelo encargado de representar los productos del catálogo.

Durante este proceso actualiza el stock disponible luego de registrar la venta.

---

## 🗄️ MySQL

Persistencia de toda la información relacionada con el pedido y sus detalles.

---

# Operaciones Realizadas

Durante el proceso se ejecutan las siguientes acciones principales:

- Recuperar el contenido del carrito.
- Calcular el importe total.
- Crear el pedido con estado **Pending**.
- Registrar los productos adquiridos.
- Actualizar el stock.
- Vaciar el carrito.
- Confirmar la operación al usuario.

---

# Reglas de Negocio Representadas

El flujo refleja las siguientes reglas del sistema:

- Solo un usuario autenticado puede generar pedidos.
- El pedido debe contener al menos un producto.
- Todo pedido nuevo se crea con el estado **Pending**.
- Cada producto genera un registro independiente en **OrderItem**.
- El stock debe actualizarse inmediatamente después de registrar la compra.
- Una vez confirmado el pedido, el carrito queda vacío.

---

# Relación con Laravel

En este proceso participan los siguientes componentes del framework:

- Routes
- Middleware `auth`
- OrderController
- Modelos Eloquent
- Enum `OrderStatus`
- Relaciones `hasMany()` y `belongsTo()`
- MySQL

---

# Relación con otros Diagramas

Este diagrama complementa:

- [20_UML_CasosUso](./20_UML_CasosUso.md)
- [21_UML_Clases](./21_UML_Clases.md)
- [24_UML_ActividadCompra](./24_UML_ActividadCompra.md)
- [25_UML_EstadosPedido](./25_UML_EstadosPedido.md)

---

# Documentación Relacionada

- [05_CasosUso](../docs/05_CasosUso.md)
- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El proceso de creación de pedidos constituye el núcleo funcional de **Rincón del Pan**.

El diagrama muestra cómo colaboran los distintos componentes del sistema para transformar el contenido del carrito de compras en un pedido persistente, manteniendo la consistencia de la información mediante la creación del pedido, sus ítems asociados y la actualización del stock de los productos.

Asimismo, refleja la implementación del ciclo de vida del pedido mediante el **Enum `OrderStatus`**, garantizando que la operación se inicie con el estado **Pending** y continúe posteriormente con las transiciones definidas por la aplicación.
