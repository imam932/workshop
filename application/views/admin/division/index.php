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
			<div class="col-lg-12">

        <a href="<?= base_url() ?>admin/Division/store" class="btn btn-primary">Create New</a> <br><br>

				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Division</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no = 1;
						foreach ($division as $row) {
							?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $row->division ?></td>
									<td>
										<div class="btn-group btn-group-sm">

                      <a href="<?=base_url()?>admin/Division/edit/<?=$row->id_division?>" class="btn btn-primary btn-sm">
												Edit
											</a>

                      <a href="<?=base_url()?>admin/Division/delete/<?=$row->id_division?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Division ?')">
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
