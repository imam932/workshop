<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							POS <small><?= $this->session->userdata('logged_in')['username']; ?></small>
						</h1>
						<ol class="breadcrumb">
							<li class="active">
							<p>
								<button type="button" class="btn btn-pos btn-sm">POS Baru</button>
							</p>
							</li>
						</ol>
						<div class="col-lg-9">
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-lg-11">
											Judul artikel
										</div>
										<div class="col-lg-1">
											<i class="fa fa-edit"></i>
											<i class="fa fa-trash-o"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-lg-11">
											Judul artikel
										</div>
										<div class="col-lg-1">
											<i class="fa fa-edit"></i>
											<i class="fa fa-trash-o"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-lg-11">
											Judul artikel
										</div>
										<div class="col-lg-1">
											<i class="fa fa-edit"></i>
											<i class="fa fa-trash-o"></i>
										</div>
									</div>
								</div>
							</div>
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
		</div>
	</div>
</body>
</html>