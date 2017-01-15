<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>WRI | Home</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
</head>
<body>

<div class="body">
    <header id="header"
            data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
        <div class="header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <a href="index.html">
                                <img alt="Porto" width="200" height="65" data-sticky-width="120" data-sticky-height="38"
                                     data-sticky-top="40" src="<?= base_url() ?>assets/img/putih.png">
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
													<button class="btn btn-default" type="submit"><i
                                                            class="fa fa-search"></i></button>
												</span>
                                    </div>
                                </form>
                            </div>
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">

                                    <!--<li class="hidden-xs">-->
                                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                                                         title="Facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                                                        title="Twitter"><i
                                            class="fa fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                                                         title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                    </li>

                                    <!--</li>-->

                                </ul>
                            </nav>
                        </div>
                        <div class="header-row">
                            <div class="header-nav">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="">
                                                <a class="" href="index.html">
                                                    Home
                                                </a>

                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    Profile
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li class="">
                                                        <a href="#">Workshop Riset Informatika</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">Visi Misi</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">Divisi</a>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a href="#">Struktur Organisasi</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="index-classic.html#footer">Angkatan 2013</a>
                                                            </li>
                                                            <li><a href="index-footer-advanced.html#footer">Angkatan
                                                                2014</a></li>
                                                            <li><a href="index-footer-simple.html#footer">Angkatan
                                                                2015</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="" href="#">
                                                    Events
                                                </a>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#">
                                                    Artikel
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="portfolio-4-columns.html">PHP</a></li>
                                                    <li><a href="portfolio-3-columns.html">Unity</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="" href="#">
                                                    Galeri
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="" href="#">
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

    <div role="main" class="main">

        <div class="slider-container light rev_slider_wrapper">
            <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider
                 data-plugin-options='{"gridwidth": 1170, "gridheight": 500}'>
                <ul>
                    <li data-transition="fade">
                        <img src="<?= base_url() ?>assets/img/bg.png"
                             alt=""
                             data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             class="rev-slidebg">

                        <!--<div class="tp-caption"-->
                             <!--data-x="177"-->
                             <!--data-y="180"-->
                             <!--data-start="1000"-->
                             <!--data-transform_in="x:[-300%];opacity:0;s:500;"><img-->
                                <!--src="img/divisi_pemograman.jpg" alt=""></div>-->

                        <div class="tp-caption top-label"
                             data-x="100"
                             data-y="180"
                             data-start="500"
                             data-transform_in="y:[-300%];opacity:0;s:500;">pengen belajar
                        </div>

                        <!--<div class="tp-caption"-->
                             <!--data-x="480"-->
                             <!--data-y="180"-->
                             <!--data-start="1000"-->
                             <!--data-transform_in="x:[300%];opacity:0;s:500;"><img-->
                                <!--src="img/divisi_multimedia.png" alt=""></div>-->

                        <div class="tp-caption main-label"
                             data-x="0"
                             data-y="210"
                             data-start="1500"
                             data-whitespace="nowrap"
                             data-transform_in="y:[100%];s:500;"
                             data-transform_out="opacity:0;s:500;"
                             data-mask_in="x:0px;y:0px;">PEMOGRAMAN
                        </div>

                        <div class="tp-caption bottom-label"
                             data-x="100"
                             data-y="280"
                             data-start="2000"
                             data-transform_in="y:[100%];opacity:0;s:500;">Ayo gabung sama WRI
                        </div>

                        <div class="tp-caption"
                             data-x="500"
                             data-y="0"
                             data-start="2600"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:500;e:Power2.easeOut;">
                            <img src="<?= base_url() ?>assets/img/divisi_pemograman.jpg"  alt=""></div>

                        <!--<div class="tp-caption"-->
                             <!--data-x="630"-->
                             <!--data-y="bottom"-->
                             <!--data-start="2100"-->
                             <!--data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:500;e:Power2.easeOut;">-->
                            <!--<img src="img/multimedia_kecil.png" alt="" ></div>-->
                    </li>
                </ul>
            </div>
        </div>

        <div class="home-intro light">
            <div class="container">

            </div>
       </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="word-rotator-title mb-sm">
                        Workshop Riset Informatika
                    </h1>
                    <h2 class="mt-lg word-rotator-title ">merupakan komunitas yang bertujuan untuk
                        <strong class="inverted">
									<span class="word-rotate" data-plugin-options='{"delay": 2000}'>
									<span class="word-rotate-items">
									<span>membina</span>
									<span>mengembangkan</span>
									</span>
									</span>
                        </strong>
                        kreativitas mahasiswa di bidang ilmu pengetahuan dan teknologi</h2>

                </div>
                <div class="col-md-3">
                    <img class="img-responsive" src="<?= base_url() ?>assets/img/Page_profile.png" width="170"
                         data-appear-animation="fadeInRight" alt="">
                </div>
            </div>
        </div>


        <div class="container">
            <div class="featured-boxes">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="featured-box featured-box-primary">
                            <div class="box-content" align="center">
                                <img src="<?= base_url() ?>assets/img/divisi_pemograman.jpg" class="img-responsive" width="50%"  alt="">
                                <h4 class="text-uppercase">Progamming</h4>
                                <p>apapapapap apapappa papap apapa papapa apapap.</p>
                                <p><a href="/" class="lnk-primary learn-more">Learn More <i
                                        class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="featured-box featured-box-primary">
                            <div class="box-content" align="center">
                                <img src="<?= base_url() ?>assets/img/divisi_multimedia.png" class="img-responsive" width="50%"  alt="">
                                <h4 class="text-uppercase">Multimedia</h4>
                                <p>apapapapap apapappa papap apapa papapa apapap.</p>
                                <p><a href="/" class="lnk-primary learn-more">Learn More <i
                                        class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="featured-box featured-box-primary featured-box-effect-1">
                            <div class="box-content" align="center">
                                <img src="<?= base_url() ?>assets/img/divisi_network.png" class="img-responsive" width="50%"  alt="">
                                <h4 class="text-uppercase">Networking</h4>
                                <p>apapapapap apapappa papap apapa papapa apapap.</p>
                                <p><a href="/" class="lnk-primary learn-more">Learn More <i
                                        class="fa fa-angle-right"></i></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Artikel</h2>

                    <div class="owl-carousel owl-theme"
                         data-plugin-options='{"responsive": {"0": {"items": 1}, "479": {"items": 1}, "768": {"items": 2}, "979": {"items": 3}, "1199": {"items": 4}}, "items": 4, "margin": 10, "loop": false, "nav": false, "dots": true}'>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                        <div>
                            <div class="recent-posts">
                                <article class="post">
                                    <div class="date">
                                        <span class="day">15</span>
                                        <span class="month">Jan</span>
                                    </div>
                                    <h4 class="heading-primary"><a href="blog-post.html">Android sekarang jadi apple</a></h4>
                                    <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla . <a href="/" class="read-more">read
                                        more <i class="fa fa-angle-right"></i></a></p>
                                </article>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- blog -->
            <div class="row">
                <div class="col-md-12">

                    <h2>Gallery</h2>

                    <div class="row">

                        <ul class="image-gallery sort-destination full-width">
                            <li class="isotope-item">
                                <div class="image-gallery-item">
                                    <a href="portfolio-single-project.html">
								<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
									<span class="thumb-info-wrapper">
										<img src="<?= base_url() ?>assets/img/projects/project.jpg" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Project Title</span>
											<span class="thumb-info-type">Project Type</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                                    </a>
                                </div>
                            </li>
                            <li class="isotope-item">
                                <div class="image-gallery-item">
                                    <a href="portfolio-single-project.html">
								<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
									<span class="thumb-info-wrapper">
										<img src="<?= base_url() ?>assets/img/projects/project-2.jpg" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Judul</span>
											<span class="thumb-info-type">Project Type</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                                    </a>
                                </div>
                            </li><li class="isotope-item">
                            <div class="image-gallery-item">
                                <a href="portfolio-single-project.html">
								<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
									<span class="thumb-info-wrapper">
										<img src="<?= base_url() ?>assets/img/projects/project-2.jpg" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Judul</span>
											<span class="thumb-info-type">Project Type</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                                </a>
                            </div>
                        </li><li class="isotope-item">
                            <div class="image-gallery-item">
                                <a href="portfolio-single-project.html">
								<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
									<span class="thumb-info-wrapper">
										<img src="<?= base_url() ?>assets/img/projects/project-2.jpg" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Judul</span>
											<span class="thumb-info-type">Project Type</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                                </a>
                            </div>
                        </li><li class="isotope-item">
                            <div class="image-gallery-item">
                                <a href="portfolio-single-project.html">
								<span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
									<span class="thumb-info-wrapper">
										<img src="<?= base_url() ?>assets/img/projects/project-2.jpg" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Judul</span>
											<span class="thumb-info-type">Project Type</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                                </a>
                            </div>
                        </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
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
                    <h4>Tweets terakhir</h4>
                    <div id="tweet" class="twitter" data-plugin-tweets
                         data-plugin-options='{"username": "", "count": 2}'>
                        <p>Please wait...</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> Politeknik Negeri Malang</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a
                                    href="mailto:mail@example.com">mail@apajaa.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                                             title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                                            title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                                             title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <!--<a href="index.html" class="logo">
                            <!--<img alt="Porto Website Template" class="img-responsive" width="1000" src="img/g3392.png">-->
                        <!--</a>-->
                    <!--</div>-->
                    <div class="col-md-8">
                        <p>© Copyright 2015. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <nav id="sub-menu">
                            <ul>
                                <li><a href="page-faq.html">FAQ's</a></li>
                                <li><a href="sitemap.html">Sitemap</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
