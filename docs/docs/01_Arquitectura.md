# 🏛️ Arquitectura

> [!info]
> Documento perteneciente a la documentación técnica del proyecto **Rincón del Pan**.
>
> **Documentación relacionada**
> - [[README]]
> - [[00_AnalisisRequisitos]]
> - [[02_ModeloDominio]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[05_CasosUso]]
> - [[08_ManualTecnico]]

---

# Introducción

Rincón del Pan es una aplicación web desarrollada utilizando **Laravel** bajo el patrón de arquitectura **Modelo – Vista – Controlador (MVC)**.

La arquitectura fue diseñada siguiendo las buenas prácticas propuestas por Laravel y los requerimientos establecidos por la cátedra, priorizando la separación de responsabilidades, la reutilización del código y la mantenibilidad del proyecto.

---

# Objetivos de la Arquitectura

La arquitectura del sistema busca:

- Separar claramente la lógica de presentación, negocio y persistencia.
- Facilitar el mantenimiento del código.
- Favorecer la reutilización de componentes.
- Mantener una estructura escalable.
- Aprovechar las herramientas nativas ofrecidas por Laravel.

---

# Arquitectura General

El sistema sigue una arquitectura en capas donde cada componente posee una responsabilidad claramente definida.

```text
                   Usuario
                      │
                      ▼
                 Rutas (Routes)
                      │
                      ▼
              Controladores (Controllers)
                      │
          ┌───────────┴───────────┐
          ▼                       ▼
      Modelos                Validaciones
      (Eloquent)           (Form Request)
          │
          ▼
      Base de Datos
          │
          ▲
      Blade Templates
```

---

# Patrón MVC

Laravel implementa de forma nativa el patrón **Modelo – Vista – Controlador**.

## Modelos

Representan las entidades del dominio y encapsulan el acceso a la base de datos mediante **Eloquent ORM**.

Entre sus responsabilidades se encuentran:

- Relaciones entre entidades.
- Configuración de atributos.
- Casts.
- Fillable.
- Métodos auxiliares.

---

## Controladores

Reciben las solicitudes HTTP y coordinan la interacción entre modelos y vistas.

Sus responsabilidades son:

- Procesar solicitudes.
- Validar datos recibidos.
- Invocar la lógica correspondiente.
- Retornar vistas o respuestas HTTP.

La lógica de negocio se mantiene separada del código de presentación.

---

## Vistas

La interfaz de usuario fue desarrollada utilizando **Blade Templates**.

Se emplean:

- Layouts reutilizables.
- Componentes compartidos.
- Herencia mediante `@extends`.
- Inclusión de vistas mediante `@include`.

---

# Flujo de una Solicitud

El recorrido típico de una petición es:

```text
Cliente
   │
   ▼
Route
   │
   ▼
Middleware
   │
   ▼
Controller
   │
   ▼
Model (Eloquent)
   │
   ▼
MySQL
   │
   ▲
Blade
   │
   ▼
Respuesta HTTP
```

---

# Organización del Proyecto

La estructura principal del proyecto sigue la organización estándar de Laravel.

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
```

## app/

Contiene la lógica principal de la aplicación.

Incluye:

- Models
- Http
- Middleware
- Providers

---

## database/

Incluye:

- Migraciones
- Seeders
- Factories

Permite construir completamente la base de datos desde cero.

---

## resources/

Contiene:

- Blade Templates
- CSS
- JavaScript

---

## routes/

Define las rutas de la aplicación.

Principalmente:

- web.php
- api.php

---

## config/

Centraliza la configuración del framework.

Toda la configuración utiliza el archivo `.env`, evitando el uso directo de `env()` fuera de los archivos de configuración.

---

# Persistencia

La persistencia se implementa mediante:

- MySQL
- Eloquent ORM
- Migraciones
- Seeders
- Relaciones entre modelos

No se utilizan consultas SQL crudas salvo casos excepcionales debidamente documentados.

---

# Seguridad

El sistema implementa:

- Autenticación mediante sesiones.
- Middleware de autenticación.
- Middleware de autorización por rol.
- Protección CSRF.
- Hash de contraseñas.
- Validación de formularios.

---

# API REST

Como componente complementario solicitado por la materia, el proyecto contempla la implementación de una API REST básica.

La documentación correspondiente se encuentra en:

[[06_API_REST]]

---

# Entorno de Desarrollo

Durante el desarrollo se utilizó el siguiente entorno:

- Windows 11
- PHP
- Composer
- Docker WSL
- MySQL
- phpMyAdmin
- Visual Studio Code
- Git

La configuración completa puede consultarse en:

[[setup-local-dev]]

---

# Decisiones de Diseño

Durante el desarrollo se adoptaron las siguientes decisiones:

- Utilizar Laravel como framework principal.
- Mantener la estructura estándar del framework.
- Utilizar Eloquent ORM para el acceso a datos.
- Utilizar Blade como motor de plantillas.
- Emplear migraciones y seeders para la creación de la base de datos.
- Separar las funcionalidades del administrador y del cliente.
- Mantener una documentación técnica integrada al repositorio.

---

# Resumen

La arquitectura de Rincón del Pan se basa en el patrón MVC implementado por Laravel, utilizando Eloquent ORM, Blade y MySQL para construir una aplicación modular, mantenible y alineada con las buenas prácticas recomendadas por el framework.

---

## Documentación relacionada

- [[README]]
- [[00_AnalisisRequisitos]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[08_ManualTecnico]]
