<?php
class ci_interno extends proyecto_tuto_ci
{
	protected $prestamo_seleccionado;

	//-----------------------------------------------------------------------------------
	//---- Configuraciones --------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__detalle__entrada()
	{
	}

	//-----------------------------------------------------------------------------------
	//---- cuadro -----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro(proyecto_tuto_ei_cuadro $cuadro)
	{
	}

	function evt__cuadro__seleccion($seleccion)
	{
	}

	function conf_evt__cuadro__seleccion(toba_evento_usuario $evento, $fila)
	{
	}

	//-----------------------------------------------------------------------------------
	//---- fomr_maestro -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__fomr_maestro(proyecto_tuto_ei_formulario $form)
	{
		if($this->controlador()->get_tabla('prestamo')->get_cantidad_filas() > 0 && isset($this->prestamo_seleccionado))
		{
			$datos = $this->controlador()->get_tabla('prestamo')->get_fila($this->prestamo_seleccionado);
		}
	}

	function evt__fomr_maestro__modificacion($datos)
	{
		if(isset($this->prestamo_selecionado))
		{
			$id = $this->prestamo_seleccionado;
			$this->controlador()->get_tabla('prestamo')->modificar_fila($id, $datos);
			// Forma no datos_tabla
			// $condicion = array('id_prestamo' => $this->prestamo_seleccionado);
			// $cursor = $this->controlador()->get_tabla('prestamo')->get_id_fila_condicion($condicion);
			// $this->controlador()->get_tabla('prstamo')->modificar_fila($cursor[0], $datos);
			$this->controlador()->get_tabla('prestamo')->nueva_fila($datos);
		} else
		{
			$this->controlador()->get_tabla('prestamo')->nueva_fila($datos);
		}
	}

	//-----------------------------------------------------------------------------------
	//---- formulario -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__formulario(proyecto_tuto_ei_formulario $form)
	{
		$filas = $this->controlador()->get_tabla('usuarios')->get_cantidad_filas();
		if ($filas > 0)
		{
			$datos = $this->controlador()->get_tabla('usuarios')->get();
			$form->set_datos($datos);
		}
	}

	function evt__formulario__modificacion($datos)
	{
		$this->controlador()->get_tabla('usuarios')->set($datos);
	}

	//-----------------------------------------------------------------------------------
	//---- from_detalle -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__from_detalle(proyecto_tuto_ei_formulario_ml $form_ml)
	{
	}

	function evt__from_detalle__modificacion($datos)
	{
	}

}
?>
