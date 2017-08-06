<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
		<?php } ?>

		<div class="row">
			<div class="col-lg-6">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($category as $row) {
							?>
								<tr>
									<td><?= $no++; ?></td>
									<td>
										<form id="form<?=$row->id_category?>" action="<?=base_url()?>admin/Category/edit/<?=$row->id_category?>" method="post">
											<div class="form-group <?= empty(form_error('category')) || set_value('id_category') != $row->id_category ? '' : 'has-error'  ?>">
                        <input type="hidden" name="id_category" value="<?= $row->id_category ?>">
												<input type="text" class="form-control" name="category" placeholder="Category" value="<?= set_value('id_category') == $row->id_category ? set_value('category', $row->category) : $row->category ?>">
												<span class="hidden"><?= $row->category; ?></span>
                        <div class="form-error"><?= empty(form_error('category')) || set_value('id_category') != $row->id_category ? '' : form_error('category') ?></div>
											</div>
										</form>
									</td>
									<td>
										<div class="btn-group btn-group-sm">
											<input form="form<?=$row->id_category?>" type="submit" value="Edit" class="btn btn-primary">
											<a href="<?=base_url()?>admin/Category/delete/<?=$row->id_category?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Category ?')">
												Delete
											</a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- panel left -->
				<div class="col-lg-6">
					<h4>Create New Category</h4>
					<form class="" action="<?= base_url(); ?>admin/Category/store" method="post">
						<div class="input-group <?= empty(form_error('category')) || !empty(set_value('id_category')) ? '' : 'has-error' ?>">
							<input type="text" class="form-control" placeholder="Category" name="category" value="<?= set_value('category') ?>">
							<span class="input-group-btn">
								<button class="btn btn-primary" name="submit">Submit</button>
							</span>
						</div>
            <div class="form-error"><?= empty(form_error('category')) || !empty(set_value('id_category')) ? '' : form_error('category') ?></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
