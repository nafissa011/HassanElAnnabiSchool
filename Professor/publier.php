<?php
require 'proflogin.php';

require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $conn->real_escape_string($_POST['titre']);
    $description = $conn->real_escape_string($_POST['description']);
    $categorie = $_POST['categorie'];
    $profId = $_SESSION['user_id']; 
    

    $pdfPath = ''; 
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['pdf_file']['tmp_name'];
        $fileName = $_FILES['pdf_file']['name'];
        $fileSize = $_FILES['pdf_file']['size'];
        $fileType = $_FILES['pdf_file']['type'];

        if (strtolower(pathinfo($fileName, PATHINFO_EXTENSION)) == 'pdf') {
            $uploadPath = 'pdf/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true); 
            }

            $newFileName = uniqid('pdf_', true) . '.pdf';
            $pdfPath = $uploadPath . $newFileName;

            if (!move_uploaded_file($fileTmpPath, $pdfPath)) {
                echo "Erreur de téléchargement du fichier PDF.";
                exit;
            }
        } else {
            echo "Le fichier doit être un PDF.";
            exit;
        }
    }

    $sql = "INSERT INTO article (Prof_id, Id_cat, Titre, Date_création, Description, contenu) 
            VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisss", $profId, $categorie, $titre, $description, $pdfPath);
    if ($stmt->execute()) {
        header("Location: publication.php");
    } else {
        echo "Erreur lors de la publication de l'article: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
