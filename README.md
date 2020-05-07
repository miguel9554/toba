# Tutorial de toba

Este repositorio es para seguir el tutorial de toba, trabajamos con todo el entorno dockerizado

# Instalación

Copiar `.env.dist` a `.env` y asignar los parámetros adecuados.

Levantar todo con docker compose

```bash
docker-compose up -d
```

Instalar Toba

```bash
docker-compose exec toba bin/instalar_toba.sh
```

Ya se encuentra Toba instalado y con los proyectos que trae cargados.
