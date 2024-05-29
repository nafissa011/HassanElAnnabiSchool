<?php
require 'proflogin.php';

require '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_article'])) {
    $id_article = $conn->real_escape_string($_POST['id_article']);
    $sql = "DELETE FROM article WHERE Article_id = '$id_article'";

    if ($conn->query($sql) === TRUE) {
        echo "Article supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'article: " . $conn->error;
    }
}

$conn->close();
header("Location: publication.php"); 
exit();
?>
