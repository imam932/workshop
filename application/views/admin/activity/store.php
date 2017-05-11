<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
		<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Activity/store" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5">
							<div class="form-group">
								<input type="text" name="activity" class="form-control" id="" placeholder="Activity Name">
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="form-group">
								<input type="file" class="form-control" name="image">
							</div>
						</div>
					</div>

					<div class="form-group">
						<textarea name="description" class="form-control ckeditor"></textarea>
					</div>

					<div class="right">
						<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
						<a href="<?= base_url() ?>admin/Activity" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>