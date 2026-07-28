# Modelo Físico de Base de Datos

## Proyecto

**Sweet Store - E-commerce de Pastelería**

---

# Objetivo

Este documento describe el modelo físico de la base de datos utilizado por la aplicación Sweet Store.

El diseño fue elaborado a partir del análisis de requisitos y del Diagrama Entidad-Relación (DER) definido para el proyecto.

La base de datos será implementada utilizando MySQL y administrada mediante migraciones de Laravel.

---

# Entidades del Sistema

## users

Almacena la información de usuarios registrados y administradores.

### Campos

- id
- name
- email
- password
- role
- created_at
- updated_at

### Relaciones

- 1:N con addresses
- 1:N con orders
- 1:N con reviews
- N:M con products mediante wishlists

---

## addresses

Almacena las direcciones de envío de los usuarios.

### Relaciones

- N:1 con users
- 1:N con orders

---

## categories

Representa las categorías del catálogo.

### Ejemplos

- Tortas
- Tartas
- Cookies
- Cupcakes
- Desayunos

### Relaciones

- N:M con products

---

## products

Almacena los productos disponibles.

### Relaciones

- N:M con categories
- N:M con users mediante wishlists
- 1:N con reviews
- 1:N con order_items

---

## category_product

Tabla pivote para la relación muchos a muchos entre categorías y productos.

---

## orders

Representa pedidos realizados por clientes.

### Estados válidos

- pendiente
- pagado
- enviado
- entregado
- cancelado

---

## order_items

Representa el detalle de productos incluidos en cada pedido.

---

## reviews

Permite almacenar comentarios y puntuaciones de productos.

### Rating

Valores permitidos:

- 1
- 2
- 3
- 4
- 5

---

## wishlists

Permite registrar productos favoritos de cada usuario.

---

# Relaciones

## Uno a Muchos (1:N)

- users → addresses
- users → orders
- addresses → orders
- orders → order_items
- products → order_items
- users → reviews
- products → reviews

## Muchos a Muchos (N:M)

- products ↔ categories
- users ↔ products (wishlists)

---

# Script SQL

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','cliente') NOT NULL DEFAULT 'cliente',
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE addresses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    province VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20) NOT NULL,
    country VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    image_url VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE category_product (
    category_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (category_id, product_id),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    address_id BIGINT UNSIGNED NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pendiente','pagado','enviado','entregado','cancelado') NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (address_id) REFERENCES addresses(id) ON DELETE RESTRICT
);

CREATE TABLE order_items (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

CREATE TABLE reviews (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    rating TINYINT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    CHECK (rating BETWEEN 1 AND 5)
);

CREATE TABLE wishlists (
    user_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL,
    PRIMARY KEY (user_id, product_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
```

---

# Consideraciones de Diseño

- Se utiliza una tabla pivote `category_product` para la relación N:M entre categorías y productos.
- Se utiliza una tabla pivote `wishlists` para almacenar productos favoritos.
- Las reseñas están limitadas a valores entre 1 y 5.
- Los pedidos utilizan estados controlados mediante ENUM.
- Las claves foráneas garantizan la integridad referencial.
- El modelo está preparado para Laravel Eloquent ORM y Migraciones.
