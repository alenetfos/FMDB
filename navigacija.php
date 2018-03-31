<?php include_once 'veza.php';
?>
<!DOCTYPE html>
<html>

<head>

    <title>FMDb</title>

    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<div>

<h1 id="naslov">FMDb</h1>


</div>
<div class="nav1">

    <ul>
	    
        <li><a href="index.php">HOME</a></li>
		<li><a href="about.php">MORE</a></li>
        <li><a href="movies.php">MOVIES</a></li>
        <li><a href="serije.php">TV SHOWS</a></li>
        <li><a href="register.php">SIGN UP</a></li>
		<li><?php if(!isset($_SESSION["logiran"])): ?>
      	<a href="login.php">LOG IN</a>
      	<?php else: ?>
      	<a href="logout.php">LOG OUT 
      		<?php echo $_SESSION["logiran"]->username; ?></a>
		<?php endif; ?></li>
        <?php
            if(isset($_SESSION['logiran'])) {
        ?>
                <li><a href="rating_film.php">RATE MOVIES</a></li>
		        <li><a href="rating_serija.php">RATE TV SHOWS</a></li>
            <?php } ?>

    </ul>

</div>

</body>
</html>
