<?php

require_once "conexion.php";

class ModeloAdministradores{

	static public function mdlActualizarProvider($tabla,$id,$item,$valor){
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $item=:$item WHERE id =:id");
		$stmt->bindParam(":".$item,$valor, PDO::PARAM_INT);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);

		if ($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}	
		$stmt->close();
		$stmt=null;
	}

	static public function mdlRegistroAdministrators($tabla2,$datos2){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla2 (name, email, photo, profile,verificado,emailEncriptado) VALUES ( :name, :email, :photo,  :profile,:verificado,:emailEncriptado)");
		$stmt->bindParam(":name", $datos2["sername"], PDO::PARAM_STR);	
		$stmt->bindParam(":email", $datos2["seremail"], PDO::PARAM_STR);
		$stmt->bindParam(":profile", $datos2["provider"], PDO::PARAM_STR);
		$stmt->bindParam(":photo",  $datos2["photo"], PDO::PARAM_STR);		
		$stmt->bindParam(":verificado", $datos2["verificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":emailEncriptado",  $datos2["emailEncriptado"], PDO::PARAM_STR);	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}


	static public function mdlRegistroProvider($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (type, companyName, companyAddress, companyWebSite, contacName, phoneNumber,  email,  verificacion, emailEncriptado) VALUES (:type, :companyName, :companyAddress, :companyWebSite, :contacName, :phoneNumber, :email,  :verificacion, :emailEncriptado)");

		$stmt->bindParam(":type", $datos["type"], PDO::PARAM_STR);
		$stmt->bindParam(":companyName", $datos["sername"], PDO::PARAM_STR);
		$stmt->bindParam(":companyAddress", $datos["seraddress"], PDO::PARAM_STR);
		$stmt->bindParam(":companyWebSite", $datos["serwebsite"], PDO::PARAM_STR);
		$stmt->bindParam(":contacName", $datos["sercontact"], PDO::PARAM_STR);
		$stmt->bindParam(":phoneNumber", $datos["serphone"], PDO::PARAM_INT);	
		$stmt->bindParam(":email", $datos["seremail"], PDO::PARAM_STR);
		$stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
		$stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;
	}



	static public function mdlMostrarServices($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();		
		$stmt -> close();
		$stmt = null;
	}
	
	static public function mdlMostrarProviderVerificado($tabla,$item,$datos){
		$stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
		$stmt->bindParam(":".$item,$datos, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
		$stmt=null;
	}

	static public function mdlMostrarTypeService($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();		
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlMostrarProvider($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();		
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarRecipients($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();		
		$stmt -> close();
		$stmt = null;
	}
	static public function mdlMostrarSumaContributions($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT SUM(kikupoints) AS TotalKikupoints FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();		
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlMostrarContributions($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT contributor.cFname, contributor.cLname, contributor.cemail, contributor.cphone, recipient.bFname, recipient.bLname, gifts.kikupoints FROM (($tabla LEFT OUTER JOIN contributor on gifts.id_contributor=contributor.id_contributor) LEFT OUTER JOIN recipient ON gifts.id_recipient=recipient.id_recipient)");
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;
	}


	static public function mdlMostrarScheduled($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT scheduleservice.id, recipient.bFname, recipient.bLname, services.name, scheduleservice.fecha, scheduleservice.hora, scheduleservice.amount, provider.companyName FROM (($tabla LEFT OUTER JOIN services on scheduleservice.id_service=services.id_service) LEFT OUTER JOIN provider ON scheduleservice.id_provider=provider.id_provider)LEFT OUTER JOIN recipient ON scheduleservice.id_recipient=recipient.id_recipient ");
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt = null;
	}
	/*=============================================
	MOSTRAR ADMINISTRADORES
	=============================================*/

	static public function mdlMostrarAdministradores($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

}