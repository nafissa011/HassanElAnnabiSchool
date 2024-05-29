<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'professeur') {
    header("Location: /hassan_el_annabi/login_form.php");
    exit;
}

require '../db_connect.php';

$all_updates_successful = true;  
foreach ($_POST['notes'] as $student_id => $grade) {
    $level = $_POST['niveaux'][$student_id];  

    $sql_grade = "UPDATE eleve_cours SET Note = ? WHERE Elève_id = ?";
    $stmt_grade = $conn->prepare($sql_grade);
    if (false === $stmt_grade) {
        echo "Error preparing the statement for grades: " . $conn->error;
        continue;
    }
    $stmt_grade->bind_param("si", $grade, $student_id);
    if (!$stmt_grade->execute()) {
        echo "Error updating grade for student with ID $student_id: " . $stmt_grade->error . "<br>";
        $all_updates_successful = false;
    }
    $stmt_grade->close();

    $sql_level = "UPDATE eleve SET Niveau = ? WHERE Elève_id = ?";
    $stmt_level = $conn->prepare($sql_level);
    if (false === $stmt_level) {
        echo "Error preparing the statement for levels: " . $conn->error;
        continue;
    }
    $stmt_level->bind_param("si", $level, $student_id);
    if (!$stmt_level->execute()) {
        echo "Error updating level for student with ID $student_id: " . $stmt_level->error . "<br>";
        $all_updates_successful = false;
    }
    $stmt_level->close();
}

if ($all_updates_successful) {
    header("Location: listStud.php");
    exit();
} else {
    echo "Some updates were unsuccessful. Please try again.";
}

$conn->close();
?>
