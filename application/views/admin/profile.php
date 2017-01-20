<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <p>
      <a href="<?= base_url().'admin/Profile/editProfile/'.$this->session->userdata('logged_in')['id_user'] ?>" class="btn btn-primary btn-sm"> Edit Profil</a>
    </p> <br>

    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

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
          <p><?= $user[0]->name ?></p>
          <hr>
          <label for="">gender</label>
          <p><?php
          if ($user[0]->gender == 1) {
            echo "Male";
          }else {
            echo "Female";
          }
          ?></p>
          <hr>
          <label for="">Birth</label>
          <p><?= $user[0]->birth ?></p>
          <hr>
          <label for="">Address</label>
          <p><?= $user[0]->address ?></p>
          <hr>
          <label for="">Phone</label>
          <p><?= $user[0]->phone ?></p>
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
              <div class="form-group">
                <input type="password" name="old_password" class="form-control" value="" placeholder="Old Password">
              </div>

              <div class="form-group">
                <input type="password" name="password" class="form-control" value="" placeholder="New Password">
              </div>

              <div class="form-group">
                <input type="password" name="password2" class="form-control" value="" placeholder="Confirm Password">
              </div>

              <button type="submit" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
