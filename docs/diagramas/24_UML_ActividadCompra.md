# ðŸ”„ UML - Diagrama de Actividad: Proceso de Compra

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Actividad

---

# Objetivo

Este diagrama representa el flujo completo que sigue un cliente desde que navega por el catÃ¡logo de productos hasta que confirma una compra.

A diferencia del diagrama de secuencia, aquÃ­ se modelan las **actividades**, **decisiones** y el flujo general del proceso de negocio, sin enfocarse en los componentes internos del sistema.

Este documento complementa la descripciÃ³n funcional presentada en [05_CasosUso](../docs/05_CasosUso.md) y el flujo tÃ©cnico detallado en [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md).

---

# Diagrama


```mermaid
flowchart TD

Inicio([Inicio])

Login[Mostrar pantalla de Login]

Credenciales[Ingresar credenciales]

Validacion{Â¿Credenciales vÃ¡lidas?}

Catalogo[Mostrar catÃ¡logo]

Detalle[Ver detalle del producto]

Agregar[Agregar producto al carrito]

Continuar{Â¿Continuar comprando?}

Direccion[Seleccionar direcciÃ³n de envÃ­o]

Confirmar[Confirmar pedido]

Procesar[Generar pedido]

Actualizar[Actualizar stock]

Vaciar[Vaciar carrito]

Exito[Mostrar confirmaciÃ³n]

Fin([Fin])

Inicio --> Login

Login --> Credenciales

Credenciales --> Validacion

Validacion -- No --> Login

Validacion -- SÃ­ --> Catalogo

Catalogo --> Detalle

Detalle --> Agregar

Agregar --> Continuar

Continuar -- SÃ­ --> Catalogo

Continuar -- No --> Direccion

Direccion --> Confirmar

Confirmar --> Procesar

Procesar --> Actualizar

Actualizar --> Vaciar

Vaciar --> Exito

Exito --> Fin
```


---

# DescripciÃ³n del Flujo

El proceso de compra comienza cuando un usuario accede a la aplicaciÃ³n. Como medida de seguridad, la pantalla inicial del sistema corresponde al formulario de inicio de sesiÃ³n.

Una vez autenticado correctamente, el usuario accede al catÃ¡logo de productos, desde donde puede explorar las distintas categorÃ­as y consultar el detalle de cada producto disponible.

Al visualizar un producto, el cliente puede agregarlo al carrito de compras y decidir si desea continuar agregando mÃ¡s productos o finalizar la selecciÃ³n.

Cuando decide completar la compra, selecciona una de sus direcciones de envÃ­o registradas y confirma el pedido.

Finalmente, el sistema genera el pedido, registra su detalle, actualiza el stock de los productos involucrados, vacÃ­a el carrito de compras y muestra una pantalla de confirmaciÃ³n indicando que la operaciÃ³n se realizÃ³ correctamente.

---

# Actividades Representadas

El diagrama modela las principales actividades que conforman el proceso de compra:

- Iniciar sesiÃ³n.
- Validar credenciales.
- Acceder al catÃ¡logo.
- Consultar el detalle de un producto.
- Agregar productos al carrito de compras.
- Continuar agregando productos al carrito.
- Seleccionar una direcciÃ³n de envÃ­o.
- Confirmar el pedido.
- Generar el pedido.
- Actualizar el stock de los productos.
- Vaciar el carrito de compras.
- Mostrar la confirmaciÃ³n de la compra.

---

# Decisiones del Proceso

Durante el flujo intervienen dos puntos de decisiÃ³n principales.

## ValidaciÃ³n de credenciales

Al iniciar sesiÃ³n, el sistema verifica que las credenciales ingresadas sean vÃ¡lidas.

- Si la autenticaciÃ³n falla, el usuario permanece en la pantalla de inicio de sesiÃ³n.
- Si la autenticaciÃ³n es exitosa, el sistema habilita el acceso al catÃ¡logo de productos.

---

## Continuar comprando

Luego de agregar un producto al carrito, el usuario puede decidir:

- Continuar navegando por el catÃ¡logo para agregar mÃ¡s productos.
- Finalizar la selecciÃ³n y continuar con el proceso de compra.

---

# Reglas de Negocio Representadas

El diagrama refleja las siguientes reglas del sistema:

- Solo los usuarios autenticados pueden acceder al catÃ¡logo.
- Solo los usuarios autenticados pueden realizar pedidos.
- El cliente puede agregar mÃºltiples productos al carrito antes de confirmar la compra.
- Cada pedido requiere la selecciÃ³n de una direcciÃ³n de envÃ­o previamente registrada.
- Al confirmar la compra, el sistema genera automÃ¡ticamente el pedido y su detalle.
- El stock de los productos se actualiza inmediatamente despuÃ©s de registrar el pedido.
- Una vez completada la compra, el carrito queda vacÃ­o.

---

# RelaciÃ³n con Laravel

Este flujo involucra principalmente los siguientes componentes del framework:

- Sistema de autenticaciÃ³n basado en sesiones.
- Middleware `auth`.
- Rutas Web.
- Controladores.
- Modelos Eloquent.
- Vistas Blade.
- Base de datos MySQL.

---

# RelaciÃ³n con otros Diagramas

Este diagrama complementa:

- [diagramas/20_UML_CasosUso](20_UML_CasosUso.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)
- [diagramas/22_UML_SecuenciaLogin](22_UML_SecuenciaLogin.md)
- [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md)
- [diagramas/25_UML_EstadosPedido](25_UML_EstadosPedido.md)

---

# DocumentaciÃ³n Relacionada

- [05_CasosUso](../docs/05_CasosUso.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)
- [09_ManualInstalacion](../docs/09_ManualInstalacion.md)

---

# Consideraciones Finales

El diagrama de actividad describe el proceso completo de compra implementado en **RincÃ³n del Pan**, comenzando con la autenticaciÃ³n obligatoria del usuario y finalizando con la generaciÃ³n del pedido.

Su objetivo es representar el flujo funcional del sistema desde la perspectiva del usuario, mostrando las actividades, decisiones y reglas de negocio involucradas en una compra tÃ­pica, manteniendo coherencia con la implementaciÃ³n desarrollada en Laravel.

