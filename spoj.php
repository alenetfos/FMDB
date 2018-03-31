<?php

$errors = array();
$user = 'root';
$pass = '';
try {
$conn = new PDO('mysql:host=localhost;dbname=fmdb', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>