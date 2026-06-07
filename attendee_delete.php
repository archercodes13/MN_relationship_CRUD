<?php
require "db.php";
require "functions.php";

$id = $_GET["id"];

deleteAttendee($sql, $id);

header("Location: attendees.php");
exit;
?>
