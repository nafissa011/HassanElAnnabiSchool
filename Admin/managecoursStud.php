<?php
require 'adminlogin.php';

require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eleveId = $_POST['eleve_id'];
    $coursId = $_POST['cours_id'];

    if (isset($_POST['remove'])) {
        $delete = $conn->prepare("DELETE FROM eleve_cours WHERE Elève_id = ? AND Cours_id = ?");
        $delete->bind_param("ii", $eleveId, $coursId);
        if ($delete->execute()) {
            echo "Enrollment removed successfully.";
        } else {
            echo "Error removing enrollment: " . $delete->error;
        }
        $delete->close();
    } elseif (isset($_POST['change']) && isset($_POST['new_cours_id'])) {
        $newCoursId = $_POST['new_cours_id'];
        $update = $conn->prepare("UPDATE eleve_cours SET Cours_id = ? WHERE Elève_id = ? AND Cours_id = ?");
        $update->bind_param("iii", $newCoursId, $eleveId, $coursId);
        if ($update->execute()) {
            echo "Course updated successfully.";
        } else {
            echo "Error updating course: " . $update->error;
        }
        $update->close();
    }
}

$enrolledStudents = $conn->query("SELECT e.Elève_id, e.Nom, c.Cours_id
                                  FROM eleve_cours ec
                                  JOIN eleve e ON ec.Elève_id = e.Elève_id
                                  JOIN cours c ON ec.Cours_id = c.Cours_id
                                  ORDER BY e.Nom");

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

<?php if ($enrolledStudents->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Course ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $enrolledStudents->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Nom']); ?></td>
                <td><?php echo htmlspecialchars($row['Cours_id']); ?></td>
                <td>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="eleve_id" value="<?php echo $row['Elève_id']; ?>">
                        <input type="hidden" name="cours_id" value="<?php echo $row['Cours_id']; ?>">
                        <select name="new_cours_id">
                            <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['Cours_id']; ?>"><?php echo $course['Cours_id']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="change">Change Course</button>
                        <button type="submit" name="remove">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No students are currently enrolled.</p>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
