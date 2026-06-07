<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$attendee = getAttendee($sql, $id);
$bands = getBands($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    addBandToAttendee($sql, $id, $_POST["band_id"]);
    header("Location: attendee_bands.php?id=" . $id);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add band to attendee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Add band to <?= $attendee["name"] ?></h1>

    <form method="post">
        <label>Band</label>
        <select name="band_id">
            <?php foreach($bands as $band): ?>
                <option value="<?= $band["id"] ?>">
                    <?= $band["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="button">Add band</button>
    </form>
</div>
</body>
</html>
