<?php
require 'studlogin.php';

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
<html lang="en"> 
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <link rel="stylesheet" href="../css/style.css">

   <style>
  
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



<script src="../js/script.js"></script>

   
</body>
</html>