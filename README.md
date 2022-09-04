# Zaiko Kanri


Un servicio de arriendo de trajes, vestidos y accesorios generico que resuelve la necesidad de registrar productos y posteriormente reservarlos, esta dirigido para PYMES que necesiten un sistema sencillo y facil de entender.

Software stack
El proyecto Zaiko Kanri es una aplicación web que corre sobre el siguiente software:

- Ubuntu 20.04.4
- Apache 2.4.41
- PHP 7.4 (ext: curl, gd, mbstring, mysql, pgsql, xml, zip)
- Base de Datos MySQL 8.0.29

Configuraciones de Ejecución para Entorno de Desarrollo/Produccción


Credenciales de Base de Datos y variables de ambiente

Editar el archivo modelos/conexion.php


Docker

Con una terminal situarse dentro del directorio raiz donde fue clonado este repositorio, por ej: ~/git/inventario/.
Una vez situado en la raiz del proyecto, dirigirse al directorio docker y ejecutar lo siguiente para construir la imagen docker:

docker build -t inventario:version1.0 .

Una vez construida la imagen, lanzar un contenedor montando un volumen que contenga el código del repositorio, en el directorio /var/www/html del contenedor.

docker run --rm -ti -p 80:80 -v /home/usuario/git/mi-proyecto/:/var/www/html mi-proyecto:version1.0 bash


Iniciar el servicio de Apache Http Server

service apache2 start

Instalar dependencias del proyecto
Cambiar al directorio web document root (Apache) del contenedor:

cd /var/www/html/inventario

Ir a un navegador web y ejecutar la siguiente url mi-proyecto

Construido con

- Bootstrap 4 - HTML, CSS, and JS Frontend Framework

Agradecimientos

- Mi mamita
