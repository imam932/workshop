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
            <form class="" action="<?= base_url().'admin/User/store' ?>" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name" value="<?= $old['name'] ?>">
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control"  placeholder="Username" value="<?= $old['username'] ?>">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender"  value="1" checked> Male
                  </label>
                  <label>
                    <input type="radio" name="gender"  value="0" <?= $old['gender'] == 0 && !is_null($old['gender']) ? "checked" : "" ?>> Female
                  </label>
                </div>

                <div class="form-group">
                  <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-dd-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="birth" placeholder="Birth" value="<?= $old['birth'] ?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="address" rows="2" class="form-control" placeholder="Address..."><?= $old['address'] ?></textarea>
                </div>

                <div class="form-group">
                  <select class="form-control" name="id_level">
                    <option disabled selected>Select Level</option>
                    <?php foreach ($level as $row) {

                      $selected = $old['id_level'] == $row->id_level ? "selected" : "";

                      ?>
                      <option value="<?= $row->id_level ?>" <?= $selected ?>><?= $row->level ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" name="phone" class="form-control"  placeholder="Phone" value="<?= $old['phone'] ?>">
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
