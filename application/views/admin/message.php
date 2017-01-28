<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
      foreach ($message as $row) {
        $time = new DateTime($row->date);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="heading<?= $row->id_message ?>">
            <h4 class="panel-title">

              <a class="message-show" role="button" data-toggle="collapse" data-parent="#accordion" id="<?= $row->id_message ?>" href="#collapse<?= $row->id_message ?>" aria-controls="collapse<?= $row->id_message ?>">
                <div class="panel-detail">
                  <span>
                    <i class="fa fa-calendar"></i>
                    <?= $time->format("d/m/Y") ?>
                  </span>

                  <span>
                    <i class="fa fa-clock-o"></i>
                    <?= $time->format("h:i") ?>
                  </span>

                  <span>
                    <i class="fa fa-pencil"></i>
                    <?= $row->name ?>
                  </span>

                  <span>
                    <i class="fa fa-envelope"></i>
                    <?= $row->email ?>
                  </span>

                  <?php if(!$row->readed) { ?>
                  <span class="pull-right" id="badge<?= $row->id_message ?>">
                    <span class="badge">new</span>
                  </span>
                  <?php } ?>
                </div>
              </a>
            </h4>
          </div>
          <div id="collapse<?= $row->id_message ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $row->id_message ?>">
            <div class="panel-body">
              <?= $row->message ?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Side Menu</h3>
        </div>
        <div class="panel-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </div>