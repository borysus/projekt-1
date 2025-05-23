<?php
include_once('functions.php');
include_once('database.php');
addMessage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
<?php
    printNavbar();
    ?>
    <h2>Kontakt</h2>
    <form method="post">
        <?=printFormField('email', 'E-mail', 'email')?>
        <?=printFormField('firstName', 'Imię', 'text')?>
        <?=printFormField('lastName', 'Nazwisko', 'text')?>
        <?=printTextArea('content', 'Treść wiadomości')?>
        <input type="submit" class="btn btn-outline-primary" value="Wyślij!">
    </form>

    <?php
    if (isset($_GET['success'])) {
        ?>
        <div class="alert alert-success" role="alert">
            Wiadomość została wysłana!
        </div>
        <?php
    }
    ?>
</body>
</html>