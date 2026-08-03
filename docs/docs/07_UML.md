# ðŸ“ Diagramas UML

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# IntroducciÃ³n

El presente documento describe los diagramas UML elaborados durante el desarrollo de **RincÃ³n del Pan**.

Los diagramas constituyen una representaciÃ³n grÃ¡fica del anÃ¡lisis, diseÃ±o e implementaciÃ³n del sistema y permiten comprender su estructura, comportamiento e interacciÃ³n entre los distintos componentes.

Con el objetivo de facilitar su mantenimiento y evoluciÃ³n, cada diagrama se documenta de manera independiente dentro de la carpeta **diagramas**, permitiendo actualizar cada representaciÃ³n sin afectar el resto de la documentaciÃ³n.

---

# Objetivos

Los diagramas UML tienen como finalidad:

- Representar grÃ¡ficamente la arquitectura del sistema.
- Documentar las entidades y sus relaciones.
- Mostrar la interacciÃ³n entre los actores y la aplicaciÃ³n.
- Facilitar el mantenimiento del proyecto.
- Servir como documentaciÃ³n tÃ©cnica para futuras modificaciones.
- Mantener trazabilidad entre el anÃ¡lisis y la implementaciÃ³n.

---

# Diagramas Incluidos

La documentaciÃ³n UML del proyecto se encuentra organizada en los siguientes archivos.

| Diagrama | DescripciÃ³n |
|----------|-------------|
| [diagramas/20_UML_CasosUso](../diagramas/20_UML_CasosUso.md) | InteracciÃ³n entre actores y funcionalidades del sistema. |
| [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md) | RepresentaciÃ³n de las clases del dominio y sus relaciones. |
| [diagramas/22_UML_SecuenciaLogin](../diagramas/22_UML_SecuenciaLogin.md) | Flujo de autenticaciÃ³n de usuarios. |
| [diagramas/23_UML_SecuenciaPedido](../diagramas/23_UML_SecuenciaPedido.md) | Proceso completo de creaciÃ³n de un pedido. |
| [diagramas/24_UML_ActividadCompra](../diagramas/24_UML_ActividadCompra.md) | Flujo de actividades durante una compra. |
| [diagramas/25_UML_EstadosPedido](../diagramas/25_UML_EstadosPedido.md) | Ciclo de vida y transiciones de los pedidos. |

---

# Diagrama de Casos de Uso

Este diagrama representa las funcionalidades disponibles para los distintos actores del sistema.

Permite identificar:

- Clientes.
- Administradores.
- Funcionalidades disponibles para cada rol.
- Alcance funcional del proyecto.

Se encuentra disponible en:

âž¡ï¸ [diagramas/20_UML_CasosUso](../diagramas/20_UML_CasosUso.md)

---

# Diagrama de Clases

El diagrama de clases representa la estructura estÃ¡tica del sistema.

Incluye:

- Modelos principales.
- Relaciones entre entidades.
- Cardinalidades.
- Dependencias del dominio.

Este diagrama mantiene una correspondencia directa con los modelos Eloquent implementados en Laravel.

Disponible en:

âž¡ï¸ [diagramas/21_UML_Clases](../diagramas/21_UML_Clases.md)

---

# Diagramas de Secuencia

Los diagramas de secuencia documentan el intercambio de mensajes entre los distintos componentes durante la ejecuciÃ³n de procesos relevantes.

Actualmente se documentan los siguientes procesos:

## Inicio de SesiÃ³n

Representa el flujo de autenticaciÃ³n del usuario.

Incluye:

- Cliente.
- Rutas.
- Controladores.
- Modelo.
- Base de datos.
- Respuesta al navegador.

Diagrama:

âž¡ï¸ [diagramas/22_UML_SecuenciaLogin](../diagramas/22_UML_SecuenciaLogin.md)

---

## RealizaciÃ³n de Pedido

Describe el proceso completo desde la confirmaciÃ³n de la compra hasta el almacenamiento del pedido.

Incluye:

