<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
		<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Division/store" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5">
							<div class="form-group <?= empty(form_error('division')) ? '' : 'has-error' ?>">
								<input type="text" name="division" class="form-control" id="" placeholder="Division Name" value="<?= set_value('division') ?>">
							  <div class="form-error"><?= form_error('division') ?></div>
              </div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="form-group <?= empty($upload_error) ? '' : 'has-error' ?>">
								<input type="file" class="form-control" name="image">
                <div class="form-error"><?= $upload_error ?></div>
              </div>
						</div>
					</div>

					<div class="form-group <?= empty(form_error('description')) ? '' : 'has-error' ?>">
						<textarea name="description" class="form-control ckeditor"><?= set_value('description') ?></textarea>
            <div class="form-error"><?= form_error('description') ?></div>
          </div>

					<div class="right">
						<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
						<a href="<?= base_url() ?>admin/Division" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
