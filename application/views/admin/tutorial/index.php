<!-- Page Heading -->
<div class="row" ng-controller="tutorial">
	<div class="col-lg-12">

		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">
					<i class="fa fa-search"></i>
				</span>
				<input type="text" class="form-control" placeholder="Search Tutorial" ng-change="search()" ng-model="query">
			</div>
		</div>

		<div class="row">
			<div class="col-md-4" ng-repeat="li in videos">
				<div class="embed-responsive embed-responsive-16by9">
					<youtube-video class="embed-responsive-item" video-id="li.id.videoId"></youtube-video>
				</div>

				<br>

			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//apis.google.com/js/client:plusone.js"></script>
</div>

</div>
</div>
