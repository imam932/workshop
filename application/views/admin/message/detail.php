<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class=" col-md-6">

            <label class="panel-title"><?= $message->name ?></label> > <?= $message->email ?>
          </div>

          <div class="col-md-6" align="right">
            <i class="fa fa-calendar"></i>
            <?php
            $time = new DateTime($message->date);
            echo $time->format('d-m-Y');
            ?>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <p><?= $message->message ?></p>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" onclick="window.history.back()" ><i class="fa fa-backward"></i> Back</button>
  </div>
</div>
