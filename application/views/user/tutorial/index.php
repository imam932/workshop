<div class="row" ng-controller="tutorial">
  <div class="col-md-12">

    <!-- Pencarian  -->
    <div class="form-group">
      <input class="search form-control" placeholder="Cari Tutorial" ng-model="cari.snippet.title" />
    </div>

    <!-- Video Result  -->
    <div class="row">
      <div class="col-md-3" ng-repeat="li in videos | filter:cari | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">

        <!-- Modal Video -->
        <div class="modal fade" id="modal-video{{ li.id.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
        					<youtube-video class="embed-responsive-item" video-id="li.id.videoId"></youtube-video>
        				</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default video-card">

          <!-- Modal Video Trigger  -->
          <div class="panel-heading">
            <a data-toggle="modal" href="#modal-video{{ li.id.videoId }}">
              <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
              <div class="play">
                <i class="fa fa-play-circle"></i>
              </div>
              <div class="blur"></div>
            </a>
          </div>

          <div class="panel-body">
            <b>{{ li.snippet.title }}</b>
          </div>
        </div>
      </div>
      <div ng-show="totalItems == 0">
        <br>
        <center>
          <h2>
            <i class="fa fa-frown-o"></i>
            Tutorial Tidak Ditemukan
          </h2>
        </center>
      </div>
    </div>

    <pagination page="currentPage" total-items="totalItems" items-per-page="entryLimit" ng-show="noOfPages > 1"></pagination>

  </div>
</div>
