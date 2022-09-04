# Zaiko Kanri

Un servicio de arriendo de trajes, vestidos y accesorios generico que resuelve la necesidad de registrar productos y posteriormente reservarlos, esta dirigido para PYMES que necesiten un sistema sencillo y facil de entender.

## Software stack
El proyecto Zaiko Kanri es una aplicación web que corre sobre el siguiente software:

- Ubuntu 20.04.4
- Apache 2.4.41
- PHP 7.4 (ext: curl, mysql)
- Base de Datos MySQL 8.0.29

## Configuraciones de Ejecución para Entorno de Desarrollo/Produccción

### Git

Instalar Git

`$sudo apt-get install git-all`

Al tener ya instalado git, se tiene que cambiar al directorio web document root

`$cd /var/www/html/`

Clonar el repositorio

`$git clone https://github.com/Benjax14/inventario.git`

### Credenciales de Base de Datos y variables de ambiente

Editar el archivo modelos/conexion.php

```
    <?php

    $db_host="url_host"; 
    $db_user="usuario";
    $db_pass="contraseña";
    $db_name="nombre_basededatos";

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    ?>
```

## Docker o Maquina virtual Ubuntu LTS

### Docker
### Maquina virtual Ubuntu LTS

Con una terminal situarse dentro del directorio raiz donde fue clonado este repositorio, por ej: ~/git/mi-proyecto/.
Una vez situado en la raiz del proyecto, ejecutar el siguiente comando para ejecutar el localhost

`$php -S localhost:8080`

Posteriormente, puede dirigir al url que deja por defecto: http://localhost:8080

> Si el repositorio esta en una carpeta mas atras (Ej: ../inventario/index.php) se debe agregar al la url de http://localhost:8080

## Instalar dependencias del proyecto
Cambiar al directorio web document root (Apache) del contenedor:

`$cd /var/www/html/inventario`

Instalar php7.4 y apache2

`$sudo apt install php-7.4 libapache2-mod-php7.4 -y`

Instalar mysql

`$apt-get install -y php7.4-mysql`

Reinicie el servicio Apache

`$service apache2 restart`

Ir a un navegador web y ejecutar la siguiente url .../inventario/index.php

## Construido con

- Bootstrap 4 - HTML, CSS, and JS Frontend Framework

## Agradecimientos

- Mi mamita