- Cliente.
- Carrito de compras.
- Pedido.
- Detalle del pedido.
- Base de datos.

Diagrama:

âž¡ï¸ [diagramas/23_UML_SecuenciaPedido](../diagramas/23_UML_SecuenciaPedido.md)

---

# Diagrama de Actividades

Representa el flujo funcional que sigue un cliente al realizar una compra.

Entre las actividades modeladas se encuentran:

- NavegaciÃ³n del catÃ¡logo.
- SelecciÃ³n de productos.
- GestiÃ³n del carrito.
- SelecciÃ³n de direcciÃ³n.
- ConfirmaciÃ³n del pedido.
- Registro de la compra.

Disponible en:

âž¡ï¸ [diagramas/24_UML_ActividadCompra](../diagramas/24_UML_ActividadCompra.md)

---

# Diagrama de Estados

El diagrama de estados representa el ciclo de vida de un pedido dentro del sistema.

Los estados contemplados son:

- Pendiente
- Pagado
- Enviado
- Entregado
- Cancelado

AdemÃ¡s, documenta las transiciones vÃ¡lidas entre cada uno de ellos, facilitando la comprensiÃ³n de las reglas de negocio implementadas.

Disponible en:

âž¡ï¸ [diagramas/25_UML_EstadosPedido](../diagramas/25_UML_EstadosPedido.md)

---

# RelaciÃ³n con la ImplementaciÃ³n

Los diagramas UML fueron elaborados tomando como referencia:

- El relevamiento de requisitos.
- El modelo de dominio.
- La base de datos implementada.
- Los modelos Eloquent.
- Los controladores.
- La arquitectura MVC de Laravel.

Esto garantiza la coherencia entre la documentaciÃ³n y la implementaciÃ³n del proyecto.

---

# OrganizaciÃ³n de los Diagramas

```text
diagramas/
â”‚
â”œâ”€â”€ 01_ArquitecturaMVC.md
â”œâ”€â”€ 02_Componentes.md
â”œâ”€â”€ 03_Deployment.md
â”‚
â”œâ”€â”€ 10_DER.md
â”œâ”€â”€ 11_ModeloDominio.md
â”‚
â”œâ”€â”€ 20_UML_CasosUso.md
â”œâ”€â”€ 21_UML_Clases.md
â”œâ”€â”€ 22_UML_SecuenciaLogin.md
â”œâ”€â”€ 23_UML_SecuenciaPedido.md
â”œâ”€â”€ 24_UML_ActividadCompra.md
â””â”€â”€ 25_UML_EstadosPedido.md
```

---

# Herramienta Utilizada

Todos los diagramas fueron desarrollados utilizando **Mermaid**, integrado con **Obsidian**.

Esta decisiÃ³n permite:

- Mantener los diagramas versionados junto con el cÃ³digo.
- Editarlos mediante archivos Markdown.
- Visualizarlos automÃ¡ticamente en Obsidian.
- Integrarlos con Git y GitHub.
- Facilitar futuras modificaciones sin depender de herramientas externas.

---

# DocumentaciÃ³n Relacionada

Este documento complementa la siguiente documentaciÃ³n tÃ©cnica:

- [00_AnalisisRequisitos](00_AnalisisRequisitos.md)
- [01_Arquitectura](01_Arquitectura.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [05_CasosUso](05_CasosUso.md)
- [08_ManualTecnico](08_ManualTecnico.md)

---

# Consideraciones Finales

La documentaciÃ³n UML de **RincÃ³n del Pan** proporciona una visiÃ³n grÃ¡fica de la arquitectura y del comportamiento del sistema, complementando la documentaciÃ³n textual del proyecto.

La decisiÃ³n de mantener cada diagrama en un archivo independiente favorece la modularidad de la documentaciÃ³n, simplifica su mantenimiento y permite actualizar cada representaciÃ³n de forma aislada a medida que evoluciona el proyecto, manteniendo siempre sincronizados el anÃ¡lisis, el diseÃ±o y la implementaciÃ³n.

