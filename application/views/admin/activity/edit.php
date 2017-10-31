<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
			<?php } ?>

			<form method="post" action="<?=base_url()?>admin/Activity/edit/<?= $activity->id_activity ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9 col-xs-12 col-sm-12">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-5">
								<div class="form-group <?= empty(form_error('activity')) ? '' : 'has-error' ?>">
                  <label for="activity">Activity</label>
									<input type="text" name="activity" class="form-control" id="activity" placeholder="Activity Name" value="<?= set_value('activity', $activity->activity) ?>">
                  <div class="form-error"><?= form_error('activity') ?></div>
                </div>
							</div>

								<div class="col-xs-12 col-sm-12 col-md-4">
									<div class="form-group <?= empty($upload_error) ? '' : 'has-error' ?>">
                    <label for="image">Image</label>
										<div class="input-group">
										  <input type="file" class="form-control" name="image" id="image">
											<span class="input-group-btn">
				                <button type="button" class="btn btn-danger" id="clearImage">Clear</button>
				              </span>
										</div>
                    <div class="form-error"><?= $upload_error ?></div>
									</div>
								</div>
							</div>

							<div class="form-group <?= empty(form_error('description')) ? '' : 'has-error' ?>">
								<textarea name="description" class="form-control ckeditor"><?= set_value('description', $activity->description) ?></textarea>
                <div class="form-error"><?= form_error('description') ?></div>
              </div>

							<div class="right">
								<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
								<a href="<?= base_url('admin/Activity') ?>" class="btn btn-danger">Cancel</a>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-lg-3">
              <label>Previous Image</label>
							<img src="<?= base_url() ?>assets/upload/activity/<?= $activity->image ?>">
						</div>
					</form>
				</div>
			</div>
