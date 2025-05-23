<?php
include_once('functions.php');
include_once('database.php');
printNavbar();
checkIfAdmin();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiadomości</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <h2>Wiadomości</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Imię i nazwisko</th>
            <th>Treść</th>
            <th>Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $messages = getAllMessages();
        foreach($messages as $a) {
        ?>
        <tr>
            <td><?=$a['ID']?></td>
            <td><?=$a['email']?></td>
            <td><?=$a['firstName']?> <?=$a['lastName']?></td>
            <td><?=$a['content']?></td>
            <td><?=$a['createdAt']?></td>
            <td>
                <a href="admin-delete-message.php?id=<?=$a['ID']?>">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>