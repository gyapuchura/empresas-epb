# Instalación Sistema de Hojas de Ruta SCEP - 2022
## Requisitos
  - DEBIAN Version 9, 10 o 11
  - PHP 7.0 a 7.4
  - MySql 5.7.32 o superior
  - Apache 2.4.29
Si se opta por Debian 10 se debe instalar:
    MariaDB Ver 10.1 o superior

Importante.- El servidor debe tener instalado minimamente el servicio ssh:

## Configuracion del firewall de Linux Debian
```
    sudo apt update
    sudo apt install ufw
```
Debemos habilitar el servicio que nos permite conectarnos al servidor:

•	ufw app list
•	ufw allow OpenSSH
•	ufw enable   ; se habilitara el firewall 

para probar el firewall:

•	ufw status

para rpobarlo se mostrara el siguiente mensaje:

```
Output
Status: active
To              Action      From
--             ------         ----
OpenSSH          ALLOW       Anywhere
OpenSSH (v6)     ALLOW       Anywhere (v6

```
## SUBDOMINIO PARA EL SISTEMA

El sistema requiere ser accedido desde la web:

El subdominio que se tiene previsto se denominará"scep".

El nombre completo debe ser: 

"scep.contraloria.gob.bo"

## Instalar Apache y actualizar el firewall
ejecutar las lineas:
```
•	sudo apt update
•	sudo apt install apache2

Se puede ver la lista completa siguiente de perfiles de aplicaciones ejecutando lo siguiente:

•	sudo ufw app list

se obtiene:

Output
Available applications:
. . .
  WWW
  WWW Cache
  WWW Full
  WWW Secure
. . .

inspeccionamos el perfil www Full el tráfico a los puertos 80 y 443

•	sudo ufw app info "WWW Full"

Output
Profile: WWW Full
Title: Web Server (HTTP,HTTPS)
Description: Web Server (HTTP,HTTPS)
Ports: 80,443/tcp

Se debe permitir el tráfico HTTP y HTTPS para este perfil:

•	sudo ufw allow in "WWW Full"

luego se puede verificar la instalacion de apache en un navegador web:

http://localhost // o la direccion IP del servidor.

```
## Instalar MariaDB

Ejecutar para la instalacion:
•	sudo apt install mariadb-server

Se debe iniciar la secuencia de comandos interactiva ejecutando lo siguiente:

•	sudo mysql_secure_installation

En la primera solicitud se pedirá que introduzca la contraseña root de la base de datos actual. el espacio de esta contraseña estará en blanco. Por ello, pulse ENTER en la solicitud.

Desde allí, puede pulsar la tecla Y y luego ENTERpara aceptar los valores predeterminados para todas las preguntas siguientes. Con esto, se eliminarán algunos usuarios anónimos y la base de datos de prueba, se deshabilitarán las credenciales de inicio de sesión remota de raíz y se cargarán estas nuevas reglas para que MariaDB aplique de inmediato los cambios que se realizaron.

crearemos una nueva cuenta llamada admin con las mismas capacidades que la cuenta root, abra la instrucción de MariaDB:

•	sudo mariadb

crear un nuevo usuario con privilegios root y acceso basado en contraseña, aqui se debe asignar contraseña en el campo 'password':

•	GRANT ALL ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'password' WITH GRANT OPTION;

Vacíe los privilegios para garantizar que se guarden y estén disponibles en la sesión actual:

•	FLUSH PRIVILEGES;

luego cerrar MariaDB

•	exit

Ahora acceder a su base de datos como su nuevo usuario es necesario configurarlo:

•	mariadb -u admin -p

En este momento, el sistema de base de datos está configurado.

## Instalar PHP:

Utilizar el comando apt para instalar PHP. 

•	sudo apt install php libapache2-mod-php php-mysql

Para que el servidor web priorice los archivos PHP respecto de otros ejecutar:

•	sudo nano /etc/apache2/mods-enabled/dir.conf

...

ubicar las lineas siguientes:

    DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm


Se debe mover el archivo de indice php a la primera posicion especificada; DirectoryIndex, como se muestra 

    DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm

