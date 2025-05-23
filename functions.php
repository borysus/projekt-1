<?php
include('config.php');
session_start();
function printNavbar() {
    global $nrSpotkania, $title;
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><?=$title?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Strona Główna</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="posts.php">Posty</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="contact.php">Kontakt</a></li>
        </ul>
            <?php
            if (isAdmin()){
                ?>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="admin-messages.php">Zarządzanie - Wiadomości</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-posts.php">Zarządzanie - Posty</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin-categories.php">Zarządzanie - Kategorie</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Wyloguj</a></li>
                </ul>
                <?php
            }
            else {
                ?>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="login.php">Zaloguj</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
    </nav>
    <?php
}

function printFormField($name, $displayName, $type){
    ?>
    <div class="form-group">
        <label class="form-label" for="<?=$name?>"><?=$displayName?></label>
        <input class="form-control" type="$type" name="<?=$name?>" id="<?=$name?>">
    </div>
    <?php
}

function printTextArea($name, $displayName){
    ?>
    <div class="form-group">
        <label class="form-label" for="<?=$name?>"><?=$displayName?></label>
        <textarea class="form-control" name="<?=$name?>" id="<?=$displayName?>"></textarea>
    </div>
    <?php
}

function printSelect($name, $displayName, $array) {
    ?>
    <div class="form-group">
        <label for="<?=$name?>" class="form-label"><?=$displayName?></label>
        <select class="form-control" name="<?=$name?>" id="<?=$name?>">
            <?php
            foreach($array as $option) {
                ?>
                <option value="<?=$option['ID']?>"><?=$option['name']?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <?php
}

function isPostValid($values) {
    foreach($values as $value) {
        if(!isset($_POST[$value])) return false;
    }
    return true;
}

function isAdmin(){
    return isset($_SESSION['adminId']);
}

function checkIfAdmin(){
    if (isAdmin()) return;
    header('Location: login.php');
    exit();
}