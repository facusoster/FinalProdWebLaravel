# 👥 Casos de Uso

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[00_AnalisisRequisitos]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[04_DER]]
> - [[07_UML]]

---

# Introducción

Los casos de uso describen las funcionalidades ofrecidas por el sistema desde la perspectiva de los actores que interactúan con la aplicación.

Constituyen el vínculo entre el análisis funcional y la implementación realizada en Laravel, permitiendo comprender qué acciones puede realizar cada tipo de usuario y cuáles son las responsabilidades del sistema.

---

# Actores

## Cliente

Usuario registrado que interactúa con la tienda para realizar compras y gestionar su información.

Puede:

- Registrarse.
- Iniciar sesión.
- Consultar el catálogo.
- Gestionar direcciones.
- Gestionar Wishlist.
- Realizar pedidos.
- Consultar pedidos.
- Publicar reseñas.

---

## Administrador

Usuario responsable de administrar el contenido y la operación del sistema.

Puede:

- Administrar categorías.
- Administrar productos.
- Gestionar pedidos.
- Actualizar estados.

---

# Diagrama General

```text
                     Rincón del Pan

Cliente
   │
   ├── Registrarse
   ├── Iniciar sesión
   ├── Consultar catálogo
   ├── Consultar producto
   ├── Gestionar Wishlist
   ├── Gestionar direcciones
   ├── Realizar pedido
   ├── Consultar pedidos
   └── Publicar reseñas

Administrador
   │
   ├── CRUD Categorías
   ├── CRUD Productos
   ├── Consultar pedidos
   └── Actualizar estado del pedido
```

---

# Casos de Uso

## CU-01 — Registrarse

**Actor:** Cliente

**Objetivo**

Crear una nueva cuenta de usuario.

---

## CU-02 — Iniciar Sesión

**Actor:** Cliente

**Objetivo**

Autenticarse para acceder a funcionalidades privadas.

---

## CU-03 — Consultar Catálogo

**Actor:** Cliente

**Objetivo**

Visualizar los productos disponibles organizados por categorías.

---

## CU-04 — Consultar Producto

**Actor:** Cliente

**Objetivo**

Visualizar el detalle de un producto.

---

## CU-05 — Gestionar Wishlist

**Actor:** Cliente

**Objetivo**

Agregar o eliminar productos favoritos.

---

## CU-06 — Gestionar Direcciones

**Actor:** Cliente

**Objetivo**

Administrar direcciones de envío.

---

## CU-07 — Realizar Pedido

**Actor:** Cliente

**Objetivo**

Registrar un nuevo pedido.

### Flujo principal

1. Seleccionar productos.
2. Elegir dirección.
3. Confirmar el pedido.
4. Registrar el pedido.
5. Registrar sus ítems.
6. Calcular el total.

---

## CU-08 — Consultar Pedidos

**Actor:** Cliente

**Objetivo**

Visualizar el historial de compras.

---

## CU-09 — Publicar Reseña

**Actor:** Cliente

**Objetivo**

Valorar un producto mediante una calificación y un comentario.

---

## CU-10 — Administrar Categorías

**Actor:** Administrador

**Objetivo**

Crear, modificar, consultar y eliminar categorías.

---

## CU-11 — Administrar Productos

**Actor:** Administrador

**Objetivo**

Gestionar el catálogo completo de productos.

Incluye:

- Nombre
- Precio
- Stock
- Imagen
- Categorías

---

## CU-12 — Consultar Pedidos

**Actor:** Administrador

Visualizar todos los pedidos registrados.

---

## CU-13 — Actualizar Estado del Pedido

**Actor:** Administrador

Modificar el estado de un pedido respetando las reglas del negocio.

Estados previstos:

```text
Pendiente
Pagado
Enviado
Entregado
Cancelado
```

---

# Correspondencia con la Implementación

Los casos de uso fueron implementados mediante:

- Rutas Laravel.
- Controladores.
- Middleware.
- Modelos Eloquent.
- Blade Templates.

---

# Mejoras Futuras

Podrán incorporarse:

- Flujos alternativos.
- Precondiciones.
- Postcondiciones.
- Diagramas UML de Secuencia.
- Diagramas de Actividad.

---

# Resumen

Los casos de uso representan la visión funcional del sistema y describen las operaciones disponibles para clientes y administradores, sirviendo como base para el diseño e implementación del proyecto.

---

## Documentación relacionada

- [[README]]
- [[00_AnalisisRequisitos]]
- [[02_ModeloDominio]]
- [[04_DER]]
- [[07_UML]]
