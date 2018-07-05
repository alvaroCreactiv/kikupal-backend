<?php

class ControladorReportes{

	/*=============================================
	DESCARGAR REPORTE EN EXCEL
	=============================================*/

	public function ctrDescargarReporte(){

		if(isset($_GET["report"])){	

			$tabla = $_GET["report"];

			

			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$nombre = $_GET["report"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");

			/*=============================================
			REPORTE DE CONTRIBUCIONES
			=============================================*/

			if($_GET["report"] == "gifts"){	

				$reporte = ModeloReportes::mdlDescargarContributions($tabla);
				
				echo utf8_decode("

					<table border='0'> 

					<tr> 

					<td style='font-weight:bold; border:1px solid #eee;'>Contributor Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Email</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Phone</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Recipient Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Amount</td>							
					<td style='font-weight:bold; border:1px solid #eee;'>Date</td>
					</tr>");

				foreach ($reporte as $key => $value) {


					echo utf8_decode("

						<tr>
						<td style='border:1px solid #eee;'>".$value["cFname"]." ".$value["cLname"]."</td>
						<td style='border:1px solid #eee;'>".$value["cemail"]."</td>
						<td style='border:1px solid #eee;'>".$value["cphone"]."</td>
						<td style='border:1px solid #eee;'>".$value["bFname"]." ".$value["bLname"]."</td>
						<td style='border:1px solid #eee;'>".$value["kikupoints"]."</td>
						<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
						</tr> 		
						");
				}


				echo utf8_decode("</table>");

			}

			/*=============================================
			REPORTE DE recipients
			=============================================*/

			if($_GET["report"] == "recipient"){	

				$reporte = ModeloReportes::mdlDescargarRrecipients($tabla);

				echo utf8_decode("<table border='0'> 					

					<tr> 

					<td style='font-weight:bold; border:1px solid #eee;'>Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Last Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Email</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Phone Number</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Description</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Addres</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Date</td>
					</tr>

					");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>

						<td style='border:1px solid #eee;'>".$value["bFname"]."</td>
						<td style='border:1px solid #eee;'>".$value["bLname"]."</td>
						<td style='border:1px solid #eee;'>".$value["bemail"]."</td>
						<td style='border:1px solid #eee;'>".$value["bphone"]."</td>
						<td style='border:1px solid #eee;'>".$value["bdescription"]."</td>
						<td style='border:1px solid #eee;'>".$value["direccion"]."</td>
						<td style='border:1px solid #eee;'>".$value["Fecha"]."</td>
						</tr>"); 		

				}

				echo "</table>";

			}

			/*=============================================
			REPORTE DE schedule of services
			=============================================*/

			if($_GET["report"] == "scheduleservice"){	


				$reporte = ModeloReportes::mdlDescargarServices($tabla);

				echo utf8_decode("<table border='0'> 					

					<tr> 

					<td style='font-weight:bold; border:1px solid #eee;'>Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>service</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Scheduled Date</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Scheduled Time</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Amount</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Provider</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Date</td>
					</tr>

					");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>

						<td style='border:1px solid #eee;'>".$value["bFname"]." ".$value["bLname"]."</td>
						<td style='border:1px solid #eee;'>".$value["name"]."</td>
						<td style='border:1px solid #eee;'>".$value["fecha"]."</td>
						<td style='border:1px solid #eee;'>".$value["hora"]."</td>
						<td style='border:1px solid #eee;'>".$value["amount"]."</td>
						<td style='border:1px solid #eee;'>".$value["companyName"]."</td>
						<td style='border:1px solid #eee;'>".$value["creado"]."</td>
						</tr>"); 		

				}

				echo "</table>";

			}


			/*=============================================
			REPORTE DE Services Provider
			=============================================*/

			if($_GET["report"] == "provider"){	


				$reporte = ModeloReportes::mdlDescargarProvider($tabla);

				echo utf8_decode("<table border='0'> 					

					<tr> 

					<td style='font-weight:bold; border:1px solid #eee;'>Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Addres</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Web Site</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Contact Name</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Phone Number</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Email</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>Date</td>
					</tr>

					");

				foreach ($reporte as $key => $value) {

					echo utf8_decode("<tr>

						<td style='border:1px solid #eee;'>".$value["companyName"]."</td>
						<td style='border:1px solid #eee;'>".$value["companyAddress"]."</td>
						<td style='border:1px solid #eee;'>".$value["companyWebSite"]."</td>
						<td style='border:1px solid #eee;'>".$value["contacName"]."</td>
						<td style='border:1px solid #eee;'>".$value["phoneNumber"]."</td>
						<td style='border:1px solid #eee;'>".$value["email"]."</td>
						<td style='border:1px solid #eee;'>".$value["date"]."</td>
						</tr>"); 		

				}

				echo "</table>";

			}


		}

	}

}