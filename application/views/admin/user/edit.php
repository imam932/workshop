<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <!-- panel left -->
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
      <?php } ?>
      <div class="row">
        <div class="col-lg-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Edit User</b>
            </div>
            <form class="" action="<?= base_url().'admin/User/edit/'.$user[0]->id_user ?>" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" value="<?= is_null($old['name']) ? $user[0]->name : $old['name'] ?>">
                </div>
                <div class="radio">
                  <label>

                    <input type="radio" name="gender" value="1"
                      <?php
                      $gender = is_null($old['gender']) ? $user[0]->gender : $old['gender'];
                      if($gender == 1) echo 'checked'
                      ?>> Male

                  </label>
                  <label>
                    <input type="radio" name="gender" value="0"
                      <?php
                      $gender = is_null($old['gender']) ? $user[0]->gender : $old['gender'];
                      if($gender == 0) echo 'checked'
                      ?>> Female
                  </label>
                </div>
                <div class="form-group">
                  <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="<?= is_null($old['birth']) ? $user[0]->birth : $old['birth'] ?>" name="birth">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="address" rows="2" class="form-control"><?= is_null($old['address']) ? $user[0]->address : $old['address'] ?></textarea>
                </div>

                <div class="form-group">
                  <select class="form-control" name="id_level">
                    <option disabled selected>Select Level</option>
                    <?php foreach ($level as $row) {
                      $id_level = is_null($old['id_level']) ? $user[0]->id_level : $old['id_level'];
                      $selected = $row->id_level == $id_level ? "selected" : "";
                    ?>
                      <option value="<?= $row->id_level ?>" <?= $selected ?> ><?= $row->level ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="text" name="phone" class="form-control" value="<?= is_null($old['phone']) ? $user[0]->phone : $old['phone'] ?>">
                  </div>

                  <input type="submit" value="Submit" class="btn btn-primary">
                  <a href="#" onclick="history.go(-1)" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
