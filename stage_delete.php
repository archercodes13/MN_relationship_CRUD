<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

deleteStage($sql, $id);

header("Location: stages.php");
exit;
?>
