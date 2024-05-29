<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Professeurs</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <style>
      
     
.prof-header{
  margin-top: 100px;
  margin-bottom: 30px;
  text-align: center;
  font-family: "Marko One", 'sans-serif';
}

.marko-one-regular {
  font-family: "Marko One", serif;
  font-weight: 400;
  font-style: normal;
}

.choose.dropdown {
    display: flex;
    justify-content: center; 
    margin-bottom: 80px; 
}


.dropdown-menu {
    text-align: center; 
}

.choose .btn-secondary {
    background-color: #4e73df; 
    color: white; 
    border: none; 
    padding: 10px 20px; 
    font-size: 16px; 
    border-radius: 5px; 
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2); 
}

.choose .btn-secondary:hover {
    background-color: #3658d4; 
}



/* This will be your new container for the cards, using Flexbox */
.prof-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px; /* This adds space between the cards */
}

/* Adjust the width of the cards to fit 4 in a row */
/* Assuming a full container width and considering margins/paddings */
.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 290px;
  height: 370px;
  background: #e9ecf2;
  border-radius: 15px;
  box-shadow: 1px 5px 60px 0px #100a886b;
  margin: 20px; /* Adjust this margin to space out the cards */
  padding: 15px; /* Padding inside the card */
  color: #2e323b;
}

.card .img {
  width: 50px; /* Smaller width for the profile image */
  height: 50px; /* Smaller height for the profile image */
  background: #6b64f3;
  border-radius: 50%; /* Make it round */
  background-size: cover; /* Ensure the image covers the area */
  margin-bottom: 10px; /* Space below the image */
}

.card span {
  font-weight: 600;
  font-size: 16px;
  margin-bottom: 5px; /* Space below the name */
}

.card .job {
  font-weight: 400;
  font-size: 12px;
  margin-bottom: 10px; /* Space below the job title */
}




/* Icônes pour courriel et téléphone */
.email-icon:before {
    content: "✉"; /* Ou utiliser une icône de courriel de votre choix */
    display: inline-block;
    font-size: 16px;
    margin-right: 8px;
}

.phone-icon:before {
    content: "✆"; /* Ou utiliser une icône de téléphone de votre choix */
    display: inline-block;
    font-size: 16px;
    margin-right: 8px;
}

.header-container {
  display: flex;             /* Establishes a flexbox context */
  align-items: center;       /* Vertically aligns the image and heading */
}

.heading-img {
  margin-left: 10px;
  margin-right: 10px;
}
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white sticky-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">
          <img
            src="../hassan_el_annabi/images/logoHass1.png"
            alt=""
            width="300px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../hassan_el_annabi/home.php"
                >Accueil</a
              >
            </li>
            
            <li class="nav-item dropdown">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/music.png" alt="Musique" style="vertical-align: middle" width="40px" class="heading-img" />
                <a class="nav-link dropdown-toggle" href="#" id="coursDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Musique</a> 
             
             
              <ul class="dropdown-menu" aria-labelledby="coursDropdown">
                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/solfège.png" alt="Solfège" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Solfège.php">Solfège</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/piano.png" alt="Piano" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Piano.php">Piano</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/guitar.png" alt="Guitare" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Guitar.php">Guitare</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/violon.png" alt="Violon" style="vertical-align: middle" width="50px"  class="heading-img"/>
                    <a class="dropdown-item nav-link heading" href="Violon.php">Violon</a> 
                  </div>
                </li>
              </ul>
              </div>
            </li>

          
            <li class="nav-item">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/ballet.png" alt="Danse Classique" style="vertical-align: middle" width="40px" />
                <a class="nav-link heading" href="DanseClassique.php">Danse classique</a> 
              </div>
            </li>
            <li class="nav-item">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/art_dramatique.png" alt="Art Dramatique" style="vertical-align: middle" width="40px" />
                <a class="nav-link heading" href="ArtDramatique.php">Art dramatique</a> 
              </div>
            </li>
            

 
            <li class="nav-item">
              <a class="nav-link" href="home.php #events">Evènements</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="aboutDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                A propos 
              </a>
              <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                <li>
                  <a class="dropdown-item" href="home.php #about-us">À propos de nous</a>
                </li>
                <li><a class="dropdown-item" href="scheduleHome.php">Planning</a></li>
                <li>
                  <a class="dropdown-item" href="listeprof.php"
                    >Nos Professeurs</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="home.php #contact"
                    >Contact</a
                  >
                </li>
              </ul>
            </li>

          </ul>
          <a href="login.html" class="btn btn-brand ms-lg-3">Connexion</a>
        </div>
      </div>
    </nav>

    <div class="container">
        <h1 class="prof-header">Rencontrez nos Professeurs</h1>

        <div class="choose dropdown d-flex justify-content-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Choisit une spécialité
            </button>
            <ul class="dropdown-menu text-center">
              <li><a class="dropdown-item"  href="?specialite=Solfège">Solfège</a></li>
              <li><a class="dropdown-item" href="?specialite=Piano">Piano</a></li>
              <li><a class="dropdown-item" href="?specialite=Guitare">Guitare</a></li>
              <li><a class="dropdown-item" href="?specialite=Violon">Violon</a></li>
              <li><a class="dropdown-item" href="?specialite=Danse Classique">Danse Classique</a></li>
              <li><a class="dropdown-item" href="?specialite=Art Dramatique">Art Dramatique</a></li>
            </ul>
        </div>
        

        
        <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

$specialiteChoisie = isset($_GET['specialite']) ? $_GET['specialite'] : '';

if (!empty($specialiteChoisie)) {
    $sql = "SELECT Prof_id, Nom, `Email`, Tél, spécialité, pfp FROM professeur WHERE spécialité = '" . $conn->real_escape_string($specialiteChoisie) . "'";
} else {
    $sql = "SELECT Prof_id, Nom, `Email`, Tél, spécialité, pfp FROM professeur";
  }
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      echo "<div class='prof-wrapper'>";
      while($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          if (!empty($row["pfp"])) {
              // Convertir le chemin du système en URL web
              $imagePath = str_replace("C:\\wamp64\\www\\hassan_el_annabi\\", "http://localhost/hassan_el_annabi/", $row["pfp"]);
              $imagePath = str_replace("\\", "/", $imagePath); // Remplacer les antislashs par des slashs pour l'URL
              echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Photo de profil' class='prof-photo'>";
          }
          echo "<h3 class='prof-name'>" . htmlspecialchars($row["Nom"]) . "</h3>";
          echo "<p class='prof-speciality'>" . htmlspecialchars($row["spécialité"]) . "</p>";
          echo "<p><span class='phone-icon'></span>" . htmlspecialchars($row["Tél"]) . "</p>";
          echo "<p><span class='email-icon'></span>" . htmlspecialchars($row["Email"]) . "</p>";
          echo "</div>";
      }
      echo "</div>";
  } else {
      echo "Aucun professeur trouvé";
  }
  
  $conn->close();
  ?>
  


            
    

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>
