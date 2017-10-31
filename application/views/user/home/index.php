<div ng-controller="home">
  <div role="main" class="main">

    <div class="slider-container light rev_slider_wrapper">
      <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider
      data-plugin-options='{"gridwidth": 1170, "gridheight": 500}'>
      <ul>
        <li data-transition="fade">
          <img src="<?= base_url('assets/img/bg.jpg') ?>"
               alt=""
               data-bgposition="center center"
               data-bgfit="cover"
               data-bgrepeat="no-repeat"
               class="rev-slidebg">

          <div class="tp-caption top-label header-label" data-x="100" data-y="180" data-start="500" data-transform_in="y:[-300%];opacity:0;s:500;">
            Pengen belajar
          </div>

          <div class="tp-caption main-label header-label" data-x="0" data-y="230" data-start="1500" data-whitespace="nowrap" data-transform_in="y:[100%];s:500;" data-transform_out="opacity:0;s:500;" data-mask_in="x:0px;y:0px;">
            PEMROGRAMAN
          </div>

          <div class="tp-caption bottom-label header-label" data-x="100" data-y="320" data-start="2000" data-transform_in="y:[100%];opacity:0;s:500;">
            Ayo gabung sama WRI
          </div>

          <div class="tp-caption bottom-label" data-x="100" data-y="380" data-start="2500" data-transform_in="y:[100%];opacity:0;s:500;">
            <a href="https://goo.gl/forms/fKTWqMQUx85Wnh7I3" class="btn btn-primary btn-lg header-label" target="_blank">Gabung Sekarang</a>

          </div>

          <div class="tp-caption" data-x="500" data-y="0" data-start="3000" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:500;e:Power2.easeOut;">
            <youtube-video class="embed-responsive-item" video-id="featuredVideoId" id="featuredVideo"></youtube-video>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="home-intro light">
  <div class="container">

  </div>
</div>

