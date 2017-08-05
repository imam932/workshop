<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
			<?php } ?>

			<form method="post" action="<?=base_url()?>admin/Article/edit/<?= $article[0]->id_article ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9 col-xs-12 col-sm-12">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-5">
								<div class="form-group">
									<input type="text" name="title" class="form-control" id="" placeholder="Title" value="<?= is_null($old['title']) ? $article[0]->title : $old['title'] ?>">
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-3">
								<div class="form-group">
									<select class="form-control" name="id_category">
										<option selected disabled>Select Category</option>
										<?php
                    $id_category = is_null($old['id_category']) ? $article[0]->id_category : $old['id_category'];
                    foreach ($category as $row) {
                      $selected = $row->id_category == $id_category ? "selected" : "" ?>
											<option value="<?= $row->id_category ?>" <?= $selected ?>><?= $row->category ?></option>
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
								<textarea name="posting" class="form-control ckeditor"><?= is_null($old['posting']) ? $article[0]->posting : $old['posting'] ?></textarea>
							</div>

							<div class="right">
								<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Submit">
								<a href="<?= base_url('admin/Article') ?>" class="btn btn-danger">Cancel</a>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 col-lg-3">
							<img src="<?= base_url() ?>assets/upload/article/<?= $article[0]->image ?>">
						</div>
					</form>
				</div>
			</div>
