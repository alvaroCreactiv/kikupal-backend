<?php 
require_once "../controladores/administradores.controlador.php";
require_once "..//modelos/administradores.modelo.php";
require_once "..//modelos/conexion.php";


class AjaxServicesProvider{

	/*=============================================
	VALIDAR EMAIL EXISTENTE
	=============================================*/	

	public $validarEmail;

	
	public function ajaxValidarEmail(){
		$datos = $this->validarEmail;
		$item ="email";
		$respuesta = ControladorAdministradores::ctrMostrarProviderVerificado($item,$datos);
		echo json_encode($respuesta);
	}
}

if(isset($_POST["validarEmail"])){
	$valEmail = new AjaxServicesProvider();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();
}

