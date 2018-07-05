<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      My Services
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">My Services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-xs-12">                  
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

          <table id="myServices" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" >
            <thead>
              <tr>
                <th>Photo</th>
                <th>Service Name</th>
                <th>Cost Base</th> 
                <th>Edit / Delete</th>

              </tr>
            </thead>
            <tbody>
              <?php                   
              $scheduled=ControladorAdministradores::ctrMostrarServices();                
              if($scheduled!=null)
              {
                foreach ($scheduled as $key => $value) {               
                  echo ' 
                  <tr>
                  <td class="text-center"><img style="border: 2px solid ; width: 80px; height: auto;" align="middle" src="'.$url.$value["photo"].'"/></td>
                  <td>'.$value["name"].'</td>
                  <td>'.$value["cost"].'</td>
                  <td>
                  <a id="edit" data-id="'.$value["id_service"].'" class="edit">Edit</a> / 
                  <a id="remove" href="#delete" data-id="'.$value["id_service"].'" class="remove" data-toggle="modal">Delete</a></td>
                  </tr>
                  ';}
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Service Name</th>
                  <th>Cost Base</th>  
                  <th>Edit / Delete</th>         
                </tr>
              </tfoot>
            </table>            
            
            <div class="box-tools">
              <a href="vistas/modulos/reports.php?report=gifts">
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="">
        <div class="modal-body">         
          <input type="hidden" id="removeService" name="removeService" class="form-control"/>
          <div class="text-center">
            <h1>Are you sure?</h1>
            <span>If you delete this record you can not recover</span>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
        <?php 
        $delete= new ControladorAdministradores();
        $delete->ctrRemoveService();
        ?>
      </form>
    </div>
  </div>
</div>

<script>

 $(document).ready(function() {


  $('#myServices').DataTable( {
     
    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        var select = $('<select><option value="">search by </option></select>')
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

  var table = $('#myServices').DataTable();

  var column = table.columns([0,2,3]);
  $( column.footer() ).html("");


  // Delete a record
  $('#delete').on('show.bs.modal', function(e) {   
   var id = $(e.relatedTarget).data().id;
   $(e.currentTarget).find('#removeService').val(id);
 });

} );

</script>