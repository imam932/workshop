<div class="row" ng-controller="playlist">
  <div class="col-md-12">

    <!-- Pencarian  -->
    <div class="row">

      <div class="col-md-3">
        <label for="">Menu</label>
        <ul class="nav nav-pills">
          <li id="playlist-menu">
            <a href="<?= base_url() ?>Tutorial/playlist">
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

      <!-- apabila sudah melebihi 50 <div class="col-md-6">
        <div class="form-group">
          <label for="">Pencarian</label>
          <input class="search form-control" placeholder="Cari Playlist" ng-model="cari" />
        </div>
      </div> -->

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

    <!-- Playlist Result  -->
    <div class="row">
      <div class="col-md-3" ng-repeat="li in playlist">

        <div class="panel panel-default video-card">

          <!-- Playlist Link  -->
          <div class="panel-heading">
            <!-- kalau sudah melebihi 50 video <a data-toggle="modal" href="<?= base_url() ?>Tutorial/viewPlaylist/{{ li.id.playlistId }}"> -->
            <a data-toggle="modal" href="<?= base_url() ?>Tutorial/viewPlaylist/{{ li.id }}">
              <img src="{{ li.snippet.thumbnails.high.url }}" alt="" class="img-responsive">
              <div class="play">
                <i class="fa fa-play-circle"></i>
              </div>
              <div class="blur"></div>
              <div class="detail">
                {{ li.contentDetails.itemCount }} <br>
                Video <br>
                <i class="fa fa-list"></i> <br>
              </div>
            </a>
          </div>

          <div class="panel-body">
            <b>{{ li.snippet.title }}</b>
          </div>
        </div>
      </div>

      <div ng-show="playlist.length == 0">
        <br>
        <center>
          <h2>
            <i class="fa fa-frown-o"></i>
            Playlist Tidak Ditemukan
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
</div>

<script type="text/javascript">
  document.getElementById('playlist-menu').className = "active";
</script>
