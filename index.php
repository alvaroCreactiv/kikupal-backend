<?php
require_once "controladores/services.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";

require_once "modelos/plantilla.modelo.php";
require_once "modelos/administradores.modelo.php";
require_once "modelos/services.modelo.php";
require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();