# 👥 Casos de Uso

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Introducción

Este documento describe los principales casos de uso identificados durante la etapa de análisis del proyecto **Rincón del Pan**.

Los casos de uso representan las interacciones entre los actores y el sistema, permitiendo comprender las funcionalidades implementadas y el comportamiento esperado de la aplicación.

El detalle gráfico de los diagramas UML asociados se encuentra documentado por separado.

➡️ [diagramas/20_UML_CasosUso](../diagramas/20_UML_CasosUso.md)

---

# Objetivos

Los casos de uso permiten:

- Identificar las funcionalidades principales del sistema.
- Definir la interacción entre usuarios y aplicación.
- Delimitar las responsabilidades de cada actor.
- Facilitar la comprensión del funcionamiento general del sistema.
- Servir como base para el diseño de la arquitectura y la implementación.

---

# Actores

## Cliente

Usuario registrado que utiliza la plataforma para realizar compras y administrar su información personal.

Puede:

- Registrarse.
- Iniciar sesión.
- Consultar el catálogo.
- Gestionar su carrito de compras.
- Administrar direcciones.
- Realizar pedidos.
- Consultar compras anteriores.
- Publicar reseñas.

---

## Administrador

Usuario con permisos de administración sobre el sistema.

Puede:

- Gestionar categorías.
- Gestionar productos.
- Consultar todos los pedidos.
- Actualizar el estado de los pedidos.
- Administrar el catálogo de productos.

---

# Casos de Uso del Cliente

---

## CU01 — Registrarse

### Descripción

Permite crear una nueva cuenta para acceder al sistema.

### Actor

Cliente

### Precondiciones

- No estar autenticado.

### Flujo Principal

1. El usuario accede al formulario de registro.
2. Completa los datos solicitados.
3. El sistema valida la información.
4. Se crea el nuevo usuario.
5. El sistema permite iniciar sesión.

### Resultado

Nuevo usuario registrado correctamente.

---

## CU02 — Iniciar Sesión

### Descripción

Permite autenticarse dentro del sistema.

### Actor

Cliente

### Precondiciones

- Usuario registrado.

### Flujo Principal

1. Ingresa correo electrónico y contraseña.
2. El sistema valida las credenciales.
3. Se inicia la sesión.
4. Se redirecciona al usuario.

### Resultado

Usuario autenticado.

---

## CU03 — Consultar Catálogo

### Descripción

Permite visualizar los productos disponibles organizados por categorías.

### Actor

Cliente

### Flujo Principal

1. Accede al catálogo.
2. Navega entre categorías.
3. Consulta productos.
4. Visualiza el detalle de cada producto.

### Resultado

Listado de productos disponible para su consulta.

---

## CU04 — Gestionar Carrito de Compras

### Descripción

Permite administrar los productos seleccionados antes de confirmar una compra.

> [!note]
> Desde el punto de vista técnico esta funcionalidad se implementa mediante la entidad **Wishlist**.

### Actor

Cliente

### Flujo Principal

1. Selecciona un producto.
2. Lo agrega al carrito.
3. Modifica cantidades cuando corresponde.
4. Elimina productos si lo desea.

### Resultado

Carrito actualizado.

---

## CU05 — Gestionar Direcciones

### Descripción

Permite registrar y administrar direcciones de envío.

### Actor

Cliente

### Flujo Principal

1. Accede al módulo de direcciones.
2. Agrega una nueva dirección.
3. Edita o elimina registros existentes.

### Resultado

Direcciones actualizadas.

---

## CU06 — Realizar Pedido

### Descripción

Permite confirmar la compra de los productos incluidos en el carrito.

### Actor

Cliente

### Precondiciones

- Usuario autenticado.
- Carrito con productos.
- Dirección registrada.

### Flujo Principal

1. Revisa el carrito.
2. Selecciona una dirección.
3. Confirma la compra.
4. El sistema registra el pedido.
5. Se calcula automáticamente el total.
6. Se generan los detalles del pedido.

### Resultado

Pedido registrado correctamente.

---

## CU07 — Consultar Pedidos

