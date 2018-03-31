<?php
include_once 'navigacija.php';
include_once 'veza.php';
$izraz=$veza->prepare("select filmovi.*, rating from korisnik,rating_film,filmovi where rating_film.id_film=filmovi.id_film group by id_film");
$izraz->execute();
$rezultat = $izraz->fetchAll();

// dohvati ratinge svih filmova
$izraz=$veza->prepare("select * from rating_film");
$izraz->execute();
$rezultat_rating_film = $izraz->fetchAll();

// za svaki film izračunaj average

for($i=0; $i<count($rezultat); $i++){
    $count = 0;
    $s = 0;
    $rating = 1;
    for($j=0; $j<count($rezultat_rating_film); $j++){
        if($rezultat[$i]['id_film'] == $rezultat_rating_film[$j]['id_film']) {
            $s = $s + $rezultat_rating_film[$j]['rating'];
            $count++;
            $rating = $s/$count;
            
            // dodaj na postojeći array
            $rezultat[$i]["rating"] = round($rating, 2);
        }
    }
}

?>
<div class="container">
<table>
    <thead>
        <td>ID</td>
        <td>Title</td>
        <td>Duration</td>
        <td>Genre</td>
        <td>Release Date</td>
        <td>Rating</td>
    </thead>
    <?php foreach($rezultat as $row): ?>
    <tr>
        <td><?php echo $row['id_film'] ?></td>
        <td><?php echo $row['naziv'] ?></td>
        <td><?php echo $row['trajanje'] ?></td>
        <td><?php echo $row['žanr'] ?></td>
        <td><?php echo $row['godina_izrade'] ?></td>
        <td><?php echo $row['rating'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>
