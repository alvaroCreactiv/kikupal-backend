<?php

require_once "conexion.php";

class ModeloReportes{

	/*=============================================
	DESCARGAR REPORTE
	=============================================*/



	static public function mdlDescargarProvider($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	}

	static public function mdlDescargarContributions($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT contributor.cFname, contributor.cLname, contributor.cemail, contributor.cphone, recipient.bFname, recipient.bLname, gifts.kikupoints, gifts.fecha FROM (($tabla LEFT OUTER JOIN contributor on gifts.id_contributor=contributor.id_contributor) LEFT OUTER JOIN recipient ON gifts.id_recipient=recipient.id_recipient)");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;

	}
	static public function mdlDescargarRecipients($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;

	}

	static public function mdlDescargarServices($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT scheduleservice.id, recipient.bFname, recipient.bLname, services.name, scheduleservice.fecha, scheduleservice.hora, scheduleservice.amount, provider.companyName, scheduleservice.creado FROM (($tabla LEFT OUTER JOIN services on scheduleservice.id_service=services.id_service) LEFT OUTER JOIN provider ON scheduleservice.id_provider=provider.id_provider)LEFT OUTER JOIN recipient ON scheduleservice.id_recipient=recipient.id_recipient ");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;



	}
}