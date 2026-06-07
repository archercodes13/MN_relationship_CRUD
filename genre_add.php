<?php
require "db.php";
require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addGenre($sql, $_POST["name"], $_POST["description"]);
    header("Location: genres.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add genre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Add genre</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name">

        <label>Description</label>
        <textarea name="description"></textarea>

        <button class="button">Add genre</button>
    </form>
</div>
</body>
</html>
