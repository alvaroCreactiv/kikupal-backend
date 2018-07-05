<?php  session_start();
$urlServer=Ruta::ctrRutaServidor(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kikupal |  Control Panel</title>
  

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
  
  <link rel="stylesheet" href="vistas/bower_components/datatables/datatables.css">

  <link rel="stylesheet" href="vistas/bower_components/sweetalert/sweetalert.css">

  <link rel="stylesheet" href="vistas/bower_components/bootstrap-select/css/bootstrap-select.css">

  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" />

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->


  <link rel="stylesheet" href="vistas/css/provider.css">
  <link rel="stylesheet" href="vistas/css/plantilla.css">

  <!--==================================-->





  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>
  <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

  <script src="vistas/bower_components/datatables/jquery.dataTables.min.js"></script>

  <script src="vistas/bower_components/sweetalert/sweetalert.min.js"></script>

  <script src="vistas/bower_components/bootstrap-select/js/bootstrap-select.min.js"></script>
  
  <script src="vistas/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

  <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

  <script src="vistas/bower_components/checkbox/bootstrap-checkbox.js"></script>
  

  <!-- ============================================================================= -->

</head>

<body class="hold-transition skin-blue layout-boxed login-page">

  <?php



  if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok")
  {

    echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    ============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    LATERAL
    =============================================*/

    include "modulos/lateral.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"]))
    {

      if($_GET["ruta"]== "inicio" ||
        $_GET["ruta"]== "contributions" || 
        $_GET["ruta"]== "recipients" || 
        $_GET["ruta"]== "services" ||
        $_GET["ruta"]== "newService" ||
        $_GET["ruta"]== "provider" ||   
        $_GET["ruta"]== "newServiceProvider" ||
        $_GET["ruta"]== "Appearance" || 
        $_GET["ruta"]== "profile" ||
        $_GET["ruta"]== "profileProvider" ||
        $_GET["ruta"]== "verificar" ||
        $_GET["ruta"]== "MyServices" ||
         $_GET["ruta"]== "summary" ||
        $_GET["ruta"]== "salir")
      {

        include "modulos/".$_GET["ruta"].".php";
      }
    }

  /*=============================================
  FOOTER
  =============================================*/

  include "modulos/footer.php";


  echo '</div>';

}elseif(isset($_GET["ruta"])){
 if($_GET["ruta"]=="verificar") {
   include "modulos/".$_GET["ruta"].".php";
 }
}else{

  include "modulos/login.php";

}
?>  

<!--======================================
=            Js PERSONALIZADO            =
=======================================-->


<script src="<?php echo $urlServer; ?>vistas/js/servicesProvider.js"></script>
<script src="<?php echo $urlServer; ?>vistas/js/gestorPlantilla.js"></script>

<!--====  End of Js PERSONALIZADO  ====-->

</body>
</html>