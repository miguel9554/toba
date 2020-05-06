<?php
class ci_reporte extends proyecto_tuto_ci
{
        protected $s__filtro;
        
	//-----------------------------------------------------------------------------------
	//---- cuadro -----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro(proyecto_tuto_ei_cuadro $cuadro)
	{
          if(isset($this->s__filtro)){
            $datos = toba::consulta_php('consulta')->get_listado_prestamos($this->s__filtro);
            $cuadro->set_datos($datos);
          }
	}

	//-----------------------------------------------------------------------------------
	//---- filtro -----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__filtro(proyecto_tuto_ei_filtro $filtro)
	{
          if(isset($this->s__filtro)){
            $filtro->set_datos($this->s__filtro);
          }
	}

	function evt__filtro__filtrar($datos)
	{
          $this->s_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
          unset($this->s__filtro);
	}

}

?>
