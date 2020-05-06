
------------------------------------------------------------
-- apex_usuario_grupo_acc
------------------------------------------------------------
INSERT INTO apex_usuario_grupo_acc (proyecto, usuario_grupo_acc, nombre, nivel_acceso, descripcion, vencimiento, dias, hora_entrada, hora_salida, listar, permite_edicion, menu_usuario) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	'Administrador', --nombre
	'0', --nivel_acceso
	'Accede a toda la funcionalidad', --descripcion
	NULL, --vencimiento
	NULL, --dias
	NULL, --hora_entrada
	NULL, --hora_salida
	NULL, --listar
	'1', --permite_edicion
	NULL  --menu_usuario
);

------------------------------------------------------------
-- apex_usuario_grupo_acc_item
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'2'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3465'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3466'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3467'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3468'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3469'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3471'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'proyecto_tuto', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'3477'  --item
);
--- FIN Grupo de desarrollo 0
