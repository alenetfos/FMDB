<?php
include_once 'veza.php';

$user = $_POST['username'];
$pass = $_POST['password_1'];
$email = $_POST['email'];


$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password_1'];

$stmt = $veza->prepare("select * from korisnik");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row) {
	if($row['username'] == $user) {
	    header('Location:register.php');die;
    }
}
$stmt = $veza->prepare("insert into korisnik(username,email,password) values(:username,:email,:password);");
$stmt->execute(array(
"username" => $user,
"password" => $pass,
"email" => $email,
));
header('Location: login.php');
