<?php
class ci_interno extends proyecto_tuto_ci
{
	protected $s__prestamo_seleccionado;
        protected $hay_maestro = true;

	//-----------------------------------------------------------------------------------
	//---- Configuraciones --------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__detalle__entrada()
	{
          if(!isset($this->s__prestamo_seleccionado))
          {
            $this->controlador()->get_tabla('prestamo')->resetear_cursor();
            $this->controlador()->get_tabla('detalle')->resetear_cursor();
          }
	}

	//-----------------------------------------------------------------------------------
	//---- cuadro -----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro(proyecto_tuto_ei_cuadro $cuadro)
	{
          $datos = $this->controlador()->get_tabla('prestamo')->get_filas();
          $cuadro->set_datos($datos);
          unset($this->s__prestamo_seleccionado);
	}

	function evt__cuadro__seleccion($seleccion)
	{
          $this->s__prestamo_seleccionado = $seleccion;
          $this->controlador()->get_tabla('prestamo')->set_cursor($seleccion);
          $this->set_pantalla('detalle');
	}

        function evt__cuadro__borrar($seleccion)
        {
          $this->controlador->get_tabla('prestamo')->eliminar_fila($seleccion);
          $this->controlador->get_tabla('prestamo')->resetear_cursor();
        }

	function conf_evt__cuadro__seleccion(toba_evento_usuario $evento, $fila)
	{
	}

	//-----------------------------------------------------------------------------------
	//---- fomr_maestro -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__fomr_maestro(proyecto_tuto_ei_formulario $form)
	{
		if($this->controlador()->get_tabla('prestamo')->get_cantidad_filas() > 0 && isset($this->s__prestamo_seleccionado))
		{
			$datos = $this->controlador()->get_tabla('prestamo')->get_fila($this->s__prestamo_seleccionado);
                        $form->set_datos($datos);
		}
	}

	function evt__fomr_maestro__modificacion($datos)
	{
          if (!$this->validar_prestamo($datos)){
            $this->hay_maestro = false;
            return;
          }
		if(isset($this->prestamo_selecionado))
		{
			$id = $this->s__prestamo_seleccionado;
			$this->controlador()->get_tabla('prestamo')->modificar_fila($id, $datos);
			// Forma no datos_tabla
			// $condicion = array('id_prestamo' => $this->s__prestamo_seleccionado);
			// $cursor = $this->controlador()->get_tabla('prestamo')->get_id_fila_condicion($condicion);
			// $this->controlador()->get_tabla('prstamo')->modificar_fila($cursor[0], $datos);
		} else
		{
			$id = $this->controlador()->get_tabla('prestamo')->nueva_fila($datos);
		}
                $this->controlador()->get_tabla('prestamo')->set_cursor($id);
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
          if (isset($this->s__prestamo_seleccionado))
          {
            $datos = $this->controlador()->get_tabla('detalle')->get_filas();
            print_r($datos);
          }
	}

	function evt__from_detalle__modificacion($datos)
	{
          if ($this->hay_maestro)
          {
            $this->controlador->get_tabla('detalle')->procesar_filas($datos);
          }
	}

        function validar_prestamo($datos)
        {
          if (empty($datos))
          {
            return false;
          }
          foreach($datos as $columna => $valor)
          {
            if (isset($valor) && trim($valor) != '')
            {
              return true;
            }
          }
          return false;
        }
}
?>
