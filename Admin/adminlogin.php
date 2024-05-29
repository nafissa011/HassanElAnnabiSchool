<?php
session_start();
// Vérifier si l'utilisateur connecté est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header("Location: /hassan_el_annabi/login_form.php");
    exit;
}

$name = $_SESSION['name']; 

if (isset($_SESSION['pfp'])) {
  // Convertir le chemin local du serveur en une URL accessible
  $imagePath = str_replace("C:\\wamp64\\www\\hassan_el_annabi\\", "http://localhost/hassan_el_annabi/", $_SESSION['pfp']);
  $imagePath = str_replace("\\", "/", $imagePath);
} else {
  $imagePath = "http://localhost/hassan_el_annabi/images/user_pfp_black.png";
}
?>