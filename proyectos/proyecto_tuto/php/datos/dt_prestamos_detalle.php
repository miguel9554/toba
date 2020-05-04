<?php
class dt_prestamos_detalle extends proyecto_tuto_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_pd.id_detalle,
			t_pm.id_prestamo as id_prestamo_nombre,
			t_l.nombre as id_libro_nombre
		FROM
			prestamos_detalle as t_pd	LEFT OUTER JOIN prestamos_maestro as t_pm ON (t_pd.id_prestamo = t_pm.id_prestamo)
			LEFT OUTER JOIN libros as t_l ON (t_pd.id_libro = t_l.id_libro)";
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>