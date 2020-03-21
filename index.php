
<?php
require_once "db_config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>simple CRUD</title>
    
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/datepicker.min.css" rel="stylesheet">
    
    <!-- styles -->
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>

  <div class="container ">
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php">HRD</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="index.php">Home</a></li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li role="separator" class="divider"></li>
                              <li class="dropdown-header">Nav header</li>
                              <li><a href="#">Separated link</a></li>
                              <li><a href="#">One more separated link</a></li>
                          </ul>
                      </li>
                  </ul>

              </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
      </nav>

  </div>

    <div class="container">
      <?php
      if (empty($_GET["page"])) {
        include "list-karyawan.php";
      } elseif ($_GET['page'] == 'add') {
        include "form-add-karyawan.php";
      } elseif ($_GET['page'] == 'edit') {
        include "form-edit-karyawan.php";
      } 
      ?>
    </div> <!-- /.container-fluid -->
  <div class="container">
    <footer class="footer bg-primary">

        <p class="text-info text-center">&copy; 2017 Ade Pamungkas</p>
        <p class="text-muted text-center ">Powered by <a href="http://www.getbootstrap.com" target="_blank">Bootstrap</a></p>

    </footer>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();
      })
    </script>
  </body>
</html>