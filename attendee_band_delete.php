<?php
require "db.php";
require "functions.php";

$attendee_id = $_GET["attendee_id"];
$band_id = $_GET["band_id"];

deleteBandFromAttendee($sql, $attendee_id, $band_id);

header("Location: attendee_bands.php?id=" . $attendee_id);
exit;
?>
