<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <!-- panel left -->
    <div class="col-lg-8">
      <div class="">
        <div class="panel-heading">
          <!-- <b>Profil User</b> -->
        </div>
        <p><?= $user[0]->name ?></p>
        <hr>
        <p>Username</p>
        <hr>
        <p>Password
        <button type="submit" class="btn btn-info"> Reset Password </button>
        </p>
        <hr>
        <p><?php
        if ($user[0]->gender == 1) {
          echo "Laki laki";
        }else {
          echo "Perempuan";
        }
        ?></p>
        <hr>
        <p><?= $user[0]->birth ?></p>
        <hr>
        <p><?= $user[0]->address ?></p>
        <hr>
        <p><?= $user[0]->phone ?></p>
        <hr>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>Reset Password</b>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <input type="text" name="username" class="form-control" value="">
          </div>
          <div class="form-group">
            <input type="text" name="password" class="form-control" value="" placeholder="New Password">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
