<?php
require 'adminlogin.php';

$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $pdo->prepare('DELETE FROM evènement WHERE Event_id = ?')->execute([$delete_id]);
    header("Location: eventManagement.php");
    exit;
}

$stmt = $pdo->query('SELECT Event_id, Nom_Event, Date_Event, description, Id_cat_art, image FROM evènement');
$evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gérer les professeurs</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <link rel="stylesheet" href="../css/style.css">

	 <style>
    
    .container {
        width: 100%;
        margin: auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }
    .heading {
			  align-items: center;
        color: #333;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-size: 20px;
    }
    .eleve {
        background: #fff;
        border-bottom: 1px solid #eee;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .eleve:nth-child(even) {
        background: #f9f9f9;
    }
    .eleve p {
        margin: 0;
        font-size: 18px;
    }
    .actions {
        display: flex;
        justify-content: flex-end;
    }
    
		.btn-modify {
			  padding: 5px 10px;
        text-decoration: none;
        color: white;
        border: none;
        border-radius: 5px;
        margin-right: 5px;
        cursor: pointer;
        font-size: 16px;
			  background-color: #007bff;
		}
    .btn-red {
			  padding: 5px 10px;
        text-decoration: none;
        color: white;
        border: none;
        border-radius: 5px;
        margin-right: 5px;
        cursor: pointer;
        font-size: 16px;
        background-color: #dc3545;
    }
    .btn-add {
        padding: 10px 15px;
        background-color: #8e44ad;
        display: block;
        width: fit-content;
        margin: 20px auto;
        text-align: center;
        color: white;
        text-decoration: none;
        border-radius: 5px;
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




<section>
    <div class="container">
        <h1 class="heading">Gestion des Evènements</h1>
        
        <div class="eleve heading">
            <p>N° Evènement</p>
            <p>Nom</p>
            <p>Date</p>
            <p class="actions">Actions</p>
        </div>

        <?php 
        $i = 1;
        foreach ($evenements as $event): ?>
            <div class="eleve">
                <p><?= $i?></p>
                <p><?= htmlspecialchars($event['Nom_Event'])?></p>
                <p><?= htmlspecialchars($event['Date_Event'])?></p>
                <div class="actions">
                    <a href="editEvent.php?id=<?= $event['Event_id'] ?>" class="btn btn-modify">Modifier</a>
                    <a href="?delete=<?= $event['Event_id'] ?>" class="btn btn-red" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet évènement ?');">Supprimer</a>
                </div>
            </div> 
        <?php 
        $i++; 
        endforeach; ?>

        <a href="addEvent.php" class="btn btn-add">Ajouter un Evènement</a>
    </div>
</section>






<script src="../js/script.js"></script>

   
</body>
</html>