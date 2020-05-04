<?php
class dt_libros extends proyecto_tuto_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_libro, nombre FROM libros ORDER BY nombre";
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>