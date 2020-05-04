<?php
class dt_prestamos_maestro extends proyecto_tuto_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_prestamo, id_prestamo FROM prestamos_maestro ORDER BY id_prestamo";
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>