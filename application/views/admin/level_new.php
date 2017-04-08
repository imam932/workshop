<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
		<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Level/new" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">
					<div class="form-group">
						<label for="level">Level</label>
						<input type="text" class="form-control" id="level" name="level" placeholder="Level">
					</div>

					<div class="form-group">
						<label>Allow to Access</label> <br>
						<?php foreach ($module as $row) { ?>
							<label for="<?= $row->module ?>">
								<input type="checkbox" name="enabled_module[]" id="<?= $row->module ?>" value="<?= $row->id_module ?>" checked>
								<?= $row->module ?>
							</label>

							&nbsp;
						<?php } ?>
					</div>

					<div class="form-group">
					  <input type="submit" class="btn btn-primary" value="submit">
					  <button type="button" class="btn btn-danger" onclick="location='<?= base_url() ?>admin/Level'">cancel</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
