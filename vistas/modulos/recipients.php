<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Recipients
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manage Recipients</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-xs-12">                  
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">       
          <table id="recipients" class="display" style="width:100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>                
                <th>Address</th> 
                
              </tr>
            </thead>
            <tbody>
              <?php                   
              $scheduled=ControladorAdministradores::ctrMostrarRecipients();                
              if($scheduled!=null)
              {
                foreach ($scheduled as $key => $value) {               
                  echo ' 
                  <tr>
                  <td>'.$value["bFname"].' </td>
                  <td>'.$value["bLname"].'</td>
                  <td>'.$value["bemail"].'</td>
                  <td>'.$value["bphone"].'</td>              
                  <td>'.$value["direccion"].'</td>          
                  
                  </tr>
                  ';}
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th> 
                  
                </tr>
              </tfoot>
            </table>                        
            <div class="box-tools">
              <a href="vistas/modulos/reports.php?report=recipient">
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
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#recipients tfoot th').each( function () {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    
    // DataTable
    var table = $('#recipients').DataTable();
    
    // Apply the search
    table.columns().every( function () {
      var that = this;
      
      $( 'input', this.footer() ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
          that
          .search( this.value )
          .draw();
        }
      } );
    } );
  } );
</script>