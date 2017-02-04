<?php $time = new DateTime($tutorial[0]->date); ?>

<div class="row">
  <div class="col-md-9 article-view">

    <h1><?= $tutorial[0]->title ?></h1>
    <img src="<?= base_url() ?>assets/upload/tutorial/<?= $tutorial[0]->image ?>" class="pull-left">
    <p>
      <?= $tutorial[0]->description ?>
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
        <i class="fa fa-shield"></i>
        <?= $tutorial[0]->division ?>
      </span>

      <span>
        <i class="fa fa-pencil"></i>
        <?= $tutorial[0]->name ?>
      </span>
    </ol>
  </div>

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Tutorial Terkait</h3>
      </div>
      <div class="panel-body">
        <?php
        if(sizeof($related) > 0)
        {
          $i = 1;
          foreach ($related as $row) {
        ?>
          <div class="row article-row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 col-sm-4 col-xs-12">
                  <div class="image-container">
                    <img src="<?= base_url() ?>assets/upload/tutorial/<?= $row->image ?>" alt="">
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
                    <?= strip_tags($row->description) ?>
                  </p>

                  <a href="<?= base_url() ?>Tutorial/view/<?= $row->id_tutorial ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
              </div>
              <?php if($i < sizeof($related)) { ?>
              <hr>
              <?php } ?>
            </div>
          </div>
        <?php $i++; } } else { echo "No Related Tutorial"; } ?>
      </div>
    </div>
  </div>
</div>
