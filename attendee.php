<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$attendee = getAttendee($sql, $id);
$bands = getBandsByAttendee($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $attendee["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <section class="detail-box">
        <h1><?= $attendee["name"] ?></h1>
        <p>This attendee saved these bands in their festival program.</p>

        <div class="inline-actions">
            <a class="action action-purple" href="attendee_bands.php?id=<?= $attendee["id"] ?>">Manage bands</a>
            <a class="action action-edit" href="attendee_edit.php?id=<?= $attendee["id"] ?>">Edit</a>
            <a class="action action-red" href="attendee_delete.php?id=<?= $attendee["id"] ?>">Delete</a>
        </div>
    </section>

    <h2>Saved bands</h2>

    <div class="grid">
        <?php foreach($bands as $band): ?>
            <div class="card">
                <div class="card-content">
                    <?php if($band["photo"] != ""): ?>
                        <img class="card-image" src="<?= $band["photo"] ?>" alt="Band photo">
                    <?php endif; ?>

                    <h2>
                        <a href="band.php?id=<?= $band["id"] ?>">
                            <?= $band["name"] ?>
                        </a>
                    </h2>
                    <p>Genre: <?= $band["genre"] ?></p>
                    <p>Stage: <?= $band["stage"] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
