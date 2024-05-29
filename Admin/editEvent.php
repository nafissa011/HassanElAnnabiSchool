<?php

require 'adminlogin.php';



$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');

$eventId = $_GET['id'] ?? ($_POST['event_id'] ?? null); 

if ($eventId) {
    $stmt = $pdo->prepare('SELECT Event_id, Nom_Event, Date_Event, description, image FROM evènement WHERE Event_id = ?');
    $stmt->execute([$eventId]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        die('Évènement non trouvé!');
    } 
} else {
    die('Aucun identifiant d\'événement fourni!');
}

if (isset($_POST['update'])) {
    $nom = $_POST['nom_event'];
    $date = $_POST['date_event'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $updateStmt = $pdo->prepare('UPDATE evènement SET Nom_Event = ?, Date_Event = ?, description = ?, image = ? WHERE Event_id = ?');
    $success = $updateStmt->execute([$nom, $date, $description, $image, $eventId]);

    if ($success) {
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        header("Location: eventManagement.php");
    } else {
        echo "<p>Erreur lors de la mise à jour de l'évènement.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="../css/addStud.css" />
    

   <link rel="stylesheet" href="../css/style.css">
    <title>Edit Student</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    form {
        max-width: 700px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 13px;
    }

    form p {
        margin-bottom: 10px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="date"],
    form input[type="password"],
    form textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: none; 
    }

    form textarea {
        height: 150px; 
    }

    form button {
        background-color: #0056b3;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    form button:hover {
        background-color: #003d80;
    }

    @media (max-width: 600px) {
        form {
            width: 95%;
            padding: 20px;
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
         <p class="role">Admin</p>
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
      <p class="role">Admin</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="AdminPage.php"><i class="fas fa-home"></i><span>Accueil</span></a>
      <a href="studManagement.php"><i class="fa-solid fa-users-between-lines"></i><span>Gérer les Elèves</span></a>
      <a href="profManagement.php"><i class="fas fa-chalkboard-user"></i><span>Gérer les professeurs</span></a>
      <a href="eventManagement.php"><i class="fa-solid fa-masks-theater"></i><span>Gérer les évènements</span></a>
			<a href="scheduleManagement.php"><i class="fa-solid fa-calendar-days"></i><span>Gérer emploi du temps</span></a>
            <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Déconnexion</span></a>
   </nav>

</div>

<form action="editEvent.php" method="post">
    <input type="hidden" name="event_id" value="<?= htmlspecialchars($eventId) ?>">
    <p>
        <label for="nom_event">Nom de l'évènement:</label>
        <input type="text" id="nom_event" name="nom_event" value="<?= htmlspecialchars($event['Nom_Event']) ?>" required><br>
    </p>
    <p>
        <label for="date_event">Date de l'évènement:</label>
        <input type="date" id="date_event" name="date_event" value="<?= htmlspecialchars($event['Date_Event']) ?>" required><br>
    </p>
    <p>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($event['description']) ?></textarea><br>
    </p>
    <p>
        <label for="image">Image (URL):</label>
        <input type="text" id="image" name="image" value="<?= htmlspecialchars($event['image']) ?>" required><br>
    </p>
    
    <p>
        <button type="submit" name="update" >Modifier l'événement</button>
    </p>
</form>



    <script src="../js/script.js"></script>
</body>

</html>
