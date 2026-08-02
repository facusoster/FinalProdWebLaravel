
---

## Carátula

**Universidad:** Escuela Da Vinci  
**Carrera:** Tecnicatura Superior en Análisis de Sistemas  
**Materia:** Desarrollo de Aplicaciones Web con Laravel  
**Profesor:** *Completar*  
**Alumnos:** Facundo Nahuel Soster - Julian Verdirame  
**Trabajo Práctico:** Rincón del Pan – Plataforma E-commerce desarrollada con Laravel

---

# Rincón del Pan

Sistema de comercio electrónico desarrollado con **Laravel** como trabajo práctico para la materia **Desarrollo de Aplicaciones Web con Laravel** de la **Tecnicatura Superior en Análisis de Sistemas** de la **Escuela Da Vinci**.

El proyecto implementa una plataforma de venta de productos de pastelería con funcionalidades para clientes y administradores, aplicando los conceptos abordados durante la cursada: arquitectura MVC, Eloquent ORM, migraciones, seeders, autenticación, autorización, Blade, API REST y administración de bases de datos relacionales.

---

# Información del Proyecto

| Dato        | Información                                  |
| ----------- | -------------------------------------------- |
| Institución | Escuela Da Vinci                             |
| Carrera     | Tecnicatura Superior en Análisis de Sistemas |
| Materia     | Desarrollo de Aplicaciones Web con Laravel   |
| Proyecto    | Rincón del Pan                                  |
| Integrantes | Facundo Soster - Julian Verdirame            |
| Profesor    | Nicolas Ariel Calderón                       |

---

# Objetivos

El proyecto tiene como objetivo desarrollar una aplicación web completa utilizando Laravel, integrando los principales componentes del framework en un caso de uso real.

Durante el desarrollo se aplicaron conceptos relacionados con:

- Arquitectura Modelo – Vista – Controlador (MVC).
- Persistencia de datos mediante Eloquent ORM.
- Diseño e implementación de una base de datos relacional.
- Migraciones y Seeders.
- Autenticación y autorización de usuarios.
- Gestión de archivos.
- Desarrollo de interfaces utilizando Blade.
- Construcción de una API REST.
- Organización y documentación del proyecto.

---

# Funcionalidades

El sistema se divide en dos grandes áreas funcionales.

## Cliente

Los usuarios registrados pueden:

- Registrarse e iniciar sesión.
- Navegar el catálogo de productos.
- Consultar el detalle de cada producto.
- Gestionar una lista de favoritos (Wishlist).
- Administrar direcciones de entrega.
- Realizar pedidos.
- Consultar el historial de compras.
- Publicar reseñas de productos.

## Administrador

Los usuarios con rol administrador pueden:

- Gestionar categorías.
- Gestionar productos.
- Administrar pedidos.
- Actualizar el estado de las órdenes.
- Acceder al panel de administración.

---

# Tecnologías utilizadas

- Laravel
- PHP
- MySQL
- Blade
- Eloquent ORM
- Bootstrap
- HTML5
- CSS3
- JavaScript
- Composer

---

# Arquitectura

El proyecto sigue la arquitectura **Modelo – Vista – Controlador (MVC)** propuesta por Laravel.

La lógica de negocio se encuentra organizada mediante modelos Eloquent y controladores, mientras que la presentación utiliza plantillas Blade. La persistencia se realiza sobre MySQL utilizando migraciones y relaciones definidas mediante Eloquent ORM.

La estructura del proyecto respeta la organización estándar del framework, facilitando su mantenimiento y escalabilidad.

---

# Instalación

1. Clonar el repositorio.

```bash
git clone <repositorio>
```

2. Instalar las dependencias.

```bash
composer install
```

3. Crear el archivo `.env`.

```bash
cp .env.example .env
```

4. Generar la clave de la aplicación.

```bash
php artisan key:generate
```

5. Configurar la conexión a la base de datos.

6. Ejecutar las migraciones y seeders.

```bash
php artisan migrate --seed
```

7. Iniciar el servidor de desarrollo.

```bash
php artisan serve
```

---

# Estructura del proyecto

```
app/
config/
database/
docs/
public/
resources/
routes/
storage/
```

---

# Documentación

La documentación técnica del proyecto se encuentra organizada dentro de la carpeta **docs**. Cada documento desarrolla un aspecto específico del sistema y se encuentra enlazado con el resto de la documentación para facilitar la navegación desde Obsidian.

| Documento                | Descripción                                       |
| ------------------------ | ------------------------------------------------- |
| [[01_Arquitectura]]      | Arquitectura general del sistema.                 |
| [[02_ModeloDominio]]     | Modelo de dominio y entidades principales.        |
| [[03_BaseDatos]]         | Descripción de la base de datos.                  |
| [[04_DER]]               | Diagrama Entidad-Relación y diccionario de datos. |
| [[05_CasosUso]]          | Casos de uso del sistema.                         |
| [[06_API_REST]]          | Documentación de la API REST.                     |
| [[07_UML]]               | Diagramas UML del proyecto.                       |
| [[08_ManualTecnico]]     | Descripción técnica de la implementación.         |
| [[09_ManualInstalacion]] | Instalación y configuración del proyecto.         |

---

# Estado del proyecto

Actualmente el sistema implementa:

- Autenticación de usuarios.
- Gestión de roles.
- CRUD de categorías.
- CRUD de productos.
- Gestión de pedidos.
- Wishlist/Carrito.
- Sistema de reseñas.
- API REST.
- Migraciones y Seeders.
- Panel de administración.

---

# Licencia

Este proyecto fue desarrollado con fines académicos como trabajo práctico para la materia **Desarrollo de Aplicaciones Web con Laravel** de la **Escuela Da Vinci**.