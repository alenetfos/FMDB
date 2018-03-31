<?php
include_once 'veza.php';



$stmt = $veza->prepare("insert into rating_film(id_korisnik,id_film,rating) values(:id_korisnik,:id_film,:rating);");
$stmt->execute(array(
    "id_korisnik" => $_SESSION["logiran"]->id_korisnik,
    "id_film" => $_POST['id_film'],
    "rating" => $_POST['rating']
    )
);
header('Location: movies.php');