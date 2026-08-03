# ðŸ‘¥ Casos de Uso

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# IntroducciÃ³n

Este documento describe los principales casos de uso identificados durante la etapa de anÃ¡lisis del proyecto **RincÃ³n del Pan**.

Los casos de uso representan las interacciones entre los actores y el sistema, permitiendo comprender las funcionalidades implementadas y el comportamiento esperado de la aplicaciÃ³n.

El detalle grÃ¡fico de los diagramas UML asociados se encuentra documentado por separado.

âž¡ï¸ [diagramas/20_UML_CasosUso](../diagramas/20_UML_CasosUso.md)

---

# Objetivos

Los casos de uso permiten:

- Identificar las funcionalidades principales del sistema.
- Definir la interacciÃ³n entre usuarios y aplicaciÃ³n.
- Delimitar las responsabilidades de cada actor.
- Facilitar la comprensiÃ³n del funcionamiento general del sistema.
- Servir como base para el diseÃ±o de la arquitectura y la implementaciÃ³n.

---

# Actores

## Cliente

Usuario registrado que utiliza la plataforma para realizar compras y administrar su informaciÃ³n personal.

Puede:

- Registrarse.
- Iniciar sesiÃ³n.
- Consultar el catÃ¡logo.
- Gestionar su carrito de compras.
- Administrar direcciones.
- Realizar pedidos.
- Consultar compras anteriores.
- Publicar reseÃ±as.

---

## Administrador

Usuario con permisos de administraciÃ³n sobre el sistema.

Puede:

- Gestionar categorÃ­as.
- Gestionar productos.
- Consultar todos los pedidos.
- Actualizar el estado de los pedidos.
- Administrar el catÃ¡logo de productos.

---

# Casos de Uso del Cliente

---

## CU01 â€” Registrarse

### DescripciÃ³n

Permite crear una nueva cuenta para acceder al sistema.

### Actor

Cliente

### Precondiciones

- No estar autenticado.

### Flujo Principal

1. El usuario accede al formulario de registro.
2. Completa los datos solicitados.
3. El sistema valida la informaciÃ³n.
4. Se crea el nuevo usuario.
5. El sistema permite iniciar sesiÃ³n.

### Resultado

Nuevo usuario registrado correctamente.

---

## CU02 â€” Iniciar SesiÃ³n

### DescripciÃ³n

Permite autenticarse dentro del sistema.

### Actor

Cliente

### Precondiciones

- Usuario registrado.

### Flujo Principal

1. Ingresa correo electrÃ³nico y contraseÃ±a.
2. El sistema valida las credenciales.
3. Se inicia la sesiÃ³n.
4. Se redirecciona al usuario.

### Resultado

Usuario autenticado.

---

## CU03 â€” Consultar CatÃ¡logo

### DescripciÃ³n

Permite visualizar los productos disponibles organizados por categorÃ­as.

### Actor

Cliente

### Flujo Principal

1. Accede al catÃ¡logo.
2. Navega entre categorÃ­as.
3. Consulta productos.
4. Visualiza el detalle de cada producto.

### Resultado

Listado de productos disponible para su consulta.

---

## CU04 â€” Gestionar Carrito de Compras

### DescripciÃ³n

Permite administrar los productos seleccionados antes de confirmar una compra.

> [!note]
> Desde el punto de vista tÃ©cnico esta funcionalidad se implementa mediante la entidad **Wishlist**.

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

## CU05 â€” Gestionar Direcciones

### DescripciÃ³n

Permite registrar y administrar direcciones de envÃ­o.

### Actor

Cliente

### Flujo Principal

1. Accede al mÃ³dulo de direcciones.
2. Agrega una nueva direcciÃ³n.
3. Edita o elimina registros existentes.

### Resultado

Direcciones actualizadas.

---

## CU06 â€” Realizar Pedido

### DescripciÃ³n

Permite confirmar la compra de los productos incluidos en el carrito.

### Actor

Cliente

### Precondiciones

- Usuario autenticado.
- Carrito con productos.
- DirecciÃ³n registrada.

### Flujo Principal

1. Revisa el carrito.
2. Selecciona una direcciÃ³n.
3. Confirma la compra.
4. El sistema registra el pedido.
5. Se calcula automÃ¡ticamente el total.
6. Se generan los detalles del pedido.

### Resultado

Pedido registrado correctamente.

---

## CU07 â€” Consultar Pedidos

### DescripciÃ³n

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

## CU08 â€” Publicar ReseÃ±a

### DescripciÃ³n

Permite valorar un producto adquirido.

### Actor

Cliente

### Precondiciones

- Haber realizado una compra del producto.

### Flujo Principal

1. Selecciona un producto.
2. Ingresa puntuaciÃ³n.
3. Escribe un comentario.
4. Guarda la reseÃ±a.

### Resultado

ReseÃ±a registrada.

---

# Casos de Uso del Administrador

---

## CU09 â€” Gestionar CategorÃ­as

### DescripciÃ³n

Permite administrar las categorÃ­as del catÃ¡logo.

### Actor

Administrador

### Funcionalidades

- Crear.
- Editar.
- Eliminar.
- Consultar.

### Resultado

CatÃ¡logo organizado por categorÃ­as.

---

## CU10 â€” Gestionar Productos

### DescripciÃ³n

Permite administrar los productos comercializados.

### Actor

Administrador

### Funcionalidades

- Alta.
- Baja.
- ModificaciÃ³n.
- Consulta.
- AsociaciÃ³n con categorÃ­as.
- GestiÃ³n de imÃ¡genes.

### Resultado

CatÃ¡logo actualizado.

---

## CU11 â€” Gestionar Pedidos

### DescripciÃ³n

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

| CÃ³digo | Caso de Uso | Actor |
|---------|-------------|-------|
| CU01 | Registrarse | Cliente |
| CU02 | Iniciar sesiÃ³n | Cliente |
| CU03 | Consultar catÃ¡logo | Cliente |
| CU04 | Gestionar carrito de compras | Cliente |
| CU05 | Gestionar direcciones | Cliente |
| CU06 | Realizar pedido | Cliente |
| CU07 | Consultar pedidos | Cliente |
| CU08 | Publicar reseÃ±as | Cliente |
| CU09 | Gestionar categorÃ­as | Administrador |
| CU10 | Gestionar productos | Administrador |
| CU11 | Gestionar pedidos | Administrador |

---

# RelaciÃ³n con la ImplementaciÃ³n

Cada caso de uso se corresponde con uno o mÃ¡s mÃ³dulos implementados en Laravel mediante:

- Rutas (`routes/web.php`)
- Controladores
- Modelos Eloquent
- Vistas Blade
- Middleware de autenticaciÃ³n y autorizaciÃ³n

La lÃ³gica de negocio se encuentra distribuida respetando la arquitectura MVC del framework.

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

# DocumentaciÃ³n Relacionada

Este documento se complementa con:

- [00_AnalisisRequisitos](00_AnalisisRequisitos.md)
- [01_Arquitectura](01_Arquitectura.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [04_DER](04_DER.md)
- [07_UML](07_UML.md)
- [08_ManualTecnico](08_ManualTecnico.md)

---

# Consideraciones Finales

Los casos de uso documentan las funcionalidades implementadas en **RincÃ³n del Pan** desde la perspectiva de los actores del sistema.

Su definiciÃ³n permitiÃ³ establecer una correspondencia directa entre el anÃ¡lisis funcional, el diseÃ±o del modelo de dominio y la implementaciÃ³n realizada con **Laravel Framework 13.23.0**, asegurando la trazabilidad entre los requisitos del proyecto y el comportamiento de la aplicaciÃ³n.

