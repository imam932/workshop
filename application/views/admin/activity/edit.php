<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
			<?php } ?>

			<form method="post" action="<?=base_url()?>admin/Activity/edit/<?= $activity[0]->id_activity ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9 col-xs-12 col-sm-12">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-5">
								<div class="form-group">
									<input type="text" name="activity" class="form-control" id="" placeholder="Activity Name" value="<?= $activity[0]->activity ?>">
								</div>
							</div>

								<div class="col-xs-12 col-sm-12 col-md-4">
									<div class="form-group">
										<div class="input-group">
										  <input type="file" class="form-control" name="image" id="image">
											<span class="input-group-btn">
				                <button type="button" class="btn btn-danger" id="clearImage">Clear</button>
				              </span>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<textarea name="description" class="form-control ckeditor"><?= $activity[0]->description ?></textarea>
							</div>

							<div class="right">
								<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
								<a href="#" onclick="history.go(-1)" class="btn btn-danger">Cancel</a>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-lg-3">
							<img src="<?= base_url() ?>assets/upload/activity/<?= $activity[0]->image ?>">
						</div>
					</form>
				</div>
			</div>
