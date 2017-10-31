<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <p>
      <a href="<?= base_url().'admin/Profile/edit/'.$this->session->userdata('logged_in')['id_user'] ?>" class="btn btn-primary btn-sm"> Edit Profil</a>
    </p> <br>

    <?php if(isset($message)) { ?>
      <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

    <div class="row">
      <!-- panel left -->
      <div class="col-lg-8">
        <div class="">
          <div class="panel-heading">
            <!-- <b>Profil User</b> -->
          </div>
          <label for="">Name</label>
          <p><?= $user->name ?></p>
          <hr>
          <label for="">gender</label>
          <p><?php
          if ($user->gender == 1) {
            echo "Male";
          }else {
            echo "Female";
          }
          ?></p>
          <hr>
          <label for="">Birth</label>
          <p><?= $user->birth ?></p>
          <hr>
          <label for="">Address</label>
          <p><?= $user->address ?></p>
          <hr>
          <label for="">Phone</label>
          <p><?= $user->phone ?></p>
          <hr>
        </div>
      </div>
      <div class="col-lg-4">
        <form method="post" action="<?=base_url()?>admin/Profile/resetPassword/<?= $this->session->userdata('logged_in')['id_user'] ?>">
          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Reset Password</b>
            </div>
            <div class="panel-body">
              <div class="form-group <?= empty(form_error('old_password')) && empty($old_error) ? '' : 'has-error' ?>">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password" class="form-control" value="" placeholder="Old Password">
                <div class="form-error">
                  <?= form_error('old_password') ?>
                  <?= $old_error ?>
                </div>
              </div>

              <div class="form-group <?= empty(form_error('password')) ? '' : 'has-error' ?>">
                <label for="password">New password</label>
                <input type="password" name="password" id="password" class="form-control" value="" placeholder="New Password">
                <div class="form-error"><?= form_error('password') ?></div>
              </div>

              <div class="form-group <?= empty(form_error('password2')) && empty($confirm_error) ? '' : 'has-error' ?>">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2" class="form-control" value="" placeholder="Confirm Password">
                <div class="form-error">
                  <?= form_error('password2') ?>
                  <?= $confirm_error ?>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
