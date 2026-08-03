# ðŸ“‹ AnÃ¡lisis de Requisitos

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Materia:** Desarrollo de Aplicaciones Web con Laravel  
> **Carrera:** Tecnicatura Superior en AnÃ¡lisis de Sistemas  
> **InstituciÃ³n:** Escuela Da Vinci

---

# IntroducciÃ³n

Este documento presenta el relevamiento de requisitos realizado durante la etapa de anÃ¡lisis del proyecto **RincÃ³n del Pan**, una aplicaciÃ³n web de comercio electrÃ³nico desarrollada utilizando **Laravel Framework 13.23.0** y **MySQL**.

El anÃ¡lisis funcional constituye la base sobre la cual se diseÃ±Ã³ el modelo de dominio, la arquitectura del sistema y la implementaciÃ³n del proyecto.

Los requisitos aquÃ­ definidos permitieron establecer el alcance del sistema y sirvieron como guÃ­a para el desarrollo de las distintas funcionalidades.

---

# Objetivo General

Desarrollar una aplicaciÃ³n web que permita administrar un comercio electrÃ³nico dedicado a la venta de productos de panaderÃ­a y pastelerÃ­a, diferenciando funcionalidades para clientes y administradores mediante un sistema de autenticaciÃ³n y autorizaciÃ³n basado en roles.

---

# Objetivos EspecÃ­ficos

- Implementar un catÃ¡logo de productos organizado por categorÃ­as.
- Permitir el registro y autenticaciÃ³n de usuarios.
- Gestionar pedidos de clientes.
- Administrar direcciones de envÃ­o.
- Implementar un carrito de compras.
- Permitir la publicaciÃ³n de reseÃ±as.
- Desarrollar un panel administrativo para la gestiÃ³n del catÃ¡logo.
- Documentar todas las etapas del proyecto.

---

# Actores del Sistema

## Cliente

Corresponde al usuario registrado que utiliza la plataforma para realizar compras.

Entre sus principales acciones se encuentran:

- Registrarse.
- Iniciar sesiÃ³n.
- Consultar el catÃ¡logo.
- Administrar su carrito de compras.
- Gestionar direcciones.
- Realizar pedidos.
- Consultar pedidos anteriores.
- Publicar reseÃ±as de productos adquiridos.

---

## Administrador

Es el usuario responsable de la administraciÃ³n del sitio.

Posee permisos para:

- Gestionar categorÃ­as.
- Gestionar productos.
- Consultar todos los pedidos.
- Actualizar el estado de los pedidos.
- Administrar el catÃ¡logo.

---

# Requisitos Funcionales

| ID | Requisito | Actor |
|----|-----------|-------|
| RF01 | El sistema debe permitir registrar nuevos usuarios. | Cliente |
| RF02 | El sistema debe permitir iniciar y cerrar sesiÃ³n. | Cliente |
| RF03 | El sistema debe mostrar el catÃ¡logo organizado por categorÃ­as. | Cliente |
| RF04 | El sistema debe mostrar el detalle de cada producto. | Cliente |
| RF05 | El sistema debe permitir gestionar un carrito de compras. | Cliente |
| RF06 | El sistema debe permitir registrar mÃºltiples direcciones de envÃ­o. | Cliente |
| RF07 | El sistema debe permitir realizar pedidos. | Cliente |
| RF08 | El sistema debe calcular automÃ¡ticamente el total del pedido. | Sistema |
| RF09 | El sistema debe registrar los productos incluidos en cada pedido. | Sistema |
| RF10 | El sistema debe permitir consultar el historial de pedidos. | Cliente |
| RF11 | El sistema debe permitir publicar reseÃ±as de productos comprados. | Cliente |
| RF12 | El administrador debe poder crear categorÃ­as. | Administrador |
| RF13 | El administrador debe poder modificar categorÃ­as. | Administrador |
| RF14 | El administrador debe poder eliminar categorÃ­as. | Administrador |
| RF15 | El administrador debe poder crear productos. | Administrador |
| RF16 | El administrador debe poder modificar productos. | Administrador |
| RF17 | El administrador debe poder eliminar productos. | Administrador |
| RF18 | El administrador debe poder consultar todos los pedidos. | Administrador |
| RF19 | El administrador debe poder actualizar el estado de los pedidos. | Administrador |
| RF20 | El sistema debe restringir el acceso al panel administrativo segÃºn el rol del usuario. | Sistema |

---

# Requisitos No Funcionales