```
de debe guardar los cambios en el archivo y se debe reiniciar el servidor web Apache:

•	sudo systemctl restart apache2

También se puede verificar el estado del servicio apache2  usando systemctl:

•	sudo systemctl status apache2

```
Para verificar que el sistema esté configurado de forma adecuada para PHP creacndo el siguiente archivo php en el directorio siguiente:

•	sudo nano /var/www/html/info.php

Se abrirá un archivo vacio donde se debe introducir el siguiente codigo:

<?php
phpinfo();
?>

Ahora se puede probar si el servidor web puede mostrar correctamente el contenido generado por esta secuencia de comandos PHP. Para probar esto, usando un navegador de internet se debe apuntar la dirección ip del servidor.

http://([ip del servidor] o http://localhost

Se mostrará una página se proporciona información básica sobre el servidor desde la perspectiva de PHP


## Instalar el Administrador de bases de Datos phpMyadmin:

Para descargar phpMyAdmin en Debian:

~$ wget https://files.phpmyadmin.net/phpMyAdmin/5.1.1/phpMyAdmin-5.1.1-all-languages.tar.xz


Descomprimimos el archivo que se descargó en la ruta indicada en el comando siguiente:

~$ sudo tar xf phpMyAdmin-5.1.1-all-languages.tar.xz -C /var/www/html/

Crear un enlace simbólico sin números para facilitar la configuración y el mantenimiento de phpMyAdmin en Debian.

~$ sudo ln -s /var/www/html/phpMyAdmin-5.1.1-all-languages/ /var/www/html/phpmyadmin

Por último, phpMyAdmin puede necesitar escribir en su propio directorio de instalación, así que concedemos la propiedad del mismo al usuario con el que corre el servicio web:

~$ sudo chown www-data: /var/www/html/phpmyadmin/

Necesitaremos instalar algunas extensiones:

~$ sudo apt install -y php-mbstring php-xml

Una vez instaladas las extensiones, recargamos la configuración del servicio web:

~$ sudo systemctl reload apache2

## Base de datos de phpmyadmin

```
Conectamos con el servicio de bases de datos a través del cliente mysql y un usuario administrador:

~$ mysql -u root -p

Creamos el usuario que administrará la base de datos de phpMyAdmin:

> create user pma@localhost identified by 'XXXXXXXX';

Y le damos permisos sobre la misma:

> grant all privileges on phpmyadmin.* to pma@localhost;

Importante.- Anteriormente se creó el usuario=admin con su respectiva contraseña para administrar phpmyadmin.

```
Refrescamos la tabla de permisos:

> flush privileges;

Y cerramos la conexión:

> exit

```
Se crea la Base de datos desde 
línea de comandos a través de un script SQL que proporciona phpMyAdmin:

~$ cat /var/www/html/phpmyadmin/sql/create_tables.sql | mysql -u pma -p

Se nos solicitará la contraseña del usuario que hemos creado en el paso anterior y se creará la base de datos de phpMyAdmin con la estructura y datos iniciales.


```

## configuraciones de phpMyAdmin

a partir del archivo de ejemplo que nos ofrece la aplicación:

~$ sudo -u www-data cp /var/www/html/phpmyadmin/config.sample.inc.php /var/www/html/phpmyadmin/config.inc.php

Editamos el nuevo archivo:

~$ sudo nano /var/www/html/phpmyadmin/config.inc.php

Buscamos esta línea:

...
$cfg['blowfish_secret'] = ''; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */
...

Por defecto esta variable no tiene ningún valor, así que habrá que asignarle una cadena de 32 caracteres aleatorios:

...
*/
$cfg['blowfish_secret'] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
...

Hecho esto buscaremos esta otra variable:

...
// $cfg['Servers'][$i]['controlpass'] = 'pmapass';
...

Se trata de la variable que almacena la contraseña del usuario de la base de datos de phpMyAdmin. Se debe activar esta variable eliminando los caracteres // al inicio de línea y cambiaremos su valor por defecto por la contraseña que indicamos en el momento de crear el usuario:

