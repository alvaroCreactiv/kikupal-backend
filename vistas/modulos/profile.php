<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile Manager
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile Manager</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div id="perfil">

    <div class="row">

      <form method="post" enctype="multipart/form-data">

        <div class="col-md-3 col-sm-4 col-xs-12 text-center">

          <br>

          <figure id="imgPerfil">

            <?php

            echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idAdmin" name="idAdmin">
            <input type="hidden" value="'.$_SESSION["photo"].'" name="fotoRecipient" id="fotoRecipient">

            <input type="hidden" value="'.$_SESSION["name"].'" name="nameRecipient" id="nameRecipient">
            
            <input type="hidden" value="'.$_SESSION["password"].'" name="passAdmin" id="passAdmin">

            <input type="hidden" value="'. $_SESSION["email"].'" name="mailRecipient" id="mailRecipient">';                                            
            

            if($_SESSION["photo"] != ""){

              echo '<img src="'.$url.$_SESSION["photo"].'" class="img-thumbnail">';

            }else{

              echo '<img src="'.$url.'vistas/img/favicons/android-chrome-256x256.png" class="img-thumbnail">';

            }

            ?>

          </figure>

          <br>

          <button type="button" class="btn btn-default form-control" id="btnCambiarFoto">

            Change Photo

          </button>

          <div id="subirImagen">

            <input type="file" class="form-control" id="datosImagen" name="datosImagen">

            <img class="previsualizar"/>

          </div>

        </div>  

        <div class="col-md-9 col-sm-8 col-xs-12">

          <br>

          <?php    
            echo '
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarNombre">Edit name:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["name"].'" >
            </div>
            </div>

            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarLastname">Edit Last Name:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" id="editarLastname" name="editarLastname" value="'.$_SESSION["lname"].'" >

            </div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarEmail">Email cannot be changed:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'" readonly>

            </div>
            </div>                    
            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarPhone">Edit Telephone Number:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" class="form-control" id="editarPhone" name="editarPhone" value="'.$_SESSION["bphone"].'" >

            </div>
            </div> 
            </div> 
            <br>
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarDireccion">Edit Address:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
            <input type="text" class="form-control" id="editarDireccion" name="editarDireccion" placeholder="Enter the new address" value="'.$_SESSION["direccion"].'">

            </div>
            </div>                  
            <div class="col-sm-6">
            <label class="control-label text-muted text-uppercase" for="editarPassword">Change Password:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Enter the new password">

            </div>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-12">
            <label class="control-label text-muted text-uppercase" for="editarDescription">Edit Description:</label>

            <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
            <textarea class="form-control" name="editarDescription" id="editarDescription" cols="20" rows="10">'.$_SESSION["bdescription"].'
            </textarea>                        
            </div>
            </div>                  
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-md pull-left">Update data</button>';

         

          ?>

        </div>                 

      </form>


    </div>

  </div>

</section>
<!-- /.content -->
</div>
  <!-- /.content-wrapper -->