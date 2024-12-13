# Dieguichi Orderly
![Logo Chiringuito](phpFile/assets/img/logo.webp)

- Este proyecto es el Proyecto de Desarrollo Final del Grado Superior de DAW
- Esta aplicación está pensada para poder pedir productos para realizar pedidos en un restaurante sin necesidad de que ningun camarero te atienda.
- Esto facilita mucho el trabajo de los camareros y tambien hace que el tiempo entre la comanda hasta que el usuario reciba lo que ha pedido disminuya.

# Documentación

- [Herramientas Software](#herramientas)
- [SpringBoot](#spring)
- [PHP](#php)
- [MySQL](#mysql)
- [Despliegue](#despliegue)
- [Producción](#produccion)

## Herramientas Usadas <a id="herramientas"></a>
<p> 
<a href="https://spring.io/"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/spring/spring-original-wordmark.svg" alt="springboot" width="40" height="40"/></a><a href="https://www.php.net/"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/></a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/></a> <a href="https://www.docker.com/" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original-wordmark.svg" alt="docker" width="40" height="40"/></a> <a href="https://developer.mozilla.org/es/docs/Web/HTML" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/></a> <a href="https://developer.mozilla.org/es/docs/Web/CSS" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/></a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/></a> <a href="https://jquery.com/" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/jquery/jquery-original-wordmark.svg" alt="jquery" width="40" height="40"/></a> <a href="https://getbootstrap.com/" target="_blank" rel="noreferrer"><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-original-wordmark.svg" alt="bootstrap" width="40" height="40"/></a></p><br>


## API REST SPRINGBOOT <a id="spring"></a>

### Direccion Servidor
```
Direccion API Hosting : https://proyecto-fin-grado.onrender.com.
Direccion API Local: http://springProyect:8080.
```
> [!NOTE]  
> Para que funcione la api en local cambiar la url en [Global.php](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/phpFile/Global.php).
### Controladores

```
En el proyecto:https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/Proyecto-Fin-Grado/src/main/java/com/example/ProyectoFinGrado/controller/ProyectController.java.
```
| Controlador | Método | Descripción |Parámetros|
|--------------|---------|-----------|:-----------:|
|/comprobarRegistro | Post | Verificar si es un usuario valido|nombre, email, clave, clave_verificada|
|/insertar|Post|Registrar nuevo usuario en la base de datos|nombre, email, clave|
|/obtenerDatosUsuario/{nombre}|Get|Obtener datos del usuario logueado|nombre|
|/comprobarUsuarioLogueado|Post|Comprobar si existe el usuario en la base de datos|nombre, clave|
|/obtenerCategorias|Get|Obtener una lista con todas las categorías|-|
|/obtenerProductos/{slug}|Get|Obtener lista de productos que pertenecen a una categoría.El parámetro {slug} es la categoria a la que pertenece el producto|slug|
|/obtenerProducto/{slug}|Get|Obtener un producto.El parámetro {slug} es parámetro por el cual se busca el producto|slug|
|/obtenerAlergenos|Get|Obtener la lista con todos los alérgenos|-|
|/insertarPedido|Post|Insertar el pedido que hace el usuario|[PedidoProductoDTO pedido](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/Proyecto-Fin-Grado/src/main/java/com/example/ProyectoFinGrado/dto/PedidoProductoDTO.java)|
|/obtenerPedidosUsuario/{nombre}|Get|Obtener la lista de pedidos que pertenece a un usuario. El parámetro nombre indica el nombre del usuario|nombre|

### Spring Dockerfile

> [!NOTE]  
> Para que funcione en local cambiar el código por el código que está comentado comentado en [Dockerfile](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/Proyecto-Fin-Grado/Dockerfile) y comentar el actual.
```
FROM maven:3-amazoncorretto-17-alpine AS build
COPY ./Proyecto-Fin-Grado .
RUN mvn clean package -DskipTests

FROM amazoncorretto:17-alpine-jdk 
COPY --from=build /target/Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar
EXPOSE 8080
ENTRYPOINT ["java","-jar","-Dspring.profiles.active=pro","/Proyecto-Fin-Grado-0.0.1-SNAPSHOT.jar", "org.springframework.boot.loader.launch.JarLauncher"]
```
### Properties
> [!IMPORTANT]  
> Para que funcione en local cambiar las anotaciones comentadas por las que estan en producción activas en [Properties](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/Proyecto-Fin-Grado/src/main/resources/application-pro.properties).
```
spring.application.name=Proyecto-Fin-Grado
#Mysql
#Configuracion BD Produccion 
spring.datasource.driver-class-name=com.mysql.cj.jdbc.Driver
spring.datasource.url=jdbc:mysql://root:VwtnXzoVpFwnHMjbIKNlCkHuTYjSMKGI@junction.proxy.rlwy.net:20939/railway
spring.datasource.username=root
spring.datasource.password=VwtnXzoVpFwnHMjbIKNlCkHuTYjSMKGI
spring.jpa.generate-ddl=true
spring.jpa.hibernate.ddl-auto=update

#Cambiar estas lineas para arrancar en Local
#spring.datasource.url=jdbc:mysql://springdb/Proyecto_Fin_Grado
#spring.datasource.password=
```
## PHP <a id="php"></a>

- El funcionamiento de la página se desarrolla en index.php, donde se incluyen las vistas correspondientes.
    - En Global.php se declaran todas las constantes del programa y algunas funciones que nos faciitan su uso.
    - En session.php se controla la sesión del usuario y el control de páginas segun el estado del login, también se hacen las peticiones relacionadas con el login y registro de usuarios.
    - En pedido_utilities.php controla todo lo relacionado con los pedidos , el carrito , y la insercion de pedidos.
    - En mail.php encontramos el código para enviar correos a mi email personal desde la página de contacto.

   > [!NOTE] 
   > Las páginas se obtinene por parámetro y luego se incluyen en index.php
```
<?php

include("Global.php");

$page = $_GET["page"] ?? "home";

include("session.php");

include("pedido_utilities.php");

include("mail.php");

?>
```
### PHP Mailer
> He importado la libreria de PHPMailer en mi proyecto para poder enviar correos
> Las constantes de EMAIL PASSWORD y DOMAIN estan el el arhivo [Global.php](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/phpFile/Global.php)
```
        // Configure the SMTP server
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; // SMTP Port
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL;
		$mail->Password = PASSWORD;
		$mail->SMTPSecure = 'ssl';

		// Set the sender and recipient
		$mail->setFrom(EMAIL, DOMAIN);
		$mail->addAddress(EMAIL, DOMAIN);

		// Configure mail content
		$mail->isHTML(true);
		$mail->Subject = "Contact " . EMAIL;
		$mail->Body = "<p>Form details below." . "<br>" . "Nombre: " . $nombre . "<br>" . "Email: " . $email . "<br>" . "Sujeto: " . $sujeto . "<br>" . "Mensaje: " . $mensaje . "</p>";

		// Send the mail

		//https://".DOMAIN."/
		$mail->send();
```
### PHP Dockerfile

> [!NOTE]  
> Para que funcione en local cambiar el código por el código que está comentado comentado en [Dockerfile](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/php/Dockerfile) y comentar el actual.
```
FROM php:8.2-apache

COPY ./php/docker-php.conf /etc/apache2/conf-available/docker-php.conf
COPY ./phpFile /var/www/html

RUN a2enmod rewrite
```

## MySQL <a id="mysql"></a>

- Diagrama Entidad Relacion de la Base de Datos

![Logo Chiringuito](docs/diagrama-er.png)

> El sql necesario para empezar desde 0 la aplicación se encuentra [aquí](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/docs/ProyectoFinal.sql)


## Como arrancar el proyecto <a id="despliegue"></a>

> Si hemos seguido los pasos anteriores podremos arrancar el proyecto en local

1. Primero tendremos que descargarnos la extensión de Docker en visual studio para facilitar el trabajo

![](docs/docker.png)

2. Iremos al archivo [docker-compose.yml](https://github.com/Juandiegomarin/Proyecto-Fin-Grado/blob/main/docker-compose.yml), click derecho y ejecutamos el comando compose up
- Con esto ya habremos creado el contenedor de docker con las imágenes de springboot , apache y mysql. Pasamos al siguiente paso

```
version: '2'
services:
  apache:
    build: php
    ports:
      - '80:80'
    volumes:
      - './phpFile:/var/www/html'
    restart: unless-stopped
  mysql:
    image: docker.io/bitnami/mysql
    hostname: springdb
    restart: unless-stopped
    ports:
      - '3306:3306'
    volumes:
      - 'mysql_data:/bitnami/mysql/data'
    environment:
      - ALLOW_EMPTY_PASSWORD=yes
    healthcheck:
      test: [ 'CMD', '/opt/bitnami/scripts/mysql/healthcheck.sh' ]
      interval: 15s
      timeout: 5s
      retries: 6
  spring:
    build: Proyecto-Fin-Grado
    hostname: springProyect
    depends_on:
      - mysql
    ports:
      - '8080:8080'
    restart: unless-stopped
volumes:
  mysql_data:
```

- Abrimos el sistema de gestor de base de datos que usemos , en mi caso Heidi.sql

    - Poner el puerto 3306
    - Usuario root
        - Sin contreseña


![](docs/Administrador-bd.png)

- Una vez dentro insertamos el código sql para crear las base de datos con las tablas y sus datos respectivamente

- Una vez insertado los datos ya podremos acceder al proyecto a de forma local [http://localhost/](http://localhost/)

## Producción <a id="produccion"></a>

- Url Proyecto Desplegado [https://proyecto-fin-grado-1.onrender.com/](https://proyecto-fin-grado-1.onrender.com/)

