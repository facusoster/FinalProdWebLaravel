# 📋 Análisis de Requisitos

> [!info]
> **Proyecto:** Rincón del Pan  
> **Materia:** Desarrollo de Aplicaciones Web con Laravel  
> **Carrera:** Tecnicatura Superior en Análisis de Sistemas  
> **Institución:** Escuela Da Vinci

---

# Introducción

Este documento presenta el relevamiento de requisitos realizado durante la etapa de análisis del proyecto **Rincón del Pan**, una aplicación web de comercio electrónico desarrollada utilizando **Laravel Framework 13.23.0** y **MySQL**.

El análisis funcional constituye la base sobre la cual se diseñó el modelo de dominio, la arquitectura del sistema y la implementación del proyecto.

Los requisitos aquí definidos permitieron establecer el alcance del sistema y sirvieron como guía para el desarrollo de las distintas funcionalidades.

---

# Objetivo General

Desarrollar una aplicación web que permita administrar un comercio electrónico dedicado a la venta de productos de panadería y pastelería, diferenciando funcionalidades para clientes y administradores mediante un sistema de autenticación y autorización basado en roles.

---

# Objetivos Específicos

- Implementar un catálogo de productos organizado por categorías.
- Permitir el registro y autenticación de usuarios.
- Gestionar pedidos de clientes.
- Administrar direcciones de envío.
- Implementar un carrito de compras.
- Permitir la publicación de reseñas.
- Desarrollar un panel administrativo para la gestión del catálogo.
- Documentar todas las etapas del proyecto.

---

# Actores del Sistema

## Cliente

Corresponde al usuario registrado que utiliza la plataforma para realizar compras.

Entre sus principales acciones se encuentran:

- Registrarse.
- Iniciar sesión.
- Consultar el catálogo.
- Administrar su carrito de compras.
- Gestionar direcciones.
- Realizar pedidos.
- Consultar pedidos anteriores.
- Publicar reseñas de productos adquiridos.

---

## Administrador

Es el usuario responsable de la administración del sitio.

Posee permisos para:

- Gestionar categorías.
- Gestionar productos.
- Consultar todos los pedidos.
- Actualizar el estado de los pedidos.
- Administrar el catálogo.

---

# Requisitos Funcionales

| ID | Requisito | Actor |
|----|-----------|-------|
| RF01 | El sistema debe permitir registrar nuevos usuarios. | Cliente |
| RF02 | El sistema debe permitir iniciar y cerrar sesión. | Cliente |
| RF03 | El sistema debe mostrar el catálogo organizado por categorías. | Cliente |
| RF04 | El sistema debe mostrar el detalle de cada producto. | Cliente |
| RF05 | El sistema debe permitir gestionar un carrito de compras. | Cliente |
| RF06 | El sistema debe permitir registrar múltiples direcciones de envío. | Cliente |
| RF07 | El sistema debe permitir realizar pedidos. | Cliente |
| RF08 | El sistema debe calcular automáticamente el total del pedido. | Sistema |
| RF09 | El sistema debe registrar los productos incluidos en cada pedido. | Sistema |
| RF10 | El sistema debe permitir consultar el historial de pedidos. | Cliente |
| RF11 | El sistema debe permitir publicar reseñas de productos comprados. | Cliente |
| RF12 | El administrador debe poder crear categorías. | Administrador |
| RF13 | El administrador debe poder modificar categorías. | Administrador |
| RF14 | El administrador debe poder eliminar categorías. | Administrador |
| RF15 | El administrador debe poder crear productos. | Administrador |
| RF16 | El administrador debe poder modificar productos. | Administrador |
| RF17 | El administrador debe poder eliminar productos. | Administrador |
| RF18 | El administrador debe poder consultar todos los pedidos. | Administrador |
| RF19 | El administrador debe poder actualizar el estado de los pedidos. | Administrador |
| RF20 | El sistema debe restringir el acceso al panel administrativo según el rol del usuario. | Sistema |

---

# Requisitos No Funcionales

