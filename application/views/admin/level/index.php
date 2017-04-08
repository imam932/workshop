<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
		<?php } ?>

		<div class="row">
			<div class="col-lg-12">
				<a href="<?= base_url() ?>admin/Level/new" class="btn btn-primary">Create New</a> <br><br>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($level as $row) {
							?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->level; ?></td>
									<td>
										<div class="btn-group btn-group-sm">
											<a href="<?= base_url() ?>admin/Level/edit/<?= $row->id_level ?>" class="btn btn-primary">Edit</a>
											<a href="<?=base_url()?>admin/Level/delete/<?=$row->id_level?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Level ?')">
												Delete
											</a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
