<?php
require 'proflogin.php';
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Interface Professeur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


<link rel="stylesheet" href="../css/style.css">
    <style>
      .content-container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            text-align: center;
            font-size: 16px; 
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #7f359f;
            color: white;
        }
        input[type="text"] {
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #7f359f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #7f359f;
        }
    </style>
</head>
<body>
<header class="header">
   
   <section class="flex">

      <a href="AdminPage.php" class="logo"><img src="../images/logoHass1.png" alt="" width="200px"></a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="<?php echo htmlspecialchars($imagePath); ?>" class="pfp" alt="Profile Picture" width="40%">
         <h3 class="name"><?php echo $name; ?></h3>
         <p class="role">Prof</p>
         <a href="profile.php" class="btn">voir profil</a>
         <div class="flex-btn">
            <a href="../logout.php" class="option-btn">Déconnexion</a>
         </div>
      </div>
 
   </section>

</header>  

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="<?php echo htmlspecialchars($imagePath); ?>" class="pfp" alt="Profile Picture" width="40%">
      <h3 class="name"><?php echo $name; ?></h3>
      <p class="role">Prof</p>
      <a href="profile.php" class="btn">voir profil</a>
   </div>

   <nav class="navbar">
      <a href="profPage.php"><i class="fas fa-home"></i><span>Accueil</span></a>
      <a href="Content.php"><i class="fas fa-chalkboard-user"></i><span>Publier Contenu</span></a>
      <a href="listStud.php"><i class="fa-solid fa-users-between-lines"></i><span>Liste Elèves</span></a>
      <a href="publication.php"><i class="fa-solid fa-book-open"></i><span>Mes publications</span></a>
      <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a>

   </nav>

</div>

<div class="content-container">
    <h1>Interface de Notation</h1>
    <p>Mise à jour des niveaux et notes des élèves :</p>
    <?php
require '../db_connect.php';

 
if (isset($_SESSION['role']) && $_SESSION['role'] === 'professeur') {
    $professeur_id = $_SESSION['user_id']; 
} else {
    die("Error: You must be logged in as a professor to access this page.");
}

 


// Requête SQL pour récupérer les élèves du professeur spécifique
$sql = "SELECT e.Nom, e.Niveau, p.Spécialité, ec.Note, ec.Elève_id 
        FROM eleve e
        JOIN eleve_cours ec ON e.Elève_id = ec.Elève_id
        JOIN cours c ON ec.Cours_id = c.Cours_id
        JOIN professeur p ON c.Prof_id = p.Prof_id
        WHERE p.Prof_id = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erreur de préparation de la requête: " . $conn->error);
}

$stmt->bind_param("i", $professeur_id);
$stmt->execute();
$result = $stmt->get_result();

$rows = $result->fetch_all(MYSQLI_ASSOC);

// Requête pour récupérer les niveaux disponibles
$sql_niveaux = "SELECT DISTINCT Niveau FROM eleve ORDER BY Niveau ASC";
$niveaux_result = $conn->query($sql_niveaux);
$niveaux = [];
if ($niveaux_result->num_rows > 0) {
    while($niveau = $niveaux_result->fetch_assoc()) {
        $niveaux[] = $niveau['Niveau'];
    }
} else {
    die("Erreur: Aucun niveau trouvé dans la base de données.");
}



if (!empty($rows)) {
    echo "<form action='submit_notes.php' method='post'>";
    echo "<table><tr><th>Nom</th><th>Niveau</th><th>Spécialité</th><th>Note</th></tr>";
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["Nom"]) . "</td>";
        // Ajout de la sélection de niveau
        echo "<td><select name='niveaux[" . $row["Elève_id"] . "]'>";
        foreach ($niveaux as $niveau) {
            $selected = ($niveau == $row["Niveau"]) ? "selected" : "";
            echo "<option value='" . htmlspecialchars($niveau) . "' $selected>" . htmlspecialchars($niveau) . "</option>";
        }
        echo "<td>" . htmlspecialchars($row["Spécialité"]) . "</td>";
        echo "<td><input type='text' name='notes[" . $row["Elève_id"] . "]' value='" . htmlspecialchars($row["Note"]) . "'></td>";
        echo "</select></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
} else {
    echo "<p>No students found for this professor.</p>";
}


$stmt->close();
$conn->close();
?>


  </div>

<script src="../js/script.js"></script>
</body>
</html>
