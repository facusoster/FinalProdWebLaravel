# 🗄️ Base de Datos

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Sweet Store**.
>
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[04_DER]]
> - [[07_UML]]

---

# Introducción

La persistencia de datos de **Sweet Store** se implementa mediante una base de datos relacional administrada por **MySQL**, utilizando las herramientas provistas por Laravel para definir, versionar y poblar su estructura.

La organización de la información fue diseñada para representar las principales entidades del negocio y sus relaciones, permitiendo mantener la integridad de los datos y facilitar el acceso mediante **Eloquent ORM**.

La creación y actualización del esquema de la base de datos se realiza utilizando **Migraciones**, mientras que la carga inicial de información se lleva a cabo mediante **Seeders**.

---

# Objetivos

La base de datos fue diseñada con los siguientes objetivos:

- Centralizar la información del sistema.
- Mantener la integridad de los datos.
- Representar las relaciones entre las entidades del negocio.
- Facilitar el acceso a la información mediante Eloquent ORM.
- Permitir la recreación completa del entorno mediante migraciones y seeders.

---

# Motor de Base de Datos

| Característica | Valor |
|----------------|-------|
| Motor | MySQL |
| Framework | Laravel |
| ORM | Eloquent ORM |
| Gestión del esquema | Migraciones |
| Datos iniciales | Seeders |

---

# Organización de la Información

La información del sistema se encuentra organizada en distintas tablas que representan las entidades principales del dominio.

Entre ellas se destacan:

| Entidad | Descripción |
|----------|-------------|
| Users | Información de los usuarios registrados. |
| Addresses | Direcciones asociadas a los usuarios. |
| Categories | Clasificación de productos. |
| Products | Catálogo de productos disponibles. |
| Category_Product | Relación entre productos y categorías. |
| Orders | Pedidos realizados por los clientes. |
| Order_Items | Productos incluidos en cada pedido. |
| Reviews | Valoraciones realizadas por los usuarios. |
| Wishlists | Productos favoritos de los usuarios. |

> [!note]
> La descripción detallada de cada entidad puede consultarse en [[02_ModeloDominio]].

---

# Relaciones entre las Entidades

La estructura relacional permite representar las operaciones principales del sistema.

Las relaciones implementadas incluyen:

- Un usuario puede registrar múltiples direcciones.
- Un usuario puede realizar múltiples pedidos.
- Un usuario puede publicar múltiples reseñas.
- Un usuario puede tener múltiples productos favoritos.
- Un pedido contiene múltiples productos.
- Un producto puede pertenecer a varias categorías.
- Una categoría agrupa múltiples productos.
- Un producto puede recibir múltiples reseñas.

La representación gráfica de estas relaciones se desarrolla en [[04_DER]].

---

# Migraciones

Laravel administra la estructura de la base de datos mediante **Migraciones**.

Cada migración representa una modificación específica sobre el esquema y permite mantener versionada la estructura del proyecto.

Entre las operaciones implementadas se encuentran:

- Creación de tablas.
- Definición de relaciones.
- Incorporación de restricciones.
- Modificación del esquema.
- Eliminación de estructuras cuando resulta necesario.

El uso de migraciones garantiza que cualquier desarrollador pueda reconstruir la base de datos desde cero.

---

# Seeders

Los **Seeders** permiten poblar automáticamente la base de datos con información inicial.

Su utilización facilita las tareas de desarrollo, pruebas y demostración del sistema.

Los datos generados incluyen, entre otros:

- Usuarios.
- Categorías.
- Productos.
- Pedidos.
- Reseñas.
- Wishlist.

---

# Integridad de los Datos

La consistencia de la información se mantiene mediante:

- Relaciones entre entidades.
- Claves foráneas.
- Restricciones de integridad.
- Validaciones implementadas en la aplicación.
- Gestión de relaciones mediante Eloquent ORM.

Estas medidas permiten garantizar que la información almacenada sea consistente y represente correctamente el estado del sistema.

---

# Acceso a los Datos

La interacción con la base de datos se realiza mediante **Eloquent ORM**, evitando la necesidad de escribir consultas SQL para las operaciones más frecuentes.

Cada entidad del sistema se encuentra representada por un modelo que encapsula el acceso a la información y define las relaciones con el resto de las entidades.

Esta abstracción simplifica las operaciones CRUD y mejora la legibilidad del código.

---

# Estructura General

De forma simplificada, la organización de la base de datos puede representarse mediante el siguiente esquema conceptual.

```text
Users
│
├── Addresses
├── Orders
│      └── Order_Items
│              └── Products
│
├── Reviews
│      └── Products
│
└── Wishlists
       └── Products

Products
│
└── Category_Product
        └── Categories
```

> [!tip]
> El detalle completo de las tablas, atributos y relaciones puede consultarse en [[04_DER]].

---

# Resumen

La base de datos de Sweet Store fue diseñada para almacenar de forma estructurada toda la información necesaria para el funcionamiento del sistema.

La utilización de MySQL junto con las herramientas de Laravel, como Migraciones, Seeders y Eloquent ORM, permite mantener una estructura consistente, fácilmente reproducible y preparada para futuras ampliaciones del proyecto.

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[02_ModeloDominio]]
- [[04_DER]]
- [[07_UML]]
- [[08_ManualTecnico]]