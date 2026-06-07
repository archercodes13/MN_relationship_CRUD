<?php
require "db.php";
require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addAttendee($sql, $_POST["name"]);
    header("Location: attendees.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add attendee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Add attendee</h1>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name">

        <button class="button">Add attendee</button>
    </form>
</div>
</body>
</html>
