# 👥 Casos de Uso

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[04_DER]]
> - [[07_UML]]

---

# Introducción

Los casos de uso describen las principales interacciones entre los actores del sistema y la aplicación.

Su objetivo es representar las funcionalidades ofrecidas por **Sweet Store** desde la perspectiva del usuario, identificando las acciones que pueden realizar tanto los clientes como los administradores.

Este documento presenta una visión funcional del sistema y sirve como complemento de la arquitectura y del modelo de dominio.

---

# Actores

El sistema identifica dos actores principales.

## Cliente

Representa al usuario registrado que utiliza la plataforma para consultar el catálogo y realizar compras.

Entre sus responsabilidades se encuentran:

- Registrarse.
- Iniciar sesión.
- Explorar el catálogo.
- Gestionar su wishlist.
- Administrar direcciones.
- Realizar pedidos.
- Consultar el historial de compras.
- Publicar reseñas.

---

## Administrador

Representa al usuario encargado de gestionar el contenido del sistema.

Sus responsabilidades incluyen:

- Administrar categorías.
- Administrar productos.
- Consultar pedidos.
- Actualizar el estado de los pedidos.

---

# Diagrama General de Casos de Uso

```text
                    Sweet Store

                 ┌────────────────────┐

Cliente -------->| Registrarse        |
Cliente -------->| Iniciar sesión     |
Cliente -------->| Ver catálogo       |
Cliente -------->| Ver producto       |
Cliente -------->| Gestionar wishlist |
Cliente -------->| Gestionar dirección|
Cliente -------->| Realizar pedido    |
Cliente -------->| Ver pedidos        |
Cliente -------->| Publicar reseña    |

Administrador -->| CRUD Categorías    |
Administrador -->| CRUD Productos     |
Administrador -->| Ver pedidos        |
Administrador -->| Actualizar estado  |

                 └────────────────────┘
```

> [!tip]
> En futuras versiones este diagrama será reemplazado por un diagrama UML de Casos de Uso generado en Mermaid.

---

# Casos de Uso del Cliente

## CU-01 – Registrarse

**Actor:** Cliente

### Descripción

Permite crear una nueva cuenta dentro del sistema.

### Precondiciones

- El usuario no debe encontrarse registrado.

### Resultado esperado

- Se crea una nueva cuenta de usuario.

---

## CU-02 – Iniciar sesión

**Actor:** Cliente

### Descripción

Permite autenticarse para acceder a las funcionalidades privadas del sistema.

### Resultado esperado

- El usuario accede a su sesión.

---

## CU-03 – Consultar catálogo

**Actor:** Cliente

### Descripción

Permite visualizar los productos disponibles organizados por categorías.

---

## CU-04 – Consultar producto

**Actor:** Cliente

### Descripción

Permite visualizar el detalle completo de un producto.

---

## CU-05 – Gestionar Wishlist

**Actor:** Cliente

### Descripción

Permite agregar o eliminar productos de la lista de favoritos.

---

## CU-06 – Administrar direcciones

**Actor:** Cliente

### Descripción

Permite registrar y administrar las direcciones de entrega.

---

## CU-07 – Realizar pedido

**Actor:** Cliente

### Descripción

Permite generar un pedido utilizando los productos seleccionados.

### Resultado esperado

- El pedido queda registrado en el sistema.

---

## CU-08 – Consultar pedidos

**Actor:** Cliente

### Descripción

Permite visualizar el historial de compras realizadas.

---

## CU-09 – Publicar reseña

**Actor:** Cliente

### Descripción

Permite valorar un producto mediante una calificación y un comentario.

---

# Casos de Uso del Administrador

## CU-10 – Administrar categorías

**Actor:** Administrador

### Descripción

Permite crear, modificar, consultar y eliminar categorías del catálogo.

---

## CU-11 – Administrar productos

**Actor:** Administrador

### Descripción

Permite crear, modificar, consultar y eliminar productos.

Incluye la administración de imágenes, categorías, precio y stock.

---

## CU-12 – Consultar pedidos

**Actor:** Administrador

### Descripción

Permite visualizar todos los pedidos registrados por los clientes.

---

## CU-13 – Actualizar estado de pedido

**Actor:** Administrador

### Descripción

Permite modificar el estado de un pedido durante su procesamiento.

---

# Resumen

Los casos de uso representan las funcionalidades principales implementadas por **Sweet Store**, diferenciando claramente las operaciones disponibles para clientes y administradores.

Este documento constituye una visión funcional del sistema y complementa la información desarrollada en [[02_ModeloDominio]], [[04_DER]] y [[07_UML]].

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[02_ModeloDominio]]
- [[04_DER]]
- [[07_UML]]