...
$cfg['Servers'][$i]['controlpass'] = 'XXXXXXXX';
...

Ya podemos guardar los cambios y cerrar el archivo.

Para acceder a phpMyAdmin en Debian, desde un navegador bastará con indicar la dirección IP, nombre DNS, dominio, etc. del servidor (o localhost en caso de acceder localmente) añadiendo la ruta /phpmyadmin (o el enlace simbólico que hayas utilizado).

Se mostrará la página de inicio de sesión, donde indicaremos el nombre del usuario del servicio de bases de datos con el que queramos trabajar y su contraseña.

# instalar servicio ftp

Se instalara la aplicación vsftpd a través del comando:

~$ sudo apt get install vsftpd


Debido a un bug en la última versión de la aplicación vsftpd se recomienda una ves instalado vsftpd DESINTALARLO.

~$ sudo apt get remove vsftpd

Luego se debe eliminar un archivo de instalación con el siguiente comando:

~$ sudo rm /etc/pam.d/vsftpd

Y luego volver a instalar el vsftpd y luego reiniciar el servicio vsftpd

~$ sudo systemctl reload vsftpd


Asignamos los permisos FTP

Comenzaremos asegurándonos de que el directorio donde se copiará el código fuente del sistema SCEP-2022 con el nombre "empresas-publicas" estará ubicado en:

/var/www/html

pertenezca al grupo www-data:

sudo chgrp www-data /var/www/html

Nos aseguramos también que nuestro usuario pertenezca al mismo grupo:

sudo usermod -a -G www-data usuario


Asignamos los permisos adecuados a los propietarios del directorio:

sudo chown -R usuario /var/www/html

Aquí se debe cambiar usuario por el del administrador del servidor debian.

# Subir el Codigo Fuente al servidor

descargar el codigo fuente del repositorio gitlab.contraloria.gob.bo

https://gitlab.contraloria.gob.bo/subcep/hojas_ruta_frontend.git

Una ves descargado el código en equipo local y poder subirlo al servidor se recomienda comprimirlo:

Tar -cvf ([nombre del archivo comprimido].tar.xz) [nombre del directorio]

Para el caso:
Tar -cvf (empresas-publicas.tar.xz) biblioteca_cge

Para subir el archivo comprimido al directorio raíz del usuario del servidor:
scp empresas-publicas usuario@servidor

Luego el archivo lo descomprimimos en el directorio /var/www/html/ de la siguiente manera:
sudo tar xf biblioteca_cge.tar.xz -C /var/www/html/

Una ves descomprimido el archivo en el directorio indicado, podemos verificar el funcionamiento de la pagina de índice del sistema:
En un navegador de internet (se recomienda Google Chrome);

http://[dominio o ip]/empresas-publicas/


## Restaurar backup de base de datos MySql con phpmyadmin
Descargar el archivo del direcrtorio base de datos 

Empleando PhpMyAdmin como usuario admin, crear la base de datos y denominarla "subcep_db", este procedimiento se realiza de manera grafica.

una ves creada la base de datos con la opcion "IMPORTAR" buscar el backup descargado llamado "suncep_db.sql" cargar el archivo y hacer clic en la opcion de CONTINUAR, con lo cual la base de datos queda restaurada usando el administrador phpMyAdmin.

Una vez importado el archivo sql. Se observa el detalle de la base datos con todas las tablas y valores de inicialización.

Se debe configurar el archivo de conexión a la base de datos usando el siguiente comando:

sudo nano var/www/html/inc.config.php

en este archivo se debe modificar lo siguiente:

- IP servidor: localhost
- Usuario: admin
- Password: el que se haya configurado por el administrador del servidor debian.
- Nombre de la Base de Datos: subcep_db

## CONFIGURACIONES DEL USUARIO

Configuraciones del lado usuario

Para que el usuario del sistema pueda acceder y operar el sistema debe tener instalado el navegador de internet Google Chrome (preferentemente),

En la barra de direcciones url se debe escribir la dirección url del servidor de la siguiente manera:

http://scep.contraloria.gob.bo/empresas-publicas/

