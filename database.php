<?php
include_once('config.php');

function getConnection() {
    global $dbHost, $dbName, $dbUser, $dbPassword;
    $connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    if($connection->connect_errno) {
        $connection->close();
        die('Database connection problem');
    }
    return $connection;
}

function getAllPosts() {
    $connection = getConnection();
    $sql = 'SELECT posts.id AS id, posts.title as title, categories.name as categoryName from posts inner join categories on posts.categoryId=categories.id';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function getPost($id){
    $connection = getConnection();
    $sql = "SELECT posts.id AS id, posts.title as title, posts.content as content, posts.createdAt as createdAt, categories.Name as categoryName, admins.firstName as firstName, admins.lastName as lastName from posts inner join categories on posts.categoryId=categories.id inner join admins on posts.authorId=admins.id where posts.id = $id";
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    if(count($rows) == 0) {
        header('Location: 404.php');
        exit();
    }
    return $rows[0];
}

function getAllCategories() {
    $connection = getConnection();
    $sql = 'select * from categories';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function addPost() {
    $values = ['title', 'categoryID', 'content'];
    if(!isPostValid($values)) return;  
    $categoryId = $_POST['categoryID'];
    $authorId = 1;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $connection = getConnection();
    $sql = "INSERT INTO posts (categoryID,authorID,title,content) VALUES ('$categoryId', '$authorId', '$title', '$content')";
    $connection->query($sql);
    $connection->close();
    header('Location: admin-posts.php');
}

function addCategory() {
    $values = ['name'];
    if (!isPostValid($values)) return;
    $name = $_POST['name'];
    $connection = getConnection();
    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    $connection->query($sql);
    $connection->close();
    header('Location: admin-add-category.php');
}

function addMessage(){
    $values = ['email', 'firstName', 'lastName', 'content'];
    if (!isPostValid($values)) return;
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $content = $_POST['content'];
    $connection = getConnection();
    $sql = "INSERT INTO messages (email, firstName, lastName, content) VALUES ('$email', '$firstName', '$lastName', '$content')";
    $connection->query($sql);
    $connection->close();
    header('Location: contact.php?success=1');
}

function login() {
    $values = ['email', 'password'];
    if (!isPostValid($values)) return;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = getConnection();
    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    if (count($rows) == 0) return;
    if (!password_verify($password, $rows[0]['password'])) return;
    $_SESSION['adminId'] = $rows[0]['ID'];
}

function deletePost() {
    $id = $_GET['id'];
    $connection = getConnection();
    $sql = "DELETE FROM posts WHERE id=$id";
    $connection->query($sql);
    $connection->close();
}

function deleteMessage() {
    $id = $_GET['id'];
    $connection = getConnection();
    $sql = "DELETE FROM messages WHERE id=$id";
    $connection->query($sql);
    $connection->close();
}

function getAllMessages() {
    $connection = getConnection();
    $sql = 'SELECT * FROM messages';
    $result = $connection->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $connection->close();
    return $rows;
}

function deleteCategory() {
    $id = $_GET['id'];
    $connection = getConnection();
    $sql = "DELETE FROM categories WHERE id=$id";
    $connection->query($sql);
    $connection->close();
}