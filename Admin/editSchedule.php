<?php
require 'adminlogin.php';

$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');
$courseId = $_GET['id'] ?? null;

if (!$courseId) {
    die("No course specified!");
}

$professorsQuery = "SELECT Prof_id, Nom FROM professeur";
$stmt = $pdo->query($professorsQuery);
$professors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categoriesQuery = "SELECT Id_cat_art, Désignation FROM cat_artistique";
$stmt = $pdo->query($categoriesQuery);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Récupérer les informations du cours pour pré-remplir le formulaire
$sql = "SELECT * FROM cours WHERE Cours_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$courseId]);
$course = $stmt->fetch();

?>
<form action="updateSchedule.php" method="post">
    <input type="hidden" name="id" value="<?= $course['Cours_id'] ?>">
    <label for="salle">Salle:</label>
    <input type="text" id="salle" name="salle" value="<?= htmlspecialchars($course['Salle']) ?>">

    <label for="prof_id">Professeur:</label>
    <select id="prof_id" name="prof_id">
        <?php foreach ($professors as $professor): ?>
            <option value="<?= $professor['Prof_id'] ?>" <?= $professor['Prof_id'] == $course['Prof_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($professor['Nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="cat_art">Catégorie Artistique:</label>
    <select id="cat_art" name="cat_art">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['Id_cat_art'] ?>" <?= $category['Id_cat_art'] == $course['Id_cat_art'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['Désignation']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Update Course</button>
</form>

