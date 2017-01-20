<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

		<form method="post" action="<?=base_url()?>admin/Tutorial/editTutorial/<?= $tutorial[0]->id_tutorial ?>">
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
								<select class="form-control" name="id_category">
									<option selected disabled>Select Category</option>
									<?php foreach ($category as $row) {
										$selected = "";
										if($row->id_category == $tutorial[0]->id_category)
										$selected = "selected";
										?>
										<option value="<?= $row->id_category ?>" <?= $selected ?>><?= $row->category ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<textarea name="description" class="form-control summernote"><?= $tutorial[0]->description ?></textarea>
						</div>

						<div class="right">
							<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
							<a href="<?= base_url() ?>admin/Tutorial" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
