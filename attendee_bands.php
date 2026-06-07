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
    <title><?= $attendee["name"] ?> bands</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <section class="detail-box">
        <h1><?= $attendee["name"] ?>'s bands</h1>
        <p>This page solves the M:N relationship between attendees and bands.</p>

        <div class="inline-actions">
            <a class="action action-blue" href="attendee_bands_add.php?id=<?= $id ?>">Add band</a>
        </div>
    </section>

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

                    <p>
                        Genre:
                        <a href="genre.php?id=<?= $band["genre_id"] ?>">
                            <?= $band["genre"] ?>
                        </a>
                    </p>

                    <p>
                        Stage:
                        <a href="stage.php?id=<?= $band["stage_id"] ?>">
                            <?= $band["stage"] ?>
                        </a>
                    </p>
                </div>

                <div class="card-actions">
                    <a class="action action-red" href="attendee_band_delete.php?attendee_id=<?= $id ?>&band_id=<?= $band["id"] ?>">
                        Remove
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
