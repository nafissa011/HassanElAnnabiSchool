<?php
require 'adminlogin.php';

// Initialization of PDO connection
$pdo = new PDO('mysql:host=localhost;dbname=school', 'root', '');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $date_naiss = $_POST['date_naiss'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $niveau = $_POST['niveau'];
    $password = $_POST['password']; 
    $pfp = $_POST['pfp']; 

    $stmt = $pdo->prepare("UPDATE eleve SET Nom = ?, Date_naiss = ?, Adresse = ?, Email = ?, Tél = ?, Niveau = ? WHERE Elève_id = ?");
    $stmt->execute([$nom, $date_naiss, $adresse, $email, $tel, $niveau, $id]);

    header("Location: studManagement.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM eleve WHERE Elève_id = ?");
    $stmt->execute([$id]);
    $eleve = $stmt->fetch(PDO::FETCH_ASSOC);
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
      form input[type="password"] {
         width: 100%;
         padding: 8px;
         border: 1px solid #ccc;
         border-radius: 4px;
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

    <?php if ($eleve): ?>
        <form action="editStud.php" method="post">
            <input type="hidden" name="id" value="<?= $eleve['Elève_id'] ?>">
            <p>
                <label for="nom">Nom Complet:</label>
                <input type="text" name="nom" id="nom" required value="<?= htmlspecialchars($eleve['Nom']) ?>">
            </p>
            <p>
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" id="adresse" required value="<?= htmlspecialchars($eleve['Adresse']) ?>">
            </p>
            <p>
                <label for="date_naiss">Date de naissance:</label>
                <input type="date" name="date_naiss" id="date_naiss" required value="<?= $eleve['Date_naiss'] ?>">
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required value="<?= htmlspecialchars($eleve['Email']) ?>">
            </p>
            <p>
                <label for="tel">Numéro téléphone:</label>
                <input type="text" name="tel" id="tel" required value="<?= htmlspecialchars($eleve['Tél']) ?>">
            </p>
            <p>
                <label for="niveau">Niveau:</label>
                <input type="text" name="niveau" id="niveau" required value="<?= htmlspecialchars($eleve['Niveau']) ?>">
            </p>
          
            <p>
                <button type="submit">Modifier élève</button>
            </p>
        </form>
    <?php else: ?>
        <p>Student not found.</p>
    <?php endif; ?>
    <script src="../js/script.js"></script>
</body>

</html>
