<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">

      <div class="row">
        <!-- panel left -->
        <div class="col-lg-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Add New User</b>
            </div>
            <form class="" action="<?= base_url().'admin/User/store' ?>" method="post">
              <div class="panel-body">
                <div class="form-group <?= empty(form_error('name'))  ? '' : 'has-error' ?>">
                  <input type="text" name="name" class="form-control" placeholder="Name" value="<?= set_value('name') ?>">
                  <div class="form-error"><?= form_error('name') ?></div>
                </div>

                <div class="form-group <?= empty(form_error('username')) && empty($username_error) ? '' : 'has-error' ?>">
                  <input type="text" name="username" class="form-control"  placeholder="Username" value="<?= set_value('username') ?>">
                  <div class="form-error">
                    <?= form_error('username') ?>
                    <?= $username_error ?>
                  </div>
                </div>

                <div class="form-group <?= empty(form_error('password'))  ? '' : 'has-error' ?>">
                  <input type="password" name="password" class="form-control"  placeholder="Password">
                  <div class="form-error"><?= form_error('password') ?></div>
                </div>

                <div class="radio">
                  <label>
                    <input type="radio" name="gender"  value="1" checked> Male
                  </label>
                  <label>
                    <input type="radio" name="gender"  value="0" <?= set_value('gender') == '0' ? "checked" : "" ?>> Female
                  </label>
                  <div class="form-error"><?= form_error('gender') ?></div>
                </div>

                <div class="form-group <?= empty(form_error('birth'))  ? '' : 'has-error' ?>">
                  <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-dd-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" name="birth" placeholder="Birth" value="<?= set_value('birth') ?>">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                  <div class="form-error"><?= form_error('birth') ?></div>
                </div>

                <div class="form-group <?= empty(form_error('address'))  ? '' : 'has-error' ?>">
                  <textarea name="address" rows="2" class="form-control" placeholder="Address..."><?= set_value('address') ?></textarea>
                  <div class="form-error"><?= form_error('address') ?></div>
                </div>

                <div class="form-group <?= empty(form_error('id_level'))  ? '' : 'has-error' ?>">
                  <select class="form-control" name="id_level">
                    <option disabled selected>Select Level</option>
                    <?php foreach ($level as $row) {

                      $selected = set_value('id_level') == $row->id_level ? "selected" : "";

                      ?>
                      <option value="<?= $row->id_level ?>" <?= $selected ?>><?= $row->level ?></option>
                      <?php } ?>
                    </select>
                  <div class="form-error"><?= form_error('id_level') ?></div>
                </div>

                  <div class="form-group <?= empty(form_error('phone'))  ? '' : 'has-error' ?>">
                    <input type="text" name="phone" class="form-control"  placeholder="Phone" value="<?= set_value('phone') ?>">
                    <div class="form-error"><?= form_error('phone') ?></div>
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
