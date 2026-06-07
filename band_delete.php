<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

deleteBand($sql, $id);

header("Location: bands.php");
exit;
?>
