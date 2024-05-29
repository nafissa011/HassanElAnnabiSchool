<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <link rel="stylesheet" href="../hassan_el_annabi/css/home.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Marko+One&display=swap"
      rel="stylesheet"
    />
    <style>
      .main-content {
  display: flex;
  flex-direction: column;
  align-items: center; 
  margin-top: 100px; 
  padding: 20px;
}

.header-container {
  display: flex;             
  align-items: center;       
}


.heading {
  font-family: "Marko One", sans-serif;
  font-size: 2.5em;
  color: #394096;
  margin-bottom: 25px; 
  margin-left: 10px;  
}

.heading-img {
  margin-bottom: 25px;
}

.heading1 {
  font-family: "Marko One", sans-serif;
  font-size: 1.3em;
  color: #394096;
  margin-top: 50px;
  margin-bottom: 25px; 
}

.paragraph {
  width: 800px;
  font-size: 0.9em;
}

.professor-profiles {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.profile-box {
  display: flex; 
  align-items: center; 
  border: 1px solid #ccc;
  padding: 0.5rem;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
  width: 250px; 
}

.profile-pic {
  width: 50px; 
  height: 50px; 
  border-radius: 50%;
  margin-right: 0.5rem; 
}

.professor-name {
  font-size: 1.1rem;
  margin: 0;
}

.professor-speciality {
  font-size: 0.9rem;
  color: #555;
  margin: 0;
}

.image-container {
  max-width: 800px;           
  margin: auto;               
}

.image-row {
  display: flex;              
  justify-content: space-between; 
  margin-bottom: 10px;      
}

.image-row img {
  width: calc(50% - 5px);                 
  height: 50%;              
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}




.header-container2 {
  display: flex;           
  align-items: center;      
}

.heading-img1 {
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
              <div class="header-container2">
                <img src="../hassan_el_annabi/images/music.png" alt="Musique" style="vertical-align: middle" width="40px" class="heading-img1" />
                <a class="nav-link dropdown-toggle " href="#" id="coursDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Musique</a> 
             
             
              <ul class="dropdown-menu" aria-labelledby="coursDropdown">
                <li>
                  <div class="header-container2">
                    <img src="../hassan_el_annabi/images/solfège.png" alt="Solfège" style="vertical-align: middle" width="40px" class="heading-img1" />
                    <a class="dropdown-item nav-link " href="Solfège.php">Solfège</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container2">
                    <img src="../hassan_el_annabi/images/piano.png" alt="Piano" style="vertical-align: middle" width="40px" class="heading-img1" />
                    <a class="dropdown-item nav-link " href="Piano.php">Piano</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container2">
                    <img src="../hassan_el_annabi/images/guitar.png" alt="Guitare" style="vertical-align: middle" width="40px" class="heading-img1" />
                    <a class="dropdown-item nav-link " href="Guitar.php">Guitare</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container2">
                    <img src="../hassan_el_annabi/images/violon.png" alt="Violon" style="vertical-align: middle" width="50px"  class="heading-img1"/>
                    <a class="dropdown-item nav-link " href="Violon.php">Violon</a> 
                  </div>
                </li>
              </ul>
              </div>
            </li>

          
            <li class="nav-item">
              <div class="header-container2">
                <img src="../hassan_el_annabi/images/ballet.png" alt="Danse Classique" style="vertical-align: middle" width="40px" />
                <a class="nav-link " href="DanseClassique.php">Danse classique</a> 
              </div>
            </li>
            <li class="nav-item">
              <div class="header-container2">
                <img src="../hassan_el_annabi/images/art_dramatique.png" alt="Art Dramatique" style="vertical-align: middle" width="40px" />
                <a class="nav-link " href="ArtDramatique.php">Art dramatique</a> 
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

    <div class="main-content">
    <div class="header-container">
  <img src="../hassan_el_annabi/images/ballet2.png" alt="" width="60px" class="heading-img">
  <h1 class="heading">Leçons de Danse Classique</h1>
</div>

      
      <div class="professor-profiles">
      <?php
require 'db_connect.php';
    
    $sql = "SELECT Prof_id, Nom, Spécialité, pfp FROM professeur WHERE Spécialité = 'Danse Classique'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='profile-box'>";
            if (!empty($row["pfp"])) {
              // Convertir le chemin du système en URL web
              $imagePath = str_replace("C:\\wamp64\\www\\hassan_el_annabi\\", "http://localhost/hassan_el_annabi/", $row["pfp"]);
              $imagePath = str_replace("\\", "/", $imagePath); // Remplacer les antislashs par des slashs pour l'URL
              echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Photo de profil' class='profile-pic'>";
          }
            echo "<p class='professor-name'>".$row['Nom']."</p>";

            echo "</div>";
        }
    } else {
        echo "<p>No Danse Classique professors found.</p>";
    }
    
    // Close connection
    $conn->close();
?>
  </div>

    
    <div>
      <h3 class="heading1">Bienvenue dans nos cours de Danse Classique de l'école de Hassan El annabi !</h3>
      <p class="paragraph">Notre programme de danse classique est minutieusement élaboré pour offrir une expérience d'apprentissage complète et gratifiante, destinée à développer la technique, la grâce et l'expression artistique des étudiants de tous âges et niveaux.

Sous la direction de nos professeurs expérimentés et passionnés, les élèves sont guidés à travers un curriculum rigoureux qui couvre les bases fondamentales de la danse classique ainsi que des exercices spécifiques visant à renforcer la posture, la flexibilité et la force musculaire.

Chaque leçon est une exploration de la beauté et de la discipline de cet art intemporel, permettant aux élèves de développer non seulement leurs compétences techniques, mais aussi leur sensibilité artistique et leur capacité à communiquer des émotions à travers le mouvement.

Que vous soyez un débutant enthousiaste ou un danseur expérimenté cherchant à perfectionner votre art, nos cours de danse classique offrent un environnement enrichissant où chacun peut s'épanouir et réaliser son plein potentiel dans le monde enchanteur de la danse.
</p>
    </div>

     

<div class="image-container">
  <div class="image-row">
    <img src="../hassan_el_annabi/images/Cours/ballet3.jpg" alt="Image 1">
    <img src="../hassan_el_annabi/images/Cours/ballet4.jpg" alt="Image 2">
  </div>
  <div class="image-row">
    <img src="../hassan_el_annabi/images/Cours/ballet5.jpg" alt="Image 3">
    <img src="../hassan_el_annabi/images/Cours/ballet6.jpg" alt="Image 4">
  </div>
</div>


    

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>

  </body>
</html>
