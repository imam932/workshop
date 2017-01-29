<div class="row">
  <div class="col-md-8" id="article">

    <div class="form-group">
      <input class="search form-control" placeholder="Search Article" />
    </div>


    <div class="list">
      <?php foreach ($article as $row) {
        $time = new DateTime($row->date);
        ?>
        <div class="row article-row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="image-container">
                  <img src="<?= base_url() ?>assets/upload/article/<?= $row->image ?>" alt="">
                </div>
              </div>

              <div class="col-md-8 col-sm-8 col-xs-12">
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
                    <i class="fa fa-tag"></i>
                    <span class="category"><?= $row->category ?></span>
                  </span>
                </div>
                <p class="text-preview">
                  <?= strip_tags($row->posting) ?>
                </p>

                <a href="<?= base_url() ?>Article/view/<?= $row->id_article ?>" class="btn btn-primary">Read more</a>
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
        <h5 class="list-group-item header">View By Category</h5>
        <a href="#" class="list-group-item filter-article-category active">all category</a>
        <?php foreach ($category as $row) { ?>
          <a href="#" class="list-group-item filter-article-category"><?= $row->category ?></a>
        <?php } ?>
      </div>

      <div class="list-group">
        <h5 class="list-group-item header">Order By</h5>
        <a href="#" class="list-group-item sort-article active">date</a>
        <a href="#" class="list-group-item sort-article">title</a>
        <a href="#" class="list-group-item sort-article">category</a>
      </div>

      <div class="form-group">
        <select class="form-control" id="select-orderArticle">
          <option value="asc">Ascending</option>
          <option value="desc" selected>Descending</option>
        </select>
      </div>
    </div>
  </div>
