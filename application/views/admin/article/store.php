<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

    <div id="error-message" class="alert alert-danger alert-link" style="display: none"></div>

		<form method="post" action="<?=base_url()?>admin/Article/store" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5">
							<div class="form-group <?= empty(form_error('title')) ? '' : 'has-error' ?>">
                <label for="title">Title</label>
								<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?= set_value('title') ?>">
							  <div class="form-error"><?= form_error('title') ?></div>
              </div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-3">
							<div class="form-group <?= empty(form_error('id_category')) ? '' : 'has-error' ?>">
                <label for="category">Category</label>
                <select class="form-control" name="id_category" id="category">
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
                <label for="image">Thumbnail Image</label>
                <input type="file" class="form-control" name="image" id="image">
                <div class="form-error">
                  <?= $upload_error ?>
                </div>
							</div>
						</div>
					</div>

					<div class="form-group <?= empty(form_error('title')) ? '' : 'posting' ?>">
						<textarea name="posting" class="form-control editor"><?= set_value('posting') ?></textarea>
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
