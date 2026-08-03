# ðŸŒ API REST

> [!warning]
> **Estado:** ðŸš§ En desarrollo
>
> Este documento describe el diseÃ±o previsto de la API REST del proyecto **RincÃ³n del Pan**, solicitado como componente adicional por la consigna de la materia **Desarrollo de Aplicaciones Web con Laravel**.
>
> Al momento de redactar esta documentaciÃ³n, los endpoints aÃºn no se encuentran implementados. La informaciÃ³n presentada corresponde al diseÃ±o funcional previsto y serÃ¡ actualizada una vez finalizado el desarrollo.

> [!info]
> **DocumentaciÃ³n relacionada**
> - [README](../../README.md)
> - [01_Arquitectura](01_Arquitectura.md)
> - [02_ModeloDominio](02_ModeloDominio.md)
> - [03_BaseDatos](03_BaseDatos.md)
> - [04_DER](04_DER.md)
> - [05_CasosUso](05_CasosUso.md)
> - [08_ManualTecnico](08_ManualTecnico.md)

---

# IntroducciÃ³n

Como complemento a la aplicaciÃ³n web desarrollada mediante vistas **Blade**, el proyecto contempla la implementaciÃ³n de una **API REST** que exponga parte de la informaciÃ³n del sistema en formato **JSON**.

El objetivo de esta API no es reemplazar la interfaz web, sino aplicar los conceptos bÃ¡sicos de servicios REST utilizando Laravel, diferenciando claramente una respuesta HTML de una respuesta destinada al consumo por otras aplicaciones.

La implementaciÃ³n seguirÃ¡ los lineamientos establecidos por la consigna de la materia.

---

# Objetivos

La API REST tiene como finalidad:

- Exponer informaciÃ³n del sistema mediante respuestas JSON.
- Aplicar conceptos bÃ¡sicos de arquitectura REST.
- Reutilizar la lÃ³gica de negocio existente en la aplicaciÃ³n.
- Comprender la diferencia entre una vista Blade y un servicio REST.
- Facilitar futuras integraciones con aplicaciones externas.

---

# Alcance

De acuerdo con la consigna del trabajo prÃ¡ctico, la API incluirÃ¡ un subconjunto reducido de funcionalidades.

Inicialmente se implementarÃ¡n los siguientes endpoints:

| MÃ©todo | Endpoint | Estado |
|---------|----------|:------:|
| GET | `/api/products` | ðŸš§ Pendiente |
| GET | `/api/products/{id}` | ðŸš§ Pendiente |
| GET | `/api/orders` | ðŸš§ Pendiente |

---

# Endpoints

## GET /api/products

### DescripciÃ³n

Obtiene el listado de productos disponibles en el catÃ¡logo.

### Respuesta esperada

CÃ³digo HTTP:

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

| CÃ³digo | DescripciÃ³n |
|---------|-------------|
| 200 | Consulta realizada correctamente. |
| 500 | Error interno del servidor. |

---

## GET /api/products/{id}

### DescripciÃ³n

Obtiene la informaciÃ³n detallada de un producto especÃ­fico.

### ParÃ¡metros

| ParÃ¡metro | DescripciÃ³n |
|-----------|-------------|
| id | Identificador del producto. |

### Respuesta esperada

CÃ³digo HTTP:

```text
200 OK
```

Ejemplo:

```json
{
    "id": 1,
    "name": "Producto",
    "description": "DescripciÃ³n",
    "price": 1500
}
```

### Posibles respuestas

| CÃ³digo | DescripciÃ³n |
|---------|-------------|
| 200 | Producto encontrado. |
| 404 | Producto inexistente. |
| 500 | Error interno del servidor. |

---

## GET /api/orders

### DescripciÃ³n

Obtiene el listado de pedidos correspondientes al usuario autenticado.

Este endpoint reutilizarÃ¡ el mecanismo de autenticaciÃ³n implementado por la aplicaciÃ³n web.

### Respuesta esperada

CÃ³digo HTTP:

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

| CÃ³digo | DescripciÃ³n |
|---------|-------------|
| 200 | Consulta realizada correctamente. |
| 401 | Usuario no autenticado. |
| 500 | Error interno del servidor. |

---

# Formato de Respuesta

Las respuestas de la API utilizarÃ¡n el formato **JSON**.

Los cÃ³digos de estado HTTP se emplearÃ¡n para indicar el resultado de cada operaciÃ³n, siguiendo las convenciones habituales de los servicios REST.

Entre los cÃ³digos previstos se encuentran:

| CÃ³digo | Significado |
|---------|-------------|
| 200 | Solicitud procesada correctamente. |
| 401 | Usuario no autenticado. |
| 404 | Recurso no encontrado. |
| 500 | Error interno del servidor. |

---

# AutenticaciÃ³n

La API reutilizarÃ¡ el mecanismo de autenticaciÃ³n basado en sesiones implementado por la aplicaciÃ³n web.

No se contempla la utilizaciÃ³n de tokens JWT, OAuth o Laravel Sanctum, ya que la consigna establece que los endpoints pueden utilizar la misma sesiÃ³n iniciada desde las vistas Blade.

---

# Pruebas

Como parte de la entrega final se incorporarÃ¡ una colecciÃ³n de **Postman** que incluirÃ¡ todos los endpoints implementados.

Cada solicitud contarÃ¡ con pruebas automÃ¡ticas para verificar, como mÃ­nimo:

- CÃ³digo de estado HTTP.
- RecepciÃ³n de una respuesta vÃ¡lida.
- Formato JSON.
- Existencia de los principales atributos devueltos por cada endpoint.

---

# Trabajo Pendiente

La implementaciÃ³n definitiva de la API deberÃ¡ contemplar:

- Desarrollo de los tres endpoints solicitados.
- ValidaciÃ³n de respuestas HTTP.
- Pruebas utilizando Postman.
- ExportaciÃ³n de la colecciÃ³n en formato JSON.
- ActualizaciÃ³n de este documento con ejemplos reales obtenidos durante las pruebas.

---

# Resumen

La API REST constituye un componente complementario de **RincÃ³n del Pan**, cuyo propÃ³sito es aplicar los conceptos bÃ¡sicos de servicios web utilizando Laravel.

Aunque su implementaciÃ³n aÃºn se encuentra pendiente, el diseÃ±o presentado establece la estructura general que deberÃ¡ seguir el desarrollo, incluyendo los endpoints requeridos, el formato de las respuestas y la estrategia de autenticaciÃ³n definida por la consigna.

---

## DocumentaciÃ³n relacionada

- [README](../../README.md)
- [01_Arquitectura](01_Arquitectura.md)
- [02_ModeloDominio](02_ModeloDominio.md)
- [03_BaseDatos](03_BaseDatos.md)
- [04_DER](04_DER.md)
- [05_CasosUso](05_CasosUso.md)
- [08_ManualTecnico](08_ManualTecnico.md)

