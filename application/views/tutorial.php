<div class="row">
  <div class="col-md-8" id="article">

    <div class="form-group">
      <input class="search form-control" placeholder="Cari Tutorial" />
    </div>


    <div class="list">
      <?php foreach ($tutorial as $row) {
        $time = new DateTime($row->date);
      ?>
        <div class="row article-row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <div class="image-container">
                  <img src="<?= base_url() ?>assets/upload/tutorial/<?= $row->image ?>" alt="">
                </div>
              </div>

              <div class="col-md-8">
                <h4 class="title"><?= $row->title ?></h4>
                <div class="detail">
                  <time class="date">
                    <span>
                      <i class="fa fa-calendar"></i>
                      <?= $time->format('d/m/Y') ?>
                    </span>

                    <span>
                      <i class="fa fa-clock-o"></i>
                      <?= $time->format('H:i') ?>
                    </span>
                  </time>

                  <span>
                    <i class="fa fa-shield"></i>
                    <span class="category"><?= $row->division ?></span>
                  </span>
                </div>
                <p class="text-preview">
                  <?= strip_tags($row->description) ?>
                </p>

                <a href="<?= base_url() ?>Tutorial/view/<?= $row->id_tutorial ?>" class="btn btn-primary">Selengkapnya</a>
              </div>
            </div>
            <hr>
          </div>
        </div>
        <?php } ?>
      </div>
      <ul class="pagination"></ul>
    </div>

    <div class="col-md-4">
      <div class="list-group">
        <h5 class="list-group-item header">Pilih divisi</h5>
        <a href="#" class="list-group-item filter-article-category active" data-target="all division">semua divisi</a>
        <?php foreach ($division as $row) { ?>
          <a href="#" class="list-group-item filter-article-category" data-target="<?= $row->division ?>"><?= $row->division ?></a>
        <?php } ?>
      </div>

      <div class="list-group">
        <h5 class="list-group-item header">Urutkan Berdasarkan</h5>
        <a href="#" class="list-group-item sort-article active" data-target="date">tanggal</a>
        <a href="#" class="list-group-item sort-article" data-target="title">judul</a>
      </div>

      <div class="form-group">
        <select class="form-control" id="select-orderArticle">
          <option value="asc">Ascending</option>
          <option value="desc" selected>Descending</option>
        </select>
      </div>
    </div>
  </div>
