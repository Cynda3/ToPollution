# Esturi

Esturi es una web para encontrar tu establecimiento favorito en la ciudad que te encuentres, o en caso de ser dueño de un establecimiento para darlo a conocer

## Comenzando 🚀

Clona [Esturi](https://github.com/agomezdo18dw/esturi) en local y sigue los pasos de **Pre-requisitos** e **Insitalacion** para tener una copia funciona del proyecto en local
```
git clone https://github.com/agomezdo18dw/esturi.git
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

- **Admin** - antonio@topollution.com -> contraseña: patata.
- **User** - fernando@topollution.com -> contraseña: patata.

## Despliegue 📦

Hemos realizado el despliegue en heroku: [topollution](https://topollution.herokuapp.com/)

## Construido con 🛠️

* [Laravel 6](https://laravel.com/)
* [Composer](https://getcomposer.org/)
* [Bootstrap 4](https://getbootstrap.com/)
* [Leaflet](https://leafletjs.com)
* [Google charts](https://developers.google.com/chart)

## Autores ✒️

* **Ander Gonzalez** - *Jefe* - [Cynda3](https://github.com/Cynda3)
* **Adrián Gómez** - *Cojefe* - [agomezdo18dw](https://github.com/agomezdo18dw)
* **Asier Fernandez** - *Diseño* - [esimonor](https://github.com/esimonor)
* **Jon Imanol Pinto** - *Base de datos* - [AitorOrtizdeZarate](https://github.com/AitorOrtizdeZarate)

También puedes mirar la lista de todos los [contribuyentes](https://github.com/Cynda3/ToPollution/graphs/contributors) quíenes han participado en este proyecto. 

## Licencia 📄

Este proyecto está bajo la Licencia (Tu Licencia) - mira el archivo [LICENSE.md](LICENSE.md) para detalles  (Por ahora ninguna)

## Expresiones de Gratitud 🎁

* [Villanuevand](https://github.com/Villanuevand) por ayudar con su readme de ejemplo



---
Gracias de ❤️ por todo el equipo de [ToPollution](https://github.com/Cynda3/ToPollution) 😊