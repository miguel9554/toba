<?php
class consultas
{
	static function get_listado_generos($where = null)
	{
	    $sql = 'SELECT id_genero, genero FROM generos';

	    return toba::db()->consultar($sql);
	}

	static function get_listado_libros($where = null)
	{
		$sql = 'SELECT id_libro, gen.genero, editorial, li.nombre,
			isbn, au.apellido || \' \' || au.nombre as autor
			FROM 
			libros li INNER JOIN generos gen ON li.id_genero = gen.id_genero
			INNER JOIN autores au ON li.id_autor = au.id_autor ';
		if(!is_null($where))
		{
			$sql .= "WHERE $where";
		}
		return toba::db()->consultar($sql);	
	}

	static function get_busqueda_libro($texto=null)
	{
		$datos = array();
		if(!is_null($texto) && trim($texto) != '')
		{
			$where = 'li.nombre ILIKE'.quote("$texto%");
			$datos = self::get_listado_libros($where);
		}
		return $datos;
	}

	static function get_nombre_libro($id=null)
	{
		$where = null;
		if(!is_null($id))
		{
			$where = "li.id_autor = ".quote($id);
		}
		$datos = self::get_listado_libros($where);
		if(isset($datos['0']))
		{
			return $datos['0']['li.nombre'];
		}
		return '';
	}

	static function get_nombre_autor($id=null)
	{
		$where = null;
		if(!is_null($id))
		{
			$where = "id_autor = " . quote($id);
		}
		$datos = self::get_listado_autores($where);
		if(isset($datos['0'])){
			return $datos['0']['apellido'] . ' ' . $datos['0']['nombre'];
		}
		return '';
	}

	static function get_busqueda_autor($texto=null)
	{
		$datos = array();
		if(!is_null($texto) && trim($texto) != '')
		{
			$where = 'apellido ILIKE '.quote("$texto%");
			$datos = self::get_listado_autores($where);
		}
		return $datos;
	}

	static function get_listado_autores($where = null)
	{
		$sql = 'SELECT id_autor, apellido, nombre
			FROM autores ';
		if(!is_null($where))
		{
			$sql .= "WHERE $where";
		}

		return toba::db()->consultar($sql);
	}
}
