# Tutorial de toba

Este repositorio es para seguir el tutorial de toba, trabajamos con todo el entorno dockerizado

# Instalación

Copiar `.env.dist` a `.env` y asignar los parámetros adecuados.

Levantar todo con docker compose
```bash
docker-compose up -d
```

Con `regenerar_toba` se instala Toba y se cargan todos los proyectos que se encuentren en `proyectos`
```bash
docker-compose exec toba bin/regenerar_toba
```

