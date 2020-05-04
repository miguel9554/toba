<?php
class dt_autores extends proyecto_tuto_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['nombre'])) {
			$where[] = "nombre ILIKE ".quote("%{$filtro['nombre']}%");
		}
		if (isset($filtro['apellido'])) {
			$where[] = "apellido ILIKE ".quote("%{$filtro['apellido']}%");
		}
		$sql = "SELECT
			t_a.id_autor,
			t_a.nombre,
			t_a.apellido
		FROM
			autores as t_a
		ORDER BY nombre";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>