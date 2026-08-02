# 🌐 API REST

> [!warning]
> **Estado:** 🚧 En desarrollo
>
> Este documento describe el diseño previsto de la API REST del proyecto **Sweet Store**, solicitado como componente adicional por la consigna de la materia **Desarrollo de Aplicaciones Web con Laravel**.
>
> Al momento de redactar esta documentación, los endpoints aún no se encuentran implementados. La información presentada corresponde al diseño funcional previsto y será actualizada una vez finalizado el desarrollo.

> [!info]
> **Documentación relacionada**
> - [[README]]
> - [[01_Arquitectura]]
> - [[02_ModeloDominio]]
> - [[03_BaseDatos]]
> - [[04_DER]]
> - [[05_CasosUso]]
> - [[08_ManualTecnico]]

---

# Introducción

Como complemento a la aplicación web desarrollada mediante vistas **Blade**, el proyecto contempla la implementación de una **API REST** que exponga parte de la información del sistema en formato **JSON**.

El objetivo de esta API no es reemplazar la interfaz web, sino aplicar los conceptos básicos de servicios REST utilizando Laravel, diferenciando claramente una respuesta HTML de una respuesta destinada al consumo por otras aplicaciones.

La implementación seguirá los lineamientos establecidos por la consigna de la materia.

---

# Objetivos

La API REST tiene como finalidad:

- Exponer información del sistema mediante respuestas JSON.
- Aplicar conceptos básicos de arquitectura REST.
- Reutilizar la lógica de negocio existente en la aplicación.
- Comprender la diferencia entre una vista Blade y un servicio REST.
- Facilitar futuras integraciones con aplicaciones externas.

---

# Alcance

De acuerdo con la consigna del trabajo práctico, la API incluirá un subconjunto reducido de funcionalidades.

Inicialmente se implementarán los siguientes endpoints:

| Método | Endpoint | Estado |
|---------|----------|:------:|
| GET | `/api/products` | 🚧 Pendiente |
| GET | `/api/products/{id}` | 🚧 Pendiente |
| GET | `/api/orders` | 🚧 Pendiente |

---

# Endpoints

## GET /api/products

### Descripción

Obtiene el listado de productos disponibles en el catálogo.

### Respuesta esperada

Código HTTP:

```text
200 OK
```

Formato:

```json
[
    {
        "id": 1,
        "name": "Producto",
        "price": 1500
    }
]
```

### Posibles respuestas

| Código | Descripción |
|---------|-------------|
| 200 | Consulta realizada correctamente. |
| 500 | Error interno del servidor. |

---

## GET /api/products/{id}

### Descripción

Obtiene la información detallada de un producto específico.

### Parámetros

| Parámetro | Descripción |
|-----------|-------------|
| id | Identificador del producto. |

### Respuesta esperada

Código HTTP:

```text
200 OK
```

Ejemplo:

```json
{
    "id": 1,
    "name": "Producto",
    "description": "Descripción",
    "price": 1500
}
```

### Posibles respuestas

| Código | Descripción |
|---------|-------------|
| 200 | Producto encontrado. |
| 404 | Producto inexistente. |
| 500 | Error interno del servidor. |

---

## GET /api/orders

### Descripción

Obtiene el listado de pedidos correspondientes al usuario autenticado.

Este endpoint reutilizará el mecanismo de autenticación implementado por la aplicación web.

### Respuesta esperada

Código HTTP:

```text
200 OK
```

Ejemplo:

```json
[
    {
        "id": 15,
        "status": "Pendiente",
        "total": 25000
    }
]
```

### Posibles respuestas

| Código | Descripción |
|---------|-------------|
| 200 | Consulta realizada correctamente. |
| 401 | Usuario no autenticado. |
| 500 | Error interno del servidor. |

---

# Formato de Respuesta

Las respuestas de la API utilizarán el formato **JSON**.

Los códigos de estado HTTP se emplearán para indicar el resultado de cada operación, siguiendo las convenciones habituales de los servicios REST.

Entre los códigos previstos se encuentran:

| Código | Significado |
|---------|-------------|
| 200 | Solicitud procesada correctamente. |
| 401 | Usuario no autenticado. |
| 404 | Recurso no encontrado. |
| 500 | Error interno del servidor. |

---

# Autenticación

La API reutilizará el mecanismo de autenticación basado en sesiones implementado por la aplicación web.

No se contempla la utilización de tokens JWT, OAuth o Laravel Sanctum, ya que la consigna establece que los endpoints pueden utilizar la misma sesión iniciada desde las vistas Blade.

---

# Pruebas

Como parte de la entrega final se incorporará una colección de **Postman** que incluirá todos los endpoints implementados.

Cada solicitud contará con pruebas automáticas para verificar, como mínimo:

- Código de estado HTTP.
- Recepción de una respuesta válida.
- Formato JSON.
- Existencia de los principales atributos devueltos por cada endpoint.

---

# Trabajo Pendiente

La implementación definitiva de la API deberá contemplar:

- Desarrollo de los tres endpoints solicitados.
- Validación de respuestas HTTP.
- Pruebas utilizando Postman.
- Exportación de la colección en formato JSON.
- Actualización de este documento con ejemplos reales obtenidos durante las pruebas.

---

# Resumen

La API REST constituye un componente complementario de **Sweet Store**, cuyo propósito es aplicar los conceptos básicos de servicios web utilizando Laravel.

Aunque su implementación aún se encuentra pendiente, el diseño presentado establece la estructura general que deberá seguir el desarrollo, incluyendo los endpoints requeridos, el formato de las respuestas y la estrategia de autenticación definida por la consigna.

---

## Documentación relacionada

- [[README]]
- [[01_Arquitectura]]
- [[02_ModeloDominio]]
- [[03_BaseDatos]]
- [[04_DER]]
- [[05_CasosUso]]
- [[08_ManualTecnico]]