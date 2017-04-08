<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="message">

    <div class="form-group">
      <input type="text" class="form-control search" placeholder="Search Message">
    </div>

    <div class="panel-group list" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
      foreach ($message as $row) {
        $time = new DateTime($row->date);
        ?>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="heading<?= $row->id_message ?>">
            <h4 class="panel-title">

              <a class="message-show" role="button" data-toggle="collapse" data-parent="#accordion" id="<?= $row->id_message ?>" href="#collapse<?= $row->id_message ?>" aria-controls="collapse<?= $row->id_message ?>">
                <div class="panel-detail">
                  <time class="date">
                    <span>
                      <i class="fa fa-calendar"></i>
                      <?= $time->format("d/m/Y") ?>
                    </span>

                    <span>
                      <i class="fa fa-clock-o"></i>
                      <?= $time->format("H:i") ?>
                    </span>
                  </time>

                  <span class="name">
                    <i class="fa fa-pencil"></i>
                    <?= $row->name ?>
                  </span>

                  <span class="email">
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

      <ul class="pagination"></ul>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="list-group">
        <h5 class="list-group-item header">Order By</h5>
        <a href="#" class="list-group-item sort-message active">date</a>
        <a href="#" class="list-group-item sort-message">name</a>
        <a href="#" class="list-group-item sort-message">email</a>
      </div>

      <div class="form-group">
        <select class="form-control" id="select-orderMessage">
          <option value="asc">Ascending</option>
          <option value="desc" selected>Descending</option>
        </select>
      </div>
    </div>
  </div>