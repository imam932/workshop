<script>
  var playlistId = "<?= $playlistId ?>"
</script>

<div class="row" ng-controller="viewPlaylist">
  <div class="col-md-12">

    <!-- Playlist Header  -->
      <div class="row">
        <div class="col-md-2">
          <img src="{{ playlist.snippet.thumbnails.high.url }}" class="img-responsive">
        </div>
        <div class="col-md-10">
          <h3>{{ playlist.snippet.title }}</h3>
          <h5>
            <i class="fa fa-calendar"></i>
            {{ playlist.snippet.publishedAt | date:"dd/MM/yyyy" }}
          </h5>
          <h6>{{ playlist.snippet.description }}</h6>
        </div>
      </div>
    <hr>

    <!-- Pencarian  -->
    <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Mode Tampilan</label>
          <select class="form-control" ng-model="viewMode">
            <option value="grid">Grid</option>
            <option value="list">List</option>
          </select>
        </div>
      </div>
    </div>

    <hr>

    <!-- Modal Video -->
    <div class="modal fade" ng-repeat="li in videos" id="modal-video{{ li.snippet.resourceId.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="embed-responsive embed-responsive-16by9">
              <youtube-video class="embed-responsive-item" video-id="li.snippet.resourceId.videoId" player="videoPlayer"></youtube-video>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="videoPlayer.stopVideo()">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Result  -->

    <!-- Grid View  -->
    <div class="row" ng-show="viewMode == 'grid'">
      <div class="col-md-3" ng-repeat="li in videos">

        <div class="panel panel-default video-card">

          <!-- Modal Video Trigger  -->
          <div class="panel-heading">
            <a data-toggle="modal" href="#modal-video{{ li.snippet.resourceId.videoId }}">
              <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
              <div class="play">
                <i class="fa fa-play-circle"></i>
              </div>
              <div class="blur"></div>
            </a>
          </div>

          <div class="panel-body">
            <b data-toggle="tooltip" data-placement="bottom" title="{{ li.snippet.title }}">{{ li.snippet.title }}</b>
          </div>
        </div>
      </div>
    </div>

    <!-- List View  -->
    <div class="row" ng-show="viewMode == 'list'">
      <div class="col-md-12" ng-repeat="li in videos">

        <div class="row">
            <div class="col-md-1">
              <h2>{{ $index + 1 }}</h2>
            </div>
            <div class="col-md-1">
              <a data-toggle="modal" href="#modal-video{{ li.snippet.resourceId.videoId }}">
                <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
              </a>
            </div>
            <div class="col-md-7">
              <a data-toggle="modal" href="#modal-video{{ li.snippet.resourceId.videoId }}">{{ li.snippet.title }}</a> <br>
              <span>
                <i class="fa fa-calendar"></i>
                <span>{{ li.snippet.publishedAt | date:"dd/MM/yyyy" }}</span>
              </span>
            </div>
            <div class="col-md-3">
              <span class="pull-right">
                <span>{{ li.contentDetails.duration | durationFormat }}</span>
              </span>
            </div>
        </div>
        <hr>

      </div>

    </div>

    <!-- load more and not found  -->
    <div ng-show="videos.length == 0">
      <br>
      <center>
        <h2>
          <i class="fa fa-frown-o"></i>
          Tutorial Tidak Ditemukan
        </h2>
      </center>
    </div>

    <center>
      <button type="button" class="btn btn-primary" ng-click="search(data.nextPageToken)" ng-show="data.hasOwnProperty('nextPageToken')">
        Tampilkan Lebih Banyak
      </button>
    </center>

  </div>
</div>
