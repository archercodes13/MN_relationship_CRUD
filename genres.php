<?php
require "db.php";
require "functions.php";

$genres = getGenres($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Genres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Genres</h1>

    <div class="top-actions">
        <a class="button action-edit" href="genre_add.php">Add genre</a>
    </div>

    <div class="grid">
        <?php foreach($genres as $genre): ?>
            <div class="card">
                <div class="card-content">
                    <h2>
                        <a href="genre.php?id=<?= $genre["id"] ?>">
                            <?= $genre["name"] ?>
                        </a>
                    </h2>
                    <p><?= $genre["description"] ?></p>
                </div>

                <div class="card-actions">
                    <a class="action action-dark" href="genre.php?id=<?= $genre["id"] ?>">Detail</a>
                    <a class="action action-edit" href="genre_edit.php?id=<?= $genre["id"] ?>">Edit</a>
                    <a class="action action-red" href="genre_delete.php?id=<?= $genre["id"] ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
