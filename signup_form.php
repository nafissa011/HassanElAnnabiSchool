<?php
require 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    // Vérifier si l'email existe déjà 
    $stmt = $conn->prepare("SELECT * FROM eleve WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email déjà utilisé par un autre compte.";
    } else {  
        $insert = $conn->prepare("INSERT INTO eleve (Nom, Email, Password) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $nom, $email, $password);
        // Exécution de la requête d'insertion
        if ($insert->execute() === TRUE) {
            // Récupérer le dernier ID inséré pour l'utiliser dans la session
            $last_id = $conn->insert_id;

            // Démarrer la session et enregistrer les informations de l'utilisateur
            session_start();
            $_SESSION['user_id'] = $last_id;
            $_SESSION['name'] = $nom;
            $_SESSION['role'] = 'eleve';
            $_SESSION['email'] = $email;

            header("Location: /hassan_el_annabi/Student/homeStud.php");
            exit;
        } else {
            echo "Erreur lors de l'inscription : " . $insert->error;
        }
        $insert->close();
    }
    $stmt->close();
    $conn->close();
}
?>
 