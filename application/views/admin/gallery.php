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
              <input class="search form-control" placeholder="search gallery">
            </div>

            <div class="list row">
              <?php foreach ($gallery as $row) {
                $time = new DateTime($row->date);
                ?>
                <div class="col-md-4">
                  <div class="image-container">
                    <img src="<?= base_url() ?>assets/upload/<?=$row->image;?>" alt="">
                  </div>
                  <div class="panel-footer">
                    <div class="gallery-description">
                      <time class="date">
                        <span>
                          <i class="fa fa-calendar"></i>
                          <?= $time->format('d/m/Y') ?>
                        </span>
                        <span>
                          <i class="fa fa-clock-o"></i>
                          <?= $time->format('H:i') ?>
                        </span>
                      </time>
                    </div>
                    <div class="gallery-name">
                      <span class="title"><?=$row->title;?></span>
                    </div>
                    <div class="btn-group" role="group" aria-label="...">
                      <a class="btn btn-primary" href="<?=base_url()?>admin/Gallery/editGallery/<?=$row->id_gallery?>">Edit</a>
                      <a class="btn btn-danger" href="<?=base_url()?>admin/Gallery/deleteGallery/<?=$row->id_gallery?>" onclick="return confirm('Delete gallery ?')">Delete</a>
                    </div>
                  </div>
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
                  <b>Add New Image Gallery</b>
                </div>
                <form class="" action="<?=base_url()?>admin/Gallery/newGallery" method="post" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="form-group">
                      <input type="text" name="title" class="form-control" id="" placeholder="Title Gallery">
                    </div>
                    <div class="form-group">
                      <input type="file" name="image" class="form-control" id="" placeholder="Image Gallery">
                    </div>
                    <div class="form-group">
                      <textarea name="description" rows="5" class="form-control" placeholder="Description..."></textarea>
                    </div>

                    <input type="submit" name="" value="Add" class="btn btn-primary">
                  </div>
                </form>
              </div>

              <div class="list-group">
                <h5 class="list-group-item header">Order By</h5>
                <a href="#" class="list-group-item sort-gallery active">date</a>
                <a href="#" class="list-group-item sort-gallery">title</a>
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
    </div>
