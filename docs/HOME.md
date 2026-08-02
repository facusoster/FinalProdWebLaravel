# 🏠 Sweet Store Wiki

Bienvenido a la documentación técnica del proyecto **Sweet Store**.

Esta Wiki reúne el análisis funcional, la documentación técnica y las decisiones de diseño adoptadas durante el desarrollo del proyecto.

---

# 📚 Índice General

## Inicio

- [[README]]

---

## Análisis

- [[00_AnalisisRequisitos]]
- [[05_CasosUso]]

---

## Arquitectura

- [[01_Arquitectura]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[07_UML]]

---

## Desarrollo

- [[06_API_REST]]
- [[08_ManualTecnico]]
- [[09_ManualInstalacion]]

---

## Entorno de Desarrollo

- [[setup-local-dev]]

---

# Flujo de Lectura Recomendado

```text
README
   │
   ▼
00_AnalisisRequisitos
   │
   ▼
01_Arquitectura
   │
   ▼
02_ModeloDominio
   │
   ▼
03_BaseDatos
   │
   ▼
04_DER
   │
   ▼
05_CasosUso
   │
   ▼
07_UML
   │
   ▼
06_API_REST
   │
   ▼
08_ManualTecnico
   │
   ▼
09_ManualInstalacion
```

---

# Entorno de Desarrollo

Durante el desarrollo del backend se utilizó un entorno local compuesto por:

- Laravel
- PHP
- Composer
- Docker
- MySQL 8
- phpMyAdmin
- Visual Studio Code

La configuración completa del entorno, incluyendo `docker-compose.yml`, variables de entorno y flujo de trabajo diario, se encuentra documentada en [[setup-local-dev]]. 

---

# Estado de la Documentación

| Documento                 | Estado |
| ------------------------- | :----: |
| [[README]]                |   ✅    |
| [[00_AnalisisRequisitos]] |   ⏳    |
| [[01_Arquitectura]]       |   🚧   |
| [[02_ModeloDominio]]      |   🚧   |
| [[03_BaseDatos]]          |   🚧   |
| [[04_DER]]                |   🚧   |
| [[05_CasosUso]]           |   🚧   |
| [[06_API_REST]]           |   🚧   |
| [[07_UML]]                |   🚧   |
| [[08_ManualTecnico]]      |   🚧   |
| [[09_ManualInstalacion]]  |   🚧   |
| [[setup-local-dev]]       |   ✅    |

---

# Próximas Tareas

- Completar el relevamiento de requisitos.
- Incorporar el DER definitivo generado desde el código.
- Agregar diagramas UML.
- Implementar la API REST.
- Incorporar la colección de Postman.
- Completar el manual técnico con las decisiones finales de implementación.