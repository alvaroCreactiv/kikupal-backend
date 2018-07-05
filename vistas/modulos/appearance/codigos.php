<?php

$plantilla = ControladorPlantilla::ctrSeleccionarPlantilla();

?>

<div class="box box-danger">
	
	<div class="box-header with-border">

		<h3 class="box-title">CODE</h3>

		<div class="box-tools pull-right">

      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

        <i class="fa fa-minus"></i>

      </button>

    </div>

  </div>

  <div class="box-body">

   <div class="form-group">

    <label for="comment">Facebook API:</label>

    <textarea class="form-control cambioScript" rows="4" id="apiFacebook">
      <?php echo $plantilla["apiFacebook"]; ?>
    </textarea>
    
  </div>	 	

</div>

<div class="box-footer">

 <button type="button" id="guardarScript" class="btn btn-primary pull-right">Update</button>

</div>

</div>