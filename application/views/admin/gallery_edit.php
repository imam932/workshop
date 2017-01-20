<div class="row">
  <div class="col-lg-12">

    <?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

    <form action="<?= base_url() ?>admin/Gallery/editGallery/<?= $gallery[0]->id_gallery ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-5">
          <img src="<?=base_url()?>assets/upload/<?= $gallery[0]->image ?>">
        </div>

        <div class="col-lg-5">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" value="<?= $gallery[0]->title ?>" placeholder="Title" name="title">
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description"><?= $gallery[0]->description ?></textarea>
          </div>

          <div class="form-group">
            <label for="image">Change Image</label>
            <div class="input-group">
              <input type="file" class="form-control" placeholder="" name="image" id="image">
              <span class="input-group-btn">
                <button type="button" class="btn btn-danger" id="clearImage">Clear</button>
              </span>
            </div>
            <p class="help-block">leave blank to keep image</p>
          </div>

          <input type="submit" class="btn btn-primary" value="Save">
          <a href="<?= base_url() ?>admin/Gallery" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
