<!--=====================================
MENU
======================================-->	
<?php 
$url=Ruta::ctrRuta(); 
?>
<div class="user-panel">
  <figure>
    <?php echo'<img src="'.$url.$_SESSION["photo"].'" class="img-circle img-responsive" alt="User Image"> ';?>
  </div>
</figure>


<div class="text-center" style="color:#FFF;text-transform: uppercase; font-size: 2em;">
  <p><?php echo $_SESSION["name"]; ?></p>
  <!-- Status -->  
</div>
<div class="" style="text-align: center; margin: 10px; color:#000;">                  
  <?php 
  echo '<a href="salir" class="btn btn-danger ">Log out</a>';
  ?>
</div>

<ul class="sidebar-menu">
  <?php if ($_SESSION["profile"]=="admin") {
    echo '
    <li class="active"><a href="inicio"><i class="fa fa-home"></i> <span>Home</span></a></li>

    <li><a href="contributions"><i class="fa fa-gift"></i> <span>Manage Contibutions</span></a></li>

    <li><a href="recipients"><i class="fa fa-users"></i> <span>Manage Recipients</span></a></li>

    <li class="treeview">

    <a href="#">
    <i class="fa fa-files-o"></i>
    <span>Manage Services</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>

    <ul class="treeview-menu">

    <li><a href="services"><i class="fa fa-circle-o"></i>Schedule Services</a></li>
    <li><a href="MyServices"><i class="fa fa-circle-o"></i> My Services</a></li>
    <li><a href="newService"><i class="fa fa-circle-o"></i> New service</a></li>

    </ul>

    </li>

    <li class="treeview">

    <a href="#">
    <i class="fa fa-files-o"></i>
    <span>Manage Services Provider</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>

    <ul class="treeview-menu">

    <li><a href="provider"><i class="fa fa-circle-o"></i>Services Provider</a></li>
    <li><a href="newServiceProvider"><i class="fa fa-circle-o"></i> New Service Provider</a></li>

    </ul>

    </li>
    <li><a href="Appearance"><i class="fa fa-paint-brush"></i> <span>Appearance</span></a></li>
    <li><a href="profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
    ';
  } else{
    echo ' 
    <li class="treeview">

    <a href="#">
    <i class="fa fa-files-o"></i>
    <span>Manage Services Provider</span>
    <span class="pull-right-container">
    <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>

    <ul class="treeview-menu">

    <li><a href="summary"><i class="fa fa-circle-o"></i>Summary</a></li>
    <li><a href="transacctions"><i class="fa fa-circle-o"></i> Current Transacctions</a></li>

    </ul>

    </li>  
    <li><a href="profileProvider"><i class="fa fa-edit"></i> <span>Profile</span></a></li>
    ';
  }

  ?>
</ul>	