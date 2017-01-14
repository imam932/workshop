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
   <h1>Vini</h1>
   <div class="form-group ">
     <input type="text" class="form-control" placeholder="Username " id="UserName">
     <i class="fa fa-user"></i>
   </div>
   <div class="form-group log-status">
     <input type="password" class="form-control" placeholder="Password" id="Passwod">
     <i class="fa fa-lock"></i>
   </div>
   <span class="alert">Invalid Credentials</span>
   <a class="link" href="#">Lost your password?</a>
   <button type="button" class="log-btn" >Log in</button>
   
   
 </div>

 <script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
 <script src="<?= base_url() ?>assets/admin/js/index.js"></script>

</body>
</html>
