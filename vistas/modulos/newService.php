<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      New Type of Services
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">New Type of Services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <form action="" method="POST" role="form">
        <div class="box-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Service Name</label>
                <input type="text" name="serviceName" class="form-control" id="serviceName" required>
              </div>

            </div>
            <div class="col-sm-6">
             <div class="form-group">
              <label for="">Base Cost</label>
              <input type="text" name="serviceCost" class="form-control" id="serviceCost" required>
            </div>
          </div>
        </div>    

        <?php 
        $services= new ControladorServices();
        $services->ctrResgistroServices();
        ?>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      <!-- /.box-footer-->
    </form>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
</div>
  <!-- /.content-wrapper -->