<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<form method="post" action="<?=base_url()?>admin/Article/store" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5">
							<div class="form-group <?= empty(form_error('title')) ? '' : 'has-error' ?>">
								<input type="text" name="title" class="form-control" id="" placeholder="Title" value="<?= set_value('title') ?>">
							  <div class="form-error"><?= form_error('title') ?></div>
              </div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-3">
							<div class="form-group <?= empty(form_error('id_category')) ? '' : 'has-error' ?>">
								<select class="form-control" name="id_category">
									<option selected disabled>Select Category</option>
									<?php foreach ($category as $row) {
                    $selected = $row->id_category == set_value('id_category') ? "selected" : "";
                    ?>
									<option value="<?= $row->id_category ?>" <?= $selected ?>><?= $row->category ?></option>
									<?php } ?>
								</select>
                <div class="form-error"><?= form_error('id_category') ?></div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="form-group <?= empty($upload_error) ? '' : 'has-error' ?>">
								<input type="file" class="form-control" name="image">
                <div class="form-error">
                  <?= $upload_error ?>
                </div>
							</div>
						</div>
					</div>

					<div class="form-group <?= empty(form_error('title')) ? '' : 'posting' ?>">
						<textarea name="posting" class="form-control ckeditor"><?= set_value('posting') ?></textarea>
            <div class="form-error"><?= form_error('posting') ?></div>
          </div>

					<div class="right">
						<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
						<a href="<?= base_url() ?>admin/Article" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
