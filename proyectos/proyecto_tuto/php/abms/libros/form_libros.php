<?php
class form_libros extends proyecto_tuto_ei_formulario
{
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function extender_objeto_js()
	{
		echo "
		//---- Validacion general ----------------------------------
		
		{$this->objeto_js}.evt__validar_datos = function()
		{
			if(this.ef('id_genero').get_estado() == '3' && this.ef('isbn').get_estado() > '100')
			{
				notificacion.agregar('sos bastante pelotudo pa', error);
				notificacion.mostrar();
				sleep(3);
				return false;
			}
			return true;
		}
		{$this->objeto_js}.evt__id_genero__procesar = function(es_inicial)
		{
			if(this.ef('id_genero').get_estado() == '3')
			{
				this.ef('isbn').mostrar(false);
			}
		}
		";
	}

}

?>
