<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>WRI | <?= $title ?></title>

  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/title.png" type="image/x-icon">

  <meta name="keywords" content="WRI Polinema"/>
  <meta name="description" content="Workshop Riset Informatika">
  <meta name="author" content="WRI">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Web Fonts  -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
  rel="stylesheet" type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/magnific-popup/magnific-popup.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-elements.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-blog.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/theme-animate.css">

  <!-- Current Page CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/rs-plugin/css/settings.css" media="screen">

  <!-- Skin CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/default.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
</head>
<body ng-app="myApp">

  <div class="body">
    <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
      <div class="header-body">
        <div class="header-container container">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="<?= base_url() ?>">
                  <img alt="Porto" width="200" height="65" data-sticky-width="120" data-sticky-height="38" data-sticky-top="40" src="<?= base_url() ?>assets/img/putih.png">
                </a>
              </div>
            </div>
            <div class="header-column">
              <div class="header-row">
                <!-- <div class="header-search hidden-xs">
                  <form id="searchForm" action="page-search-results.html" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" name="q" id="q" placeholder="Search..."
                      required>
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </form>
                </div> -->
                <nav class="header-nav-top">
                  <ul class="nav nav-pills">

                    <!--<li class="hidden-xs">-->
                    <li class="social-icons-facebook">
                      <a href="https://www.facebook.com/WRIPolinema" target="_blank" title="Facebook">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <!-- <li class="social-icons-google-plus">
                      <a href="https://plus.google.com/u/0/106221484184732111240" target="_blank" title="Google +">
                        <i class="fa fa-google-plus"></i>
                      </a>
                    </li>
                    <li class="social-icons-github">
                      <a href="https://github.com/wridev" target="_blank" title="Github">
                        <i class="fa fa-github"></i>
                      </a>
                    </li> -->

                    <!--</li>-->

                  </ul>
                </nav>
              </div>
              <div class="header-row">
                <div class="header-nav">
                  <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                    <i class="fa fa-bars"></i>
                  </button>

                  <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                    <nav>
                      <ul class="nav nav-pills" id="mainNav">
                        <li>
                          <a href="<?= base_url() ?>">
                            Beranda
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Article">
                            Artikel
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Tutorial/playlist">
                            Tutorial
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Gallery">
                            Galeri
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url() ?>Contact">
                            Hubungi Kami
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url() ?>About">
                            Tentang Kami
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php if(!isset($home)) { ?>
    <div class="container content-wrapper">
      <div class="web-title">
        <h3><?= $title ?> <small><?= $desc ?></small></h3>
      </div>
      <!-- breadcrumb -->
      <ol class="breadcrumb">
        <?php
        $i = 0;
        $size = sizeof($breadcrumb);
        foreach ($breadcrumb as $value)
        {
          $label = $value['label'];
          $url = $value['url'];

          if($i == $size - 1)
          {
            echo "<li class='active'>$label</li>";
          }
          else
          {
            echo "<li><a href='$url'>$label</a></li>";
          }

          $i++;
        }
        ?>
      </ol>
    <?php } ?>

      <!-- content here -->
      <?= $content ?>
      <!-- end of content -->
    </div>

    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="footer-ribbon">
            <span>WRI</span>
          </div>
          <div class="col-md-3">
            <div class="newsletter">
              <h4>Surat Kabar</h4>
              <p>Ayo masukkan email kamu biar update.</p>

              <div class="alert alert-success hidden" id="newsletterSuccess">
                <strong>Success!</strong> You've been added to our email list.
              </div>

              <div class="alert alert-danger hidden" id="newsletterError"></div>

              <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                <div class="input-group">
                  <input class="form-control" placeholder="Alamat Email" name="newsletterEmail"
                  id="newsletterEmail" type="text">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Kirim</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-3">
            <h4>Artikel Terbaru</h4>
            <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "", "count": 2}'>
              <?php foreach ($article_footer as $row) { ?>
                <a href="<?= base_url().'Article/view/'.$row->id_article ?>">
                  <p><?= $row->title ?></p>
                </a>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-details">
                <h4>Hubungi Kami</h4>
                <ul class="contact">
                  <li>
                    <p>
                      <i class="fa fa-map-marker"></i>
                      <strong>Alamat:</strong>
                      Jl. Soekarno Hatta No. 9 Malang <br>
                      <b>Politeknik Negeri Malang</b>
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="fa fa-phone"></i>
                      <strong>Telp:</strong>
                      085-730-269-938
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="fa fa-envelope"></i>
                      <strong>Email:</strong>
                      <a href="mailto:wripolinema@gmail.com">wripolinema@gmail.com</a>
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-2">
              <h4>Ikuti Kami</h4>
              <ul class="social-icons">
                <li class="social-icons-facebook">
                  <a href="https://www.facebook.com/WRIPolinema" target="_blank" title="Facebook">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <!-- <li class="social-icons-google-plus">
                  <a href="https://plus.google.com/u/0/106221484184732111240" target="_blank" title="Google +">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </li>
                  <li class="social-icons-github">
                    <a href="https://github.com/wridev" target="_blank" title="Github">
                      <i class="fa fa-github"></i>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-2">
                <a href="<?= base_url() ?>" class="logo">
                  <img alt="Porto Website Template" class="img-responsive" width="1000" src="<?= base_url() ?>assets/img/wri.png">
                </a>
              </div>
              <div class="col-md-8">
                <p>&copy; Copyright 2017. All Rights Reserved.</p>
              </div>
              <div class="col-md-4">
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Vendor -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.appear/jquery.appear.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.easing/jquery.easing.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.validation/jquery.validation.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.gmap/jquery.gmap.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.lazyload/jquery.lazyload.js"></script>
    <script src="<?= base_url() ?>assets/vendor/owl.carousel/owl.carousel.js"></script>
    <script src="<?= base_url() ?>assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <script src="<?= base_url() ?>assets/js/theme.js"></script>
    <script src="<?= base_url() ?>assets/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?= base_url() ?>assets/js/theme.init.js"></script>
    <script src="<?= base_url() ?>assets/js/list.pagination.min.js"></script>
    <script src="<?= base_url() ?>assets/js/list.min.js"></script>
    <script src="<?= base_url() ?>assets/js/default.js"></script>
    <script src="<?= base_url() ?>assets/js/angular.min.js"></script>
    <script src="<?= base_url() ?>assets/js/angular-youtube-api-factory.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="<?= base_url() ?>assets/js/angular-youtube-embed.min.js"></script>
    <script src="<?= base_url() ?>assets/js/controller.js"></script>
    <script src="<?= base_url() ?>assets/js/ui-bootstrap-tpls-0.10.0.js"></script>
  </body>
  </html>
