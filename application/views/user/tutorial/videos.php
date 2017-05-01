<div class="row" ng-controller="videos">
  <div class="col-md-12">

    <!-- Pencarian  -->
    <div class="row">
      <div class="col-md-3">
        <label for="">Menu</label>
        <ul class="nav nav-pills">
          <li id="playlist-menu">
            <a href="<?= base_url() ?>Tutorial/">
              <i class="fa fa-th-list"></i>
              Playlist
            </a>
          </li>
          <li id="video-menu">
            <a href="<?= base_url() ?>Tutorial/videos">
              <i class="fa fa-file-video-o"></i>
              Video
            </a>
          </li>
        </ul>

      </div>

      <div class="col-md-5">
        <div class="form-group">
          <label for="">Pencarian</label>
          <input class="search form-control" placeholder="Cari Video" ng-model="cari" />
        </div>
      </div>

      <div class="col-md-2">
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

      <div class="col-md-2">
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

    <!-- Video Result  -->

    <!-- Modal Video -->
    <div class="modal fade" ng-repeat="li in videos" id="modal-video{{ li.id.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

    <!-- Grid View  -->
    <div class="row" ng-show="viewMode == 'grid'">
      <div class="col-md-3" ng-repeat="li in videos">

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
    </div>

    <!-- List View  -->
    <div class="row" ng-show="viewMode == 'list'">
      <div class="col-md-12" ng-repeat="li in videos">

        <div class="row">
            <div class="col-md-1">
              <a data-toggle="modal" href="#modal-video{{ li.id.videoId }}">
                <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
              </a>
            </div>
            <div class="col-md-8">
              <a data-toggle="modal" href="#modal-video{{ li.id.videoId }}">{{ li.snippet.title }}</a> <br>
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
          Video Tidak Ditemukan
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

<script type="text/javascript">
  document.getElementById('video-menu').className = "active";
</script>
