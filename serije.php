<?php
include_once 'navigacija.php';
include_once 'veza.php';
$izraz=$veza->prepare("select serije.*, rating from korisnik,rating_serija,serije where rating_serija.id_serija=serije.id_serija group by id_serija");
$izraz->execute();
$rezultat = $izraz->fetchAll();

// dohvati ratinge svih filmova
$izraz=$veza->prepare("select * from rating_serija");
$izraz->execute();
$rezultat_rating_serija = $izraz->fetchAll();

// za svaku seriju izračunaj average

for($i=0; $i<count($rezultat); $i++){
    $count = 0;
    $s = 0;
    $rating = 1;
    for($j=0; $j<count($rezultat_rating_serija); $j++){
        if($rezultat[$i]['id_serija'] == $rezultat_rating_serija[$j]['id_serija']) {
            $s = $s + $rezultat_rating_serija[$j]['rating'];
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
        <td>Broadcasting Year</td>
		<td>Number of Episodes</td>
		<td>Rating</td>
    </thead>
    <?php foreach($rezultat as $row): ?>
    <tr>
        <td><?php echo $row['id_serija'] ?></td>
        <td><?php echo $row['naziv'] ?></td>
        <td><?php echo $row['trajanje'] ?></td>
        <td><?php echo $row['žanr'] ?></td>
        <td><?php echo $row['godina_emitiranja'] ?></td>
		<td><?php echo $row['broj_epizoda'] ?></td>
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
