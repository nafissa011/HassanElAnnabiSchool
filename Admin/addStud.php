<?php
require 'adminlogin.php';
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $date_naiss = $_POST['date_naiss'];
    $email = $_POST['email']; 
    $tel = $_POST['tel'];
    $niveau = $_POST['niveau'];
    $password = $_POST['password'];

    // Gestion de la photo de profil
    $pfp = ''; 
    if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] == UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileInfo = new SplFileInfo($_FILES['pfp']['name']);
        $fileExtension = strtolower($fileInfo->getExtension());

        if (in_array($fileExtension, $allowedExtensions)) {
$targetDirectory = "C:\wamp64\www\hassan_el_annabi\images\ ";
if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0777, true); 
}

$newFileName = uniqid('user_pfp_', true) . '.' . $fileExtension;
$targetPath = $targetDirectory . $newFileName;

if (move_uploaded_file($_FILES['pfp']['tmp_name'], $targetPath)) {
    $pfp = $targetPath; 
} else {
    echo "Erreur de téléchargement du fichier.";
    exit;
}

        } else {
            echo "Extension de fichier non autorisée.";
            exit;
        }
    }

    // Insertion des données dans la base de données
    $stmt = $pdo->prepare("INSERT INTO eleve (Nom, Date_naiss, Adresse, Email, Tél, Niveau, Password, pfp) VALUES (:nom, :date_naiss, :adresse, :email, :tel, :niveau, :password, :pfp)");
    $stmt->execute([
        ':nom' => $nom,
        ':date_naiss' => $date_naiss,
        ':adresse' => $adresse,
        ':email' => $email,
        ':tel' => $tel,
        ':niveau' => $niveau,
        ':password' => $password,
        ':pfp' => $pfp
    ]);

    header("Location: studManagement.php?status=success");
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
      <div class="title">Ajouter élève</div>
      <div class="content">
      <form action="addStud.php" method="post" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Nom Complet</span>
              <input type="text" name="nom" placeholder="Entrer le nom" required />
            </div>
            <div class="input-box">
              <span class="details">Adresse</span>
              <input type="text" name="adresse" placeholder="Entrer l'adresse" required />
            </div>

            <div class="input-box">
              <span class="details">Date de naissance</span>
              <input type="date" name="date_naiss" placeholder="Entrer la date de naissance" required />
            </div>
            
            <div class="input-box">
              <span class="details">Numéro téléphone</span>
              <input
                type="text"
                name="tel"
                placeholder="Entrer le numéro téléphone"
                required
              />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" name="email" placeholder="Entrer l'email" required />
            </div>
            <div class="input-box">
              <span class="details">Mot de passe</span>
              <input
                type="text"
                name="password"
                placeholder="Entrer le mot de passe"
                required
              />
            </div>
            <div class="input-box">
              <span class="details">Niveau</span>
              <input
                list="options"
                id="choix"
                name="niveau"
                placeholder="Choisit un niveau"
              />
 
              <datalist id="options">
                <option value="Débutant"></option>
                <option value="Intermédiaire"></option>
                <option value="Avancé"></option>
              </datalist>
            </div>

            <div class="input-box">
    <label for="pfp" class="details">Photo de profil</label>
    <input type="file" name="pfp" id="pfp" accept="image/*" required> 
</div>




          </div>

          <div class="button">
            <input type="submit" onclick="submitData();" value="Ajouter " />
          </div>
        </form>
      </div>
    </div>
    </section>

<script src="../js/script.js"></script>

   
</body>
</html>