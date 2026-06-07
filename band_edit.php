<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

$band = getBand($sql, $id);
$stages = getStages($sql);
$genres = getGenres($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $band["photo"];

    if(isset($_FILES["photo"]) && $_FILES["photo"]["name"] != "") {
        $photo = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo);
        $photo = "uploads/" . $photo;
    }

    editBand($sql, $id, $_POST["name"], $photo, $_POST["stage_id"], $_POST["genre_id"]);

    header("Location: bands.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit band</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>

    <h1>Edit band</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Band name</label>
        <input type="text" name="name" value="<?= $band["name"] ?>">

        <label>Current photo</label>
        <?php if($band["photo"] != ""): ?>
            <img class="card-image" src="<?= $band["photo"] ?>" alt="Band photo">
        <?php endif; ?>

        <label>New photo</label>
        <input type="file" name="photo">

        <label>Stage</label>
        <select name="stage_id">
            <?php foreach($stages as $stage): ?>
                <option value="<?= $stage["id"] ?>" <?= $stage["id"] == $band["stage_id"] ? "selected" : "" ?>>
                    <?= $stage["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Genre</label>
        <select name="genre_id">
            <?php foreach($genres as $genre): ?>
                <option value="<?= $genre["id"] ?>" <?= $genre["id"] == $band["genre_id"] ? "selected" : "" ?>>
                    <?= $genre["name"] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="button">Save changes</button>
    </form>
</div>
</body>
</html>