### Descripción

Permite visualizar el historial de compras realizadas.

### Actor

Cliente

### Flujo Principal

1. Accede al historial.
2. Consulta los pedidos registrados.
3. Visualiza su estado y detalle.

### Resultado

Historial disponible.

---

## CU08 — Publicar Reseña

### Descripción

Permite valorar un producto adquirido.

### Actor

Cliente

### Precondiciones

- Haber realizado una compra del producto.

### Flujo Principal

1. Selecciona un producto.
2. Ingresa puntuación.
3. Escribe un comentario.
4. Guarda la reseña.

### Resultado

Reseña registrada.

---

# Casos de Uso del Administrador

---

## CU09 — Gestionar Categorías

### Descripción

Permite administrar las categorías del catálogo.

### Actor

Administrador

### Funcionalidades

- Crear.
- Editar.
- Eliminar.
- Consultar.

### Resultado

Catálogo organizado por categorías.

---

## CU10 — Gestionar Productos

### Descripción

Permite administrar los productos comercializados.

### Actor

Administrador

### Funcionalidades

- Alta.
- Baja.
- Modificación.
- Consulta.
- Asociación con categorías.
- Gestión de imágenes.

### Resultado

Catálogo actualizado.

---

## CU11 — Gestionar Pedidos

### Descripción

Permite consultar todos los pedidos y actualizar su estado.

### Actor

Administrador

### Flujo Principal

1. Accede al panel administrativo.
2. Consulta pedidos.
3. Selecciona uno.
4. Modifica su estado.

### Resultado

Estado del pedido actualizado.

---

# Resumen General

| Código | Caso de Uso | Actor |
|---------|-------------|-------|
| CU01 | Registrarse | Cliente |
| CU02 | Iniciar sesión | Cliente |
| CU03 | Consultar catálogo | Cliente |
| CU04 | Gestionar carrito de compras | Cliente |
| CU05 | Gestionar direcciones | Cliente |
| CU06 | Realizar pedido | Cliente |
| CU07 | Consultar pedidos | Cliente |
| CU08 | Publicar reseñas | Cliente |
| CU09 | Gestionar categorías | Administrador |
| CU10 | Gestionar productos | Administrador |
| CU11 | Gestionar pedidos | Administrador |

---

# Relación con la Implementación

Cada caso de uso se corresponde con uno o más módulos implementados en Laravel mediante:

- Rutas (`routes/web.php`)
- Controladores
- Modelos Eloquent
- Vistas Blade
- Middleware de autenticación y autorización

La lógica de negocio se encuentra distribuida respetando la arquitectura MVC del framework.

---

# Diagramas Relacionados

Los diagramas UML que representan estos procesos pueden consultarse en:

- [diagramas/20_UML_CasosUso](../diagramas/20_UML_CasosUso.md)
- [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)
- [diagramas/22_UML_SecuenciaLogin](../diagramas/22_UML_SecuenciaLogin.md)
- [diagramas/23_UML_SecuenciaPedido](../diagramas/23_UML_SecuenciaPedido.md)
- [diagramas/24_UML_ActividadCompra](../diagramas/24_UML_ActividadCompra.md)
- [diagramas/25_UML_EstadosPedido](../diagramas/25_UML_EstadosPedido.md)

---

# Documentación Relacionada

Este documento se complementa con:

- [00_AnalisisRequisitos](./00_AnalisisRequisitos.md)
- [01_Arquitectura](./01_Arquitectura.md)
- [02_ModeloDominio](./02_ModeloDominio.md)
- [04_DER](./04_DER.md)
- [07_UML](./07_UML.md)
- [08_ManualTecnico](./08_ManualTecnico.md)

---

# Consideraciones Finales

Los casos de uso documentan las funcionalidades implementadas en **Rincón del Pan** desde la perspectiva de los actores del sistema.

Su definición permitió establecer una correspondencia directa entre el análisis funcional, el diseño del modelo de dominio y la implementación realizada con **Laravel Framework 13.23.0**, asegurando la trazabilidad entre los requisitos del proyecto y el comportamiento de la aplicación.
