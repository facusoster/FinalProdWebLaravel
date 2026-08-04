# 🗄️ Base de Datos

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# Introducción

La persistencia de datos de **Rincón del Pan** fue implementada utilizando **MySQL** como motor de base de datos y **Eloquent ORM** como capa de acceso a datos provista por Laravel.

El diseño busca garantizar la integridad de la información, minimizar la redundancia de datos y facilitar el mantenimiento de la aplicación mediante un esquema relacional normalizado.

Toda la estructura se encuentra versionada mediante **Migraciones**, permitiendo reconstruir la base de datos desde cero en cualquier entorno de desarrollo.

---

# Objetivos

La base de datos fue diseñada con los siguientes objetivos:

- Almacenar de forma consistente la información del sistema.
- Mantener la integridad referencial entre las entidades.
- Facilitar el crecimiento del proyecto.
- Evitar duplicidad de información.
- Aprovechar las capacidades del ORM Eloquent.
- Permitir la reconstrucción automática mediante migraciones.

---

# Motor de Base de Datos

El proyecto utiliza:

| Característica | Tecnología |
|---------------|------------|
| Motor | MySQL 8 |
| Framework ORM | Eloquent ORM |
| Migraciones | Laravel Migrations |
| Datos iniciales | Laravel Seeders |
| Configuración | Archivo `.env` |

---

# Modelo Relacional

La base de datos está compuesta por las siguientes tablas principales:

| Tabla | Descripción |
|--------|-------------|
| users | Usuarios registrados del sistema. |
| addresses | Direcciones de envío de los usuarios. |
| categories | Categorías del catálogo. |
| products | Productos comercializados. |
| category_product | Tabla pivote entre productos y categorías. |
| orders | Pedidos realizados por los clientes. |
| order_items | Detalle de productos incluidos en cada pedido. |
| reviews | Reseñas realizadas por los usuarios. |
| wishlists | Implementación del carrito de compras. |

---

# Relaciones

Las principales relaciones implementadas son:

| Relación | Cardinalidad |
|----------|--------------|
| User → Address | 1:N |
| User → Order | 1:N |
| User → Review | 1:N |
| User → Wishlist | 1:N |
| Address → Order | 1:N |
| Order → OrderItem | 1:N |
| Product → OrderItem | 1:N |
| Product ↔ Category | N:M |
| Product → Review | 1:N |
| Product → Wishlist | 1:N |

Las relaciones son implementadas mediante claves foráneas y modelos Eloquent.

---

# Integridad Referencial

Todas las relaciones utilizan claves foráneas definidas mediante las migraciones de Laravel.

Se emplea la sintaxis recomendada por el framework:

```php
$table->foreignId('user_id')->constrained();
```

Esto garantiza:

- existencia de registros relacionados;
- consistencia de los datos;
- navegación entre entidades mediante Eloquent;
- mantenimiento simplificado del esquema.

---

# Migraciones

La estructura completa de la base de datos fue desarrollada mediante migraciones.

Cada modificación del esquema queda registrada dentro del directorio:

```text
database/migrations/
```

Las migraciones permiten:

- crear la estructura completa;
- modificar tablas existentes;
- versionar cambios;
- reconstruir el esquema desde cero.

Su ejecución se realiza mediante:

```bash
php artisan migrate
```

Para recrear completamente la base de datos:

```bash
php artisan migrate:fresh --seed
```

---

# Seeders

Los datos iniciales del proyecto son generados mediante **Seeders**.

Estos permiten poblar automáticamente la base de datos con información de prueba.

Entre los datos generados se incluyen:

- usuarios;
- categorías;
- productos;
- direcciones;
- pedidos;
- detalle de pedidos;
- reseñas;
- carrito de compras.

La ejecución se realiza mediante:

```bash
php artisan db:seed
```

o bien:

```bash
php artisan migrate --seed
```

---

# Eloquent ORM

Toda la persistencia del sistema utiliza **Eloquent ORM**, evitando consultas SQL embebidas siempre que resulta posible.

Las relaciones implementadas incluyen:

- `hasMany()`
- `belongsTo()`
- `belongsToMany()`

Esto permite navegar entre entidades utilizando objetos del dominio en lugar de consultas SQL manuales.

---

# Tabla Pivote

La relación entre productos y categorías se implementa mediante la tabla pivote:

```text
category_product
```

Esta estructura permite que:

- un producto pertenezca a múltiples categorías;
- una categoría agrupe múltiples productos.

Laravel administra esta relación mediante:

```php
belongsToMany()
```

---

# Carrito de Compras

Durante el desarrollo se decidió reutilizar la entidad **Wishlist** como implementación del carrito de compras.

Desde el punto de vista funcional, el usuario interactúa con un **Carrito de Compras**.

Desde el punto de vista técnico, dicha funcionalidad se encuentra respaldada por la tabla:

```text
wishlists
```

Esta decisión permitió simplificar el modelo de datos sin afectar la funcionalidad del sistema.

---

# Estados del Pedido

Cada pedido posee un estado que representa su ciclo de vida dentro del sistema.

Los estados previstos son:

- Pendiente
- Pagado
- Enviado
- Entregado
- Cancelado

Las transiciones entre estados son administradas por la lógica de negocio implementada en la aplicación.

---

# Normalización

El modelo de datos fue diseñado siguiendo principios de normalización con el objetivo de:

- minimizar redundancia;
- evitar inconsistencias;
- facilitar el mantenimiento;
- preservar la integridad de la información.

Las relaciones N:M se resolvieron mediante tablas pivote, mientras que las relaciones 1:N se implementaron mediante claves foráneas.

---

# Configuración

La conexión a la base de datos se configura mediante variables de entorno definidas en el archivo:

```text
.env
```

Entre las variables principales se encuentran:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nombre_base>
DB_USERNAME=<usuario>
DB_PASSWORD=<contraseña>
```

Esto permite mantener las credenciales fuera del código fuente y adaptar fácilmente la configuración a distintos entornos.

---

# Documentación Relacionada

La estructura de la base de datos se complementa con los siguientes documentos:

- [04_DER](./04_DER.md)
- [10_DiccionarioDatos](./10_DiccionarioDatos.md)
- [02_ModeloDominio](./02_ModeloDominio.md)
- [08_ManualTecnico](./08_ManualTecnico.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)

---

# Consideraciones Finales

La base de datos de **Rincón del Pan** fue diseñada para acompañar la arquitectura MVC implementada con Laravel, aprovechando las capacidades de **Eloquent ORM**, las **Migraciones** y los **Seeders** para garantizar una estructura consistente, mantenible y fácilmente reproducible.

El esquema relacional implementado refleja el dominio del negocio y constituye el soporte fundamental para el funcionamiento de todas las funcionalidades desarrolladas en la aplicación.
