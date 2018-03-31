<?php
include_once('navigacija.php');
?>


<html>
<title>Login</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
  <?php if(isset($_GET['korisnik']) && !empty($_GET['korisnik'])) { ?> <div class="well abc"><?php echo $_GET['korisnik'] ?> ne postoji ili je pogrešna lozinka</div><?php } ?>
  <form method="post" action="login_action.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" maxlength="10" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		 <a href="register.php">Not yet a member? Sign up</a>
  	</p>
  </form>
  
  <?php
include_once 'footer.php';
?>

</body>
</html>