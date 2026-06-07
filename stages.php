<?php
require "db.php";
require "functions.php";

$stages = getStages($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Stages</h1>

    <div class="top-actions">
        <a class="button action-edit" href="stage_add.php">Add stage</a>
    </div>

    <div class="grid">
        <?php foreach($stages as $stage): ?>
            <div class="card">
                <div class="card-content">
                    <h2>
                        <a href="stage.php?id=<?= $stage["id"] ?>">
                            <?= $stage["name"] ?>
                        </a>
                    </h2>
                    <p><?= $stage["location"] ?></p>
                </div>

                <div class="card-actions">
                    <a class="action action-dark" href="stage.php?id=<?= $stage["id"] ?>">Detail</a>
                    <a class="action action-edit" href="stage_edit.php?id=<?= $stage["id"] ?>">Edit</a>
                    <a class="action action-red" href="stage_delete.php?id=<?= $stage["id"] ?>">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
