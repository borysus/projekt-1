<?php
include('functions.php');
checkIfAdmin();
include_once('database.php');
$categories = getAllCategories();
addCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nowy Post</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
<?php
    printNavbar();
?>
<h2>Nowa kategoria</h2>
<form method="post">
    <?=printFormField('name', 'Nazwa kategorii', 'text')?>
    <input type="submit" class="btn btn-outline-primary" value="Dodaj!">
</form>
</body>
</html>
