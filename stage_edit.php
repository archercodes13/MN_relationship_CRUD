<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];
$stage = getStage($sql, $id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    editStage($sql, $id, $_POST["name"], $_POST["location"]);
    header("Location: stages.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit stage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Edit stage</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" value="<?= $stage["name"] ?>">

        <label>Location</label>
        <input type="text" name="location" value="<?= $stage["location"] ?>">

        <button class="button">Save changes</button>
    </form>
</div>
</body>
</html>
