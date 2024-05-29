<?php
require 'db_connect.php';

$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');

// Requête pour obtenir tous les détails nécessaires pour les cours
$sql = "SELECT c.Cours_id, c.Salle, p.Nom as ProfName, a.Désignation as CourseName
        FROM cours c
        JOIN professeur p ON c.Prof_id = p.Prof_id
        JOIN cat_artistique a ON c.Id_cat_art = a.Id_cat_art
        ORDER BY c.Cours_id";

$stmt = $pdo->query($sql);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Préparation des données pour chaque jour de la semaine
$days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];
$schedule = [];
foreach ($days as $day) {
    // Chaque jour commence par les ID des cours suivants
    $startId = count($schedule) * 7 + 1;
    $endId = $startId + 6;
    for ($id = $startId; $id <= $endId; $id++) {
        $schedule[$day][] = $courses[$id - 1] ?? null; // Si l'ID existe
    }
}

$times = ['9:00 am', '10:00 am', '11:00 am', '1:00 pm', '2:00 pm', '3:00 pm', '4:00 pm'];

?>
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



.prof-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
}

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
  margin: 20px; 
  padding: 15px; 
  color: #2e323b;
}

.card .img {
  width: 50px; 
  height: 50px; 
  background: #6b64f3;
  border-radius: 50%; 
  background-size: cover; 
  margin-bottom: 10px; 
}

.card span {
  font-weight: 600;
  font-size: 16px;
  margin-bottom: 5px;
}

.card .job {
  font-weight: 400;
  font-size: 12px;
  margin-bottom: 10px; 
}




.email-icon:before {
    content: "✉"; 
    display: inline-block;
    font-size: 16px;
    margin-right: 8px;
}

.phone-icon:before {
    content: "✆"; 
    display: inline-block;
    font-size: 16px;
    margin-right: 8px;
}

.header-container {
  display: flex;             
  align-items: center;     
}

.heading-img {
  margin-left: 10px;
  margin-right: 10px;
}

.schedule-table {
    width: 1200px;
    border-collapse: collapse;
    margin: auto;
    margin-top: 80px;
    font-size: 0.9em;
    min-width: 600px;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
    font-size: 16px;
  }
  .schedule-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
  }
  .schedule-table th,
  .schedule-table td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
  }
  .schedule-table tbody tr {
    background-color: #f3f3f3;
  }
  .schedule-table tbody tr:nth-of-type(odd) {
    background-color: #e7e7e7;
  }
  .schedule-table tbody td {
    color: #333333;
  }
  .schedule-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
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

   
        
    <section>
<table class="schedule-table">
    <thead>
        <tr>
            <th>Time</th>
            <?php foreach ($days as $day): ?>
                <th><?= $day ?></th>
            <?php endforeach; ?>
            <th>Friday</th> <!-- Vendredi est toujours vide -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($times as $index => $time): ?>
        <tr>
            <td><?= $time ?></td>
            <?php foreach ($days as $day): ?>
                <td> 
                    <?php if (!empty($schedule[$day][$index])): 
                        $course = $schedule[$day][$index];
                        echo "{$course['CourseName']} ( {$course['Salle']}) - Prof. {$course['ProfName']}";
                    else:
                        echo 'X'; // Si aucun cours n'est prévu à cet index
                    endif; ?>
                </td>
            <?php endforeach; ?>
            <td>X</td> <!-- Vendredi est vide -->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>
        
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>
