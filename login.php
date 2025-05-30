<?php
include_once('functions.php');
include_once('database.php');
login();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
    <?php
    printNavbar();
    ?>
    <main class="container mt-5">
        <h2>Logowanie</h2>
        <form method="post">
            <?=printFormField('email', 'E-mail', 'email')?>
            <?=printFormField('password', 'Hasło', 'password')?>
            
            <input class="btn btn-primary" type="submit" value="Zaloguj">
        </form>
    </main>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>