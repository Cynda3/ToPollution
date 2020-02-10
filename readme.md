# ToPollution

ToPollution es una pagina en la que podremos ver la contaminacion de nuestro alrededor gracias a unos dispositivos creados por unos compañeros del colegio de Don Bosco, podras registrar tus dispositivos y recibir sus mediciones, despues nuestra pagina las mostrara y te dira si es una contaminacion excesiva o normal mediante graficos y un mapa.

## Comenzando 🚀

Clona [ToPollution](https://github.com/Cynda3/ToPollution) en local y sigue los pasos de **Pre-requisitos** e **Insitalacion** para tener una copia funciona del proyecto en local
```
git clone https://github.com/Cynda3/ToPollution.git
```

### Pre-requisitos 📋

**Composer**
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');
```
```
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

**Laravel**
```
sudo apt install php php-common php-bcmath php-json php-mbstring php-xml php-tokenizer php-zip
```
```
composer global require laravel/installer
```
```
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
```

**Base de datos**<br>
Cualquier base de datos compatible con laravel

### Instalación 🔧

Copiamos .env.example con el nombre .env
```
cp .env.example .env
```

Actualizamos dependencias
```
composer update
```

Creamos la clave de laravel
```
php artisan key:generate
```

Dentro del .env ponemos la base de datos en
```
DB_CONNECTION=mysql (base de datos que vayamos a usar (mariaDB=mysql))
DB_HOST=127.0.0.1   (Host donde esta la base de datos)
DB_PORT=3306        (Puerto de la base de datos)
DB_DATABASE=----    (Nombre de la base de datos)
DB_USERNAME=----    (Usuario de la base de datos)
DB_PASSWORD=----    (Contraseña de la base de datos)
```

Para que lleguen los emails de verificacion en el .env debemos añadir lo siguiente:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=topollution@gmail.com
MAIL_PASSWORD=zubiri123
MAIL_ENCRYPTION=tls
```

## Usuarios

- **Admin**<br>
antonio@topollution.com -> contraseña: patata.
- **User**<br>
fernando@topollution.com -> contraseña: patata.

## Despliegue 📦

Hemos realizado el despliegue en heroku: [ToPollution](https://topollution.herokuapp.com/)

## Construido con 🛠️

* [Laravel 6](https://laravel.com/)
* [Composer](https://getcomposer.org/)
* [Bootstrap 4](https://getbootstrap.com/)
* [Leaflet](https://leafletjs.com)
* [Google charts](https://developers.google.com/chart)

## Autores ✒️

* **Ander Gonzalez** - *Jefe* - [Cynda3](https://github.com/Cynda3)
* **Adrián Gómez** - *Cojefe* - [agomezdo18dw](https://github.com/agomezdo18dw)
* **Asier Fernandez** - *Diseño* - [AsiFernandez](https://github.com/AsiFernandez)
* **Jon Imanol Pinto** - *Base de datos* - [ScarletRyu](https://github.com/ScarletRyu)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/Cynda3/ToPollution/graphs/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles  (Por ahora ninguna)

## Expresiones de Gratitud 🎁

* [Villanuevand](https://github.com/Villanuevand) por ayudar con su readme de ejemplo



---
Gracias de ❤️ por todo el equipo de [ToPollution](https://github.com/Cynda3/ToPollution) 😊