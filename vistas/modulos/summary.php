<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Summary
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Summary</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">                  
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">            
            <div class="container-fluid" style="margin-bottom: 15px;">
              <table id="service" class="display" style="width:100%">
                <thead>
                  <tr>
                   <th>Month</th>
                   <th>Total Service Provided</th>
                   <th>Paid</th>
                   <th>Pending</th>
                   <th>Notes</th>
                   
                 </tr>
               </thead>
               <tbody>
                <?php                   
                $scheduled=ControladorAdministradores::ctrMostrarScheduled();           
                if($scheduled!=null)
                {
                  foreach ($scheduled as $key => $value) {
                    if ($value["companyName"]==null) {
                      $provider="<a id='provi' class='' data-toggle='modal' href='#modal-id' data-id='".$value["id"]."'>Assign service provider</a>";
                    }else{
                      $provider=$value["companyName"];
                    }
                    echo ' 

                    <tr>
                    <td>'.$value["bFname"].' '.$value["bLname"].'</td>
                    <td>'.$value["name"].'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>'.$value["hora"].'</td>
                    <td>'.$value["amount"].'</td>                  
                    </tr>
                    ';}
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Month</th>
                    <th>Total Service Provided</th>
                    <th>Paid</th>
                    <th>Pending</th>
                    <th>Notes</th>     
                 </tr>
               </tfoot>
             </table>
             <div class="box-tools">
              <a href="vistas/modulos/reports.php?report=scheduleservice">
                <button class="btn btn-success">Download Report</button>
              </a>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row-->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<input type="hidden" value="<?php echo $urlServer; ?>" id="rutaOculta">

<div class="modal fade provider" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Services Provider</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <?php 
              $provider=ControladorAdministradores::ctrMostrarProvider(); 
              ?>
              <input type="hidden" name="providers" id="providers"/>    
              <input type="hidden" name="idProviders" id="idProviders"/>          
              <select name="provider" id="provider" class="selectpicker  form-control show-tick" data-style="btn-default">
                <option value="">Select Option</option>
                <?php foreach ($provider as $key => $value):
                  echo '  <option value="'.$value["id_provider"].'">'.$value["companyName"].'</option>';
                endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="sendPrivider" class="btn btn-primary">Save changes</button>
        </div>
        <?php 
        $actualizarProvider= new ControladorAdministradores;
        $actualizarProvider->ctrActualizarProvider();
        ?>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" language="javascript" >
  var rutaOculta = $("#rutaOculta").val();

  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
      var min = parseInt( $('#mini').val(), 10 );
      var max = parseInt( $('#maxi').val(), 10 );
        var age = parseFloat( data[4] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
         ( isNaN( min ) && age <= max ) ||
         ( min <= age   && isNaN( max ) ) ||
         ( min <= age   && age <= max ) )
        {
          return true;
        }
        return false;
      }
      );

  $(document).ready(function(e) {

    var select = document.getElementById('provider');
    select.addEventListener('change',
      function(){
        var selectedOption = this.options[select.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        $('#idProviders').val(selectedOption.value);
      });

    $('#modal-id').on('show.bs.modal', function(e) {   
     var id = $(e.relatedTarget).data().id;
     $(e.currentTarget).find('#providers').val(id);
   });


   //  $('.input-daterange').datepicker({
   //    todayBtn:'linked',
   //    format: "yyyy-mm-dd",
   //    autoclose: true
   //  });

   //  fetch_data('no');

   //  function fetch_data(is_date_search, start_date='', end_date='')
   //  {
   //    var dataTable = $('#service').DataTable({
   //      "processing" : true,
   //      "serverSide" : true,
   //      "order" : [],
   //      "ajax" : {
   //        url:rutaOculta+"ajax/fech.ajax.php",
   //        type:"POST",
   //        data:{
   //          is_date_search:is_date_search, start_date:start_date, end_date:end_date
   //        }
   //      }
   //    });
   //  }
   //  $('#search').click(function(){
   //    var start_date = $('#start_date').val();
   //    var end_date = $('#end_date').val();
   //    if(start_date != '' && end_date !='')
   //    {
   //      $('#service').DataTable().destroy();
   //     fetch_data('yes', start_date, end_date);
   //   }
   //   else
   //   {
   //     alert("Both Date is Required");
   //   }
   // }); 


   $('#service').DataTable( {

    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
        .appendTo( $(column.footer()).empty() )
        .on( 'change', function () {
          var val = $.fn.dataTable.util.escapeRegex(
            $(this).val()
            );

          column
          .search( val ? '^'+val+'$' : '', true, false )
          .draw();
        } );

        column.data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' )
        } );

      } );
    }
  } );

   var table = $('#service').DataTable();

   var column = table.columns([2,3,4,5]);
   $( column.footer() ).html("");

   $('#mini, #maxi').keyup( function() {
    table.draw();
  } );

 });  

</script>

