# Zaiko Kanri


Un servicio de arriendo de trajes, vestidos y accesorios generico que resuelve la necesidad de registrar productos y posteriormente reservarlos, esta dirigido para PYMES que necesiten un sistema sencillo y facil de entender.

Software stack
El proyecto Zaiko Kanri es una aplicación web que corre sobre el siguiente software:

Ubuntu 20.04.4
Apache 2.4.41
PHP 7.4 (ext: curl, gd, mbstring, mysql, pgsql, xml, zip)
Base de Datos MySQL 8.0.29

Configuraciones de Ejecución para Entorno de Desarrollo/Produccción
Indicar instrucciones de como obtener una copia del proyecto para ejecutarlo localmente.

Credenciales de Base de Datos y variables de ambiente

Editar el archivo src/env.php


IMPORTANTE: Por razones de Seguridad NUNCA debes guardar las credenciales y subirlas al repositorio


Docker, Máquina Virtual, Sistema Operativa

Con una terminal situarse dentro del directorio raiz donde fue clonado este repositorio, por ej: ~/git/mi-proyecto/.
Una vez situado en la raiz del proyecto, dirigirse al directorio docker y ejecutar lo siguiente para construir la imagen docker:

docker build -t mi-proyecto:version1.0 .



Una vez construida la imagen, lanzar un contenedor montando un volumen que contenga el código del repositorio, en el directorio /var/www/html del contenedor.

docker run --rm -ti -p 80:80 -v /home/usuario/git/mi-proyecto/:/var/www/html mi-proyecto:version1.0 bash


Iniciar el servicio de Apache Http Server

service apache2 start


Iniciar el servicio de Nginx

service nginx start


Iniciar el servicio de NodeJS

nodejs index.js



Instalar dependencias del proyecto
Cambiar al directorio web document root (Apache) del contenedor:

cd /var/www/html


Instalar las dependencias del proyecto con composer

composer install


Cambiar permisos para permitir la correcta ejecución de la aplicación en entorno local

chmod -R 777 web/assets/ logs/ cache/


Ir a un navegador web y ejecutar la siguiente url mi-proyecto

Construido con

Laravel - The web framework used
Symfony - The web framework used
Rails - The web framework used
Django - The web framework used
Composer - Dependency Management
Pipenv - Dependency Management
Rubygem - Dependency Management
Bundler - Dependency Management
NPM - Dependency Management
Yarn - Dependency Management
Bootstrap 4 - HTML, CSS, and JS Frontend Framework
AdminLTE Bootstrap - Admin Dashboard Template


Licencia
Este proyecto fue construido con la licencia AAA, - ver LICENSE.md para mayor información

Contribuir al Proyecto

Por favor lea las instrucciones para contribuir al proyecto en CONTRIBUTING.md



Agradecimientos

Basado en el código de .....
etc