# ðŸš€ Deployment

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Lenguaje:** PHP 8.3.32

---

# Objetivo

Este documento representa el diagrama de despliegue (Deployment Diagram) del proyecto **RincÃ³n del Pan**.

Su finalidad es mostrar cÃ³mo se distribuyen los distintos componentes del sistema dentro del entorno de ejecuciÃ³n utilizado durante el desarrollo local.

Este diagrama complementa la informaciÃ³n presentada en:

- [09_ManualInstalacion](../docs/09_ManualInstalacion.md)
- [setup-local-dev](../setup-local-dev.md)

---

# Diagrama

```mermaid
flowchart LR

    U["ðŸ‘¤ Usuario<br/>Navegador Web"]

    subgraph PC["ðŸ’» Equipo de Desarrollo"]
        direction TB

        VSC["ðŸ“ Visual Studio Code"]
        GIT["ðŸŒ¿ Git"]
        OBS["ðŸ“š Obsidian"]

        subgraph Laravel["âš™ï¸ Laravel 13"]
            PHP["ðŸ˜ PHP 8.3"]
            APP["ðŸ›’ AplicaciÃ³n<br/>RincÃ³n del Pan"]
        end

        subgraph Docker["ðŸ³ Docker Desktop"]
            MYSQL["ðŸ—„ï¸ MySQL 8"]
            PMA["ðŸ“Š phpMyAdmin"]
        end
    end

    GH["â˜ï¸ GitHub"]

    U --> APP
    APP --> PHP
    PHP --> MYSQL

    PMA --> MYSQL

    VSC --> APP

    GIT --> GH
    GH --> GIT

    OBS -. DocumentaciÃ³n .-> APP
```

---

# DescripciÃ³n General

Durante el desarrollo, todos los componentes de la aplicaciÃ³n se ejecutan sobre un Ãºnico equipo local.

La aplicaciÃ³n Laravel se comunica con una instancia de **MySQL** ejecutada mediante **Docker Desktop**, mientras que el cÃ³digo fuente es gestionado con **Git** y almacenado en un repositorio remoto de **GitHub**.

La documentaciÃ³n tÃ©cnica se desarrolla en **Markdown** utilizando **Obsidian**, permitiendo mantenerla versionada junto con el cÃ³digo.

---

# Componentes del Entorno

## ðŸ‘¤ Usuario

InteractÃºa con la aplicaciÃ³n mediante un navegador web utilizando el servidor de desarrollo integrado de Laravel.

Acceso habitual:

```text
http://127.0.0.1:8000
```

---

## âš™ï¸ AplicaciÃ³n Laravel

Implementa toda la lÃ³gica de negocio del sistema.

Incluye:

- Rutas
- Middleware
- Controladores
- Modelos
- Vistas Blade
- Migraciones
- Seeders

---

## ðŸ˜ PHP 8.3

Motor encargado de ejecutar la aplicaciÃ³n Laravel.

VersiÃ³n utilizada durante el desarrollo:

```text
PHP 8.3.32
```

---

## ðŸ³ Docker Desktop

Se utiliza para aislar los servicios de infraestructura necesarios para el proyecto.

Permite ejecutar los contenedores de manera independiente del sistema operativo anfitriÃ³n.

---

## ðŸ—„ï¸ MySQL

Motor de base de datos encargado de almacenar toda la informaciÃ³n del sistema.

Se ejecuta dentro de un contenedor Docker.

---

## ðŸ“Š phpMyAdmin

Herramienta web utilizada para administrar visualmente la base de datos MySQL durante el desarrollo.

Acceso habitual:

```text
http://localhost:8080
```

---

## ðŸ“ Visual Studio Code

Entorno de desarrollo principal utilizado para la implementaciÃ³n del proyecto.

Se emplea para:

- Desarrollo del cÃ³digo.
- DepuraciÃ³n.
- GestiÃ³n de extensiones.
- IntegraciÃ³n con Git.

---

## ðŸŒ¿ Git

Sistema de control de versiones utilizado durante todo el desarrollo.

Permite:

- Registrar cambios.
- Trabajar mediante ramas.
- Mantener historial.
- Colaborar entre integrantes del equipo.

---

## â˜ï¸ GitHub

Repositorio remoto donde se almacena el proyecto y toda su documentaciÃ³n.

Incluye:

- CÃ³digo fuente.
- Diagramas Mermaid.
- DocumentaciÃ³n Markdown.
- Historial completo de versiones.

---

## ðŸ“š Obsidian

Herramienta utilizada para la elaboraciÃ³n y mantenimiento de la documentaciÃ³n tÃ©cnica del proyecto.

Su integraciÃ³n con Markdown y Mermaid facilita:

- NavegaciÃ³n mediante enlaces internos.
- VisualizaciÃ³n del grafo documental.
- EdiciÃ³n de diagramas.
- Versionado junto al cÃ³digo.

---

# Flujo de Despliegue

El proceso de ejecuciÃ³n de la aplicaciÃ³n puede resumirse en los siguientes pasos:

1. El desarrollador inicia los contenedores Docker.
2. MySQL queda disponible para Laravel.
3. Laravel se ejecuta mediante el servidor integrado de PHP.
4. El usuario accede desde un navegador web.
5. Laravel procesa la solicitud y consulta la base de datos cuando es necesario.
6. La respuesta HTML es enviada nuevamente al navegador.

---

# Entorno de Desarrollo

El entorno utilizado durante la realizaciÃ³n del proyecto estÃ¡ compuesto por:

| Componente | TecnologÃ­a |
|------------|------------|
| Sistema Operativo | Windows 11 |
| Framework | Laravel 13.23.0 |
| Lenguaje | PHP 8.3.32 |
| Base de Datos | MySQL 8 |
| Contenedores | Docker Desktop |
| AdministraciÃ³n BD | phpMyAdmin |
| IDE | Visual Studio Code |
| Control de Versiones | Git |
| Repositorio Remoto | GitHub |
| DocumentaciÃ³n | Obsidian + Markdown + Mermaid |

---

# RelaciÃ³n con la DocumentaciÃ³n

Este diagrama complementa los siguientes documentos:

- [09_ManualInstalacion](../docs/09_ManualInstalacion.md)
- [setup-local-dev](../setup-local-dev.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)
- [01_Arquitectura](../docs/01_Arquitectura.md)

---

# Consideraciones Finales

El despliegue representado corresponde al entorno de desarrollo utilizado para la construcciÃ³n de **RincÃ³n del Pan**.

La utilizaciÃ³n de **Laravel Framework 13**, **PHP 8.3**, **Docker Desktop**, **MySQL**, **GitHub** y **Obsidian** permitiÃ³ construir un entorno moderno, reproducible y fÃ¡cilmente mantenible, donde tanto el cÃ³digo fuente como la documentaciÃ³n evolucionan conjuntamente bajo control de versiones.

