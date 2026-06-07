<?php
require "db.php";
require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addStage($sql, $_POST["name"], $_POST["location"]);
    header("Location: stages.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add stage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Add stage</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name">

        <label>Location</label>
        <input type="text" name="location">

        <button class="button">Add stage</button>
    </form>
</div>
</body>
</html>
