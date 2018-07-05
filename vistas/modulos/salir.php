<?php
$urlServer=Ruta::ctrRutaServidor();

session_destroy();

echo '<script>
	
	window.location= "'.$urlServer.'";

</script>';