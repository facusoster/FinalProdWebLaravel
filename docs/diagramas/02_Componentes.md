# 🧩 Diagrama de Componentes

> [!info]
> Componentes principales del sistema Rincón del Pan.
>
> Documento relacionado:
> - [[01_Arquitectura]]

---

# Descripción

Este diagrama representa los principales componentes del sistema y las dependencias existentes entre ellos.

---

```mermaid
flowchart TB

Browser["👤 Navegador Web"]

Laravel["Laravel Application"]

Routes["Routes"]

Controllers["Controllers"]

Models["Models (Eloquent)"]

Views["Blade Templates"]

Database[("MySQL")]

Storage["Storage / Public"]

Browser --> Laravel

Laravel --> Routes

Routes --> Controllers

Controllers --> Models

Controllers --> Views

Models --> Database

Views --> Browser

Controllers --> Storage
```

---

# Componentes

## Navegador

Interfaz utilizada por clientes y administradores.

## Laravel

Framework principal del proyecto.

## Routes

Gestionan el direccionamiento de las solicitudes HTTP.

## Controllers

Implementan la lógica de la aplicación.

## Models

Representan las entidades del dominio utilizando Eloquent ORM.

## Blade

Motor de plantillas encargado de generar las vistas HTML.

## MySQL

Persistencia de la información del sistema.

## Storage

Almacenamiento de imágenes y archivos públicos.
