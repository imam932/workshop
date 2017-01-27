<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<p>
			<a href="<?= base_url().'admin/Tutorial/New' ?>" class="btn btn-primary btn-sm"> Create New</a>
		</p> <br>

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
			<?php } ?>


			<div class="col-lg-9" id="article">

				<div class="form-group row">
					<input class="search form-control" placeholder="search tutorial" onkey="alert('reset')">
				</div>

				<div class="list">
					<?php foreach ($tutorial as $row) {
						$time = new DateTime($row->date);
						?>
						<div class="row">
							<div class="panel panel-default article">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<span class="title"><?= $row->title; ?></span>
											<div class="pull-right">
												<a href="<?= base_url() ?>admin/Tutorial/editTutorial/<?= $row->id_tutorial ?>">
													<i class="fa fa-edit"></i>
												</a>
												&nbsp;
												<a href="<?= base_url() ?>admin/Tutorial/deleteTutorial/<?= $row->id_tutorial ?>" onclick="return confirm('Delete Article ?')">
													<i class="fa fa-trash-o"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="panel-footer clearfix">
									<span>
										<i class="fa fa-calendar"></i>
										<?= $time->format('d/m/Y') ?>
									</span>

									<span>
										<i class="fa fa-clock-o"></i>
										<?= $time->format('H:i') ?>
									</span>

									<span>
										<i class="fa fa-shield"></i>
										<?= $row->division ?>
									</span>

									<span>
										<i class="fa fa-pencil"></i>
										<?= $row->name ?>
									</span>

									<div class="pull-right">
										<input type="checkbox" name="publish-tutorial" class="switch-art" id="<?= $row->id_tutorial ?>" <?php if($row->publish == true) echo "checked" ?>>
									</div>

								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<ul class="pagination">

					</ul>
				</div>
				<!-- panel Right -->
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-body">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium voluptatibus necessitatibus nesciunt vero, ea omnis eveniet veniam accusamus magni consequuntur officiis ipsum repellat cum, neque optio aut harum pariatur earum.
						</div>
					</div>
				</div>
			</div>
		</div>
