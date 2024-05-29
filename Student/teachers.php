<?php
require 'studlogin.php';

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <link rel="stylesheet" href="../css/style.css">
   

   <style>
    .section-notes {
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
        background-color: #673087; 
    }
</style>


</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="homeStud.html" class="logo"><img src="../images/logoHass1.png" alt="" width="200px"></a>

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
         <p class="role">Etudiant</p>
         <a href="profile.php" class="btn">view profile</a>
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
      <p class="role">Etudiant</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="homeStud.php"><i class="fas fa-home"></i><span>acceuil</span></a>
      <a href="courses.php"><i class="fa-solid fa-book-open"></i><span>publications</span></a>
      <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>cours/notes</span></a>
      <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a>
   </nav>

</div>


<div class="section-notes">
        <h1>Notes des cours</h1>
        <?php

require '../db_connect.php';

$sql = "SELECT p.Nom as ProfesseurNom, ec.Note, c.Horaire, c.Salle, c.Période, ca.Désignation as CategorieArtistique
FROM eleve_cours ec
JOIN cours c ON ec.Cours_id = c.Cours_id
JOIN professeur p ON c.Prof_id = p.Prof_id
JOIN cat_artistique ca ON c.Id_cat_art = ca.Id_cat_art
WHERE ec.Elève_id = ?
ORDER BY p.Nom;
";
 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $eleveId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   echo "<table border='1'><tr><th>Professeur</th><th>Note</th><th>Horaire</th><th>Salle</th><th>Période</th><th>Catégorie Artistique</th></tr>";
   while ($row = $result->fetch_assoc()) {
       echo "<tr>";
       echo "<td>" . htmlspecialchars($row['ProfesseurNom']) . "</td>";
       echo "<td>" . htmlspecialchars($row['Note']) . "</td>";
       echo "<td>" . htmlspecialchars($row['Horaire']) . "</td>";
       echo "<td>" . htmlspecialchars($row['Salle']) . "</td>";
       echo "<td>" . htmlspecialchars($row['Période']) . "</td>";
       echo "<td>" . htmlspecialchars($row['CategorieArtistique']) . "</td>";  
       echo "</tr>";
   }
   echo "</table>";
} else {
   echo "Aucune note trouvée.";
}

$conn->close();
?>

    </div>


<script src="../js/script.js"></script>

   
</body>
</html>