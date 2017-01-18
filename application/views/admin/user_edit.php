<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <!-- panel left -->
    <div class="col-lg-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>Add New User</b>
        </div>
        <form class="" action="" method="post">
          <div class="panel-body">
            <div class="form-group">
              <input type="text" name="name" class="form-control">
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="gender" value="Male" checked> Male
              </label>
              <label>
                <input type="radio" name="gender" value="Female"> Female
              </label>
            </div>
            <div class="form-group">
              <div class="input-group date" id="datepicker" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="16" type="text" value="" name="birth">
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            </div>
            <div class="form-group">
              <textarea name="address" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <input type="text" name="phone" class="form-control" >
            </div>

            <input type="submit" name="submit" value="Add" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
