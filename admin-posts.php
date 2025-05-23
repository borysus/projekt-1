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
            <th>Id</th>
            <th>Tytuł</th>
            <th>Kategoria</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="5">
                <a href="admin-add-post.php" class="btn btn-outline-primary col-12">Nowy Post</a>
            </td>
        </tr>
        <?php
        $posts = getAllPosts();
        foreach($posts as $a) {
        ?>
        <tr>
            <td><?=$a['id']?></td>
            <td><?=$a['title']?></td>
            <td><?=$a['categoryName']?></td>
            <td><a class="btn btn-outline-info" href="admin-post.php?id=<?=$a['id']?>"><i class="bi bi-link"></i></a></td>
            <td><a class="btn btn-outline-danger" href="admin-delete-post.php?id=<?=$a['id']?>"><i class="bi bi-trash"></i></a></td>
        </tr> 
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>