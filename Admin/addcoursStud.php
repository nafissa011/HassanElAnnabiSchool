<?php
require 'adminlogin.php';
require '../db_connect.php';

// Gérer la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $eleveId = $_POST['eleve_id'];
    $coursId = $_POST['cours_id'];

    // Vérifier si l'étudiant est déjà inscrit
    $stmt = $conn->prepare("SELECT * FROM eleve_cours WHERE Elève_id = ? AND Cours_id = ?");
    $stmt->bind_param("ii", $eleveId, $coursId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Student already enrolled in this course.";
    } else {
        // Insérer un nouvel enregistrement
        $insert = $conn->prepare("INSERT INTO eleve_cours (Elève_id, Cours_id) VALUES (?, ?)");
        $insert->bind_param("ii", $eleveId, $coursId);
        if ($insert->execute() === TRUE) {
            echo "Student enrolled successfully.";
        } else {
            echo "Error during registration: " . $insert->error;
        }
        $insert->close();
    }
    $stmt->close();
}

// Récupérer tous les étudiants
$students = $conn->query("SELECT Elève_id, Nom FROM eleve");

// Récupérer tous les cours
$courses = $conn->query("SELECT Cours_id FROM cours ORDER BY Cours_id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Manage Student Enrollments</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="eleve_id">Select Student:</label>
    <select name="eleve_id" id="eleve_id" required>
        <?php while ($student = $students->fetch_assoc()) {
            echo "<option value='" . $student['Elève_id'] . "'>" . $student['Nom'] . "</option>";
        } ?>
    </select>
    <label for="cours_id">Select Course:</label>
    <select name="cours_id" id="cours_id" required>
        <?php while ($course = $courses->fetch_assoc()) {
            echo "<option value='" . $course['Cours_id'] . "'>Course ID: " . $course['Cours_id'] . "</option>";
        } ?>
    </select>
    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>

<?php $conn->close(); ?>
