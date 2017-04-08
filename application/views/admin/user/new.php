<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
      <?php } ?>
      <div class="row">
        <!-- panel left -->
        <div class="col-lg-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Add New User</b>
            </div>
            <form class="" action="<?= base_url().'admin/User/new' ?>" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control"  placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender"  value="1" checked> Male
                  </label>
                  <label>
                    <input type="radio" name="gender"  value="0"> Female
                  </label>
                </div>

                <div class="form-group">
                  <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-dd-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="birth" placeholder="Birth">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="address" rows="2" class="form-control" placeholder="Address..."></textarea>
                </div>

                <div class="form-group">
                  <select class="form-control" name="id_level">
                    <option disabled selected>Select Level</option>
                    <?php foreach ($level as $row) { ?>
                      <option value="<?= $row->id_level ?>"><?= $row->level ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" name="phone" class="form-control"  placeholder="Phone">
                  </div>

                  <input type="submit" value="Submit" class="btn btn-primary">
                  <a href="<?= base_url() ?>admin/User" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
