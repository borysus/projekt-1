<?php 
include_once('database.php');
if (!isset($_GET['id'])) {
    header('Location: admin-categories.php');
    exit();
}
deleteCategory();
header('Location: admin-categories.php');