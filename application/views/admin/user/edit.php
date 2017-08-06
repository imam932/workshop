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
                <div class="form-group <?= empty(form_error('name'))  ? '' : 'has-error' ?>">
                  <input type="text" name="name" class="form-control" value="<?= set_value('name', $user[0]->name) ?>">
                  <div class="form-error"><?= form_error('name') ?></div>
                </div>
                <div class="radio">
                  <label>

                    <input type="radio" name="gender" value="1"
                      <?php
                      $gender = set_value('gender', $user[0]->gender);
                      if($gender == 1) echo 'checked'
                      ?>> Male

                  </label>
                  <label>
                    <input type="radio" name="gender" value="0"
                      <?php
                      $gender = set_value('gender', $user[0]->gender);
                      if($gender == 0) echo 'checked'
                      ?>> Female
                  </label>
                  <div class="form-error"><?= form_error('gender') ?></div>
                </div>
                <div class="form-group <?= empty(form_error('birth'))  ? '' : 'has-error' ?>">
                  <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="<?= set_value('birth', $user[0]->birth) ?>" name="birth">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <div class="form-error"><?= form_error('birth') ?></div>
                </div>
                <div class="form-group <?= empty(form_error('address'))  ? '' : 'has-error' ?>">
                  <textarea name="address" rows="2" class="form-control"><?= set_value('address', $user[0]->address) ?></textarea>
                  <div class="form-error"><?= form_error('address') ?></div>
                </div>

                <div class="form-group <?= empty(form_error('id_level'))  ? '' : 'has-error' ?>">
                  <select class="form-control" name="id_level">
                    <option disabled selected>Select Level</option>
                    <?php foreach ($level as $row) {
                      $id_level = set_value('id_level', $user[0]->id_level);
                      $selected = $row->id_level == $id_level ? "selected" : "";
                    ?>
                      <option value="<?= $row->id_level ?>" <?= $selected ?> ><?= $row->level ?></option>
                      <?php } ?>
                    </select>
                    <div class="form-error"><?= form_error('id_level') ?></div>
                  </div>

                  <div class="form-group <?= empty(form_error('phone'))  ? '' : 'has-error' ?>">
                    <input type="text" name="phone" class="form-control" value="<?= set_value('phone', $user[0]->phone) ?>">
                    <div class="form-error"><?= form_error('phone') ?></div>
                  </div>

                  <input type="submit" value="Submit" class="btn btn-primary">
                  <a href="<?= base_url('admin/User') ?>" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
