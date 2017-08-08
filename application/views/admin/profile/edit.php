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
            <b>Edit Profile</b>
          </div>
          <form class="" action="<?= base_url().'admin/Profile/edit/'.$user->id_user ?>" method="post">
            <div class="panel-body">
              <div class="form-group <?= empty(form_error('name')) ? '' : 'has-error' ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?= set_value('name', $user->name) ?>">
              <div class="form-error"><?= form_error('name') ?></div>
              </div>

              <label>Gender</label>
              <div class="radio">
                <label>
                  <input type="radio" name="gender" value="1"
                    <?php
                    $gender = set_value('gender', $user->gender);
                    $checked = $gender == 1 ? 'checked' : '';
                    ?>
                  <?= $checked ?>> Male
                </label>
                <label>
                  <input type="radio" name="gender" value="0"
                    <?php
                    $gender = set_value('gender', $user->gender);
                    $checked = $gender == 0 ? 'checked' : '';
                    ?>
                  <?= $checked ?>> Female
                </label>
                <div class="form-error"><?= form_error('gender') ?></div>
              </div>

              <div class="form-group <?= empty(form_error('birth')) ? '' : 'has-error' ?>">
                <label for="datepicker">Birth</label>
                <div class="input-group date" id="datepicker" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input class="form-control" size="16" placeholder="Birth" type="text" value="<?= set_value('birth', $user->birth) ?>" name="birth">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                <div class="form-error"><?= form_error('birth') ?></div>
              </div>

              <div class="form-group <?= empty(form_error('address')) ? '' : 'has-error' ?>">
                <label for="address">Address</label>
                <textarea name="address" placeholder="Address" id="address" rows="2" class="form-control"><?= set_value('address', $user->address) ?></textarea>
                <div class="form-error"><?= form_error('address') ?></div>
              </div>

              <div class="form-group <?= empty(form_error('phone')) ? '' : 'has-error' ?>">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control" value="<?= set_value('phone', $user->phone) ?>">
                <div class="form-error"><?= form_error('phone') ?></div>
              </div>

              <input type="submit" value="Submit" class="btn btn-primary">
              <a href="<?= base_url('admin/Profile') ?>" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
