<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Services Provider
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Manage Services Provider</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-xs-12">                  
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">


          <table id="provider" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
              <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Web Site</th>
                <th>Contact Name</th>
                <th>Phone Number</th>   
                <th>Email</th>                   
                <th>Enabled</th>                
              </tr>
            </thead>
            <tbody>
              <?php                   
              $provider=ControladorAdministradores::ctrMostrarProvider();        
              if($provider!=null)
              {
                foreach ($provider as $key => $value) {               
                  echo ' 
                  <tr>
                  <td>'.$value["companyName"].' </td>
                  <td>'.$value["companyAddress"].'</td>
                  <td>'.$value["companyWebSite"].'</td>
                  <td>'.$value["contacName"].'</td>
                  <td>'.$value["phoneNumber"].'</td>  
                  <td>'.$value["email"].'</td>          
                  <td>
                  <input type="checkbox" checked data-id="check-'.$value["id_provider"].'" />
                  </td>         
                  </tr>
                  ';}
                } ?>
              </tbody>

              <tfoot>
                <tr>
                 <th>Name</th>
                 <th>Address</th>
                 <th>Web Site</th>
                 <th>Contact Name</th>
                 <th>Phone Number</th>   
                 <th>Email</th> 
                 <th>Enabled</th>         
               </tr>
             </tfoot>
           </table>            
           
           <div class="box-tools">
            <a href="vistas/modulos/reports.php?report=provider">
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

<script>
  var visible = document.getElementsByTagName('input');
  for(var i=0; i<visible.length;i++) {
    if (visible[i].type == 'checkbox') {        
      visible[i].addEventListener('click', actualizarDat);
    }
  }

  $(document).ready(function() {

    $('#provider').DataTable( {

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
    });

    var table = $('#provider').DataTable();

    var column = table.columns([1,2,3,4,5,6]);
    $( column.footer() ).html("");

  }); 

  function actualizarDat() {
    console.log(this);
  }
</script>