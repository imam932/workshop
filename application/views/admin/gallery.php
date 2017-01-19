<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">

    <?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
		<?php } ?>

    <!-- panel right -->
    <div class="col-lg-8">
      <?php foreach ($gallery as $row) { ?>
      <div class="col-md-4">
        <div class="image-container">
          <img src="<?= base_url() ?>assets/upload/<?=$row->image;?>" alt="">
        </div>
        <div class="panel-footer">
          <div class="gallery-name">
            <?=$row->title;?>
          </div>
          <div class="btn-group" role="group" aria-label="...">
            <a class="btn btn-primary" href="<?=base_url()?>admin/Gallery/editGallery/<?=$row->id_gallery?>">Edit</a>
            <a class="btn btn-danger" href="<?=base_url()?>admin/Gallery/deleteGallery/<?=$row->id_gallery?>" onclick="return confirm('Delete gallery ?')">Delete</a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- panel left -->
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
    </div>
  </div>
</div>
</div>
