<?php
require 'proflogin.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Professeur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <link rel="stylesheet" href="../css/style.css">
   <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        font-size: 16px;
    }


    .container {
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        border-radius: 8px;
        text-align: left;
    }

    h1 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input, textarea, select {
        padding: 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        letter-spacing: 1px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .container {
            width: 90%;
        }
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

    <div class="container">
        <h1>Publier contenu</h1>
        <form action="publier.php" method="post" enctype="multipart/form-data">
    Titre: <input type="text" name="titre" required><br>
    Description: <textarea name="description" required></textarea><br>
    Select file to upload:
    <input type="file" name="pdf_file" required>
    Catégorie: <select name="categorie">
    <?php 
            require '../db_connect.php';

            // Requête pour obtenir toutes les catégories
            $sql = "SELECT Id_cat, Nom_cat FROM categorie";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Afficher chaque catégorie comme une option dans le select
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["Id_cat"] . '">' . htmlspecialchars($row["Nom_cat"]) . '</option>';
                }
            } else {
                echo '<option value="">Pas de catégories disponibles</option>';
            }
            $conn->close();
            ?>

    </select><br>
    <button type="submit">Publier</button>

    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const categorieSelect = document.querySelector('select[name="categorie"]');
    const pdfInput = document.querySelector('input[name="pdf_file"]');
    
    function updateFileRequirement() {
        const cat = categorieSelect.value;
        // Assumer que la catégorie 'Annonce' a l'ID '1' et ne requiert pas de PDF
        pdfInput.required = cat !== '1'; // Changez '1' par l'ID correspondant dans votre base de données
    }

    categorieSelect.addEventListener('change', updateFileRequirement);
    updateFileRequirement(); // Appel initial pour régler le statut dès le chargement
});
</script>

</body>
</html>
