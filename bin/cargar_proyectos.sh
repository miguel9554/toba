#!/bin/bash

script_path="$( cd "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"
toba="${script_path}/toba"
projects_path="${script_path}/../proyectos"
for project_path in ${projects_path}/*; do
	project_name=$(basename $project_path)
	mv $project_path ${projects_path}/tmp
	${toba} proyecto crear -p $project_name -d $project_path -a 1
	rm -r $project_path
	mv ${projects_path}/tmp $project_path 
	${toba} proyecto regenerar -p $project_name -i $TOBA_INSTANCIA
done
service apache2 reload
