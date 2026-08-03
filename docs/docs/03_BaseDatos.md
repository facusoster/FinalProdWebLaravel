# ðŸ—„ï¸ Base de Datos

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Motor de Base de Datos:** MySQL 8

---

# IntroducciÃ³n

La persistencia de datos de **RincÃ³n del Pan** fue implementada utilizando **MySQL** como motor de base de datos y **Eloquent ORM** como capa de acceso a datos provista por Laravel.

El diseÃ±o busca garantizar la integridad de la informaciÃ³n, minimizar la redundancia de datos y facilitar el mantenimiento de la aplicaciÃ³n mediante un esquema relacional normalizado.

Toda la estructura se encuentra versionada mediante **Migraciones**, permitiendo reconstruir la base de datos desde cero en cualquier entorno de desarrollo.

---

# Objetivos

La base de datos fue diseÃ±ada con los siguientes objetivos:

- Almacenar de forma consistente la informaciÃ³n del sistema.
- Mantener la integridad referencial entre las entidades.
- Facilitar el crecimiento del proyecto.
- Evitar duplicidad de informaciÃ³n.
- Aprovechar las capacidades del ORM Eloquent.
- Permitir la reconstrucciÃ³n automÃ¡tica mediante migraciones.

---

# Motor de Base de Datos

El proyecto utiliza:

| CaracterÃ­stica | TecnologÃ­a |
|---------------|------------|
| Motor | MySQL 8 |
| Framework ORM | Eloquent ORM |
| Migraciones | Laravel Migrations |
| Datos iniciales | Laravel Seeders |
| ConfiguraciÃ³n | Archivo `.env` |

---

# Modelo Relacional

La base de datos estÃ¡ compuesta por las siguientes tablas principales:

| Tabla | DescripciÃ³n |
|--------|-------------|
| users | Usuarios registrados del sistema. |
| addresses | Direcciones de envÃ­o de los usuarios. |
| categories | CategorÃ­as del catÃ¡logo. |
| products | Productos comercializados. |
| category_product | Tabla pivote entre productos y categorÃ­as. |
| orders | Pedidos realizados por los clientes. |
| order_items | Detalle de productos incluidos en cada pedido. |
| reviews | ReseÃ±as realizadas por los usuarios. |
| wishlists | ImplementaciÃ³n del carrito de compras. |

---

# Relaciones

Las principales relaciones implementadas son:

| RelaciÃ³n | Cardinalidad |
|----------|--------------|
| User â†’ Address | 1:N |
| User â†’ Order | 1:N |
| User â†’ Review | 1:N |
| User â†’ Wishlist | 1:N |
| Address â†’ Order | 1:N |
| Order â†’ OrderItem | 1:N |
| Product â†’ OrderItem | 1:N |
| Product â†” Category | N:M |
| Product â†’ Review | 1:N |
| Product â†’ Wishlist | 1:N |

Las relaciones son implementadas mediante claves forÃ¡neas y modelos Eloquent.

---

# Integridad Referencial

Todas las relaciones utilizan claves forÃ¡neas definidas mediante las migraciones de Laravel.

Se emplea la sintaxis recomendada por el framework:

```php
$table->foreignId('user_id')->constrained();
```

Esto garantiza:

- existencia de registros relacionados;
- consistencia de los datos;
- navegaciÃ³n entre entidades mediante Eloquent;
- mantenimiento simplificado del esquema.

---

# Migraciones

La estructura completa de la base de datos fue desarrollada mediante migraciones.

Cada modificaciÃ³n del esquema queda registrada dentro del directorio:

```text
database/migrations/
```

Las migraciones permiten:

- crear la estructura completa;
- modificar tablas existentes;
- versionar cambios;
- reconstruir el esquema desde cero.

Su ejecuciÃ³n se realiza mediante:

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

Estos permiten poblar automÃ¡ticamente la base de datos con informaciÃ³n de prueba.

Entre los datos generados se incluyen:

- usuarios;
- categorÃ­as;
- productos;
- direcciones;
- pedidos;
- detalle de pedidos;
- reseÃ±as;
- carrito de compras.

La ejecuciÃ³n se realiza mediante:

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

La relaciÃ³n entre productos y categorÃ­as se implementa mediante la tabla pivote:

```text
category_product
```

Esta estructura permite que:

- un producto pertenezca a mÃºltiples categorÃ­as;
- una categorÃ­a agrupe mÃºltiples productos.

Laravel administra esta relaciÃ³n mediante:

```php
belongsToMany()
```

---

# Carrito de Compras

Durante el desarrollo se decidiÃ³ reutilizar la entidad **Wishlist** como implementaciÃ³n del carrito de compras.

Desde el punto de vista funcional, el usuario interactÃºa con un **Carrito de Compras**.

Desde el punto de vista tÃ©cnico, dicha funcionalidad se encuentra respaldada por la tabla:

```text
wishlists
```

Esta decisiÃ³n permitiÃ³ simplificar el modelo de datos sin afectar la funcionalidad del sistema.

---

# Estados del Pedido

Cada pedido posee un estado que representa su ciclo de vida dentro del sistema.

Los estados previstos son:

- Pendiente
- Pagado
- Enviado
- Entregado
- Cancelado

Las transiciones entre estados son administradas por la lÃ³gica de negocio implementada en la aplicaciÃ³n.

---

# NormalizaciÃ³n

El modelo de datos fue diseÃ±ado siguiendo principios de normalizaciÃ³n con el objetivo de:

- minimizar redundancia;
- evitar inconsistencias;
- facilitar el mantenimiento;
- preservar la integridad de la informaciÃ³n.

Las relaciones N:M se resolvieron mediante tablas pivote, mientras que las relaciones 1:N se implementaron mediante claves forÃ¡neas.

---

# ConfiguraciÃ³n

La conexiÃ³n a la base de datos se configura mediante variables de entorno definidas en el archivo:

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
DB_PASSWORD=<contraseÃ±a>
```

Esto permite mantener las credenciales fuera del cÃ³digo fuente y adaptar fÃ¡cilmente la configuraciÃ³n a distintos entornos.

---

# DocumentaciÃ³n Relacionada

La estructura de la base de datos se complementa con los siguientes documentos:

- [04_DER](04_DER.md)
- [10_DiccionarioDatos](10_DiccionarioDatos.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [08_ManualTecnico](08_ManualTecnico.md)

Diagramas relacionados:

- [diagramas/10_DER](../diagramas/10_DER.md)
- [diagramas/11_ModeloDominio](../diagramas/11_ModeloDominio.md)

---

# Consideraciones Finales

La base de datos de **RincÃ³n del Pan** fue diseÃ±ada para acompaÃ±ar la arquitectura MVC implementada con Laravel, aprovechando las capacidades de **Eloquent ORM**, las **Migraciones** y los **Seeders** para garantizar una estructura consistente, mantenible y fÃ¡cilmente reproducible.

El esquema relacional implementado refleja el dominio del negocio y constituye el soporte fundamental para el funcionamiento de todas las funcionalidades desarrolladas en la aplicaciÃ³n.

