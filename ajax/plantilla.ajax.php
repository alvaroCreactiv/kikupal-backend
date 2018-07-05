
<?php

require_once "../controladores/plantilla.controlador.php";
require_once "../modelos/plantilla.modelo.php";
require '../extensiones/vendor/autoload.php';

class AjaxPlantilla{

	/*=============================================
	CAMBIAR LOGOTIPO
	=============================================*/	

	public $imagenLogo;
	
	public function ajaxCambiarLogotipo(){

		$item = "logo";
		$valor = $this->imagenLogo;

		$respuesta = ControladorPlantilla::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;


	}

	/*=============================================
	CAMBIAR ICONO
	=============================================*/

	public $imagenIcono;	

	public function ajaxCambiarIcono(){

		$item = "icono";
		$valor = $this->imagenIcono;

		$respuesta = ControladorPlantilla::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;

	}


	/*=============================================
	CAMBIAR COLORES
	=============================================*/

	public $barraSuperior;
	public $textoSuperior;
	public $colorFondo;
	public $colorTexto;	

	public function ajaxCambiarColor(){

		$datos = array("barraSuperior"=>$this->barraSuperior,
			"textoSuperior"=>$this->textoSuperior,
			"colorFondo"=>$this->colorFondo,
			"colorTexto"=>$this->colorTexto);

		$respuesta = ControladorPlantilla::ctrActualizarColores($datos);

		echo $respuesta;

	}




	/*=============================================
	CAMBIAR REDES SOCIALES
	=============================================*/

	public $redesSociales;

	public function ajaxCambiarRedes(){

		$item = "redesSociales";
		$valor = $this->redesSociales;

		$respuesta = ControladorPlantilla::ctrActualizarLogoIcono($item, $valor);

		echo $respuesta;

	}


	/*=============================================
	CAMBIAR VIDEO
	=============================================*/	

	public $video;
	
	public function ajaxCambiarVideo(){

		$item = "video";
		$valor = $this->video;		
		$respuesta = ControladorPlantilla::ctrActualizarVideo($item, $valor);

		echo $respuesta;


	}
	
}

/*=============================================
CAMBIAR LOGOTIPO
=============================================*/	
if(isset($_FILES["imagenLogo"])){

	$logotipo = new AjaxPlantilla();
	$logotipo -> imagenLogo = $_FILES["imagenLogo"];
	$logotipo -> ajaxCambiarLogotipo();

}


/*=============================================
CAMBIAR VIDEO
=============================================*/	
if(isset($_POST["video"])){	
	$video = new AjaxPlantilla();
	$video -> video = $_FILES["video"];
	$video -> ajaxCambiarVideo();

}

/*=============================================
CAMBIAR ICONO
=============================================*/	
if(isset($_FILES["imagenIcono"])){

	$icono = new AjaxPlantilla();
	$icono -> imagenIcono = $_FILES["imagenIcono"];
	$icono -> ajaxCambiarIcono();

}

/*=============================================
CAMBIAR COLORES
=============================================*/	

if(isset($_POST["barraSuperior"])){

	$colores = new AjaxPlantilla();
	$colores -> barraSuperior = $_POST["barraSuperior"];
	$colores -> textoSuperior = $_POST["textoSuperior"];
	$colores -> colorFondo = $_POST["colorFondo"];
	$colores -> colorTexto = $_POST["colorTexto"];
	$colores -> ajaxCambiarColor();

}

/*=============================================
CAMBIAR REDES SOCIALES
=============================================*/	

if(isset($_POST["redesSociales"])){

	$redesSociales = new AjaxPlantilla();
	$redesSociales -> redesSociales = $_POST["redesSociales"];
	$redesSociales -> ajaxCambiarRedes();

}