<div class="container">

  <div class="row">
    <div class="col-md-3">
      <img class="img-responsive" src="<?= base_url() ?>assets/img/Page_profile.png" width="170"
      data-appear-animation="fadeInLeft" alt="Logo WRI">
    </div>
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
    </div>
  </div>


  <div class="container">
    <div class="featured-boxes">

      <div class="row row-match">
        <?php foreach ($division as $row) { ?>
          <div class="col-md-4 col-sm-6">
            <div class="featured-box featured-box-primary col-match">
              <div class="box-content" align="center">
                <img src="<?= base_url() ?>assets/upload/division/<?= $row->image ?>" class="img-responsive" width="50%"  alt="">
                <h4 class="text-uppercase"><?= $row->division ?></h4>
                <p><?= $row->description ?></p>
                <!-- <p><a href="/" class="lnk-primary learn-more">Learn More <i class="fa fa-angle-right"></i></a></p> -->
              </div>
            </div>
          </div>
          <?php } ?>
        </div>


          <div class="row">
            <div class="col-md-12">
              <hr class="tall">
            </div>
          </div>

          <!-- start article -->
          <div class="row">
            <div class="col-md-12">

              <center>
                <h2>Artikel Terbaru</h2>
              </center>

              <div class="owl-carousel owl-theme" data-plugin-options='{"responsive": {"0": {"items": 1}, "479": {"items": 1}, "768": {"items": 2}, "979": {"items": 3}, "1199": {"items": 4}}, "items": 4, "margin": 10, "loop": false, "nav": false, "dots": true}'>
                <?php
                foreach ($article as $row) {
                  $time = new DateTime($row->date);
                  ?>
                  <div class="recent-posts">
                    <article class="post clearfix">
                      <div class="date">
                        <span class="day"><?= $time->format('d') ?></span>
                        <span class="month"><?= $time->format('H:i') ?></span>
                      </div>
                      <h4 class="heading-primary">
                        <a href="<?= base_url() ?>Article/view/<?= $row->id_article ?>"><?= $row->title ?></a>
                      </h4>

                      <div class="image-container-post">
                        <img src="<?= base_url().'assets/upload/article/' . $row->id_article . '/' .$row->image ?>" alt="Image Article">
                      </div>
                      <p class="text-preview-home">
                        <?= strip_tags($row->posting) ?>
                      </p>
                      <div class="pull-right">
                        <a href="<?= base_url() ?>Article/view/<?= $row->id_article ?>" class="">
                          selengkapnya
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </article>
                  </div>
                  <?php } ?>
                </div>

                <center>
                  <a href="<?= base_url() ?>Article" class="btn btn-primary">
                    Lihat Semua Artikel
                  </a>
                </center>

              </div>
            </div>
            <!-- end article -->
            <div class="row">
              <div class="col-md-12">
                <hr class="tall">
              </div>
            </div>
            <!-- start tutorial -->
            <div class="row">
              <div class="col-md-12">

                <center>
                  <h2>Video Terbaru</h2>
                </center>

                <!-- Modal Video -->
                <div class="modal fade" ng-click="videoPlayer.stopVideo()" ng-repeat="li in videos" id="modal-video{{ li.id.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                          <youtube-video class="embed-responsive-item" video-id="li.id.videoId" player="videoPlayer"></youtube-video>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3" ng-repeat="li in videos">

                    <div class="panel panel-default video-card">

                      <!-- Modal Video Trigger  -->
                      <div class="panel-heading">
                        <a data-toggle="modal" href="#modal-video{{ li.id.videoId }}">
                          <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
                          <div class="play">
                            <i class="fa fa-play-circle"></i>
                          </div>
                          <div class="blur"></div>
                        </a>
                      </div>

                      <div class="panel-body">
                        <b data-toggle="tooltip" data-placement="bottom" title="{{ li.snippet.title }}">{{ li.snippet.title }}</b>
                      </div>
                    </div>
                  </div>
                </div>

                <center>
                  <a href="<?= base_url() ?>Tutorial" class="btn btn-primary">
                    Lihat Semua Tutorial
                  </a>
                </center>

              </div>

            </div>
            <!-- end tutorial -->
            <div class="row">
              <div class="col-md-12">
                <hr class="tall">
              </div>
            </div>
            <!-- start gallery -->
            <div class="row">
              <div class="col-md-12">

                <center>
                  <h2>Galeri Terbaru</h2>
                </center>

                <div class="row">
                  <ul class="image-gallery sort-destination full-width">
                    <?php
                    foreach ($gallery as $row) {
                      $time = new DateTime($row->date);
                      ?>
                      <li class="isotope-item">
                        <div class="image-gallery-item">
                          <a href="" data-toggle="modal" data-target="#modal-show-<?= $row->id_gallery ?>" data-whatever="@fat">
                            <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                              <span class="thumb-info-wrapper">
                                <div class="image-container">
                                  <img src="<?= base_url().'assets/upload/gallery/'.$row->image ?>" class="img-responsive" alt="Image Gallery">
                                </div>
                                <span class="thumb-info-title">
                                  <span class="thumb-info-inner"><?= $row->title ?></span>
                                  <span class="thumb-info-inner date">
                                    <i class="fa fa-calendar"></i>
                                    <?= $time->format('d/m/Y'); ?>
                                  </span>
                                </span>
                                <span class="thumb-info-action">
                                  <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                </span>
                              </span>
                            </span>
                          </a>
                        </div>
                        <!-- Modal Structure -->

                        <div class="modal fade" id="modal-show-<?= $row->id_gallery ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <img src="<?= base_url().'assets/upload/gallery/'.$row->image ?>" class="img-responsive">
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end modal -->

                      </li>
                      <?php } ?>
                    </ul>

                  </div>

                  <center>
                    <a href="<?= base_url() ?>Gallery" class="btn btn-primary">
                      Lihat Semua Galeri
                    </a>
                  </center>

                </div>
              </div>
              <!-- end gallery -->

              <div class="row">
                <div class="col-md-12">
                  <hr class="tall">
                </div>
              </div>

              <!-- start activity  -->
              <div class="row">

                <center>
                  <h2>Kegiatan Kami</h2>
                </center>

                <div class="col-md-12">

                  <div class="row row-match">
                    <?php $i = 1; foreach ($activity as $row) { ?>
                      <div class="col-md-3 col-sm-6">
                        <div class="featured-box featured-box-primary col-match">
                          <div class="box-content" align="center">
                            <img src="<?= base_url() ?>assets/upload/activity/<?= $row->image ?>" class="img-responsive" width="50%"  alt="">
                            <h4><?= $row->activity ?></h4>
                            <p><?= $row->description ?></p>
                            <!-- <p><a href="/" class="lnk-primary learn-more">Learn More <i class="fa fa-angle-right"></i></a></p> -->
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <!-- end activity  -->
            </div>
          </div>
