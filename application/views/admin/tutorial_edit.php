<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Tutorial/editTutorial/<?= $tutorial[0]->id_tutorial ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5">
							<div class="form-group">
								<input type="text" name="title" class="form-control" id="" placeholder="Title" value="<?= $tutorial[0]->title ?>">
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-3">
							<div class="form-group">
								<select class="form-control" name="id_division">
									<option selected disabled>Select Division</option>
									<?php foreach ($division as $row) {
										$selected = "";
										if($row->id_division == $tutorial[0]->id_division)
										$selected = "selected";
										?>
										<option value="<?= $row->id_division ?>" <?= $selected ?>><?= $row->division ?></option>
										<?php } ?>
									</select>
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
							<textarea name="description" class="form-control ckeditor"><?= $tutorial[0]->description ?></textarea>
						</div>

						<div class="right">
							<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
							<a href="<?= base_url() ?>admin/Tutorial" class="btn btn-danger">Cancel</a>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-lg-3">
						<img src="<?= base_url() ?>assets/upload/tutorial/<?= $tutorial[0]->image ?>">
					</div>
				</div>
			</form>
		</div>
	</div>
