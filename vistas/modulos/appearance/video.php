<?php
$servidor=Ruta::ctrRutaServidor();

$status=1;
$plantilla = ControladorPlantilla::ctrSeleccionarVideos($status);
?>

<div class="box box-primary">

	<!--=====================================
  	LOGOTIPO
  	======================================-->

  	<div class="box-header with-border">

  		<h3 class="box-title">VIDEO ACTUAL</h3>

  		<div class="box-tools pull-right">

  			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

  				<i class="fa fa-minus"></i>

  			</button>

  		</div>

  	</div>

  	<div class="box-body">

  		<div class="form-group">


  			<p class="">

  				<video width="100%" controls>
  					<source class="previsualizarVideo" src="<?php echo $servidor.$plantilla["path"]; ?>" type="video/mp4">  			

  						Your browser does not support HTML5 video.

  					</video>
  				</p>

  				<input type="file" id="subirVideo">

  				<p class="help-block">Recommended size
          320px</p>	

       </div>	


     </div>

     <div class="box-footer">

       <button type="button" id="guardarVideo" class="btn btn-primary pull-right">Save video</button>

     </div>

  	<!--=====================================
  	ICONO
  	======================================-->

  	<div class="box-header with-border">

  		<h3 class="box-title">VIDEOS</h3>

  	</div>

  	<div class="box-body">
  		<?php 
  		$status2=0;
  		$videos= ControladorPlantilla::ctrSeleccionarVideos($status2);
  		?>
  		<div class="table-responsive">
  			<table class="table table-hover">
  				<thead>
  					<tr>
  						<th>Name</th>
  						<th>video</th>
  						<th>Active</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php 
  					foreach ($videos as $key => $value) {
  						
  						echo'<tr>
  						<td>'.$value["name"].'</td>
  						<td>'.$value["path"].'</td>
  						<td>'.$value["status"].'</td>
  						</tr>';
  					}

  					
  					?>  
  				</tbody>
  			</table>
  		</div>	

  	</div>

  	<div class="box-footer">

  		<button type="button" id="guardarIcono" class="btn btn-primary pull-right">Update Video</button>

  	</div>


  </div>