<?php 

/**
* 
*/
class ModeloServices
{
	
	static public function mdlModeloServices($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (name, cost) VALUES ( :name, :cost)");
		$stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);		
		$stmt->bindParam(":cost", $datos["cost"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
		$stmt = null;


	}
}