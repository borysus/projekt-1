<?php
include_once('functions.php');
include_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
    <?php
    printNavbar();
    ?>
<h2>Posty</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tytuł</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5">
                <a href="admin-add-category.php" class="btn btn-outline-primary col-12">Nowa Kategoria</a>
            </td>
        </tr>
        <?php
        $categories = getAllCategories();
        foreach($categories as $a) {
        ?>
        <tr>
            <td><?=$a['ID']?></td>
            <td><?=$a['name']?></td>
            <td><a class="btn btn-outline-danger" href="admin-delete-category.php?id=<?=$a['ID']?>"><i class="bi bi-trash"></i></a></td>
        </tr> 
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>