<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Admin Page WRI">
  <meta name="description" content="Workshop Riset Informatika">
  <meta name="author" content="">

  <title>Admin Page</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/title.png" type="image/x-icon">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css">

  <link href="<?= base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/bootstrap-switch.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/loadimg.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/jquery.paginate.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/chartist.min.css">
  <link rel="stylesheet" href="<?= base_url( )?>assets/admin/css/chartist-plugin-tooltip.css">
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
        <a class="navbar-brand" href="<?= base_url().'admin/Dashboard' ?>">
          Workshop & Riset Informatika
        </a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <?php if($unread_message > 0) { ?>
            <span class="badge"><?= $unread_message ?></span>
            <?php } ?>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu message-dropdown">
            <?php foreach ($message as $row) {
              $time = new DateTime($row->date);
            ?>
            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="" alt="">
                  </span>
                  <div class="media-body">
                    <h5 class="media-heading"><strong><?= $row->name ?></strong>
                    <?php if(!$row->readed) { ?>
                    <span class="badge pull-right">new</span>
                    <?php } ?>
                    </h5>
                    <p class="small text-muted">
                      <i class="fa fa-clock-o"></i>
                      <?= $time->format('d/m/Y') ?> at <?= $time->format('h:i') ?>
                    </p>
                    <p class="text-preview"><?= $row->message ?></p>
                  </div>
                </div>
              </a>
            </li>
            <?php } ?>
            <li class="message-footer">
              <a href="<?= base_url() ?>admin/Message">Read All New Messages</a>
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
              <a href="<?= base_url().'admin/Profile/' ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
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
          <li>
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

          <?php if($this->session->userdata('logged_in')['admin']) { ?>
            <li>
              <a href="<?= base_url().'admin/User' ?>"><i class="fa fa-fw fa-user"></i> User </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?= base_url().'admin/Visitor' ?>"><i class="fa fa-fw fa-arrow-right"></i> Visitor</a>
            </li>
            <li>
              <a href="<?= base_url().'admin/Message' ?>">
                <i class="fa fa-fw fa-envelope"></i>
                Message

                <?php if($unread_message > 0) { ?>
                <span class="badge"><?= $unread_message ?></span>
                <?php } ?>
              </a>
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
    <script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap-switch.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap-filestyle.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/list.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/list.pagination.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/chartist.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/chartist-plugin-pointlabels.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/chartist-plugin-tooltip.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
  </body>

  </html>
