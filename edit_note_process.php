<?php

include "database.php";


$title = $_POST["title"];
$text = $_POST["text"];
$time = $_POST["time"];
$date = $_POST["date"];
$color = $_POST["color"];
$id = $_POST["id"];


$db->query("UPDATE reminders SET title ='$title',text = '$text',date = '$date',time = '$time',color = '$color' WHERE id = $id");
header("Location: index.php");


?>