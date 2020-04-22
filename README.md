# Tutorial de toba

Este repositorio es para seguir el tutorial de toba, trabajamos con todo el entorno dockerizado

# Instalación manual

Levantar todo con docker compose

```bash
docker-compose up -d
```

Instalar Toba. Hay que cargar los parámetros a mano

```bash
docker-compose exec toba bin/toba instalacion instalar
```

Despues de instalar, cargar en apache

```bash
docker-compose exec toba ln -s /toba/toba.conf /etc/apache2/sites-enabled/toba_3_3.conf
```

Para instalar el proyecto

```bash
docker-compose exec toba bin/toba proyecto crear -p proyecto_tuto -d /srv/toba
```

Modificar los permisos para que Toba no joda

```bash
chown -R www-data:www-data /toba
```

Reiniciar Apache

```bash
docker-compose exec toba service apache2 reload
```

