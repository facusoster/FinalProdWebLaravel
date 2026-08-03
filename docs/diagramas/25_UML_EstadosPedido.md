# ðŸ”„ UML - Diagrama de Estados: Pedido

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - MÃ¡quina de Estados

---

# Objetivo

Este diagrama representa el ciclo de vida de un **Pedido** dentro del sistema **RincÃ³n del Pan**.

Permite visualizar los distintos estados por los que atraviesa un pedido desde su creaciÃ³n hasta su finalizaciÃ³n, mostrando las transiciones vÃ¡lidas definidas para el proceso de negocio.

Este modelo se basa en los requisitos establecidos para la materia *Desarrollo de Aplicaciones Web con Laravel*, donde se especifica que el estado del pedido debe controlar las transiciones permitidas durante el proceso de compra.

---

# Diagrama

```mermaid
stateDiagram-v2

[*] --> Pendiente

Pendiente --> Pagado : Pago confirmado
Pendiente --> Cancelado : CancelaciÃ³n

Pagado --> Enviado : Despacho
Pagado --> Cancelado : CancelaciÃ³n

Enviado --> Entregado : RecepciÃ³n confirmada

Entregado --> [*]
Cancelado --> [*]
```

---

# DescripciÃ³n del Flujo

Todo pedido comienza en estado **Pendiente**, inmediatamente despuÃ©s de que el cliente confirma la compra.

Una vez procesado el pago, el pedido pasa al estado **Pagado**, indicando que la operaciÃ³n fue validada correctamente.

Posteriormente el pedido es preparado y despachado, cambiando al estado **Enviado**.

Finalmente, cuando el cliente recibe la mercaderÃ­a, el pedido alcanza el estado **Entregado**, concluyendo su ciclo de vida.

En cualquier momento anterior al envÃ­o, el pedido puede ser cancelado, pasando al estado **Cancelado**.

---

# Estados del Pedido

## Pendiente

Estado inicial del pedido.

CaracterÃ­sticas:

- Pedido recientemente generado.
- Esperando confirmaciÃ³n del pago.
- Puede cancelarse.

---

## Pagado

El pago fue aceptado correctamente.

CaracterÃ­sticas:

- Pedido confirmado.
- Listo para preparaciÃ³n y despacho.
- AÃºn puede cancelarse si no fue enviado.

---

## Enviado

El pedido fue despachado.

CaracterÃ­sticas:

- Se encuentra en proceso de entrega.
- Ya no admite cancelaciones.

---

## Entregado

Estado final del proceso.

CaracterÃ­sticas:

- El cliente recibiÃ³ correctamente el pedido.
- El ciclo de vida del pedido finaliza.

---

## Cancelado

Representa un pedido anulado antes del envÃ­o.

CaracterÃ­sticas:

- Finaliza el proceso.
- No continÃºa hacia otros estados.

---

# Transiciones Permitidas

| Estado Actual | Estado Siguiente |
|----------------|------------------|
| Pendiente | Pagado |
| Pendiente | Cancelado |
| Pagado | Enviado |
| Pagado | Cancelado |
| Enviado | Entregado |

---

# Transiciones No Permitidas

Para mantener la consistencia del negocio, el sistema no deberÃ­a permitir transiciones como:

- Pendiente â†’ Entregado
- Pendiente â†’ Enviado
- Pagado â†’ Pendiente
- Enviado â†’ Pagado
- Entregado â†’ Pendiente
- Cancelado â†’ Pagado
- Cancelado â†’ Enviado
- Entregado â†’ Cancelado

Estas restricciones garantizan que el pedido siga un flujo lÃ³gico y evitan inconsistencias en la gestiÃ³n de compras.

---

# Reglas de Negocio Representadas

El diagrama refleja las siguientes reglas:

- Todo pedido comienza en estado **Pendiente**.
- Un pedido solo puede enviarse despuÃ©s de haber sido pagado.
- Un pedido entregado finaliza su ciclo de vida.
- Los pedidos solo pueden cancelarse antes de ser enviados.
- No es posible reactivar un pedido cancelado.
- No es posible modificar el estado de un pedido una vez entregado.

---

# ImplementaciÃ³n en Laravel

En la implementaciÃ³n actual del proyecto, el estado del pedido se almacena mediante el atributo:

```text
orders.status
```

Los valores posibles definidos para este atributo son:

```text
Pendiente
Pagado
Enviado
Entregado
Cancelado
```

La documentaciÃ³n de la materia recomienda implementar este comportamiento mediante un **Enum de Laravel** o una validaciÃ³n estricta en la capa de negocio, evitando transiciones invÃ¡lidas.

---

# RelaciÃ³n con otros Diagramas

Este diagrama complementa:

- [diagramas/20_UML_CasosUso](20_UML_CasosUso.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)
- [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md)
- [diagramas/24_UML_ActividadCompra](24_UML_ActividadCompra.md)

---

# DocumentaciÃ³n Relacionada

- [03_BaseDatos](../docs/03_BaseDatos.md)
- [04_DER](../docs/04_DER.md)
- [05_CasosUso](../docs/05_CasosUso.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El diagrama de estados modela el ciclo de vida completo de un pedido dentro de **RincÃ³n del Pan**, proporcionando una representaciÃ³n clara de las transiciones vÃ¡lidas entre estados.

Su utilizaciÃ³n facilita la comprensiÃ³n del proceso de gestiÃ³n de pedidos y sirve como referencia para futuras mejoras, como la incorporaciÃ³n de notificaciones, seguimiento de envÃ­os o automatizaciÃ³n de procesos comerciales.

