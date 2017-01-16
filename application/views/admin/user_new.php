<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <!-- panel left -->
    <div class="col-lg-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>Add New User</b>
        </div>
        <form class="" action="index.html" method="post">
          <div class="panel-body">
            <div class="form-group">
              <input type="text" name="" class="form-control" id="" placeholder="Name">
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="" id="" value="Male" checked> Male
              </label>
              <label>
                <input type="radio" name="" id="" value="Female"> Female
              </label>
            </div>
            <div class="form-group">
								<input type="text" name="tgl_masuk" id="datetimepicker" class="form-control" data-date-format="yyyy-mm-dd hh:ii" value="<?= date('Y-m-d')?>">
							</div>
            <div class="form-group">
              <textarea name="" rows="2" class="form-control" placeholder="Address..."></textarea>
            </div>
            <div class="form-group">
              <input type="text" name="" class="form-control" id="" placeholder="Phone">
            </div>

            <input type="submit" name="" value="Add" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
