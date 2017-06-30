[![banner](public/img/banner.png)](#)

## Acerca de
El sistema de Reservas está destinado a automatizar los procesos administrativos de reserva del auditorio de la FCyT.
Este sistema esta destina a Docentes y usuarios autorizados para realizar la reserva del auditorio.
Enlace al sitio web funcional  [Sistema de Reservas FCyT - UMSS](http://grapesoft.hosting.cs.umss.edu.bo/).

## Requerimientos
Instalar los requerimientos antes de comenzar con la instalación:
- PHP >= 5.6.4, se recomienda la instalación de [XAMPP](https://www.apachefriends.org/es/download.html), para hacer uso de phpmyadmin en la base de datos.
- [Composer](https://getcomposer.org/), para las dependencias necesarias.
- [Git](https://git-scm.com/).

## Instalación
Para el uso de la consola se recomienda Git Bash, que instalo junto a Git en los Requerimientos. 
- Abrir XAMPP e iniciar los servicios Apache y MySQL.

- Creación de la Base de Datos.
  - Abrir phpmyadmin en localhost de su navegador web `http://localhost/phpmyadmin/`.
  - Crear un nueva base de datos con el nombre `sistema-reservas-v1`.
  - en la base de datos `sistema-reservas-v1` ejecutar el siguiente [script](https://github.com/grapeSoft/Sistema-de-Reservas-de-Ambientes-FCyT/blob/develop/sql/sistema-reservas-v1.sql) SQL, para crear las entidades y atributos de la BD.
  
- Clonacion del repositorio remoto, instalación de dependencias y ejecucion del servidor artisan.
  - Abrir la consola de Git Bash, en un directorio donde se encontrara su repositorio local.
  - Clonar el repositorio, con el siguiente comando:
    `$ git clone https://github.com/grapeSoft/Sistema-de-Reservas-de-Ambientes-FCyT.git`.
  - Entrar al direcotorio clonado, con el siguiente comando:
    `$ cd Sistema-de-Reservas-de-Ambientes-FCyT`.
  - Instalar depedencias
    `$ composer install`.
  - Iniciar el servidor artisan
    `$ php artisan serve`.
  - El servidor se iniciara en `http://localhost:8000`.
