<?php 
class ControladorServices{

	static public function ctrResgistroServices(){
		if(isset($_POST["serviceName"]))
		{
			$url=Ruta::ctrRuta();

			$datos=array("name"=>$_POST["serviceName"],
				"cost"=>$_POST["serviceCost"]				
			);
			$tabla="services";
			$respuesta=ModeloServices::mdlModeloServices($tabla,$datos);
			if($respuesta == "ok"){
				echo '<script> 

				swal({
					title: "DONE",
					text: "You have successfully added a service!",
					type:"success",
					confirmButtonText: "Close",
					closeOnConfirm: false
				},

				function(isConfirm){

					if(isConfirm){
						history.back();
					}
				});

				</script>';
			}
		}
	}

}