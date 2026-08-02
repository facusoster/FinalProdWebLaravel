# 🏗️ Arquitectura del Sistema

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> - [[README]]
> - [[02_ModeloDominio]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[05_CasosUso]]
> - [[07_UML]]

---

# Introducción

La arquitectura de **Rincón del Pan** sigue la estructura propuesta por el framework **Laravel**, basada en el patrón **Modelo – Vista – Controlador (MVC)**.

Esta organización permite separar claramente las responsabilidades del sistema, facilitando el mantenimiento del código, la incorporación de nuevas funcionalidades y la reutilización de componentes.

Cada petición realizada por el usuario atraviesa distintas capas de la aplicación hasta generar una respuesta, ya sea una vista HTML mediante Blade o una respuesta JSON desde la API REST.

---

# Arquitectura General

El sistema puede dividirse en cinco grandes capas.

```text
Usuario

↓

Rutas (Routes)

↓

Controladores (Controllers)

↓

Modelos (Models)

↓

Base de Datos (MySQL)
```

Cada una de estas capas cumple una responsabilidad específica dentro del ciclo de vida de una petición.

---

# Flujo de una petición

De manera simplificada, el procesamiento de una solicitud ocurre de la siguiente manera:

1. El usuario realiza una petición desde el navegador.

2. Laravel recibe la solicitud mediante el sistema de rutas.

3. La ruta correspondiente deriva la ejecución hacia un controlador.

4. El controlador procesa la solicitud e interactúa con los modelos cuando necesita acceder o modificar información.

5. Los modelos utilizan Eloquent ORM para comunicarse con la base de datos.

6. El controlador devuelve una vista Blade o una respuesta JSON.

Este flujo se repite para prácticamente todas las funcionalidades del sistema.

---

# Componentes principales

## Routes

Las rutas representan el punto de entrada de la aplicación.

En ellas se define qué controlador será responsable de atender cada URL del sistema.

El proyecto organiza las rutas en:

- `routes/web.php`
- `routes/api.php`

---

## Controllers

Los controladores coordinan el flujo de la aplicación.

Su responsabilidad consiste en:

- recibir la solicitud;
- validar la información;
- interactuar con los modelos;
- retornar una vista o una respuesta JSON.

La lógica de presentación permanece separada de la lógica de acceso a datos.

---

## Models

Los modelos representan las entidades del negocio.

Mediante **Eloquent ORM** encapsulan la interacción con la base de datos y definen las relaciones entre las distintas entidades del sistema.

Entre ellas se encuentran:

- Usuario
- Producto
- Categoría
- Pedido
- Dirección
- Wishlist
- Reseña

La descripción completa del modelo se desarrolla en [[02_ModeloDominio]].

---

## Views

La interfaz del usuario fue desarrollada utilizando **Blade**.

Las vistas presentan la información recibida desde los controladores y contienen la estructura visual de cada módulo de la aplicación.

La separación entre vistas y lógica permite mantener una interfaz organizada y reutilizable.

---

## Base de Datos

La persistencia de la información se implementa mediante **MySQL**.

Laravel administra la estructura de la base utilizando:

- Migraciones
- Seeders
- Modelos Eloquent

La documentación correspondiente puede consultarse en:

- [[03_BaseDatos]]
- [[04_DER]]

---

# Organización del Proyecto

La estructura principal del proyecto mantiene la organización estándar de Laravel.

```text
app/
│
├── Http/
├── Models/
├── Providers/
│
config/
│
database/
│
├── migrations/
├── seeders/
│
public/
│
resources/
│
├── views/
│
routes/
│
storage/
```

Esta organización permite localizar rápidamente cada componente del sistema y favorece la mantenibilidad del proyecto.

---

# Patrón MVC

El patrón **Modelo – Vista – Controlador** divide la aplicación en tres componentes principales.

| Componente | Responsabilidad |
|------------|-----------------|
| Model | Gestiona los datos y la lógica de negocio. |
| View | Presenta la información al usuario. |
| Controller | Coordina la interacción entre la vista y el modelo. |

Esta separación reduce el acoplamiento entre componentes y facilita la evolución del sistema.

---

# Eloquent ORM

Laravel incorpora **Eloquent ORM** como mecanismo de acceso a datos.

Su utilización permite:

- representar tablas mediante modelos;
- definir relaciones entre entidades;
- realizar consultas utilizando PHP;
- simplificar operaciones CRUD;
- mejorar la legibilidad del código.

---

# Arquitectura Física

Desde un punto de vista funcional, Rincón del Pan se compone de los siguientes módulos.

```text
Cliente Web

↓

Laravel

├── Autenticación

├── Catálogo

├── Productos

├── Categorías

├── Wishlist

├── Pedidos

├── Reseñas

└── API REST

↓

MySQL
```

---

# Resumen

La arquitectura implementada en Rincón del Pan aprovecha la estructura propuesta por Laravel para construir una aplicación organizada, modular y fácilmente mantenible.

La separación entre rutas, controladores, modelos, vistas y base de datos permite que cada componente tenga una responsabilidad claramente definida, favoreciendo tanto el desarrollo como la evolución futura del proyecto.

---

## Documentación relacionada

- [[README]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[05_CasosUso]]
- [[06_API_REST]]
- [[07_UML]]
- [[08_ManualTecnico]]
- [[09_ManualInstalacion]]