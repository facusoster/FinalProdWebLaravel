# ðŸ‘¥ UML - Casos de Uso

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Casos de Uso

---

# Objetivo

Este diagrama representa los principales casos de uso del sistema **RincÃ³n del Pan**, mostrando la interacciÃ³n entre los distintos actores y las funcionalidades que ofrece la aplicaciÃ³n.

Su finalidad es brindar una visiÃ³n funcional del sistema antes de analizar aspectos tÃ©cnicos como la arquitectura o el modelo de datos.

Este documento complementa la informaciÃ³n desarrollada en [05_CasosUso](../docs/05_CasosUso.md).

---

# Diagrama

```mermaid
flowchart LR

    Cliente["ðŸ‘¤ Cliente"]
    Admin["ðŸ‘¨â€ðŸ’¼ Administrador"]

    subgraph Sistema["RincÃ³n del Pan"]

        UC1(("Registrarse"))
        UC2(("Iniciar sesiÃ³n"))
        UC3(("Ver catÃ¡logo"))
        UC4(("Ver producto"))
        UC5(("Gestionar carrito"))
        UC6(("Realizar pedido"))
        UC7(("Consultar pedidos"))
        UC8(("Publicar reseÃ±a"))

        UA1(("Gestionar categorÃ­as"))
        UA2(("Gestionar productos"))
        UA3(("Gestionar pedidos"))

    end

    Cliente --> UC1
    Cliente --> UC2
    Cliente --> UC3
    Cliente --> UC4
    Cliente --> UC5
    Cliente --> UC6
    Cliente --> UC7
    Cliente --> UC8

    Admin --> UC2
    Admin --> UA1
    Admin --> UA2
    Admin --> UA3
```

---

# Actores

## ðŸ‘¤ Cliente

Representa al usuario registrado que utiliza la tienda para navegar el catÃ¡logo y realizar compras.

Puede:

- Registrarse.
- Iniciar sesiÃ³n.
- Consultar productos.
- Gestionar el carrito de compras.
- Realizar pedidos.
- Consultar pedidos anteriores.
- Publicar reseÃ±as.

---

## ðŸ‘¨â€ðŸ’¼ Administrador

Representa al usuario responsable de administrar el funcionamiento del sistema.

Puede:

- Iniciar sesiÃ³n.
- Gestionar categorÃ­as.
- Gestionar productos.
- Gestionar pedidos.

---

# Casos de Uso

## Registrarse

Permite crear una nueva cuenta de cliente.

Resultado esperado:

- Usuario registrado correctamente.

---

## Iniciar sesiÃ³n

Autentica al usuario mediante correo electrÃ³nico y contraseÃ±a.

Una vez autenticado, Laravel crea la sesiÃ³n correspondiente.

---

## Ver catÃ¡logo

Permite consultar los productos disponibles organizados por categorÃ­as.

Es la principal funcionalidad pÃºblica del sistema.

---

## Ver producto

Muestra la informaciÃ³n detallada de un producto.

Incluye:

- Nombre.
- DescripciÃ³n.
- Precio.
- Imagen.
- Stock disponible.

---

## Gestionar carrito

Permite agregar, modificar o eliminar productos antes de confirmar la compra.

> [!note]
> TÃ©cnicamente esta funcionalidad se implementÃ³ reutilizando la entidad **Wishlist**, aunque funcionalmente representa el **carrito de compras**.

---

## Realizar pedido

Convierte el contenido del carrito en un pedido.

Durante este proceso el sistema:

- calcula el importe total;
- registra el pedido;
- genera el detalle correspondiente.

---

## Consultar pedidos

Permite visualizar el historial de compras realizadas por el cliente.

---

## Publicar reseÃ±a

Permite que un cliente valore un producto adquirido mediante:

- puntuaciÃ³n;
- comentario.

---

## Gestionar categorÃ­as

Caso de uso exclusivo del administrador.

Incluye:

- Alta.
- Baja.
- ModificaciÃ³n.
- Consulta.

---

## Gestionar productos

Permite administrar completamente el catÃ¡logo de productos.

Incluye:

- creaciÃ³n;
- modificaciÃ³n;
- eliminaciÃ³n;
- actualizaciÃ³n de imÃ¡genes;
- asignaciÃ³n de categorÃ­as.

---

## Gestionar pedidos

Permite al administrador supervisar todos los pedidos registrados y actualizar su estado dentro del flujo operativo.

---

# Alcance del Diagrama

Este diagrama representa Ãºnicamente las funcionalidades principales implementadas en el proyecto.

No incluye procesos internos como:

- validaciones;
- middleware;
- autenticaciÃ³n interna;
- consultas a la base de datos;
- renderizado de vistas.

Estos aspectos son desarrollados en los diagramas UML especÃ­ficos y en la documentaciÃ³n tÃ©cnica.

---

# RelaciÃ³n con otros Diagramas

Este diagrama sirve como punto de partida para comprender los restantes modelos UML del proyecto:

- [diagramas/21_UML_Clases](21_UML_Clases.md)
- [diagramas/22_UML_SecuenciaLogin](22_UML_SecuenciaLogin.md)
- [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md)
- [diagramas/24_UML_ActividadCompra](24_UML_ActividadCompra.md)
- [diagramas/25_UML_EstadosPedido](25_UML_EstadosPedido.md)

---

# DocumentaciÃ³n Relacionada

- [00_AnalisisRequisitos](../docs/00_AnalisisRequisitos.md)
- [05_CasosUso](../docs/05_CasosUso.md)
- [07_UML](../docs/07_UML.md)

---

# Consideraciones Finales

El diagrama de casos de uso resume las funcionalidades principales de **RincÃ³n del Pan** desde la perspectiva de los actores que interactÃºan con el sistema.

Constituye una representaciÃ³n de alto nivel del comportamiento esperado de la aplicaciÃ³n y sirve como base para comprender los diagramas UML de clases, secuencia, actividad y estados que documentan con mayor detalle el funcionamiento interno del proyecto.

