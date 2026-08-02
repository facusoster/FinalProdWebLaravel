# 🧩 Modelo de Dominio

> [!info]
> Documento relacionado:
> - [[02_ModeloDominio]]

---

# Descripción

El siguiente diagrama representa las entidades principales del dominio de negocio, independientemente de su implementación física en la base de datos.

```mermaid
classDiagram

class User{
+name
+email
+role
}

class Address

class Order{
status
total
}

class OrderItem{
quantity
unitPrice
subtotal
}

class Product{
name
price
stock
}

class Category

class Review{
rating
comment
}

class Wishlist

User "1" --> "*" Address

User "1" --> "*" Order

Order "1" --> "*" OrderItem

Product "1" --> "*" OrderItem

Product "*" --> "*" Category

User "1" --> "*" Review

Product "1" --> "*" Review

User "1" --> "*" Wishlist

Product "1" --> "*" Wishlist
```

---

# Observaciones

Este diagrama representa únicamente el dominio funcional del sistema.

No incluye:

- atributos técnicos
- claves primarias
- claves foráneas
- timestamps

Su objetivo es comprender el negocio antes de analizar la implementación.