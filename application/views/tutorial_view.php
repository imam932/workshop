<?php $time = new DateTime($tutorial[0]->date); ?>

<div class="row">
  <div class="col-md-8 article-view">

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

  <div class="col-md-4">

      <div class="list-group">
        <h5 class="list-group-item header">Related Tutorial</h5>
        <a href="#" class="list-group-item filter-category active">category</a>
        <?php foreach ($related as $row) { ?>
          <!-- <a href="#" class="list-group-item filter-category"><?= $row->category ?></a> -->
        <?php } ?>
      </div>
  </div>
</div>
