<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 style="line-height:35px" class="panel-title clearfix">
          <span>Visitor Traffic</span>
          <a href="<?= base_url() ?>admin/Visitor" class="btn btn-default pull-right">Detail</a>
        </h3>
      </div>
      <div class="panel-body">
        <div id="visitorChart"></div>
        <div class="form-group">
          <select class="form-control" id="select_visitor">
            <option value="day">Daily</option>
            <option value="month" selected>Monthly</option>
            <option value="year">Yearly</option>
            <option value="all">All Time</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Visitor Location</h3>
      </div>
      <div class="panel-body">
        <div id="locationChart"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Platform Used</h3>
      </div>
      <div class="panel-body">
        <div id="platformChart"></div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Browser Used</h3>
      </div>
      <div class="panel-body">
        <div id="browserChart"></div>
      </div>
    </div>
  </div>
</div>