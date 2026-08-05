# 🔐 UML - Diagrama de Secuencia: Inicio de Sesión

> [!info]
> **Proyecto:** Rincón del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Secuencia

---

# Objetivo

Este diagrama describe la interacción entre los distintos componentes del sistema durante el proceso de autenticación de un usuario.

El flujo refleja el funcionamiento implementado mediante el **AuthController**, las rutas de Laravel, el modelo **User**, la base de datos MySQL y el sistema de autenticación basado en sesiones.

Este documento complementa la descripción funcional desarrollada en [05_CasosUso](../docs/05_CasosUso.md).

---

# Diagrama

```mermaid
sequenceDiagram

actor Usuario

participant Navegador
participant Routes
participant AuthController
participant User
participant MySQL
participant Session

Usuario->>Navegador: Completa formulario de inicio de sesión

Navegador->>Routes: POST /login

Routes->>AuthController: login()

AuthController->>AuthController: Validar datos del formulario

AuthController->>User: Buscar usuario por email

User->>MySQL: SELECT user

MySQL-->>User: Datos del usuario

User-->>AuthController: Usuario encontrado

alt Credenciales válidas

    AuthController->>Session: Crear sesión

    Session-->>AuthController: Sesión iniciada

    AuthController-->>Navegador: Redirect según rol

    Navegador-->>Usuario: Acceso al sistema

else Credenciales inválidas

    AuthController-->>Navegador: Redirect Login + Error

    Navegador-->>Usuario: Mostrar mensaje de error

end
```

---

# Descripción del Flujo

El proceso de autenticación comienza cuando el usuario completa el formulario de inicio de sesión y envía sus credenciales.

Laravel recibe la solicitud mediante la ruta correspondiente y la deriva al **AuthController**, responsable de validar los datos ingresados y autenticar al usuario.

Si las credenciales son correctas, el sistema crea una sesión y redirige al usuario según su rol dentro de la aplicación.

En caso contrario, el sistema vuelve al formulario de inicio de sesión mostrando un mensaje de error.

---

# Participantes

## 👤 Usuario

Persona que intenta acceder al sistema utilizando su correo electrónico y contraseña.

---

## 🌐 Navegador

Envía la solicitud HTTP y recibe las respuestas generadas por Laravel.

---

## 🛣️ Routes

Resuelven la URL solicitada y derivan la petición al controlador correspondiente.

---

## 🎮 AuthController

Coordina todo el proceso de autenticación.

Sus responsabilidades incluyen:

- Validar datos.
- Buscar el usuario.
- Verificar la contraseña.
- Crear la sesión.
- Redireccionar al usuario según su rol.

---

## 📦 User

Modelo Eloquent encargado de representar los usuarios registrados.

Realiza la consulta sobre la base de datos.

---

## 🗄️ MySQL

Almacena la información de los usuarios registrados.

---

## 🔑 Session

Gestiona la autenticación basada en sesiones de Laravel.

Una vez creada la sesión, el usuario puede acceder a las rutas protegidas por el middleware `auth`.

---

# Escenarios Posibles

## Autenticación Exitosa

El sistema:

- encuentra el usuario;
- valida la contraseña;
- crea la sesión;
- redirige al usuario según el rol asignado.

---

## Autenticación Fallida

Si las credenciales son incorrectas:

- no se crea ninguna sesión;
- el usuario permanece sin autenticar;
- se muestra un mensaje de error;
- se redirecciona nuevamente al formulario de inicio de sesión.

---

# Relación con Laravel

Durante este proceso intervienen los siguientes componentes del framework:

- Routes
- AuthController
- Middleware `guest`
- Middleware `auth`
- Modelo `User`
- Eloquent ORM
- Sistema de Sesiones
- Blade

---

# Relación con otros Diagramas

Este diagrama se complementa con:

- [20_UML_CasosUso](./20_UML_CasosUso.md)
- [21_UML_Clases](./21_UML_Clases.md)
- [23_UML_SecuenciaPedido](./23_UML_SecuenciaPedido.md)

---

# Documentación Relacionada

- [05_CasosUso](../docs/05_CasosUso.md)
- [07_UML](../docs/07_UML.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El proceso de autenticación implementado en **Rincón del Pan** sigue el flujo habitual de una aplicación Laravel basada en sesiones.

La separación entre rutas, controladores, modelos, persistencia y gestión de sesiones permite mantener una arquitectura organizada y facilita el mantenimiento del sistema, respetando el patrón MVC y las buenas prácticas recomendadas por el framework.
