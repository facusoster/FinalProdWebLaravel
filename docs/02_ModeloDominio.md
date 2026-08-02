# 🧩 Modelo de Dominio

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[05_CasosUso]]
> - [[07_UML]]

---

# Introducción

El modelo de dominio representa los principales conceptos del negocio implementados en **Rincón del Pan** y las relaciones existentes entre ellos.

Su objetivo es describir cómo se organiza la información dentro del sistema desde una perspectiva funcional, independientemente de su implementación técnica o de la estructura de la base de datos.

Las entidades identificadas reflejan los actores y objetos que intervienen en el proceso de compra dentro de una plataforma de comercio electrónico.

---

# Visión General del Dominio

Rincón del Pan se organiza alrededor de un proceso de compra realizado por usuarios registrados.

Los clientes pueden explorar el catálogo de productos, administrar sus direcciones de entrega, mantener una lista de productos favoritos, realizar pedidos y publicar reseñas.

Por otro lado, los administradores son responsables de gestionar el catálogo y supervisar los pedidos generados por los clientes.

---

# Entidades Principales

## Usuario

Representa a las personas que interactúan con el sistema.

Según el rol asignado, un usuario puede actuar como cliente o administrador.

### Responsabilidades

- Registrarse en la plataforma.
- Iniciar sesión.
- Administrar direcciones.
- Gestionar su lista de favoritos.
- Realizar pedidos.
- Consultar pedidos anteriores.
- Publicar reseñas.

---

## Dirección

Representa los domicilios asociados a un usuario.

Estas direcciones pueden utilizarse durante el proceso de compra para indicar el lugar de entrega del pedido.

### Responsabilidades

- Almacenar información de envío.
- Asociarse a un usuario.
- Ser utilizada durante la creación de pedidos.

---

## Producto

Representa los artículos comercializados por Rincón del Pan.

Cada producto posee información descriptiva, disponibilidad y precio.

### Responsabilidades

- Formar parte del catálogo.
- Integrar una o varias categorías.
- Participar en pedidos.
- Recibir reseñas.
- Integrar listas de favoritos.

---

## Categoría

Permite organizar los productos según su tipo o clasificación.

Una categoría puede agrupar múltiples productos y un mismo producto puede pertenecer a más de una categoría.

### Responsabilidades

- Clasificar productos.
- Facilitar la navegación del catálogo.

---

## Pedido

Representa una compra realizada por un cliente.

Cada pedido agrupa los productos seleccionados, registra la dirección de entrega y mantiene un estado durante todo su ciclo de vida.

### Responsabilidades

- Registrar una compra.
- Asociarse a un cliente.
- Asociarse a una dirección.
- Contener los productos adquiridos.
- Mantener un estado.

---

## Detalle de Pedido

Representa cada uno de los productos incluidos dentro de un pedido.

Permite almacenar la cantidad solicitada y la información necesaria para reconstruir la compra realizada.

### Responsabilidades

- Relacionar pedidos con productos.
- Registrar cantidades.
- Conservar la información de la compra.

---

## Wishlist

Representa la lista de productos favoritos de cada usuario.

Su finalidad es permitir que los clientes almacenen productos de interés para futuras compras.

### Responsabilidades

- Asociar usuarios con productos favoritos.
- Mantener una colección personalizada de productos.

---

## Reseña

Representa la valoración realizada por un usuario sobre un producto.

Cada reseña permite registrar una calificación y un comentario asociado.

### Responsabilidades

- Valorar productos.
- Compartir opiniones con otros usuarios.

---

# Relaciones del Dominio

Las principales relaciones identificadas dentro del dominio son:

- Un usuario puede registrar múltiples direcciones.
- Un usuario puede realizar múltiples pedidos.
- Un usuario puede publicar múltiples reseñas.
- Un usuario puede mantener una lista de productos favoritos.
- Un pedido contiene uno o varios productos.
- Un producto puede pertenecer a varias categorías.
- Una categoría agrupa múltiples productos.
- Un producto puede aparecer en múltiples pedidos.
- Un producto puede recibir múltiples reseñas.
- Una dirección puede utilizarse para realizar pedidos.

---

# Flujo General del Negocio

De forma simplificada, el funcionamiento del dominio puede representarse mediante el siguiente flujo.

```text
Usuario

↓

Explora el catálogo

↓

Selecciona productos

↓

Gestiona favoritos

↓

Realiza un pedido

↓

Selecciona dirección

↓

Se registra la compra

↓

Consulta historial

↓

Publica reseñas
```

---

# Diagrama Conceptual

```text
Usuario
   │
   ├──────── Direcciones
   │
   ├──────── Pedidos ─────── DetallePedido ─────── Producto
   │                                   │               │
   │                                   │               │
   │                                   │          Categoría
   │                                   │
   ├──────── Wishlist ──────────────────┘
   │
   └──────── Reseñas ─────────────────── Producto
```

> [!note]
> Este diagrama representa únicamente las relaciones conceptuales entre las entidades del dominio. La implementación física de dichas relaciones se desarrolla en [[04_DER]].

---

# Resumen

El modelo de dominio de Rincón del Pan identifica las entidades necesarias para representar el funcionamiento de un comercio electrónico orientado a la venta de productos de pastelería.

Cada entidad encapsula una responsabilidad específica dentro del negocio y se relaciona con las demás para cubrir el ciclo completo de compra, desde la exploración del catálogo hasta la gestión de pedidos y la publicación de reseñas.

La implementación física de estas entidades y sus relaciones puede consultarse en los documentos [[03_BaseDatos]] y [[04_DER]].

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[05_CasosUso]]
- [[07_UML]]