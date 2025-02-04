<?php
class ci_usuarios extends proyecto_tuto_ci
{
	protected $s__datos_filtro;

	function get_relacion()
	{
		return $this->dep('datos');
	}

	function get_tabla($id_tabla)
	{
		return $this->get_relacion()->tabla($id_tabla);
	}


	//---- Filtro -----------------------------------------------------------------------

	function conf__filtro(toba_ei_formulario $filtro)
	{
		if (isset($this->s__datos_filtro)) {
			$filtro->set_datos($this->s__datos_filtro);
		}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->s__datos_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->s__datos_filtro);
	}

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		if (isset($this->s__datos_filtro)) {
			$cuadro->set_datos($this->dep('datos')->tabla('usuarios')->get_listado($this->s__datos_filtro));
		} else {
			$cuadro->set_datos($this->dep('datos')->tabla('usuarios')->get_listado());
		}
	}

	function evt__cuadro__eliminar($datos)
	{
		$this->dep('datos')->resetear();
		$this->dep('datos')->cargar($datos);
		$this->dep('datos')->eliminar_todo();
		$this->dep('datos')->resetear();
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
		$this->set_pantalla('pant_edicion');
	}

	//---- Formulario -------------------------------------------------------------------

	// function conf__formulario(toba_ei_formulario $form)
	// {
	// 	if ($this->dep('datos')->esta_cargada()) {
	// 		$form->set_datos($this->dep('datos')->tabla('usuarios')->get());
	// 	} else {
	// 		$this->pantalla()->eliminar_evento('eliminar');
	// 	}
	// }
// 
// 	function evt__formulario__modificacion($datos)
// 	{
// 		$this->dep('datos')->tabla('usuarios')->set($datos);
// 	}
// 
	function resetear()
	{
		$this->dep('datos')->resetear();
		$this->set_pantalla('pant_seleccion');
	}

	//---- EVENTOS CI -------------------------------------------------------------------

	function evt__agregar()
	{
		$this->set_pantalla('pant_edicion');
	}

	function evt__volver()
	{
		$this->resetear();
	}

	function evt__eliminar()
	{
		$this->dep('datos')->eliminar_todo();
		$this->resetear();
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

}

?>
