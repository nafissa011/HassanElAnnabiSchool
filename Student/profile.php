<?php
require 'studlogin.php';

require '../db_connect.php';
$eleveId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT Nom, Date_naiss, Email, Tél, Niveau, Adresse, pfp, Password FROM eleve WHERE Elève_id = ?");
$stmt->bind_param("i", $eleveId);
$stmt->execute();
$result = $stmt->get_result();
$eleve = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $date = $conn->real_escape_string($_POST['date']);
    $tel = $conn->real_escape_string($_POST['tel']);
    $adresse = $conn->real_escape_string($_POST['adresse']);
    $email = $conn->real_escape_string($_POST['email']);
    $niveau = $conn->real_escape_string($_POST['niveau']);
    $oldPass = $_POST['old_pass'];
    $newPass = $_POST['new_pass'];
    $confirmPass = $_POST['c_pass'];

    if (!empty($oldPass) && !empty($newPass) && !empty($confirmPass)) {
        if ($oldPass === $eleve['Password']) {
            if ($newPass === $confirmPass) {
                $stmt = $conn->prepare("UPDATE eleve SET Password = ? WHERE Elève_id = ?");
                $stmt->bind_param("si", $newPass, $eleveId);
                $stmt->execute();
            } else {
                echo "New passwords do not match.";
                exit;
            }
        } else {
            echo "Old password is incorrect.";
            exit;
        }
    }

    $stmt = $conn->prepare("UPDATE eleve SET Nom = ?, Date_naiss = ?, Email = ?, Tél = ?, Adresse = ?, Niveau = ? WHERE Elève_id = ?");
    $stmt->bind_param("sssssi", $name, $date, $email, $tel, $adresse, $niveau, $eleveId);
    $stmt->execute();

  // Gestion de la photo de profil
$pfp = ''; 
if (isset($_FILES['pfp']) && $_FILES['pfp']['error'] === UPLOAD_ERR_OK) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileInfo = new SplFileInfo($_FILES['pfp']['name']);
    $fileExtension = strtolower($fileInfo->getExtension());

if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  $fileInfo = new SplFileInfo($_FILES['profilePic']['name']);
  $fileExtension = strtolower($fileInfo->getExtension());

  if (in_array($fileExtension, $allowedExtensions)) {
      $targetDirectory = "C:\wamp64\www\hassan_el_annabi\images\ "; 
      $newFileName = uniqid('eleve_pfp_', true) . '.' . $fileExtension;
      $targetPath = $targetDirectory . $newFileName;

      if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $targetPath)) {
          $stmt = $conn->prepare("UPDATE eleve SET pfp = ? WHERE Elève_id = ?");
          $stmt->bind_param("si", $targetPath, $eleveId);
          $stmt->execute();
          echo "Profile updated successfully.";
      } else {
          echo "Failed to upload new profile picture.";
      }
  } else {
      echo "Unsupported file type. Only JPG, JPEG, PNG, and GIF are allowed.";
  }
} elseif (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] !== UPLOAD_ERR_NO_FILE) {
  echo "Error uploading file: " . $_FILES['profilePic']['error'];
}

}
} 

$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page etudiant</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <link rel="stylesheet" href="../css/style.css">

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

      <a href="homeStud.php" class="logo"><img src="../images/logoHass1.png" alt="" width="200px"></a>

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



<section class="form-container">
<form action="profile.php" method="post" enctype="multipart/form-data">
    <h3>Update Profile</h3>
    <input type="text" name="name" value="<?php echo htmlspecialchars($eleve['Nom']); ?>" >
    <input type="date" name="date" value="<?php echo htmlspecialchars($eleve['Date_naiss']); ?>" >
    <input type="email" name="email" value="<?php echo htmlspecialchars($eleve['Email']); ?>" >
    <input type="text" name="tel" value="<?php echo htmlspecialchars($eleve['Tél']); ?>" >
    <input type="text" name="adresse" value="<?php echo htmlspecialchars($eleve['Adresse']); ?>" >
    <input type="text" name="niveau" value="<?php echo htmlspecialchars($eleve['Niveau']); ?>" >
    <input type="password" name="old_pass" placeholder="Current Password" >
    <input type="password" name="new_pass" placeholder="New Password" >
    <input type="password" name="c_pass" placeholder="Confirm New Password" >
    <input type="file" name="profilePic" accept="image/*">
    <input type="submit" name="submit" value="Update Profile">
</form>

</section>




<script src="../js/script.js"></script>

   
</body>
</html>