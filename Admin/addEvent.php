<?php
 require 'adminlogin.php';
$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');
 
//requête pour obtenir les catégories artistiques
$stmt = $pdo->query("SELECT Id_cat_art, Désignation FROM cat_artistique");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte des données du formulaire
    $nom_event = $_POST['nom_event'];
    $date_event = $_POST['date_event'];
    $description = $_POST['description'];
    $id_cat_art = $_POST['id_cat_art'];
    $image = ''; 

    // Gestion de l'image
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDirectory = "C:\wamp64\www\hassan_el_annabi\images\ events\ "; 
    $imageFileName = basename($_FILES['image']['name']);
    $imagePath = $targetDirectory . $imageFileName;

    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); 
    }

    // Déplacement du fichier du dossier temporaire vers le dossier de destination
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $image = ''; 
        echo "Erreur de téléchargement de l'image.";
    } else {
        $image = $imagePath; 
    }
} else {
    $image = '';
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "Erreur de téléchargement: " . $_FILES['image']['error']; 
    }
}


    // Insertion des données dans la base de données
    $stmt = $pdo->prepare("INSERT INTO evènement (Nom_Event, Date_Event, description, Id_cat_art, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom_event, $date_event, $description, $id_cat_art, $image]);

    header("Location: eventManagement.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ajouter un élève</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="../css/addStud.css" />
    

   <link rel="stylesheet" href="../css/style.css">

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
         <img src="../images/user_pfp_black.png" class="image" alt="">
         <h3 class="name">Kaci Khalil</h3>
         <p class="role">Admin</p>
         <a href="profile.html" class="btn">view profile</a>
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
      <img src="../images/user_pfp_black.png" class="image" alt="">
      <h3 class="name">Kaci Khalil</h3>
      <p class="role">Admin</p>
      <a href="profile.html" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="AdminPage.php"><i class="fas fa-home"></i><span>Accueil</span></a>
      <a href="studManagement.php"><i class="fa-solid fa-users-between-lines"></i><span>Gérer les Elèves</span></a>
      <a href="profManagement.php"><i class="fas fa-chalkboard-user"></i><span>Gérer les professeurs</span></a>
      <a href="eventManagement.php"><i class="fa-solid fa-masks-theater"></i><span>Gérer les évènements</span></a>
			<a href="scheduleManagement.html"><i class="fa-solid fa-calendar-days"></i><span>Gérer emploi du temps</span></a>
   </nav>

</div>

<section>
<div class="container">
    <div class="title">Ajouter un événement</div>
    <div class="content">
        <form action="addEvent.php" method="post" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom de l'événement</span>
                    <input type="text" name="nom_event" placeholder="Entrer le nom de l'événement" required />
                </div>
                <div class="input-box">
                    <span class="details">Date de l'événement</span>
                    <input type="date" name="date_event" required />
                </div>
                <div class="input-box">
                    <span class="details">Description</span>
                    <textarea name="description" placeholder="Décrire l'événement" required></textarea>
                </div>
                <div class="input-box">
                    <span class="details">Catégorie Artistique</span>
                    <select name="id_cat_art" required>
                        <option value="">Choisir une catégorie</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category['Id_cat_art']) ?>"><?= htmlspecialchars($category['Désignation']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Image de l'événement</span>
                    <input type="file" name="image" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Ajouter l'événement" />
            </div>
        </form>
    </div>
</div>
</section>


<script src="../js/script.js"></script>

   
</body>
</html>