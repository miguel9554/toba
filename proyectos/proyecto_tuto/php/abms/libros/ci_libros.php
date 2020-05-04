<?php
class ci_libros extends proyecto_tuto_ci
{
	//-----------------------------------------------------------------------------------
	//---- Eventos ----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__agregar()
	{
		$this->set_pantalla('pant_edicion');
	}

	function evt__cancelar()
	{
		$this->set_pantalla('pant_inicial');
		$this->dep('datos')->resetear();
	}

	function evt__eliminar()
	{
		$this->dep('datos')->eliminar_todo();
		$this->set_pantalla('pant_inicial');
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->dep('datos')->resetear();
		$this->set_pantalla('pant_inicial');
	}

	//-----------------------------------------------------------------------------------
	//---- cuadro_libros ----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro_libros(proyecto_tuto_ei_cuadro $cuadro)
	{
		if (isset($this->filtro_data)) {
			$filtro = $this->dep('filtro')->get_sql_where();
			$datos = toba::consulta_php('Consultas')->get_listado_libros($filtro);
			$cuadro->set_datos($datos);
		}
	}

	function evt__cuadro_libros__seleccion($seleccion)
	{
		$this->seleccion = $seleccion;
		$this->dep('datos')->cargar($seleccion);
		$this->set_pantalla('pant_edicion');
	}

	function conf_evt__cuadro_libros__seleccion(toba_evento_usuario $evento, $fila)
	{
	}

	function evt__cuadro_libros__ordenar($columna, $sentido)
	{
	}

	//-----------------------------------------------------------------------------------
	//---- filtro -----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__filtro(proyecto_tuto_ei_filtro $filtro)
	{
		if (isset($this->filtro_data)) {
			$filtro->set_datos($this->filtro_data);
		}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->filtro_data = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->filtro_data);
	}

	//-----------------------------------------------------------------------------------
	//---- formulario -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__formulario__modificacion($datos)
	{
		$this->dep('datos')->set($datos);
	}

	function conf__formulario(proyecto_tuto_ei_formulario $form)
	{
		if ($this->dep('datos')->get_cantidad_filas() > 0)
		{
			$datos = $this->dep('datos')->get();
			$form->set_datos($datos);
		}
	}

}
?>
