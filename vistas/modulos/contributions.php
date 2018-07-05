<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage Contributions
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Manage Contributions</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

   <div class="row">
    <div class="col-xs-12">                  
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

          <?php 

          $suma=ControladorAdministradores::ctrMostrarSumaContributions();  
          echo '
          <div class="text-center"> 
          <div class="row">
          <div class="col-sm-12">
          <h2>Total kikupoints: <span>'.$suma["TotalKikupoints"].' </span </h2>
          </div>
          </div>
          </div>
          ';
          ?>
          <table id="contributions" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" >
            <thead>
              <tr>
                <th>Contributor Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Recipient Name</th>
                <th>Amount</th>                       
              </tr>
            </thead>
            <tbody>
              <?php                   
              $scheduled=ControladorAdministradores::ctrMostrarContributions();                
              if($scheduled!=null)
              {
                foreach ($scheduled as $key => $value) {               
                  echo ' 
                  <tr>
                  <td>'.$value["cFname"].' '.$value["cLname"].'</td>
                  <td>'.$value["cemail"].'</td>
                  <td>'.$value["cphone"].'</td>
                  <td>'.$value["bFname"].' '.$value["bLname"].'</td>
                  <td>'.$value["kikupoints"].'</td>                         
                  </tr>
                  ';}
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Contributor Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Recipient Name</th>
                  <th>Amount</th>           
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

<script>


  $(document).ready(function() {

    $('#contributions').DataTable( {

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

    var table = $('#contributions').DataTable();

    var column = table.columns([1,2,4]);
    $( column.footer() ).html("");

  } );

</script>