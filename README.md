# Tutorial de toba

Este repositorio es para seguir el tutorial de toba, trabajamos con todo el entorno dockerizado

# Instalación manual

Levantar todo con docker compose

```bash
docker-compose up -d
```

Instalar Toba. Hay que cargar los parámetros a mano

```bash
docker-compose exec toba vendor/siu-toba/framework/bin/toba instalacion instalar
```

Despues de instalar, cargar en apache

```bash
docker-compose exec toba ln -s /srv/toba/instalacion/toba.conf /etc/apache2/sites-enabled/toba_3_3.conf
```

Para instalar el proyecto

```bash
docker-compose exec toba vendor/siu-toba/framework/bin/toba proyecto crear -p proyecto_tuto -d /srv/toba/proyectos/proyecto_tuto
```

Modificar los permisos para que Toba no joda

```bash
docker-compose exec toba chown -R www-data:www-data /srv/toba/instalacion
```

Reiniciar Apache

```bash
docker-compose exec toba service apache2 reload
```

Para exportar al instancia

```bash
docker-compose exec toba vendor/siu-toba/framework/bin/toba proyecto exportar -p proyecto_tuto -i toba_tuto
```
