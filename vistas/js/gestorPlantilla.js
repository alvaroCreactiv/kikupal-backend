/*=============================================
SUBIR LOGOTIPO
=============================================*/

$("#subirLogo").change(function(){

	var imagenLogo = this.files[0];

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png"){

  		$("#subirLogo").val("");

  		swal({
  			title: "Error Uploading image",
  			text: "The image must be in JPG or PNG format!",
  			type: "error",
  			confirmButtonText: "Close!"
  		});

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  }else if(imagenLogo["size"] > 2000000){

  	$("#subirLogo").val("");

  	swal({
  		title: "Error Uploading image",
  		text: "The image should not weigh more than 2MB!",
  		type: "error",
  		confirmButtonText: "Close!"
  	});

  	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  }else{

  	var datosImagen = new FileReader;
  	datosImagen.readAsDataURL(imagenLogo);

  	$(datosImagen).on("load", function(event){

  		var rutaImagen = event.target.result;

  		$(".previsualizarLogo").attr("src", rutaImagen);

  	})

  }


  	/*=============================================
  	GUARDAR EL LOGOTIPO
  	=============================================*/

  	$("#guardarLogo").click(function(){
  		

  		var datos = new FormData();
  		datos.append("imagenLogo", imagenLogo);  	
  		$.ajax({
  			url:"ajax/plantilla.ajax.php",
  			method: "POST",
  			data: datos,
  			cache: false,
  			contentType: false,
  			processData: false,
  			success: function(respuesta){
  				if(respuesta == "ok"){  					

  					swal({
  						title: "Saved changes",
  						text: "The page has been updated correctly!",
  						type: "success",
  						confirmButtonText: "Close!"
  					});

  				}

  			}

  		})

  	})
  })


/*=============================================
SUBIR ICONO
=============================================*/

$("#subirIcono").change(function(){

	var imagenIcono = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png"){

  		$("#subirIcono").val("");

  		swal({
  			title: "Error Uploading image",
  			text: "The image must be in JPG or PNG format!",
  			type: "error",
  			confirmButtonText: "Close!"
  		});

  	/*=============================================
  	VALIDAMOS EL TAMAÑO DE LA IMAGEN
  	=============================================*/

  }else if(imagenIcono["size"] > 2000000){

  	$("#subirIcono").val("");

  	swal({
  		title: "Error Uploading image",
  		text: "The image should not weigh more than 2MB!",
  		type: "error",
  		confirmButtonText: "Close!"
  	});

	/*=============================================
  	PREVISUALIZAMOS LA IMAGEN
  	=============================================*/

  }else{

  	var datosImagen = new FileReader;
  	datosImagen.readAsDataURL(imagenIcono);

  	$(datosImagen).on("load", function(event){

  		var rutaImagen = event.target.result;

  		$(".previsualizarIcono").attr("src", rutaImagen);

  	})

  }

  	/*=============================================
  	GUARDAR EL ICONO
  	=============================================*/

  	$("#guardarIcono").click(function(){

  		var datos = new FormData();
  		datos.append("imagenIcono", imagenIcono);

  		$.ajax({

  			url:"ajax/plantilla.ajax.php",
  			method: "POST",
  			data: datos,
  			cache: false,
  			contentType: false,
  			processData: false,
  			success: function(respuesta){

  				if(respuesta == "ok"){

  					swal({
  						title: "Saved changes",
  						text: "The page has been updated correctly!",
  						type: "success",
  						confirmButtonText: "Close!"
  					});

  				}

  			}

  		});

  	})

  })

/*=============================================
CAMBIAR COLOR
=============================================*/

$(".cambioColor").change(function(){

  var barraSuperior = $("#barraSuperior").val();

  var textoSuperior = $("#textoSuperior").val();

  var colorFondo = $("#colorFondo").val();

  var colorTexto = $("#colorTexto").val();

  $("#guardarColores").click(function(){

    var datos = new FormData();
    datos.append("barraSuperior", barraSuperior);
    datos.append("textoSuperior", textoSuperior);
    datos.append("colorFondo", colorFondo);
    datos.append("colorTexto", colorTexto);


    $.ajax({

      url:"ajax/plantilla.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

        if(respuesta == "ok"){

          swal({
            title: "Cambios guardados",
            text: "¡La plantilla ha sido actualizada correctamente!",
            type: "success",
            confirmButtonText: "¡Cerrar!"
          });

        }


      }

    })

  })

})



