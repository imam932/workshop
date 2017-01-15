<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/login.css">

  
</head>

<body>
    <div class="login-form">
        <img src="<?= base_url() ?>assets/img/admin/logo.png">
        <form method="post" action="Login/process_login">

            <!-- Username field -->
            <?php if(isset($error_message['username'])) { ?>
            <div class="alert"><?= $error_message['username']; ?></div>
            <?php } ?>

            <div class="form-group ">
                <input type="text" class="form-control" placeholder="Username " id="UserName" name="username">
                <i class="fa fa-user"></i>
            </div>

            <!-- Password field -->
            <?php if(isset($error_message['password'])) { ?>
            <div class="alert"><?= $error_message['password']; ?></div>
            <?php } ?>

            <div class="form-group log-status">
                <input type="password" class="form-control" placeholder="Password" id="Password" name="password">
                <i class="fa fa-lock"></i>
            </div>

            <?php if(isset($error_message['invalid_user'])) { ?>
            <div class="alert"><?= $error_message['invalid_user']; ?></div><br>
            <?php } ?>

            <input type="submit" class="log-btn" value="Log in">
        </form>
    </div>

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/index.js"></script>

</body>
</html>
