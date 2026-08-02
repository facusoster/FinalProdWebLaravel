# 👥 UML - Casos de Uso

> [!info]
> Documento relacionado:
> - [[05_CasosUso]]

---

# Descripción

El siguiente diagrama representa las principales funcionalidades disponibles para los actores del sistema.

```mermaid
flowchart LR

Cliente([👤 Cliente])

Admin([👨‍💼 Administrador])

UC1((Registrarse))
UC2((Iniciar sesión))
UC3((Consultar catálogo))
UC4((Ver producto))
UC5((Gestionar Wishlist))
UC6((Gestionar direcciones))
UC7((Realizar pedido))
UC8((Consultar pedidos))
UC9((Publicar reseña))

UA1((CRUD Categorías))
UA2((CRUD Productos))
UA3((Gestionar pedidos))
UA4((Actualizar estado))

Cliente --- UC1
Cliente --- UC2
Cliente --- UC3
Cliente --- UC4
Cliente --- UC5
Cliente --- UC6
Cliente --- UC7
Cliente --- UC8
Cliente --- UC9

Admin --- UA1
Admin --- UA2
Admin --- UA3
Admin --- UA4
```

---

# Actores

## Cliente

Puede:

- Registrarse.
- Iniciar sesión.
- Navegar el catálogo.
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
- Administrar pedidos.
- Actualizar estados.