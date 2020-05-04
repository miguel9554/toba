<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class proyecto_tuto_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'proyecto_tuto_ci' => 'extension_toba/componentes/proyecto_tuto_ci.php',
		'proyecto_tuto_cn' => 'extension_toba/componentes/proyecto_tuto_cn.php',
		'proyecto_tuto_datos_relacion' => 'extension_toba/componentes/proyecto_tuto_datos_relacion.php',
		'proyecto_tuto_datos_tabla' => 'extension_toba/componentes/proyecto_tuto_datos_tabla.php',
		'proyecto_tuto_ei_arbol' => 'extension_toba/componentes/proyecto_tuto_ei_arbol.php',
		'proyecto_tuto_ei_archivos' => 'extension_toba/componentes/proyecto_tuto_ei_archivos.php',
		'proyecto_tuto_ei_calendario' => 'extension_toba/componentes/proyecto_tuto_ei_calendario.php',
		'proyecto_tuto_ei_codigo' => 'extension_toba/componentes/proyecto_tuto_ei_codigo.php',
		'proyecto_tuto_ei_cuadro' => 'extension_toba/componentes/proyecto_tuto_ei_cuadro.php',
		'proyecto_tuto_ei_esquema' => 'extension_toba/componentes/proyecto_tuto_ei_esquema.php',
		'proyecto_tuto_ei_filtro' => 'extension_toba/componentes/proyecto_tuto_ei_filtro.php',
		'proyecto_tuto_ei_firma' => 'extension_toba/componentes/proyecto_tuto_ei_firma.php',
		'proyecto_tuto_ei_formulario' => 'extension_toba/componentes/proyecto_tuto_ei_formulario.php',
		'proyecto_tuto_ei_formulario_ml' => 'extension_toba/componentes/proyecto_tuto_ei_formulario_ml.php',
		'proyecto_tuto_ei_grafico' => 'extension_toba/componentes/proyecto_tuto_ei_grafico.php',
		'proyecto_tuto_ei_mapa' => 'extension_toba/componentes/proyecto_tuto_ei_mapa.php',
		'proyecto_tuto_servicio_web' => 'extension_toba/componentes/proyecto_tuto_servicio_web.php',
		'proyecto_tuto_comando' => 'extension_toba/proyecto_tuto_comando.php',
		'proyecto_tuto_modelo' => 'extension_toba/proyecto_tuto_modelo.php',
	);
}
?>