<?php

$plantilla = ControladorPlantilla::ctrSeleccionarComercio();

?>

<div class="box box-info">
	
	<div class="box-header with-border">
		
		 <h3 class="box-title">Paypal Fees</h3>

		 <div class="box-tools pull-right">

      		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

        		<i class="fa fa-minus"></i>

        	</button>

        </div>

	</div>

	<div class="box-body formularioInformacion">

		<!-- IMPUESTO -->

		<div class="form-group">
	      
	      <label for="usr">Paypal's feed:</label>
	      
	      <div class="input-group">
	        
	        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
	        <input type="text" min="1" class="form-control cambioInformacion" id="impuesto" value="<?php echo $plantilla["impuesto"]; ?>">

	      </div>
	    
	    </div>
	   

	    <!-- PASARELA DE PAGO PAYPAL -->

	    <div class="panel panel-default">
	    	
			<div class="panel-heading">

      			<h4 class="text-uppercase">Paypal Configuration</h4>

      		</div>
			
			<div class="panel-body">
				
				<div class="form-group row">
					
					 <div class="col-xs-3">
					 	
						<label>Modo:</label>

						 <?php

      					if($plantilla["ModePaypal"] == "sandbox"){

      						echo '	<label class="checkbox">

      									<input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal" checked>  

      									Sandbox

      								</label>
              					
          							<label class="checkbox">

          								<input class="cambioInformacion" type="radio" value="live" name="modoPaypal"> 

          								Live

          							</label>';
      					}else{

      						echo '	<label class="checkbox">

      									<input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal">  

      									Sandbox

      								</label>
              					
          							<label class="checkbox">

          								<input class="cambioInformacion" type="radio" value="live" name="modoPaypal" checked> 

          								Live

          							</label>';


      					}

      					?>

					 </div>

					 <div class="col-xs-4">
            
            			<label for="comment">Cliente:</label>
      
            			<input type="text" class="form-control cambioInformacion" id="clienteIdPaypal" value="<?php echo $plantilla["clientIdPaypal"]; ?>">

          			</div>

      			 	<div class="col-xs-5">

		            	<label for="comment">Llave Secreta:</label>
		      
		            	<input type="text" class="form-control cambioInformacion" id="llaveSecretaPaypal" value="<?php echo $plantilla["SecretPaypal"]; ?>">

		          </div>

				</div>

			</div>

	    </div>

		
	</div>

  	<div class="box-footer">
      
    	<button type="button" id="guardarInformacion" class="btn btn-primary pull-right">Guardar</button>
    
 	</div>

</div>