<?php
  include '../database.php';
  session_start();
  if(!$_SESSION['email']){
    header('location: logout.php?logout=true');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../images/favicon.png">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PPG Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          PPG ADMIN DASHBOAD
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">power_settings_new</i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <?php
                  $result = mysqli_query($connection, "select count(1) FROM records WHERE status='confirm'");
                  $row = mysqli_fetch_array($result);
                  
                  $total = $row[0];
                  ?> 
                  <p class="card-category">New Entries</p>
                  <h3 class="card-title"><?= $total; ?> Users</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervised_user_circle</i>
                  </div>
                  <?php
                  $result = mysqli_query($connection, "select count(1) FROM records WHERE status='new'");
                  $row = mysqli_fetch_array($result);
                  
                  $total = $row[0];
                  ?>  
                  <p class="card-category">Total Users</p>
                  <h3 class="card-title"><?= $total; ?> Users</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">delete</i>
                  </div>
                  <?php
                  $result = mysqli_query($connection, "select count(1) FROM records WHERE status='trashed'");
                  $row = mysqli_fetch_array($result);
                  
                  $total = $row[0];
                  ?> 
                  <p class="card-category">Trashed Users</p>
                  <h3 class="card-title"><?= $total; ?> Users</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-envelope-open"></i>
                  </div>
                  <?php
                  $result = mysqli_query($connection, "select count(1) FROM newsletter");
                  $row = mysqli_fetch_array($result);
                  
                  $total = $row[0];
                  ?>
                  <p class="card-category">Subscribers</p>
                  <h3 class="card-title"><?= $total; ?> Users</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Menu:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item" id="btnall">
                          <a class="nav-link active" data-toggle="tab">
                            <i class="material-icons">group</i> Users
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">person</i> New Users
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">delete</i> Trashed Users
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">local_post_office</i> Newsletter Entries
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table table-hover" id="all">
                        <thead class="bg-warning text-center">
                          <tr>
                            <th>ID</th>
                            <th>Company/Website</th>
                            <th>URL</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>State</th>
                          </tr>
                        </thead>
                        <?php
                          $getRecords = "select * from records where status='confirm'";
                          $runQuery = mysqli_query($connection, $getRecords) or die(mysqli_error($connection));
                          while($row = mysqli_fetch_assoc($runQuery)){
                          $id = $row['record_id'];
                          $name = $row['company_name'];
                          $link = $row['website_url'];
                          $mail = $row['email'];
                          $country = $row['country'];
                          $state = $row['state'];
                          
                        ?>
                        <tbody class="text-center">
                          <tr>
                            <td><?= $id ?></td>
                            <td><?= $name ?></td>
                            <td><?= $link ?></td>
                            <td><?= $mail ?></td>
                            <td><?= $country ?></td>
                            <td><?= $state ?></td>
                          </tr>
                        </tbody>
                        <?php } ?>
                      </table>
                      <!-- <table class="table" id="new">
                          <thead class="bg-success text-light text-center">
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Country</th>
                              <th>State</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr>
                              <td>1</td>
                              <td>Brad Traversy</td>
                              <td>brad@gmail.com</td>
                              <td>USA</td>
                              <td>New York</td>
                            </tr>
                          </tbody>
                      </table> -->
                      <!-- <table class="table" id="trashed">
                          <thead class="bg-danger text-light text-center">
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Country</th>
                              <th>State</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr>
                              <td>1</td>
                              <td>Brad Traversy</td>
                              <td>brad@gmail.com</td>
                              <td>USA</td>
                              <td>New York</td>
                            </tr>
                          </tbody>
                      </table> -->
                      <!-- <table class="table" id="newsletter">
                          <thead class="bg-primary text-light text-center">
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Country</th>
                              <th>State</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <tr>
                              <td>1</td>
                              <td>Brad Traversy</td>
                              <td>brad@gmail.com</td>
                              <td>USA</td>
                              <td>New York</td>
                            </tr>
                          </tbody>
                      </table> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
      $('#new').hide();
      $('#trashed').hide();
      $('#newsletter').hide();
    $(document).ready(function(){
      $('#btnall').click(function(){
        $('#all').hide();
        $('#new').show();
      });
    });
  </script>
</body>

</html>
