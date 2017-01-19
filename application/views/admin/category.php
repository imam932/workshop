<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($error)) { ?>
			<div class="alert alert-danger alert-link"><?=$error?></div>
		<?php } ?>

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
							<th>Aksi</th>
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
										<form id="form<?=$row->id_category?>" action="<?=base_url()?>admin/Category/editCategory/<?=$row->id_category?>" method="post">
											<div class="form-group">
												<input type="text" class="form-control" name="category" value="<?= $row->category; ?>">
												<span class="hidden"><?= $row->category; ?></span>
											</div>
										</form>
									</td>
									<td>
										<div class="btn-group btn-group-sm">
											<input form="form<?=$row->id_category?>" type="submit" value="Edit" class="btn btn-primary">
											<a href="<?=base_url()?>admin/Category/deleteCategory/<?=$row->id_category?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Category ?')">
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
					<form class="" action="<?= base_url(); ?>admin/Category/newCategory" method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Category" name="category">
							<span class="input-group-btn">
								<button class="btn btn-primary" name="submit">Add</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
