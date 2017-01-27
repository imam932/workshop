<div class="row">
  <div class="col-md-8" id="article">

    <div class="form-group">
      <input class="search form-control" placeholder="Search Tutorial" />
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
                  <span>
                    <i class="fa fa-calendar"></i>
                    <?= $time->format('d/m/Y') ?>
                  </span>
                  
                  <span>
                    <i class="fa fa-clock-o"></i>
                    <?= $time->format('h:i') ?>
                  </span>

                  <span>
                    <i class="fa fa-shield"></i>
                    <?= $row->division ?>
                  </span>
                </div>
                <p class="text-preview">
                  <?= strip_tags($row->description) ?>
                </p>

                <a href="<?= base_url() ?>Tutorial/view/<?= $row->id_tutorial ?>" class="btn btn-primary">Read more</a>
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
      sidebar
    </div>
  </div>