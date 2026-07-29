# Análisis de Requisitos

# Sistema de E-commerce de Pastelería "Rincón del Pan"

## 1. Descripción General

Rincón del Pan es una aplicación web de comercio electrónico dedicada a la venta de productos de pastelería artesanal.

Los usuarios podrán registrarse, explorar productos organizados por categorías, agregar productos a una lista de deseos, realizar pedidos y dejar reseñas sobre productos adquiridos.

Los administradores podrán gestionar el catálogo de productos, las categorías y el estado de los pedidos realizados por los clientes.

---

# 2. Actores del Sistema

## 2.1 Cliente

Usuario registrado que interactúa con la tienda para navegar el catálogo, realizar compras y gestionar sus pedidos.

### Responsabilidades

- Registrarse en el sistema.
- Iniciar sesión.
- Navegar el catálogo.
- Gestionar direcciones de envío.
- Agregar productos a favoritos.
- Realizar pedidos.
- Consultar historial de pedidos.
- Escribir reseñas de productos adquiridos.

## 2.2 Administrador

Usuario con privilegios especiales encargado de la administración general del negocio.

### Responsabilidades

- Gestionar categorías.
- Gestionar productos.
- Controlar stock.
- Consultar pedidos.
- Modificar estados de pedidos.
- Visualizar información general del sistema.

## 2.3 Sistema

Componente encargado de automatizar procesos internos.

### Responsabilidades

- Validar información.
- Calcular totales de pedidos.
- Gestionar autenticación.
- Aplicar reglas de negocio.
- Enviar mensajes de confirmación.

---

# 3. Requisitos Funcionales (RF)

## Gestión de Usuarios

- RF01: El sistema debe permitir que un visitante se registre mediante correo electrónico y contraseña.
- RF02: El sistema debe permitir que un usuario inicie sesión.
- RF03: El sistema debe permitir que un usuario cierre sesión.
- RF04: El sistema debe permitir a un usuario administrar sus direcciones de envío.

## Gestión del Catálogo

- RF05: El sistema debe mostrar el catálogo completo de productos.
- RF06: El sistema debe permitir visualizar el detalle de un producto.
- RF07: El sistema debe permitir filtrar productos por categoría.

## Lista de Deseos

- RF08: El sistema debe permitir agregar productos a una lista de deseos.
- RF09: El sistema debe permitir eliminar productos de la lista de deseos.

## Gestión de Pedidos

- RF10: El sistema debe permitir crear un pedido con uno o más productos.
- RF11: El sistema debe calcular automáticamente el total del pedido considerando cantidad y precio unitario.
- RF12: El sistema debe permitir consultar el historial de pedidos realizados.
- RF13: El sistema debe permitir visualizar el detalle de un pedido.

## Reseñas

- RF14: El sistema debe permitir a un cliente dejar una reseña sobre un producto comprado.
- RF15: El sistema debe permitir visualizar las reseñas asociadas a un producto.

## Administración

- RF16: El administrador debe poder crear categorías.
- RF17: El administrador debe poder modificar categorías.
- RF18: El administrador debe poder eliminar categorías.
- RF19: El administrador debe poder crear productos.
- RF20: El administrador debe poder editar productos.
- RF21: El administrador debe poder eliminar productos.
- RF22: El administrador debe poder administrar el stock disponible de los productos.
- RF23: El administrador debe poder visualizar todos los pedidos.
- RF24: El administrador debe poder actualizar el estado de un pedido.
- RF25: El sistema debe validar las transiciones permitidas entre estados de pedidos.

---

# 4. Requisitos No Funcionales (RNF)

- RNF01: Interfaz intuitiva y fácil de usar.
- RNF02: Diseño responsive para dispositivos móviles.
- RNF03: Contraseñas almacenadas mediante hash.
- RNF04: Tiempo de respuesta menor a 3 segundos en condiciones normales.
- RNF05: Ejecución local mediante XAMPP y Laravel.
- RNF06: Implementación bajo patrón MVC.
- RNF07: Integridad de datos mediante claves foráneas.

---

# 5. Casos de Uso Principales

## CU01 - Registrarse
Permite crear una cuenta nueva en el sistema.

## CU02 - Realizar Pedido
Permite seleccionar productos y generar una orden de compra.

## CU03 - Gestionar Productos
Permite crear, modificar y eliminar productos.

## CU04 - Gestionar Categorías
Permite administrar las categorías del catálogo.

## CU05 - Actualizar Estado de Pedido
Permite modificar el estado de un pedido.

## CU06 - Publicar Reseña
Permite valorar un producto adquirido.

---

# 6. Alcance del Proyecto

## Incluido

- Registro de usuarios.
- Inicio de sesión.
- Gestión de direcciones.
- Catálogo de productos.
- Categorías.
- Wishlist.
- Pedidos.
- Reseñas.
- Panel administrativo.
- API REST básica.

## Fuera del Alcance

- Pasarela de pago real.
- Mercado Pago.
- PayPal.
- Facturación electrónica.
- Gestión logística real.
- Aplicación móvil nativa.

---

# 7. Supuestos del Negocio

1. Todos los productos poseen stock disponible.
2. Los precios son cargados manualmente por el administrador.
3. Los pedidos se consideran pagados manualmente.
4. Un cliente puede tener múltiples direcciones de envío.
5. Un producto puede pertenecer a varias categorías.
6. Sólo los clientes que hayan comprado podrán dejar reseñas.
7. Estados válidos del pedido: Pendiente, Pagado, Enviado, Entregado y Cancelado.

---

# 8. Entidades del Sistema

- users
- categories
- products
- category_product
- orders
- order_items
- reviews
- wishlists
- addresses
