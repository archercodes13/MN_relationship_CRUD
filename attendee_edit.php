<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];
$attendee = getAttendee($sql, $id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    editAttendee($sql, $id, $_POST["name"]);
    header("Location: attendees.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit attendee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Edit attendee</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" value="<?= $attendee["name"] ?>">

        <button class="button">Save changes</button>
    </form>
</div>
</body>
</html>
