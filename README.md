<p align="center">
  <a>
    <img alt="logo unow" src="https://media-exp1.licdn.com/dms/image/C560BAQGzz67aEkWNeA/company-logo_200_200/0/1636565911937?e=1671062400&v=beta&t=xgYBzIIJnGxUyeHceH3pBiISOSaKGS1xVt534g61jjY" height="92px"/>
  </a>
</p>

<h1 align="center">
  Unow Solutions test
</h1>

## 🚀 Configuración del entorno

### 🐳 Herramientas necesarias

1. [Instalar Docker](https://www.docker.com/get-started)
2. Clona este proyecto: `git clone https://github.com/italoantonio0909/unow-test.git`
3. Moverse al directorio raíz del proyecto.

### 🛠️ Configuración de entorno

1. Instala las dependencias del proyecto utilizando el comando de docker: `docker-compose up -d`
2. Luego tienes dos puertos disponibles:
   1. Servidor PHP: http://localhost:8080
   2. Gestor PhpMyAdmin: http://localhost:8000

### ⚙ APIs

### Usuarios
  1. http://localhost:8080/v1/contexts/user 

### Médico 
  2. http://localhost:8080/v1/contexts/medic 

### Reservación de citas médicas
   1. http://localhost:8080/v1/contexts/reservations/create 
   2. http://localhost:8080/v1/contexts/reservations/confirm/:reservationId 
   3. http://localhost:8080/v1/contexts/reservations/today/:medicId 

## 👩‍💻 Proyecto explicación

Este proyecto tiene como objetivo exponer 3 endpoints de reservación de citas médicas. Se sigue principios solid, arquitectura hexagonal,
conceptos que aplican a cualquier framework como Laravel o Symfony. 
   
### 🔨 Arquitectura Hexagonal

Esta estructura de carpetas sigue los principios de arquitectura hexagonal y principios SOLID.

```
src
|-- Apps // Puntos de entrada a la aplicación (endpoints)
|-- Contexts // Contexto relacionado a la compañía
`-- User // Modulo de usuarios
|       |-- Application
|       |   |-- Create // Inside the application layer all is structured by actions
|       |   |   |-- UserCreate.php
|       |   |
|       |   |
|       |   |
|       |   `-- Search
|       |-- Domain
|       |   |-- User.php // The Aggregate of the Module
|       |   |-- UserEmail.php // A Domain Event
|       |   |-- UserPassword.php
|       |   |-- UserRepository.php // Interface to inject
|       |
|       |
|       `-- Infrastructure // The infrastructure of our module
|           |
|           `-- Persistence
|               `--UserMysqlRepository.php // Una implementación del repositorio
|
|   `-- Reservation // Modulo de reservación de citas
|
|   `-- Medic // Modulo de medicos
|
`-- Shared // Shared Kernel: Infraestructura compartida como drivers de bases de datos y persistencia.
    |-- Domain
    `-- Infrastructure
```

#### Patrón repositorio

Los repositorios intentan ser lo más simples posible, por lo general solo contienen 2 métodos `buscar` y `guardar`.

Puedes mirar un ejemplo [aquí](src/Contexts/User/Domain/UserRepository.php)
y su respectiva implementación [aquí](src/Contexts/User/Infrastructure/UserMysqlRepository.php).