| ID | Requisito |
|----|-----------|
| RNF01 | La aplicación debe desarrollarse utilizando Laravel Framework 13. |
| RNF02 | La persistencia debe implementarse mediante MySQL y Eloquent ORM. |
| RNF03 | Las credenciales sensibles deben almacenarse en el archivo `.env`. |
| RNF04 | La interfaz debe ser responsive y funcionar correctamente en dispositivos móviles. |
| RNF05 | El proyecto debe estar completamente documentado en formato Markdown. |
| RNF06 | El código fuente debe mantenerse bajo control de versiones mediante Git. |
| RNF07 | La base de datos debe poder reconstruirse utilizando migraciones y seeders. |
| RNF08 | Las vistas deben reutilizar layouts mediante Blade Templates. |
| RNF09 | La autenticación debe proteger las funcionalidades privadas del sistema. |
| RNF10 | El sistema debe mantener integridad referencial entre todas las entidades del modelo de datos. |

---

# Casos de Uso Principales

Los procesos funcionales más relevantes identificados durante el análisis son:

- Registrar usuario.
- Iniciar sesión.
- Consultar catálogo.
- Consultar detalle de producto.
- Gestionar carrito de compras.
- Gestionar direcciones.
- Realizar pedido.
- Consultar pedidos.
- Publicar reseña.
- Gestionar productos.
- Gestionar categorías.
- Actualizar estado de pedidos.

La descripción detallada de estos procesos puede consultarse en:

➡️ [05_CasosUso](docs/docs/05_CasosUso.md)

---

# Alcance del Proyecto

El proyecto contempla la implementación de un sistema de comercio electrónico que permita administrar productos, categorías, clientes y pedidos mediante una aplicación web desarrollada con Laravel.

Incluye:

- Gestión de usuarios.
- Gestión del catálogo.
- Administración de categorías.
- Gestión de productos.
- Carrito de compras.
- Gestión de pedidos.
- Gestión de direcciones.
- Sistema de reseñas.
- Panel administrativo.
- Documentación técnica.

---

# Fuera del Alcance

Con el objetivo de mantener el proyecto dentro del alcance académico definido por la asignatura, no se implementan las siguientes funcionalidades:

- Pasarela de pagos.
- Integración con servicios de logística.
- Facturación electrónica.
- Gestión de stock en tiempo real.
- Notificaciones por correo electrónico.
- Integración con redes sociales.
- Recuperación de contraseña mediante correo.
- API REST completa (en desarrollo).

---

# Supuestos

Durante el desarrollo se asumieron las siguientes condiciones:

- Todos los productos se encuentran disponibles para su comercialización.
- El stock es administrado manualmente por el administrador.
- Cada pedido posee una única dirección de envío.
- Cada usuario administra exclusivamente su propia información.
- Los administradores poseen permisos globales sobre el sistema.
- El proyecto se ejecuta en un entorno local de desarrollo.

---

# Restricciones

El desarrollo se realizó respetando los lineamientos establecidos por la materia:

- Uso obligatorio de Laravel Framework.
- Arquitectura MVC.
- Base de datos MySQL.
- ORM Eloquent.
- Migraciones y Seeders.
- Middleware para autenticación y autorización.
- Uso de Blade como motor de vistas.
- Documentación técnica del proyecto.

---

# Trazabilidad

El presente análisis constituye el punto de partida para el resto de la documentación técnica.

Los requisitos aquí definidos se reflejan posteriormente en:

- [01_Arquitectura](docs/docs/01_Arquitectura.md)
- [02_ModeloDominio](docs/docs/02_ModeloDominio.md)
- [03_BaseDatos](docs/docs/03_BaseDatos.md)
- [04_DER](docs/docs/04_DER.md)
- [05_CasosUso](docs/docs/05_CasosUso.md)
- [07_UML](docs/07_UML.md)
- [08_ManualTecnico](docs/docs/08_ManualTecnico.md)

---

# Conclusiones

El relevamiento permitió definir el alcance funcional del sistema y establecer una base sólida para el diseño e implementación del proyecto.

La separación entre requisitos funcionales, requisitos no funcionales, actores y restricciones facilitó el desarrollo incremental de **Rincón del Pan**, manteniendo la coherencia entre el análisis inicial, el modelo de datos, la arquitectura de software y el código implementado en Laravel.
