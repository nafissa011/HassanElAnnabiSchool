<?php
require 'adminlogin.php';

$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');
$id = $_POST['id'];
$salle = $_POST['salle'];
$profId = $_POST['prof_id'];
$catArt = $_POST['cat_art'];

$sql = "UPDATE cours SET Salle = ?, Prof_id = ?, Id_cat_art = ? WHERE Cours_id = ?";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$salle, $profId, $catArt, $id])) {
    header("Location: scheduleManagement.php");
} else {
    echo "Failed to update course.";
}

?>
