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


    .article { 
        width: 350px;
        font-size: 15px;
        border: 1px solid #ccc;
        margin: 20px auto;
        padding: 10px;
        border-radius: 5px;
        position: relative;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        background: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .article img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
    .article h2 {
        color: #333;
        margin-top: 0;
        width: 100%;
        text-align: center;
    }
    .article p {
        color: #666;
        width: 100%;
    }
    .radio-container {
        text-align: center;
        margin: 20px 0;
        padding: 10px;
        background-color: #f8f8f8;
        border-radius: 10px;
    }
    input[type="radio"] {
        accent-color: purple;
    }

    label {
        margin-right: 10px;
        font-size: 16px;
        color: #333;
        font-weight: 500;
    }

    input[type="radio"]:hover + label,
    input[type="radio"]:focus + label {
        color: #5a0099;
        cursor: pointer;
    }

    input[type="radio"]:checked + label {
        color: #800080;
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


<div class="container">
    <h1>Articles de vos professeurs</h1>
    <div class="radio-container">
        <input type="radio" id="all" name="article_filter" value="all" checked>
        <label for="all">Tous les articles</label>
        <input type="radio" id="tutorials" name="article_filter" value="tutorials">
        <label for="tutorials">Tutoriels (Livres)</label>
        <input type="radio" id="announcements" name="article_filter" value="announcements">
        <label for="announcements">Annonces</label>
    </div>
    <div id="articles-container">
    <?php


require '../db_connect.php';

$sql = "SELECT a.Article_id, a.Titre, a.Date_création, a.Description, a.contenu, p.Nom as ProfesseurNom
        FROM article a
        JOIN professeur p ON a.Prof_id = p.Prof_id
        JOIN cours c ON p.Prof_id = c.Prof_id
        JOIN eleve_cours ec ON c.Cours_id = ec.Cours_id
        WHERE ec.Elève_id = ?
        ORDER BY a.Date_création DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $eleveId);
$stmt->execute();
$result = $stmt->get_result();

$images = [
   '1' => '../images/Cours/solfègecours1.jpg',
   '2' => '../images/Cours/pianocours1.jpg',
   '3' => '../images/Cours/guitarcours1.jpg',
   '4' => '../images/Cours/violoncours1.jpg',
   '5' => '../images/Cours/ballet3.jpg',
   '6' => '../images/Cours/art1.jpg',
];

// Logique pour ajouter des images basées sur le début du titre
function displayImageBasedOnTitle($title, $images) {
   $firstChar = $title[0]; // Récupère le premier caractère du titre

   // Vérifie si le premier caractère est un chiffre et correspond à une clé dans le tableau $images
   if (array_key_exists($firstChar, $images)) {
       echo "<img src='" . htmlspecialchars($images[$firstChar]) . "' alt='Image $firstChar' />";
   }
}
 

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $class = !empty($row['contenu']) ? 'with-content' : 'no-content';
                echo "<div class='article $class'>";
                echo "<h2>" . htmlspecialchars($row['Titre']) . "</h2>";
                echo "<p>Date de publication: " . htmlspecialchars($row['Date_création']) . "</p>";
                echo "<p>" . htmlspecialchars($row['Description']) . "</p>";
                if (!empty($row['contenu'])) {
                  echo "<a href='../Professor/" . htmlspecialchars($row['contenu']) . "' target='_blank'>Lire le document PDF</a>";
                  displayImageBasedOnTitle($row['Titre'], $images);
              } else {
                  echo "<p>Aucun document à lire.</p>";
              }
                echo "</div>";
            }
        } else {
            echo "<p>Aucun article trouvé pour vos cours.</p>";
        }
        $conn->close();
        ?>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('input[name="article_filter"]');
        const articles = document.querySelectorAll('.article');

        function filterArticles() {
            const selected = document.querySelector('input[name="article_filter"]:checked').value;
            articles.forEach(article => {
                if (selected === 'all') {
                    article.style.display = '';
                } else if (selected === 'tutorials' && article.classList.contains('with-content')) {
                    article.style.display = '';
                } else if (selected === 'announcements' && article.classList.contains('no-content')) {
                    article.style.display = '';
                } else {
                    article.style.display = 'none';
                }
            });
        }

        radios.forEach(radio => radio.addEventListener('change', filterArticles));
        filterArticles(); 
    });
</script>

<script src="../js/script.js"></script>

   
</body>
</html>