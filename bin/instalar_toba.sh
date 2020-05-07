#!/bin/bash

# Creamos los archivos con las claves
echo -n ${DB_PASSWORD} > /tmp/clave_pg
echo -n ${TOBA_PASSWORD} > /tmp/clave_toba

# Instalamos el framework
bin/toba instalacion_silenciosa instalar \
    -d ${ID_DESARROLLADOR} \
    -t ${ES_PRODUCCION} \
    -n ${TOBA_INSTANCIA} \
    -h db \
    -p 5432 \
    -u ${DB_USER} \
    -b ${TOBA_SCHEMA_NOMBRE} \
    -c /tmp/clave_pg \
    -k /tmp/clave_toba \
    --no-interactive \
    --usuario-admin ${TOBA_USUARIO}

# Cargamos los proyectos
bin/toba proyecto cargar -p toba_editor -a 1
bin/toba proyecto cargar -p toba_usuarios -a 1
bin/toba proyecto cargar -p toba_referencia -a 1

# Damos los permisos
chown -R www-data:www-data ${TOBA_INSTALACION_DIR}

# Cargamos el sitio en Apache
ln -s ${TOBA_INSTALACION_DIR}/toba.conf /etc/apache2/sites-enabled/toba.conf
service apache2 reload
