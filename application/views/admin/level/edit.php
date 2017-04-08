<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
		<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Level/edit/<?= $level->id_level ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">
					<div class="form-group">
						<label for="level">Level</label>
						<input type="text" class="form-control" id="level" name="level" placeholder="Level" value="<?= $level->level ?>">
					</div>

					<div class="form-group">
						<label>Allow to Access</label> <br>
						<?php foreach ($module as $row_module) {
							$checked = "";
							foreach ($privilege as $row_privilege) {
								if($row_privilege->id_module == $row_module->id_module) {
									$checked = "checked";
									break;
								}
							}
						?>
							<label for="<?= $row_module->module ?>">
								<input type="checkbox" name="enabled_module[]" id="<?= $row_module->module ?>" value="<?= $row_module->id_module ?>" <?= $checked ?>>
								<?= $row_module->module ?>
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
