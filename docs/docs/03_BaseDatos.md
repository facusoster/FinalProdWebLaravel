# 🗄️ Base de Datos

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[02_ModeloDominio]]
> - [[04_DER]]
> - [[08_ManualTecnico]]

---

# Introducción

La persistencia de la información se implementa mediante **MySQL**, utilizando el sistema de migraciones de Laravel y Eloquent ORM para representar las relaciones entre las entidades del dominio.

El diseño de la base de datos fue realizado a partir del análisis funcional y posteriormente validado durante la implementación del proyecto.

---

# Objetivos

La base de datos tiene como propósito:

- Almacenar la información del sistema.
- Garantizar la integridad referencial.
- Mantener la consistencia de los datos.
- Facilitar el acceso mediante Eloquent ORM.

---

# Motor de Base de Datos

Durante el desarrollo se utilizó:

- MySQL 8

Administrado mediante:

- Docker
- phpMyAdmin

La configuración del entorno puede consultarse en:

[[setup-local-dev]]

---

# Migraciones

Todas las tablas del sistema fueron creadas mediante migraciones de Laravel.

Esto permite:

- Crear la base desde cero.
- Versionar los cambios.
- Compartir el esquema entre desarrolladores.
- Automatizar la instalación del proyecto.

---

# Seeders

El proyecto incorpora seeders para poblar la base de datos con información inicial.

Entre los datos generados se incluyen:

- Usuarios.
- Categorías.
- Productos.
- Direcciones.
- Pedidos.
- Reseñas.
- Wishlist.

Esto facilita las pruebas y el desarrollo.

---

# Integridad Referencial

Las relaciones se implementan mediante claves foráneas utilizando las herramientas provistas por Laravel.

Se emplean restricciones para mantener la consistencia entre tablas y evitar registros huérfanos.

---

# Relaciones Principales

| Relación | Cardinalidad |
|-----------|--------------|
| User → Address | 1 : N |
| User → Orders | 1 : N |
| User → Reviews | 1 : N |
| User ↔ Products (Wishlist) | N : M |
| Category ↔ Product | N : M |
| Order → Order Items | 1 : N |
| Product → Order Items | 1 : N |
| Product → Reviews | 1 : N |

---

# Estados del Pedido

El ciclo de vida previsto para un pedido es:

```text
Pendiente
      │
      ▼
Pagado
      │
      ▼
Enviado
      │
      ▼
Entregado
```

Cancelado podrá aplicarse únicamente antes del envío, de acuerdo con las reglas de negocio definidas durante el análisis.

---

# ORM

El acceso a los datos se realiza mediante **Eloquent ORM**, utilizando relaciones entre modelos en lugar de consultas SQL manuales.

Entre las relaciones implementadas se encuentran:

- belongsTo
- hasMany
- belongsToMany

---

# Instalación

Una vez configurado el entorno, la base de datos puede generarse completamente mediante:

```bash
php artisan migrate --seed
```

Este procedimiento crea todas las tablas y carga datos iniciales para pruebas.

---

# Resumen

La base de datos de Rincón del Pan fue diseñada siguiendo principios de normalización e integridad referencial, aprovechando las capacidades de Laravel para gestionar migraciones, relaciones y datos de prueba de forma consistente y reproducible.

---

## Documentación relacionada

- [[README]]
- [[02_ModeloDominio]]
- [[04_DER]]
- [[08_ManualTecnico]]
- [[09_ManualInstalacion]]
