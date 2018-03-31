<?php
include_once 'veza.php';
if(!isset($_SESSION['logiran'])) header('Location: http://localhost/website1/login.php');

include_once 'navigacija.php';


$izraz=$veza->prepare("select * from filmovi");
$izraz->execute();
$rezultat = $izraz->fetchAll();
$izraz=$veza->prepare("select * from rating_film");
$izraz->execute();
$rezultat_rating_film = $izraz->fetchAll();
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
        <?php
        foreach($rezultat as $row):

        ?>
            <tr>
                <td><?php echo $row['id_film'] ?></td>
                <td><?php echo $row['naziv'] ?></td>
                <td><?php echo $row['trajanje'] ?></td>
                <td><?php echo $row['žanr'] ?></td>
                <td><?php echo $row['godina_izrade'] ?></td>
                <td>
                    <form method="post" action="action_rating_film.php">
                        <input type="hidden" name="id_film" value="<?php echo $row['id_film'] ?>">
                        <select style="width: 150px; background-color: black" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Rate</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>
