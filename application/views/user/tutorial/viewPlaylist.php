<script>
  var playlistId = "<?= $playlistId ?>"
</script>

<div class="row" ng-controller="viewPlaylist">
  <div class="col-md-12">

    <!-- Playlist Header  -->

    <hr>

    <!-- Video Result  -->
    <div class="row">
      <div class="col-md-3" ng-repeat="li in videos">

        <!-- Modal Video -->
        <div class="modal fade" id="modal-video{{ li.snippet.resourceId.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
            <b>{{ li.snippet.title }}</b>
          </div>
        </div>
      </div>

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
        <button type="button" class="btn btn-primary" ng-click="nextPage(data.nextPageToken)" ng-show="data.hasOwnProperty('nextPageToken')">
          Tampilkan Lebih Banyak
        </button>
      </center>

    </div>

  </div>
</div>
