<?php
class dt_generos extends proyecto_tuto_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_g.id_genero,
			t_g.genero
		FROM
			generos as t_g
		ORDER BY genero";
		return toba::db('proyecto_tuto')->consultar($sql);
	}

}

?>