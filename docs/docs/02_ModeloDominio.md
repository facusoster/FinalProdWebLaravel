# 🧁 Modelo de Dominio

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[00_AnalisisRequisitos]]
> - [[01_Arquitectura]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[05_CasosUso]]

---

# Introducción

El modelo de dominio describe las entidades que intervienen en el negocio y las relaciones existentes entre ellas.

Cada entidad representa un concepto del dominio del e-commerce y posteriormente se implementa mediante modelos Eloquent dentro del proyecto Laravel.

---

# Objetivos

El modelo de dominio permite:

- Comprender la estructura del negocio.
- Identificar las entidades principales.
- Definir relaciones entre objetos.
- Servir como base para el diseño de la base de datos.

---

# Entidades Principales

El sistema se compone de las siguientes entidades.

## User

Representa a las personas que utilizan la plataforma.

Existen dos roles:

- Cliente
- Administrador

Responsabilidades:

- Autenticarse.
- Gestionar direcciones.
- Realizar pedidos.
- Publicar reseñas.
- Gestionar Wishlist.

---

## Address

Representa una dirección de envío asociada a un usuario.

Cada usuario puede registrar múltiples direcciones.

---

## Product

Representa un producto comercializado por la tienda.

Contiene información como:

- Nombre.
- Descripción.
- Precio.
- Stock.
- Imagen.

Un producto puede pertenecer a múltiples categorías.

---

## Category

Permite clasificar los productos del catálogo.

Cada categoría agrupa productos relacionados.

---

## Wishlist

Representa la lista de productos favoritos de un usuario.

Implementa una relación muchos a muchos entre usuarios y productos.

---

## Order

Representa una compra realizada por un cliente.

Cada pedido registra:

- Usuario.
- Dirección de envío.
- Estado.
- Total.

Estados previstos:

```text
Pendiente
Pagado
Enviado
Entregado
Cancelado
```

---

## Order Item

Representa cada producto incluido dentro de un pedido.

Almacena:

- Cantidad.
- Precio unitario.
- Subtotal.

---

## Review

Representa la valoración realizada por un cliente sobre un producto.

Incluye:

- Calificación.
- Comentario.

---

# Relaciones del Dominio

```text
User
 ├── Addresses
 ├── Orders
 ├── Reviews
 └── Wishlist

Category
 └── Products

Product
 ├── Categories
 ├── Reviews
 ├── Wishlist
 └── Order Items

Order
 └── Order Items
```

---

# Reglas de Negocio

Durante el análisis se definieron las siguientes reglas:

- Un usuario puede registrar múltiples direcciones.
- Un producto puede pertenecer a múltiples categorías.
- Un pedido pertenece a un único usuario.
- Un pedido posee uno o más ítems.
- Un producto puede aparecer en múltiples pedidos.
- Los estados de un pedido deben respetar el flujo definido por el negocio.
- Solo los clientes autenticados pueden generar pedidos.
- Las reseñas corresponden a un usuario y un producto.

---

# Roles del Sistema

## Cliente

Puede:

- Registrarse.
- Iniciar sesión.
- Consultar productos.
- Gestionar Wishlist.
- Gestionar direcciones.
- Realizar pedidos.
- Consultar pedidos.
- Publicar reseñas.

---

## Administrador

Puede:

- Gestionar categorías.
- Gestionar productos.
- Consultar pedidos.
- Actualizar estados.
- Administrar el catálogo.

---

# Correspondencia con Laravel

Cada entidad del dominio posee su representación dentro del proyecto mediante un modelo Eloquent.

Las relaciones entre entidades se implementan utilizando:

- hasOne
- hasMany
- belongsTo
- belongsToMany

Esto permite mantener una correspondencia directa entre el modelo conceptual y la implementación.

---

# Resumen

El modelo de dominio constituye la representación conceptual de Sweet Store y describe los objetos principales del negocio junto con sus relaciones y responsabilidades. Sobre este modelo se construyeron posteriormente la base de datos y la implementación en Laravel.

---

## Documentación relacionada

- [[README]]
- [[00_AnalisisRequisitos]]
- [[01_Arquitectura]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[05_CasosUso]]