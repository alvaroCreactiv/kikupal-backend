<?php

$plantilla = ControladorPlantilla::ctrSeleccionarPlantilla();


?>

<div class="box box-warning">
	
	<div class="box-header with-border">
		
		<h3 class="box-title">PALETA DE COLOR</h3>

		<div class="box-tools pull-right">

      		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

        		<i class="fa fa-minus"></i>

        	</button>

        </div>

	</div>

 	<div class="box-body">

	  	<div class="form-group">
	      
	      	<label>Text Color Top Bar:</label>

	      	<div class="input-group my-colorpicker">
	      		
			 	<input type="text" class="form-control my-colorpicker cambioColor" id="barraSuperior" value="<?php echo $plantilla["barraSuperior"];   ?>">

			  	<div class="input-group-addon">
		          <i></i>
	    		</div>
	      			
	      	</div>

	 	</div>

      	<div class="form-group">
      
	  		<label>Background Color Top Bar:</label>

	      	<div class="input-group my-colorpicker">
	        
	        	<input type="text" class="form-control my-colorpicker cambioColor" id="textoSuperior" value="<?php echo $plantilla["textoSuperior"];   ?>">

	        	<div class="input-group-addon">
	          	<i></i>
	        	</div>

	      	</div>

	    </div>

	    <div class="form-group">
	      
	      <label>Text Color Footer:</label>

	      <div class="input-group my-colorpicker">
	        
	        <input type="text" class="form-control my-colorpicker cambioColor" id="colorFondo" value="<?php echo $plantilla["colorFondo"];   ?>">

	        <div class="input-group-addon">
	          <i></i>
	        </div>

	      </div>

	    </div>

	    <div class="form-group">
	      
	      <label>Background Color footer:</label>

	      <div class="input-group my-colorpicker">
	        
	        <input type="text" class="form-control my-colorpicker cambioColor" id="colorTexto" value="<?php echo $plantilla["colorTexto"];   ?>">

	        <div class="input-group-addon">
	          <i></i>
	        </div>

	      </div>

	    </div>	

 	</div>

 	<div class="box-footer">
      
    	<button type="button" id="guardarColores" class="btn btn-primary pull-right">Update</button>
    
  	</div>

</div>