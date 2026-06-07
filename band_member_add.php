<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];
$band = getBand($sql, $id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addBandMember($sql, $_POST["name"], $id);
    header("Location: band.php?id=" . $id);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add band member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Add member to <?= $band["name"] ?></h1>

    <form method="post">
        <label>Member name</label>
        <input type="text" name="name">

        <button class="button">Add member</button>
    </form>
</div>
</body>
</html>
