<?php
include_once 'veza.php';

$izraz=$veza->prepare("select * from korisnik where username=:username and password=:password");
$izraz->execute(array("username"=>$_POST["username"], "password" =>$_POST["password"]));
$korisnik = $izraz->fetch(PDO::FETCH_OBJ);
if($korisnik!=null){
	$_SESSION["logiran"]=$korisnik;
	header("Location: index.php");
}else{
	header("Location: login.php?neuspio&korisnik=" . $_POST["username"]);
}
?>