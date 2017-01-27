<?php $time = new DateTime($article[0]->date); ?>

<div class="row">
  <div class="col-md-8 article-view">

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
        <?= $time->format('h:i') ?>
      </span>

      <span>
        <i class="fa fa-pencil"></i>
        <?= $article[0]->name ?>
      </span>
    </ol>
  </div>

  <div class="col-md-4">
    sidebar
  </div>
</div>