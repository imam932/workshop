<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>WRI | <?= $title ?></title>

  <meta name="keywords" content="HTML5 Template"/>
  <meta name="description" content="Porto - Responsive HTML5 Template">
  <meta name="author" content="okler.net">
  <link rel="shortcut icon" href="<?= base_url() ?> assets/img/favicon.ico" type="image/x-icon"/>
  <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/apple-touch-icon.png">

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
<body>

  <div class="body">
    <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
      <div class="header-body">
        <div class="header-container container">
          <div class="header-row">
            <div class="header-column">
              <div class="header-logo">
                <a href="index.html">
                  <img alt="Porto" width="200" height="65" data-sticky-width="120" data-sticky-height="38" data-sticky-top="40" src="<?= base_url() ?>assets/img/putih.png">
                </a>
              </div>
            </div>
            <div class="header-column">
              <div class="header-row">
                <div class="header-search hidden-xs">
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
                </div>
                <nav class="header-nav-top">
                  <ul class="nav nav-pills">

                    <!--<li class="hidden-xs">-->
                    <li class="social-icons-facebook">
                      <a href="https://www.facebook.com/WRIPolinema" target="_blank" title="Facebook">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li class="social-icons-twitter">
                      <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li class="social-icons-linkedin">
                      <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </li>

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
                            Home
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Article">
                            Article
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Tutorial">
                            Tutorial
                          </a>
                        </li>

                        <li>
                          <a href="<?= base_url() ?>Gallery">
                            Gallery
                          </a>
                        </li>
                        <li>
                          <a href="<?= base_url() ?>Contact">
                            Contact Us
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
          if($i == $size - 1)
          {
            echo "<li class='active'>$value</li>";
          }
          else
          {
            $url = base_url() . $value;
            echo "<li><a href='$url'>$value</a></li>";
          }

          $i++;
        }
        ?>
      </ol>
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
              <h4>Newsletter</h4>
              <p>Ayo masukkan email kamu biar update.</p>

              <div class="alert alert-success hidden" id="newsletterSuccess">
                <strong>Success!</strong> You've been added to our email list.
              </div>

              <div class="alert alert-danger hidden" id="newsletterError"></div>

              <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
                <div class="input-group">
                  <input class="form-control" placeholder="Email Address" name="newsletterEmail"
                  id="newsletterEmail" type="text">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-3">
            <h4>Newest Article</h4>
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
                <h4>Contact Us</h4>
                <ul class="contact">
                  <li>
                    <p>
                      <i class="fa fa-map-marker"></i>
                      <strong>Address:</strong>
                      Jl. Soekarno Hatta No. 9 Malang <br>
                      <b>Politeknik Negeri Malang</b>
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="fa fa-phone"></i>
                      <strong>Phone:</strong>
                      (123) 456-789
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
              <h4>Follow Us</h4>
              <ul class="social-icons">
                <li class="social-icons-facebook">
                  <a href="https://www.facebook.com/WRIPolinema" target="_blank" title="Facebook">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="social-icons-twitter">
                  <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                    <i class="fa fa-twitter"></i></a>
                  </li>
                  <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-2">
                <a href="index.html" class="logo">
                  <img alt="Porto Website Template" class="img-responsive" width="1000" src="<?= base_url() ?>assets/img/wri.png">
                </a>
              </div>
              <div class="col-md-8">
                <p>© Copyright 2017. All Rights Reserved.</p>
              </div>
              <div class="col-md-4">
                <nav id="sub-menu">
                  <ul>
                    <li>
                      <a href="/">FAQ's</a>
                    </li>
                    <li>
                      <a href="/">Sitemap</a>
                    </li>
                    <li>
                      <a href="/">Contact</a>
                    </li>
                  </ul>
                </nav>
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
  </body>
  </html>
