<?php
require "db.php";
require "functions.php";

$attendees = getAttendees($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendees</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Attendees</h1>

    <div class="top-actions">
        <a class="button action-edit" href="attendee_add.php">Add attendee</a>
    </div>

    <div class="grid">
        <?php foreach($attendees as $attendee): ?>
            <div class="card">
                <div class="card-content">
                    <h2>
                        <a href="attendee.php?id=<?= $attendee["id"] ?>">
                            <?= $attendee["name"] ?>
                        </a>
                    </h2>
                    <p>Manage the bands saved in this attendee's festival program.</p>
                </div>

                <div class="card-actions">
                    <a class="action action-dark" href="attendee.php?id=<?= $attendee["id"] ?>">Detail</a>
                    <a class="action action-purple" href="attendee_bands.php?id=<?= $attendee["id"] ?>">Bands</a>
                    <a class="action action-edit" href="attendee_edit.php?id=<?= $attendee["id"] ?>">Edit</a>
                    <a class="action action-red" href="attendee_delete.php?id=<?= $attendee["id"] ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
