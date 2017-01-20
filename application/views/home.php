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
      <h2 class="mt-lg word-rotator-title ">Komunitas yang bertujuan untuk
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

              <div class="owl-carousel owl-theme" data-plugin-options='{"responsive": {"0": {"items": 1}, "479": {"items": 1}, "768": {"items": 2}, "979": {"items": 3}, "1199": {"items": 4}}, "items": 4, "margin": 10, "loop": false, "nav": false, "dots": true}'>
                <div>
                  <?php
                  foreach ($article as $row) {
                    $time = new DateTime($row->date);
                    ?>
                    <div class="recent-posts">
                      <article class="post">
                        <div class="date">
                          <span class="day"><?= $time->format('d') ?></span>
                          <span class="month"><?= $time->format('H:i') ?></span>
                        </div>
                        <h4 class="heading-primary">
                          <a href="#"><?= $row->title ?></a>
                        </h4>
                        <p>
                          <?= $row->posting ?>
                          <a href="/" class="read-more">read more
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </p>
                      </article>
                    </div>
                    <?php } ?>
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
                    <?php
                    foreach ($gallery as $row) {
                      ?>
                      <li class="isotope-item">
                        <div class="image-gallery-item">
                          <a href="portfolio-single-project.html">
                            <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                              <span class="thumb-info-wrapper">
                                <img src="<?= base_url().'assets/upload/'.$row->image ?>" class="img-responsive" alt="">
                                <span class="thumb-info-title">
                                  <span class="thumb-info-inner"><?= $row->title ?></span>
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
                      <?php } ?>
                    </ul>

                  </div>
                </div>
              </div>
            </div>
          </div>
