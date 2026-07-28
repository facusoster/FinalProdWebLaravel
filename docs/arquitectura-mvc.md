# Arquitectura MVC

# Sweet Store - E-commerce de Pastelería

## Objetivo

Este documento describe la arquitectura de software utilizada en el proyecto Sweet Store, desarrollado con Laravel siguiendo el patrón MVC (Model-View-Controller).

La finalidad es mantener una separación clara de responsabilidades, facilitar el mantenimiento del código, mejorar la escalabilidad y cumplir con los requisitos técnicos establecidos para el trabajo práctico.

---

# Arquitectura General

El sistema se construirá utilizando Laravel y estará organizado según el patrón MVC.

```text
┌─────────────┐
│    Views    │
│   (Blade)   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Controllers │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Models    │
│  Eloquent   │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   MySQL     │
└─────────────┘
```

---

# Componentes MVC

## Models (Modelo)

Los modelos representan las entidades del negocio y gestionan la interacción con la base de datos mediante Eloquent ORM.

### Modelos Principales

```text
User
Address
Category
Product
Order
OrderItem
Review
Wishlist
```

### Responsabilidades

- Acceso a los datos.
- Definición de relaciones Eloquent.
- Reglas de negocio básicas.
- Conversión de datos y atributos.

### Ejemplos de Relaciones

```php
User -> hasMany(Order)
User -> hasMany(Address)

Product -> belongsToMany(Category)

Order -> hasMany(OrderItem)
```

---

## Views (Vista)

Las vistas serán implementadas mediante Blade Templates.

### Responsabilidades

- Mostrar información al usuario.
- Renderizar formularios.
- Presentar mensajes y validaciones.
- Mantener una interfaz consistente.

### Estructura Sugerida

```text
resources/views
│
├── layouts/
├── products/
├── categories/
├── orders/
├── reviews/
├── wishlist/
├── admin/
└── auth/
```

### Layout Base

```text
Header
Menú de navegación
Contenido principal
Footer
```

---

## Controllers (Controlador)

Los controladores funcionarán como intermediarios entre las vistas y los modelos.

### Responsabilidades

- Recibir solicitudes HTTP.
- Invocar lógica de negocio.
- Consultar modelos.
- Retornar vistas o respuestas JSON.

### Controladores Propuestos

```text
HomeController
ProductController
CategoryController
OrderController
ReviewController
WishlistController
AddressController
AdminController
ApiProductController
ApiOrderController
```

---

# Middleware

Laravel utilizará middleware para controlar el acceso a determinadas funcionalidades.

## Middleware Auth

Protege las rutas que requieren un usuario autenticado.

```text
/authenticated routes
```

### Ejemplos

```text
Wishlist
Mis Pedidos
Crear Reseña
Administrar Direcciones
```

---

## Middleware Admin

Middleware personalizado para restringir el acceso al panel administrativo.

### Acceso Permitido

```text
CRUD Productos
CRUD Categorías
Gestión de Pedidos
Dashboard Administrativo
```

---

# Flujo de Navegación del Cliente

```text
Home
│
├── Registro
├── Login
│
├── Catálogo
│   └── Detalle Producto
│
├── Wishlist
│
├── Direcciones
│
├── Mis Pedidos
│   └── Detalle Pedido
│
└── Reseñas
```

---

# Flujo de Navegación del Administrador

```text
Dashboard
│
├── Productos
│   ├── Crear
│   ├── Editar
│   └── Eliminar
│
├── Categorías
│   ├── Crear
│   ├── Editar
│   └── Eliminar
│
└── Pedidos
    └── Actualizar Estado
```

---

# API REST

Además de las vistas Blade, el sistema expondrá un conjunto reducido de endpoints REST.

## Endpoints

```http
GET /api/products
GET /api/products/{id}
GET /api/orders
```

### Formato

```json
{
  "id": 1,
  "name": "Cheesecake",
  "price": 15000
}
```

---

# Seguridad

## Medidas Implementadas

- Hash de contraseñas.
- Protección CSRF.
- Validaciones mediante Form Requests.
- Middleware de autenticación.
- Middleware de autorización por rol.
- Protección de rutas administrativas.

---

# Ventajas de la Arquitectura MVC

- Separación de responsabilidades.
- Código más mantenible.
- Facilita las pruebas.
- Reutilización de componentes.
- Mejor organización del proyecto.
- Compatibilidad con las buenas prácticas recomendadas por Laravel.

---

# Relación con la Consigna

La arquitectura propuesta cumple con los requisitos técnicos del trabajo práctico:

- Uso de Laravel.
- Patrón MVC.
- Eloquent ORM.
- Middleware.
- Blade Templates.
- API REST básica.
- Roles de usuario.
- CRUD administrativos.
- Validaciones mediante Form Requests.
- Migraciones y Seeders.

Esta arquitectura servirá como base para el desarrollo completo de Sweet Store y permitirá mantener una estructura escalable y sencilla de mantener.
