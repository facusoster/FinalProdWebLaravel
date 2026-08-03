# 📐 Diagramas UML

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Introducción

El presente documento describe los diagramas UML elaborados durante el desarrollo de **Rincón del Pan**.

Los diagramas constituyen una representación gráfica del análisis, diseño e implementación del sistema y permiten comprender su estructura, comportamiento e interacción entre los distintos componentes.

Con el objetivo de facilitar su mantenimiento y evolución, cada diagrama se documenta de manera independiente dentro de la carpeta **diagramas**, permitiendo actualizar cada representación sin afectar el resto de la documentación.

---

# Objetivos

Los diagramas UML tienen como finalidad:

- Representar gráficamente la arquitectura del sistema.
- Documentar las entidades y sus relaciones.
- Mostrar la interacción entre los actores y la aplicación.
- Facilitar el mantenimiento del proyecto.
- Servir como documentación técnica para futuras modificaciones.
- Mantener trazabilidad entre el análisis y la implementación.

---

# Diagramas Incluidos

La documentación UML del proyecto se encuentra organizada en los siguientes archivos.

| Diagrama | Descripción |
|----------|-------------|
| [diagramas/20_UML_CasosUso](docs/diagramas/20_UML_CasosUso.md) | Interacción entre actores y funcionalidades del sistema. |
| [diagramas/21_UML_Clases](docs/diagramas/21_UML_Clases.md) | Representación de las clases del dominio y sus relaciones. |
| [diagramas/22_UML_SecuenciaLogin](docs/diagramas/22_UML_SecuenciaLogin.md) | Flujo de autenticación de usuarios. |
| [diagramas/23_UML_SecuenciaPedido](docs/diagramas/23_UML_SecuenciaPedido) | Proceso completo de creación de un pedido. |
| [diagramas/24_UML_ActividadCompra](docs/diagramas/24_UML_ActividadCompra.md) | Flujo de actividades durante una compra. |
| [diagramas/25_UML_EstadosPedido](docs/diagramas/25_UML_EstadosPedido.md) | Ciclo de vida y transiciones de los pedidos. |

---

# Diagrama de Casos de Uso

Este diagrama representa las funcionalidades disponibles para los distintos actores del sistema.

Permite identificar:

- Clientes.
- Administradores.
- Funcionalidades disponibles para cada rol.
- Alcance funcional del proyecto.

Se encuentra disponible en:

➡️ [diagramas/20_UML_CasosUso](docs/diagramas/20_UML_CasosUso.md)

---

# Diagrama de Clases

El diagrama de clases representa la estructura estática del sistema.

Incluye:

- Modelos principales.
- Relaciones entre entidades.
- Cardinalidades.
- Dependencias del dominio.

Este diagrama mantiene una correspondencia directa con los modelos Eloquent implementados en Laravel.

Disponible en:

➡️ [diagramas/21_UML_Clases](docs/diagramas/21_UML_Clases.md)

---

# Diagramas de Secuencia

Los diagramas de secuencia documentan el intercambio de mensajes entre los distintos componentes durante la ejecución de procesos relevantes.

Actualmente se documentan los siguientes procesos:

## Inicio de Sesión

Representa el flujo de autenticación del usuario.

Incluye:

- Cliente.
- Rutas.
- Controladores.
- Modelo.
- Base de datos.
- Respuesta al navegador.

Diagrama:

➡️ [diagramas/22_UML_SecuenciaLogin](docs/diagramas/22_UML_SecuenciaLogin.md)

---

## Realización de Pedido

Describe el proceso completo desde la confirmación de la compra hasta el almacenamiento del pedido.

Incluye:

- Cliente.
- Carrito de compras.
- Pedido.
- Detalle del pedido.
- Base de datos.

Diagrama:

➡️ [diagramas/23_UML_SecuenciaPedido](docs/diagramas/23_UML_SecuenciaPedido)

---

# Diagrama de Actividades

Representa el flujo funcional que sigue un cliente al realizar una compra.

Entre las actividades modeladas se encuentran:

- Navegación del catálogo.
- Selección de productos.
- Gestión del carrito.
- Selección de dirección.
- Confirmación del pedido.
- Registro de la compra.

Disponible en:

➡️ [diagramas/24_UML_ActividadCompra](docs/diagramas/24_UML_ActividadCompra.md)

---

# Diagrama de Estados

El diagrama de estados representa el ciclo de vida de un pedido dentro del sistema.

Los estados contemplados son:

- Pendiente
- Pagado
- Enviado
- Entregado
- Cancelado

Además, documenta las transiciones válidas entre cada uno de ellos, facilitando la comprensión de las reglas de negocio implementadas.

Disponible en:

➡️ [diagramas/25_UML_EstadosPedido](docs/diagramas/25_UML_EstadosPedido.md)

---

# Relación con la Implementación

Los diagramas UML fueron elaborados tomando como referencia:

- El relevamiento de requisitos.
- El modelo de dominio.
- La base de datos implementada.
- Los modelos Eloquent.
- Los controladores.
- La arquitectura MVC de Laravel.

Esto garantiza la coherencia entre la documentación y la implementación del proyecto.

---

# Organización de los Diagramas

```text
diagramas/
│
├── 01_ArquitecturaMVC.md
├── 02_Componentes.md
├── 03_Deployment.md
│
├── 10_DER.md
├── 11_ModeloDominio.md
│
├── 20_UML_CasosUso.md
├── 21_UML_Clases.md
├── 22_UML_SecuenciaLogin.md
├── 23_UML_SecuenciaPedido.md
├── 24_UML_ActividadCompra.md
└── 25_UML_EstadosPedido.md
```

---

# Herramienta Utilizada

Todos los diagramas fueron desarrollados utilizando **Mermaid**, integrado con **Obsidian**.

Esta decisión permite:

- Mantener los diagramas versionados junto con el código.
- Editarlos mediante archivos Markdown.
- Visualizarlos automáticamente en Obsidian.
- Integrarlos con Git y GitHub.
- Facilitar futuras modificaciones sin depender de herramientas externas.

---

# Documentación Relacionada

Este documento complementa la siguiente documentación técnica:

- [00_AnalisisRequisitos](docs/docs/00_AnalisisRequisitos.md)
- [01_Arquitectura](docs/docs/01_Arquitectura.md)
- [02_ModeloDominio](docs/docs/02_ModeloDominio.md)
- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [05_CasosUso](docs/docs/05_CasosUso.md)
- [08_ManualTecnico](docs/docs/08_ManualTecnico.md)

---

# Consideraciones Finales

La documentación UML de **Rincón del Pan** proporciona una visión gráfica de la arquitectura y del comportamiento del sistema, complementando la documentación textual del proyecto.

La decisión de mantener cada diagrama en un archivo independiente favorece la modularidad de la documentación, simplifica su mantenimiento y permite actualizar cada representación de forma aislada a medida que evoluciona el proyecto, manteniendo siempre sincronizados el análisis, el diseño y la implementación.
