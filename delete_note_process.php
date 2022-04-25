<?php
include "database.php";
$notes_id = $_GET["note_id"];

$db->query( "DELETE FROM reminders WHERE id = $notes_id" );

header("Location: index.php");
?>