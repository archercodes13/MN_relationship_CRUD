<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$band = getBand($sql, $id);
$members = getBandMembersByBand($sql, $id);
$attendees = getAttendeesByBand($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $band["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <section class="detail-box detail-layout">
        <div>
            <?php if($band["photo"] != ""): ?>
                <img src="<?= $band["photo"] ?>" alt="Band photo">
            <?php endif; ?>
        </div>

        <div>
            <h1><?= $band["name"] ?></h1>

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

            <div class="inline-actions">
                <a class="action action-edit" href="band_edit.php?id=<?= $band["id"] ?>">Edit</a>
                <a class="action action-red" href="band_delete.php?id=<?= $band["id"] ?>">Delete</a>
            </div>
        </div>
    </section>

    <div class="two-columns">
        <section>
            <h2>Band members</h2>
            <a class="button action-blue" href="band_member_add.php?id=<?= $id ?>">Add member</a>

            <?php foreach($members as $member): ?>
                <div class="list-row">
                    <?= $member["name"] ?>
                </div>
            <?php endforeach; ?>
        </section>

        <section>
            <h2>Saved by attendees</h2>

            <?php foreach($attendees as $attendee): ?>
                <div class="list-row">
                    <a href="attendee_bands.php?id=<?= $attendee["id"] ?>">
                        <?= $attendee["name"] ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</div>
</body>
</html>
