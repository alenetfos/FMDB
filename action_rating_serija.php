<?php
include_once 'veza.php';



$stmt = $veza->prepare("insert into rating_serija(id_korisnik,id_serija,rating) values(:id_korisnik,:id_serija,:rating);");
$stmt->execute(array(
    "id_korisnik" => $_SESSION["logiran"]->id_korisnik,
    "id_serija" => $_POST['id_serija'],
    "rating" => $_POST['rating']
    )
);
header('Location: serije.php');