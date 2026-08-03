# ðŸ” UML - Diagrama de Secuencia: Inicio de SesiÃ³n

> [!info]
> **Proyecto:** RincÃ³n del Pan  
> **Framework:** Laravel Framework 13.23.0  
> **Tipo de Diagrama:** UML - Secuencia

---

# Objetivo

Este diagrama describe la interacciÃ³n entre los distintos componentes del sistema durante el proceso de autenticaciÃ³n de un usuario.

El flujo refleja el funcionamiento implementado mediante el **AuthController**, las rutas de Laravel, el modelo **User**, la base de datos MySQL y el sistema de autenticaciÃ³n basado en sesiones.

Este documento complementa la descripciÃ³n funcional desarrollada en [05_CasosUso](../docs/05_CasosUso.md).

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

Usuario->>Navegador: Completa formulario de Login

Navegador->>Routes: POST /login

Routes->>AuthController: login()

AuthController->>AuthController: Validar credenciales

AuthController->>User: Buscar usuario por email

User->>MySQL: SELECT user

MySQL-->>User: Datos del usuario

User-->>AuthController: Usuario encontrado

alt Credenciales vÃ¡lidas

    AuthController->>Session: Crear sesiÃ³n

    Session-->>AuthController: SesiÃ³n iniciada

    AuthController-->>Navegador: Redirect Dashboard

    Navegador-->>Usuario: Panel principal

else Credenciales invÃ¡lidas

    AuthController-->>Navegador: Redirect Login + Error

    Navegador-->>Usuario: Mostrar mensaje

end
```

---

# DescripciÃ³n del Flujo

El proceso de autenticaciÃ³n comienza cuando el usuario completa el formulario de inicio de sesiÃ³n y envÃ­a sus credenciales.

Laravel recibe la solicitud mediante la ruta correspondiente y la deriva al **AuthController**, responsable de validar los datos ingresados y autenticar al usuario.

Si las credenciales son correctas, se crea una sesiÃ³n y el usuario es redirigido al panel principal.

En caso contrario, el sistema vuelve al formulario de login mostrando un mensaje de error.

---

# Participantes

## ðŸ‘¤ Usuario

Persona que intenta acceder al sistema utilizando su correo electrÃ³nico y contraseÃ±a.

---

## ðŸŒ Navegador

EnvÃ­a la solicitud HTTP y recibe las respuestas generadas por Laravel.

---

## ðŸ›£ï¸ Routes

Resuelven la URL solicitada y derivan la peticiÃ³n al controlador correspondiente.

---

## ðŸŽ® AuthController

Coordina todo el proceso de autenticaciÃ³n.

Sus responsabilidades incluyen:

- Validar datos.
- Buscar el usuario.
- Verificar la contraseÃ±a.
- Crear la sesiÃ³n.
- Redireccionar al usuario.

---

## ðŸ“¦ User

Modelo Eloquent encargado de representar los usuarios registrados.

Realiza la consulta sobre la base de datos.

---

## ðŸ—„ï¸ MySQL

Almacena la informaciÃ³n de los usuarios registrados.

---

## ðŸ”‘ Session

Gestiona la autenticaciÃ³n basada en sesiones de Laravel.

Una vez creada la sesiÃ³n, el usuario puede acceder a las rutas protegidas por el middleware `auth`.

---

# Escenarios Posibles

## AutenticaciÃ³n Exitosa

El sistema:

- encuentra el usuario;
- valida la contraseÃ±a;
- crea la sesiÃ³n;
- redirige al dashboard correspondiente.

---

## AutenticaciÃ³n Fallida

Si las credenciales son incorrectas:

- no se crea ninguna sesiÃ³n;
- el usuario permanece sin autenticar;
- se muestra un mensaje de error;
- se redirecciona nuevamente al formulario de login.

---

# RelaciÃ³n con Laravel

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

# RelaciÃ³n con otros Diagramas

Este diagrama se complementa con:

- [diagramas/20_UML_CasosUso](20_UML_CasosUso.md)
- [diagramas/21_UML_Clases](21_UML_Clases.md)
- [diagramas/23_UML_SecuenciaPedido](23_UML_SecuenciaPedido.md)

---

# DocumentaciÃ³n Relacionada

- [05_CasosUso](../docs/05_CasosUso.md)
- [07_UML](../docs/07_UML.md)
- [08_ManualTecnico](../docs/08_ManualTecnico.md)

---

# Consideraciones Finales

El proceso de autenticaciÃ³n implementado en **RincÃ³n del Pan** sigue el flujo habitual de una aplicaciÃ³n Laravel basada en sesiones.

La separaciÃ³n entre rutas, controlador, modelo, persistencia y gestiÃ³n de sesiones permite mantener una arquitectura clara y facilita el mantenimiento del sistema, respetando el patrÃ³n MVC y las buenas prÃ¡cticas recomendadas por el framework.

