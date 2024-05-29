<?php
session_start();

require 'db_connect.php';

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$role = isset($_POST['role']) ? $_POST['role'] : null;

// D'abord, vérifier si l'utilisateur est un administrateur
$sqlAdmin = "SELECT * FROM admin WHERE Email='$email' AND Password='$password'";
$resultAdmin = $conn->query($sqlAdmin);

if ($resultAdmin->num_rows > 0) { 
    $user = $resultAdmin->fetch_assoc();
    $_SESSION['user_id'] = $user['Admin_id'];
    $_SESSION['name'] = $user['Nom'];
    $_SESSION['role'] = 'admin';
    $_SESSION['email'] = $user['Email'];
    header("Location: /hassan_el_annabi/Admin/AdminPage.php");
    exit;
} 

// Ensuite, vérifier pour les professeurs ou élèves
if ($role) {
    if ($role === "professeur") {
        $sql = "SELECT * FROM professeur WHERE Email='$email' AND Password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['Prof_id'];
            $_SESSION['name'] = $user['Nom'];
            $_SESSION['role'] = 'professeur';
            $_SESSION['email'] = $user['Email'];
            $_SESSION['pfp'] = $user['pfp'];
            header("Location: /hassan_el_annabi/Professor/profPage.php");
            exit;
        }
    } elseif ($role === "eleve") {
        $sql = "SELECT * FROM eleve WHERE Email='$email' AND Password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['Elève_id'];
            $_SESSION['name'] = $user['Nom'];
            $_SESSION['role'] = 'eleve';
            $_SESSION['email'] = $user['Email'];
            $_SESSION['pfp'] = $user['pfp'];
            header("Location: /hassan_el_annabi/Student/homeStud.php");
            exit;
        }
    } 

    if ($result->num_rows == 0) {
        echo "Identifiants incorrects ou utilisateur non trouvé.";
    }
} else {
    echo "Veuillez sélectionner un rôle et fournir les identifiants.";
}

$conn->close();
?>
