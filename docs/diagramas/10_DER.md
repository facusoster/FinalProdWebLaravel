# 🗄️ Diagrama Entidad-Relación (DER)

> [!info]
> Documento relacionado:
> - [[04_DER]]
> - [[10_DiccionarioDatos]]

---

# Descripción

El siguiente diagrama representa el modelo lógico de la base de datos del proyecto **Sweet Store**.

```mermaid
erDiagram

    USERS ||--o{ ADDRESSES : posee
    USERS ||--o{ ORDERS : realiza
    USERS ||--o{ REVIEWS : escribe
    USERS ||--o{ WISHLISTS : tiene

    PRODUCTS ||--o{ REVIEWS : recibe
    PRODUCTS ||--o{ ORDER_ITEMS : pertenece
    PRODUCTS ||--o{ WISHLISTS : favorito

    ORDERS ||--|{ ORDER_ITEMS : contiene

    PRODUCTS }o--o{ CATEGORY_PRODUCT : pertenece
    CATEGORIES }o--o{ CATEGORY_PRODUCT : clasifica

    USERS {
        bigint id PK
        string name
        string email
        string password
        string role
    }

    ADDRESSES {
        bigint id PK
        bigint user_id FK
        string street
        string city
        string province
        string postal_code
    }

    CATEGORIES {
        bigint id PK
        string name
        string description
    }

    PRODUCTS {
        bigint id PK
        string name
        text description
        decimal price
        integer stock
        string image
    }

    CATEGORY_PRODUCT {
        bigint category_id FK
        bigint product_id FK
    }

    ORDERS {
        bigint id PK
        bigint user_id FK
        bigint address_id FK
        decimal total
        enum status
    }

    ORDER_ITEMS {
        bigint id PK
        bigint order_id FK
        bigint product_id FK
        integer quantity
        decimal unit_price
        decimal subtotal
    }

    REVIEWS {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
        integer rating
        text comment
    }

    WISHLISTS {
        bigint id PK
        bigint user_id FK
        bigint product_id FK
    }
```