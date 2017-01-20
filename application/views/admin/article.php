<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">

		<p>
			<a href="<?= base_url().'admin/Article/New' ?>" class="btn btn-primary btn-sm"> Create New</a>
		</p> <br>

		<?php if(isset($message)) { ?>
			<div class="alert alert-success alert-link"><?=$message?></div>
		<?php } ?>
		
		<div class="col-lg-9">
			<?php foreach ($article as $row) {
				$time = new DateTime($row->date);
			?>
			<div class="row">
				<div class="panel panel-default article">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-11">
								<?= $row->title; ?>
							</div>
							<div class="col-lg-1">
								<a href="<?= base_url() ?>admin/Article/editArticle/<?= $row->id_article ?>">
									<i class="fa fa-edit"></i>
								</a>

								<a href="<?= base_url() ?>admin/Article/deleteArticle/<?= $row->id_article ?>" onclick="return confirm('Delete Article ?')">
									<i class="fa fa-trash-o"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<span>
							<i class="fa fa-calendar"></i>
							<?= $time->format('d/m/Y') ?>
						</span>

						<span>
							<i class="fa fa-clock-o"></i>
							<?= $time->format('H:i') ?>
						</span>

						<span>
							<i class="fa fa-tag"></i>
							<?= $row->category ?>
						</span>

						<span>
							<i class="fa fa-pencil"></i>
							<?= $row->name ?>
						</span>

						<span>
              <input type="checkbox" class="switch-art" checked>
            </span>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- panel left -->
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium voluptatibus necessitatibus nesciunt vero, ea omnis eveniet veniam accusamus magni consequuntur officiis ipsum repellat cum, neque optio aut harum pariatur earum.
				</div>
			</div>
		</div>
	</div>
</div>
</div>
