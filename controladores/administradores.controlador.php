<?php

class ControladorAdministradores{

	public function ctrRemoveService(){
		if(isset($_POST["removeService"])){
			
		}

	}

	public function ctrActualizarProvider(){		
		if(isset($_POST["sendPrivider"])){
			$id=$_POST["providers"];	
			$item = "id_provider";		
			$valor=$_POST["idProviders"];
			$tabla="scheduleservice";
			$respuesta = ModeloAdministradores::mdlActualizarProvider($tabla,$id,$item,$valor);	
			var_dump($respuesta);
			if ($respuesta=="ok") {
				echo'
				<script>
				swal({
					title:"DONE!",
					text:"Service Provider Assign",
					tipo:"success",
					conformButtonText:"close",
					closOnConfirm: false
					},
					function(isConfirm){
						if (isConfirm) {	   
							history.back();
						} 
						});							
						</script>';
					}
				}
			}

			public function ctrRegistroProvider(){

				if(isset($_POST["send"])){

					if (preg_match('/^[a-zA-Z ]+$/', $_POST["sername"]) && preg_match('/^[a-zA-Z ]+$/', $_POST["sercontact"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["seremail"]) && preg_match('/^[0-9+() ]*$/', $_POST["serphone"])) {


						$encriptarEmail=md5($_POST["seremail"]);				
						$photo =null;

						$datos =array("type"=>$_POST["type"],
							"sername"=>$_POST["sername"],
							"seraddress"=>$_POST["seraddress"],
							"serwebsite"=>$_POST["serwebsite"],
							"sercontact"=>$_POST["sercontact"],
							"serphone"	=> $_POST["serphone"],
							"seremail"=> $_POST["seremail"],	
							"verificacion"=> 1,
							"emailEncriptado" => $encriptarEmail);
						$tabla="provider";

						$tabla2="administrators";
						$datos2 =array("sername"=>$_POST["sername"],					
							"seremail"=> $_POST["seremail"],
							"serphoto"=>$photo,	
							"provider"=> "provider",			
							"verificacion"=> 1,
							"emailEncriptado" => $encriptarEmail);

						$respuesta = ModeloAdministradores::mdlRegistroProvider($tabla,$datos);	
						$respuesta2 = ModeloAdministradores::mdlRegistroAdministrators($tabla2,$datos2);	

						if ($respuesta=="ok" and $respuesta2=="ok") {
							
							echo'
							<script>
							swal({
								title:"Account created",
								text:"Check your email ('.$_POST["seremail"].') to confirm your account",
								tipo:"success",
								conformButtonText:"close",
								closOnConfirm: false
								},
								function(isConfirm){
									if(isConfirm){							
										window.location="'.$url.'inicio";	
									}
									}); 										
									</script>';

								}
							}
						}
					}	

					static public function ctrMostrarServices(){
						$tabla="services";
						$respuesta=ModeloAdministradores::mdlMostrarServices($tabla);
						return $respuesta;
					}

					static public function ctrMostrarProviderVerificado($item,$datos){
						$tabla="provider";
						$respuesta=ModeloAdministradores::mdlMostrarProviderVerificado($tabla,$item,$datos);
						return $respuesta;
					}

					static public function ctrMostrarTypeService(){
						$tabla="services";
						$respuesta=ModeloAdministradores::mdlMostrarTypeService($tabla);
						return $respuesta;
					}

					static public function ctrMostrarProvider(){
						$tabla="provider";
						$respuesta=ModeloAdministradores::mdlMostrarProvider($tabla);
						return $respuesta;
					}

					static public function ctrMostrarRecipients(){
						$tabla="recipient";
						$respuesta=ModeloAdministradores::mdlMostrarRecipients($tabla);
						return $respuesta;
					}
					static public function ctrMostrarSumaContributions(){
						$tabla="gifts";
						$respuesta=ModeloAdministradores::mdlMostrarSumaContributions($tabla);
						return $respuesta;
					}

					static public function ctrMostrarContributions(){
						$tabla="gifts";
						$respuesta=ModeloAdministradores::mdlMostrarContributions($tabla);
						return $respuesta;
					}

					static public function ctrMostrarScheduled(){
						$tabla="scheduleservice";
						$respuesta=ModeloAdministradores::mdlMostrarScheduled($tabla);
						return $respuesta;
					}
	/*=============================================
	INGRESO DE ADMINISTRADOR
	=============================================*/

	public function ctrIngresoAdministrador(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"]))
			{
				$tabla = "administrators";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$encriptar=md5($_POST["ingPassword"]);

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);
				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){
					if($respuesta["verificado"]==0){

						$_SESSION["validarSesionBackend"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["name"] = $respuesta["name"];
						$_SESSION["photo"] = $respuesta["photo"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["profile"] = $respuesta["profile"];

						echo '<script>

						window.location = "inicio";

						</script>';
					}
					echo '<br>
					<div class="alert alert-danger">You have not verified your email account</div>';
				}else{

					echo '<br>
					<div class="alert alert-danger">Failed to enter retry</div>';
				}

			}

		}

	}
	static public function ctrMostrarAdministrador(){
		$tabla = "administrators";
		$item = "id";
		$valor = $_SESSION["id"];
		$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);
	}
	/*=============================================
	AGREGAR ADMINISTRADOR
	=============================================*/

	public function ctragregarAdministrador(){

		
	}

}