| ID | Requisito |
|----|-----------|
| RNF01 | La aplicaciÃ³n debe desarrollarse utilizando Laravel Framework 13. |
| RNF02 | La persistencia debe implementarse mediante MySQL y Eloquent ORM. |
| RNF03 | Las credenciales sensibles deben almacenarse en el archivo `.env`. |
| RNF04 | La interfaz debe ser responsive y funcionar correctamente en dispositivos mÃ³viles. |
| RNF05 | El proyecto debe estar completamente documentado en formato Markdown. |
| RNF06 | El cÃ³digo fuente debe mantenerse bajo control de versiones mediante Git. |
| RNF07 | La base de datos debe poder reconstruirse utilizando migraciones y seeders. |
| RNF08 | Las vistas deben reutilizar layouts mediante Blade Templates. |
| RNF09 | La autenticaciÃ³n debe proteger las funcionalidades privadas del sistema. |
| RNF10 | El sistema debe mantener integridad referencial entre todas las entidades del modelo de datos. |

---

# Casos de Uso Principales

Los procesos funcionales mÃ¡s relevantes identificados durante el anÃ¡lisis son:

- Registrar usuario.
- Iniciar sesiÃ³n.
- Consultar catÃ¡logo.
- Consultar detalle de producto.
- Gestionar carrito de compras.
- Gestionar direcciones.
- Realizar pedido.
- Consultar pedidos.
- Publicar reseÃ±a.
- Gestionar productos.
- Gestionar categorÃ­as.
- Actualizar estado de pedidos.

La descripciÃ³n detallada de estos procesos puede consultarse en:

âž¡ï¸ [05_CasosUso](05_CasosUso.md)

---

# Alcance del Proyecto

El proyecto contempla la implementaciÃ³n de un sistema de comercio electrÃ³nico que permita administrar productos, categorÃ­as, clientes y pedidos mediante una aplicaciÃ³n web desarrollada con Laravel.

Incluye:

- GestiÃ³n de usuarios.
- GestiÃ³n del catÃ¡logo.
- AdministraciÃ³n de categorÃ­as.
- GestiÃ³n de productos.
- Carrito de compras.
- GestiÃ³n de pedidos.
- GestiÃ³n de direcciones.
- Sistema de reseÃ±as.
- Panel administrativo.
- DocumentaciÃ³n tÃ©cnica.

---

# Fuera del Alcance

Con el objetivo de mantener el proyecto dentro del alcance acadÃ©mico definido por la asignatura, no se implementan las siguientes funcionalidades:

- Pasarela de pagos.
- IntegraciÃ³n con servicios de logÃ­stica.
- FacturaciÃ³n electrÃ³nica.
- GestiÃ³n de stock en tiempo real.
- Notificaciones por correo electrÃ³nico.
- IntegraciÃ³n con redes sociales.
- RecuperaciÃ³n de contraseÃ±a mediante correo.
- API REST completa (en desarrollo).

---

# Supuestos

Durante el desarrollo se asumieron las siguientes condiciones:

- Todos los productos se encuentran disponibles para su comercializaciÃ³n.
- El stock es administrado manualmente por el administrador.
- Cada pedido posee una Ãºnica direcciÃ³n de envÃ­o.
- Cada usuario administra exclusivamente su propia informaciÃ³n.
- Los administradores poseen permisos globales sobre el sistema.
- El proyecto se ejecuta en un entorno local de desarrollo.

---

# Restricciones

El desarrollo se realizÃ³ respetando los lineamientos establecidos por la materia:

- Uso obligatorio de Laravel Framework.
- Arquitectura MVC.
- Base de datos MySQL.
- ORM Eloquent.
- Migraciones y Seeders.
- Middleware para autenticaciÃ³n y autorizaciÃ³n.
- Uso de Blade como motor de vistas.
- DocumentaciÃ³n tÃ©cnica del proyecto.

---

# Trazabilidad

El presente anÃ¡lisis constituye el punto de partida para el resto de la documentaciÃ³n tÃ©cnica.

Los requisitos aquÃ­ definidos se reflejan posteriormente en:

- [01_Arquitectura](01_Arquitectura.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [05_CasosUso](05_CasosUso.md)
- [07_UML](07_UML.md)
- [08_ManualTecnico](08_ManualTecnico.md)

---

# Conclusiones

El relevamiento permitiÃ³ definir el alcance funcional del sistema y establecer una base sÃ³lida para el diseÃ±o e implementaciÃ³n del proyecto.

La separaciÃ³n entre requisitos funcionales, requisitos no funcionales, actores y restricciones facilitÃ³ el desarrollo incremental de **RincÃ³n del Pan**, manteniendo la coherencia entre el anÃ¡lisis inicial, el modelo de datos, la arquitectura de software y el cÃ³digo implementado en Laravel.

