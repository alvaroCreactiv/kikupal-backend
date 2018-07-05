<?php

require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";

$reporte = new ControladorReportes();
$reporte -> ctrDescargarReporte();