/*=============================================
SUBIR VIDEO
=============================================*/
$("#subirVideo").change(function(){

  var video = this.files[0];

  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(video["type"] != "image/jpeg" && video["type"] != "image/png"){

      $("#subirVideo").val("");

      swal({
        title: "Error Uploading image",
        text: "The image must be in JPG or PNG format!",
        type: "error",
        confirmButtonText: "Close!"
      });

    /*=============================================
    VALIDAMOS EL TAMAÑO DE LA IMAGEN
    =============================================*/

  }else if(video["size"] > 2000000){

    $("#subirVideo").val("");

    swal({
      title: "Error Uploading image",
      text: "The image should not weigh more than 2MB!",
      type: "error",
      confirmButtonText: "Close!"
    });

    /*=============================================
    PREVISUALIZAMOS LA IMAGEN
    =============================================*/

  }else{

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(video);

    $(datosImagen).on("load", function(event){

      var rutaImagen = event.target.result;

      $(".previsualizarVideo").attr("src", rutaImagen);

    })

  }


    /*=============================================
    GUARDAR EL LOGOTIPO
    =============================================*/

    $("#guardarVideo").click(function(){


      var datos = new FormData();
      datos.append("video", video);   
      $.ajax({
        url:"ajax/plantilla.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
          if(respuesta == "ok"){            

            swal({
              title: "Saved changes",
              text: "The page has been updated correctly!",
              type: "success",
              confirmButtonText: "Close!"
            });

          }

        }

      })

    })
  })

/*====================================================
=            Cambiar color Redes sociales            =
====================================================*/

var checkBox = $(".seleccionarRed");

$("input[name='colorRedSocial']").on("ifChecked", function(){

  var color = $(this).val();
  var colorRed = null;

  var iconos = $(".redSocial");
  var redes = ["facebook", "youtube","twitter","google-plus","instagram"];
  
  if(color == "color"){

    colorRed = "Color";

  }else if(color == "blanco"){

    colorRed = "Blanco";

  }else{

    colorRed = "Negro";

  }

  for(var i = 0; i < iconos.length; i++){

    $(iconos[i]).attr("class","fa fa-"+redes[i]+" "+redes[i]+colorRed+" redSocial");
    $(checkBox[i]).attr("estilo", redes[i]+colorRed);

  }

  crearDatosJsonRedes();

})


/*=============================================
CAMBIAR URL REDES SOCIALES
=============================================*/
$(".cambiarUrlRed").change(function(){

  var cambiarUrlRed = $(".cambiarUrlRed");

  for(var i = 0; i < cambiarUrlRed.length; i++){

    $(checkBox[i]).attr("ruta", $(cambiarUrlRed[i]).val());

  }

  crearDatosJsonRedes();

})

/*=============================================
QUITAR RED SOCIAL
=============================================*/
$(".seleccionarRed").on("ifUnchecked",function(){

  $(this).attr("validarRed","");

  crearDatosJsonRedes();

})

/*=============================================
AGREGAR RED SOCIAL
=============================================*/

$(".seleccionarRed").on("ifChecked",function(){

  $(this).attr("validarRed", $(this).attr("red"));

  crearDatosJsonRedes();

})


/*=============================================
CREAR DATOS JSON PARA ALMACENAR EN BD
=============================================*/


function crearDatosJsonRedes(){

  var redesSociales = [];

  for(var i = 0; i < checkBox.length; i++){

    if($(checkBox[i]).attr("validarRed") != ""){

      redesSociales.push({"red": $(checkBox[i]).attr("red"),
        "estilo": $(checkBox[i]).attr("estilo"),
        "url": $(checkBox[i]).attr("ruta"),
        "activo": 1})


    }else{

      redesSociales.push({"red": $(checkBox[i]).attr("red"),
        "estilo": $(checkBox[i]).attr("estilo"),
        "url": $(checkBox[i]).attr("ruta"),
        "activo": 0})

    }

    $("#valorRedesSociales").val(JSON.stringify(redesSociales));

  }

}


/*=============================================
GUARDAR REDES SOCIALES
=============================================*/

$("#guardarRedesSociales").click(function(){

  var valorRedesSociales = $("#valorRedesSociales").val();

  var datos = new FormData();
  datos.append("redesSociales", valorRedesSociales);

  $.ajax({

    url:"ajax/plantilla.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){

      if(respuesta == "ok"){

        swal({
          title: "Saved changes",
          text: "The page has been updated correctly!",
          type: "success",
          confirmButtonText: "Close!"
        });

      }

    }

  })

})


/*=====  End of Cambiar color Redes sociales  ======*/
