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
              <input class="search form-control" placeholder="Cari Galeri">
            </div>

            <div class="list row">
              <?php foreach ($gallery as $row) {
                $time = new DateTime($row->date);
                ?>
                <div class="col-md-4">
                  <div class="image-gallery-item">
                    <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                      <a href="" data-toggle="modal" data-target="#modal-show-<?= $row->id_gallery ?>" data-whatever="@fat">
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
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel"><?= $row->title ?></h4>
                        </div>
                        <div class="modal-body">
                          <img src="<?= base_url().'assets/upload/'.$row->image ?>" class="img-responsive">

                        </div>
                        <div class="modal-footer">
                          <p><?= $row->description ?></p>
                        </div>
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
              <div class="list-group">
                <h5 class="list-group-item header">Urutkan Berdasarkan</h5>
                <a href="#" class="list-group-item sort-gallery active" data-target="date">tanggal</a>
                <a href="#" class="list-group-item sort-gallery" data-target="title">judul</a>
              </div>

              <div class="form-group">
                <select class="form-control" id="select-orderGallery">
                  <option value="asc">Ascending</option>
                  <option value="desc" selected>Descending</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
