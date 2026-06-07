<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$genre = getGenre($sql, $id);
$bands = getBandsWithGenre($sql, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $genre["name"] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <section class="detail-box">
        <h1><?= $genre["name"] ?></h1>
        <p><?= $genre["description"] ?></p>

        <div class="inline-actions">
            <a class="action action-edit" href="genre_edit.php?id=<?= $genre["id"] ?>">Edit</a>
            <a class="action action-red" href="genre_delete.php?id=<?= $genre["id"] ?>">Delete</a>
        </div>
    </section>

    <h2>Bands in this genre</h2>

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
                    <p>Stage: <?= $band["stage"] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
