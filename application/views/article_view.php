<?php $time = new DateTime($article[0]->date); ?>

<div class="row">
  <div class="col-md-9 article-view">

    <h1><?= $article[0]->title ?></h1>
    <img src="<?= base_url() ?>assets/upload/article/<?= $article[0]->image ?>" class="pull-left">
    <p>
      <?= $article[0]->posting ?>
    </p>

    <ol class="breadcrumb">
      <span>
        <i class="fa fa-calendar"></i>
        <?= $time->format('d/m/Y') ?>
      </span>

      <span>
        <i class="fa fa-clock-o"></i>
        <?= $time->format('H:i') ?>
      </span>

      <span>
        <i class="fa fa-tag"></i>
        <?= $article[0]->category ?>
      </span>

      <span>
        <i class="fa fa-pencil"></i>
        <?= $article[0]->name ?>
      </span>
    </ol>
  </div>

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Artikel Terkait</h3>
      </div>
      <div class="panel-body">
        <?php
        if(sizeof($related) > 0)
        {
          $i = 1;
          foreach ($related as $row) {
            $time = new DateTime($row->date);
        ?>
          <div class="row article-row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 col-sm-4 col-xs-12">
                  <div class="image-container">
                    <img src="<?= base_url() ?>assets/upload/article/<?= $row->image ?>" alt="">
                  </div>
                </div>

                <div class="col-md-12 col-sm-8 col-xs-12">
                  <br>
                  <h6 class="title"><?= $row->title ?></h6>
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
                  </div>
                  <p class="text-preview">
                    <?= strip_tags($row->posting) ?>
                  </p>

                  <a href="<?= base_url() ?>Article/view/<?= $row->id_article ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
              <?php if($i < sizeof($related)) { ?>
              <hr>
              <?php } ?>
            </div>
          </div>
        <?php $i++; } } else { echo "No Related Article"; } ?>
      </div>
    </div>
  </div>
</div>
