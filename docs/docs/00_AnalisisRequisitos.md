# 📋 Análisis de Requisitos

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[05_CasosUso]]

---

# Introducción

Este documento reúne el relevamiento funcional realizado durante la etapa de análisis del proyecto **Rincón del Pan**.

Su objetivo es definir los actores, requisitos funcionales, requisitos no funcionales, alcance y supuestos del sistema antes de su implementación.

Este análisis constituye la base sobre la cual se diseñó el modelo de datos, la arquitectura MVC y las funcionalidades desarrolladas en Laravel.

---

# Objetivos

- Comprender el problema a resolver.
- Identificar los actores del sistema.
- Definir las funcionalidades requeridas.
- Establecer restricciones y criterios de calidad.
- Delimitar el alcance del proyecto.

---

# Actores

## Cliente

Usuario registrado que interactúa con la tienda para consultar el catálogo, administrar su cuenta y realizar compras.

### Funcionalidades principales

- Registrarse.
- Iniciar sesión.
- Consultar productos.
- Gestionar direcciones.
- Gestionar Wishlist.
- Realizar pedidos.
- Consultar historial de compras.
- Publicar reseñas.

---

## Administrador

Usuario encargado de administrar el contenido y la operación del sistema.

### Funcionalidades principales

- Administrar productos.
- Administrar categorías.
- Gestionar pedidos.
- Actualizar estados de pedidos.

---

# Requisitos Funcionales (RF)

| ID | Requisito | Actor |
|----|-----------|-------|
| RF01 | Registrarse en el sistema. | Cliente |
| RF02 | Iniciar sesión. | Cliente |
| RF03 | Cerrar sesión. | Cliente |
| RF04 | Consultar el catálogo de productos. | Cliente |
| RF05 | Consultar el detalle de un producto. | Cliente |
| RF06 | Gestionar direcciones de envío. | Cliente |
| RF07 | Gestionar la Wishlist. | Cliente |
| RF08 | Realizar pedidos. | Cliente |
| RF09 | Consultar pedidos realizados. | Cliente |
| RF10 | Publicar reseñas de productos. | Cliente |
| RF11 | Administrar categorías (CRUD). | Administrador |
| RF12 | Administrar productos (CRUD). | Administrador |
| RF13 | Gestionar el stock de productos. | Administrador |
| RF14 | Consultar todos los pedidos. | Administrador |
| RF15 | Actualizar el estado de los pedidos. | Administrador |
| RF16 | Validar las transiciones permitidas entre estados de pedidos. | Sistema |

---

# Requisitos No Funcionales (RNF)

| ID | Requisito |
|----|-----------|
| RNF01 | Interfaz intuitiva y de fácil utilización. |
| RNF02 | Diseño responsive compatible con dispositivos móviles. |
| RNF03 | Contraseñas almacenadas mediante hash. |
| RNF04 | Tiempo de respuesta adecuado para un entorno académico. |
| RNF05 | Arquitectura basada en el patrón MVC. |
| RNF06 | Persistencia mediante MySQL utilizando Eloquent ORM. |
| RNF07 | Integridad referencial mediante claves foráneas. |
| RNF08 | Documentación técnica del proyecto disponible en el repositorio. |

---

# Casos de Uso Principales

Los principales casos de uso del sistema se documentan en [[05_CasosUso]].

Entre ellos se encuentran:

- Registrarse.
- Iniciar sesión.
- Realizar pedido.
- Gestionar productos.
- Gestionar categorías.
- Publicar reseñas.
- Actualizar estado de pedidos.

---

# Alcance

## Incluido

- Registro de usuarios.
- Inicio de sesión.
- Catálogo de productos.
- Gestión de categorías.
- Gestión de direcciones.
- Wishlist.
- Pedidos.
- Reseñas.
- Panel administrativo.
- API REST básica (como componente adicional del trabajo práctico).

---

## Fuera del Alcance

- Integración con pasarelas de pago.
- Facturación electrónica.
- Gestión logística.
- Integración con servicios de envío.
- Aplicación móvil nativa.

---

# Supuestos

Durante el diseño del sistema se consideraron los siguientes supuestos:

- Los productos poseen stock disponible.
- Los precios son administrados manualmente.
- Los pedidos cambian de estado mediante acciones del administrador.
- Un usuario puede registrar múltiples direcciones.
- Un producto puede pertenecer a múltiples categorías.
- Solo los clientes que hayan adquirido un producto podrán publicar reseñas.
- Los estados válidos de un pedido son:

```text
Pendiente
Pagado
Enviado
Entregado
Cancelado
```

---

# Entidades del Sistema

El modelo de datos contempla las siguientes entidades:

- Users
- Addresses
- Categories
- Products
- Category_Product
- Orders
- Order_Items
- Reviews
- Wishlists

La descripción detallada se encuentra en:

- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]

---

# Resumen

El relevamiento de requisitos constituye el punto de partida del proyecto Rincón del Pan y define las funcionalidades, restricciones y supuestos que guiaron el diseño de la arquitectura, el modelo de datos y la implementación de la aplicación.

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[02_ModeloDominio]]
- [[04_DER]]
- [[05_CasosUso]]
