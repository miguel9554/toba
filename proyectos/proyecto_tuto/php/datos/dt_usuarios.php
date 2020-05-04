<?php
class dt_usuarios extends proyecto_tuto_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['apellido'])) {
			$where[] = "apellido ILIKE ".quote("%{$filtro['apellido']}%");
		}
		if (isset($filtro['dni'])) {
			$where[] = "dni = ".quote($filtro['dni']);
		}
		$sql = "SELECT
			t_u.id_usuario,
			t_u.nombre,
			t_u.apellido,
			t_u.dni,
			t_u.direccion,
			t_u.telefono
		FROM
			usuarios as t_u
		ORDER BY nombre";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>