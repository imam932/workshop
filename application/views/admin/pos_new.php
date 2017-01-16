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
									<button type="button" onclick="history.go(-1);" class="btn btn-pos btn-sm">Kembali</button>
								</p>
							</li>
						</ol>
						<div class="col-lg-9">

							<div class="form-group">
								<input type="text" name="judul_artikel" class="form-control" id="" placeholder="Judul Artikel">
							</div>
							<div class="form-group">
								<textarea name="" class="form-control summernote"></textarea>
							</div>

							<div class="right">	
								<input type="submit" name="simpan" id="input" class="btn btn-primary" value="Upload">
								<input type="reset" name="Reset" id="input" class="btn btn-warning" value="Batal">
							</div>

						</div>
						<!-- panel left -->
						<div class="col-lg-3">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="form-group">
											<select class="form-control" name="">
												<option value="">Kategori</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										TAG
									</div>
								</div>
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