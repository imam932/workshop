<div class="row" ng-controller="playlist">
  <div class="col-md-12">

    <!-- Pencarian  -->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Pencarian</label>
          <input class="search form-control" placeholder="Cari Playlist" ng-model="cari.snippet.title" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="">Urutkan Berdasarkan</label>
          <select class="form-control" ng-model="orderName">
            <option value="snippet.publishedAt">Tanggal</option>
            <option value="snippet.title">Nama</option>
          </select>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="">Urutkan Secara</label>
          <select class="form-control" ng-model="orderDesc" ng-options="item.value as item.label for item in [{label:'Ascending', value:false}, {label:'Descending', value:true}]"></select>
        </div>
      </div>
    </div>

    <hr>

    <!-- Video Result  -->
    <div class="row">
      <div class="col-md-3" ng-repeat="li in videos | filter:cari | orderBy:orderName:orderDesc | startFrom:(currentPage - 1) * entryLimit | limitTo:entryLimit">

        <!-- Modal Video -->
        <div class="modal fade" id="modal-video{{ li.id.videoId }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
        					<youtube-video class="embed-responsive-item" video-id="li.id.videoId" player="videoPlayer"></youtube-video>
        				</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" ng-click="videoPlayer.stopVideo()">Close</button>
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
