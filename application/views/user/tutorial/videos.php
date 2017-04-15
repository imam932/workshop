<div class="row" ng-controller="videos">
  <div class="col-md-12">

    <!-- Pencarian  -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Pencarian</label>
          <input class="search form-control" placeholder="Cari Video" ng-model="cari" />
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Urutkan Berdasarkan</label>
          <select class="form-control" ng-model="orderName">
            <option value="date">Tanggal</option>
            <option value="title">Judul</option>
            <option value="rating">Rating</option>
            <option value="viewCount">Popularitas</option>
          </select>
        </div>
      </div>
    </div>

    <hr>

    <!-- Video Result  -->
    <div class="row">
      <div class="col-md-3" ng-repeat="li in videos">

        <!-- Modal Video -->
        <div class="modal fade" id="modal-video{{ li.id.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
        					<youtube-video class="embed-responsive-item" video-id="li.id.videoId" player="videoPlayer"></youtube-video>
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
