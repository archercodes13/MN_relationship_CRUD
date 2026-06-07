<?php
require "db.php";
require "functions.php";

$bands = getBands($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bands</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>All bands</h1>

    <div class="top-actions">
        <a class="button action-edit" href="band_add.php">Add band</a>
    </div>

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
                    <a class="action action-dark" href="band.php?id=<?= $band["id"] ?>">Detail</a>
                    <a class="action action-edit" href="band_edit.php?id=<?= $band["id"] ?>">Edit</a>
                    <a class="action action-red" href="band_delete.php?id=<?= $band["id"] ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
