<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<p>
			<a href="<?= base_url().'admin/User/New' ?>" class="btn btn-primary btn-sm"> New User</a>
		</p> <br>

		<div class="row">
			<div class="col-lg-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Genre</th>
							<th>Birth</th>
							<th>address</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no =1;
						foreach ($user as $row) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row->name ?></td>
								<td><?php
								if ($row->gender == 1) {
									echo "Laki laki";
								}else {
									echo "Perempuan";
								}
								?></td>
								<td><?= $row->birth ?></td>
								<td><?= $row->address ?></td>
								<td><?= $row->phone ?></td>
								<td>
									<a href="<?= base_url().'admin/User/Edituser/'.$row->id_user ?>" class="btn btn-primary btn-sm">
										Edit
									</a>
									<a href="<?= base_url().'admin/User/Deleteuser/'.$row->id_user ?>" class="btn btn-danger btn-sm">
										Delete
									</a>
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
