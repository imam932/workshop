<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Page</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?> assets/img/favicon.ico" type="image/x-icon"/>
  <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/apple-touch-icon.png">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css">

  <!-- Custom CSS -->
  <link href="<?= base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/dist/summernote.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/bootstrap-switch.min.css">
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav id="nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url().'admin/Dashboard' ?>">Workshop & Riset Informatika</a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu message-dropdown">
            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="" alt="">
                  </span>
                  <div class="media-body">
                    <h5 class="media-heading"><strong>John Smith</strong>
                    </h5>
                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                  </div>
                </div>
              </a>
            </li>
            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                  </span>
                  <div class="media-body">
                    <h5 class="media-heading"><strong>John Smith</strong>
                    </h5>
                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                  </div>
                </div>
              </a>
            </li>
            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                  </span>
                  <div class="media-body">
                    <h5 class="media-heading"><strong>John Smith</strong>
                    </h5>
                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                  </div>
                </div>
              </a>
            </li>
            <li class="message-footer">
              <a href="#">Read All New Messages</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
          <ul class="dropdown-menu alert-dropdown">
            <li>
              <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
            </li>
            <li>
              <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
            </li>
            <li>
              <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
            </li>
            <li>
              <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
            </li>
            <li>
              <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
            </li>
            <li>
              <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#">View All</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('logged_in')['username']; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?= base_url().'admin/Logout' ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="<?= base_url().'admin/Dashboard' ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Article' ?>"><i class="fa fa-fw fa-file"></i> Article</a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Category' ?>"><i class="fa fa-fw fa-tag"></i> Category</a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Tutorial' ?>"><i class="fa fa-fw fa-files-o"></i> Tutorial</a>
          </li>
          <li>
            <a href="<?= base_url().'admin/Gallery' ?>"><i class="fa fa-fw fa-file-image-o"></i> Gallery</a>
          </li>

          <li>
            <a href="<?= base_url().'admin/User' ?>"><i class="fa fa-fw fa-user"></i> User</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              <?= $title; ?> <small><?= $desc; ?></small>
            </h1>
          </div>
        </div>
        <!-- /.row -->

        <!-- breadcrumb -->
        <ol class="breadcrumb">
          <?php
          $i = 0;
          $size = sizeof($breadcrumb);
          foreach ($breadcrumb as $value)
          {
            if($i == $size - 1)
            {
              echo "<li class='active'>$value</li>";
            }
            else
            {
              $url = base_url() . "admin/" . $value;
              echo "<li><a href='$url'>$value</a></li>";
            }

            $i++;
          }
          ?>
        </ol>

        <!-- ADD YOUR CONTENT HERE -->
        <?= $content; ?>
        <!-- END OF CONTENT -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Include JS -->
  <!-- Vendor -->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>

  <script src="<?= base_url() ?>assets/admin/dist/summernote.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/admin.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-switch.min.js"></script>
</body>

</html>
