<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Appearance
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Appearance</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">

      <div class="col-md-6 col-xs-12">

      <!--=====================================
      BLOQUE 1
      ======================================-->
      
      <?php

        /*=============================================
        ADMINISTRACIÓN DE LOGOTIPO E ICONO
        =============================================*/

        include "appearance/logotipo.php";

        /*=====================================
        ADMINISTRAR COLORES
        ======================================*/

        include "appearance/colores.php";
        
        /*=====================================
        ADMINISTRAR VIDEO
        ======================================*/

        include "appearance/video.php";

        
        ?>

      </div>


      <div class="col-md-6">

      <!--=====================================
      BLOQUE 2
      ======================================-->

      <?php

       /*=====================================
        ADMINISTRAR CÓDIGOS
        ======================================*/

        include "appearance/codigos.php";

        /*=====================================
        ADMINISTRAR COMERCIO
        ======================================*/

        include "appearance/informacion.php";

        /*=====================================
        ADMINISTRAR REDES SOCIALES
        ======================================*/

        include "appearance/redSocial.php";
        
        ?>

      </div>

    </div>

  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->