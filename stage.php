<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$stage = getStage($sql, $id);
$bands = getBandsWithStage($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $stage["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <section class="detail-box">
        <h1><?= $stage["name"] ?></h1>
        <p><?= $stage["location"] ?></p>

        <div class="inline-actions">
            <a class="action action-edit" href="stage_edit.php?id=<?= $stage["id"] ?>">Edit</a>
            <a class="action action-red" href="stage_delete.php?id=<?= $stage["id"] ?>">Delete</a>
        </div>
    </section>

    <h2>Bands on this stage</h2>

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
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
