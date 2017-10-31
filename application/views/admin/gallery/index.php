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
                    <img src="<?= base_url() ?>assets/upload/gallery/<?=$row->image;?>" alt="">
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
                      <a class="btn btn-primary" href="<?=base_url()?>admin/Gallery/edit/<?=$row->id_gallery?>">Edit</a>
                      <a class="btn btn-danger" href="<?=base_url()?>admin/Gallery/delete/<?=$row->id_gallery?>" onclick="return confirm('Delete gallery ?')">Delete</a>
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
                <div class="panel-body">
                  <form action="<?=base_url()?>admin/Gallery/store" method="post" enctype="multipart/form-data">

                    <div class="form-group <?= empty(form_error('title')) ? '' : 'has-error' ?>">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title Gallery" value="<?= set_value('title') ?>">
                      <div class="form-error"><?= form_error('title') ?></div>
                    </div>

                    <div class="form-group <?= empty($upload_error) ? '' : 'has-error' ?>">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control" id="image" placeholder="Image Gallery">
                      <div class="form-error"><?= $upload_error ?></div>
                    </div>

                    <div class="form-group <?= empty(form_error('description')) ? '' : 'has-error' ?>">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" rows="5" class="form-control" placeholder="Description"><?= set_value('description') ?></textarea>
                      <div class="form-error"><?= form_error('description') ?></div>
                    </div>

                    <input type="submit" name="" value="Submit" class="btn btn-primary">
                  </form>
                </div>
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
