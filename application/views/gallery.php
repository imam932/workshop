<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">

    <?php if(isset($error)) { ?>
      <div class="alert alert-danger alert-link"><?=$error?></div>
      <?php } ?>

      <?php if(isset($message)) { ?>
        <div class="alert alert-success alert-link"><?=$message?></div>
        <?php } ?>

        <div class="row">
          <!-- panel left -->
          <div class="col-lg-8" id="gallery">

            <div class="form-group">
              <input class="search form-control" placeholder="search gallery" onkey="alert('reset')">
            </div>

            <div class="list row">
              <?php foreach ($gallery as $row) {
                $time = new DateTime($row->date);
                ?>
                <div class="col-md-4">
                  <div class="image-gallery-item">
                    <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                      <a href="<?= $row->id_gallery ?>" data-toggle="modal" data-target="#modal-show-<?= $row->id_gallery ?>">
                        <span class="thumb-info-wrapper">
                          <div class="image-container">
                            <img src="<?= base_url().'assets/upload/'.$row->image ?>" class="img-responsive" alt="">
                          </div>
                          <span class="thumb-info-title">
                            <span class="thumb-info-inner title"><?= $row->title ?></span>
                            <span class="thumb-info-inner date">
                              <i class="fa fa-calendar"></i>
                              <?= $time->format('d/m/Y'); ?>
                            </span>
                          </span>
                        </a>
                        <span class="thumb-info-action">
                          <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                        </span>
                      </span>
                    </span>
                  </div>
                  <!-- Modal Structure -->

                  <div class="modal fade" id="modal-show-<?= $row->id_gallery ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <h2><?= $row->title ?></h2>

                        <img src="<?= base_url().'assets/upload/'.$row->image ?>" class="img-responsive">

                        <p><?= $row->description ?></p>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                </div>

                <?php } ?>
              </div>

              <ul class="pagination">

              </ul>
            </div>
            <!-- panel right -->
            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <b>Side Menu</b>
                </div>
                <div class="panel-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
