<?php
session_start();
if ($_SESSION['role'] !== 'professeur') {
    header("Location: /hassan_el_annabi/login_form.php");
    exit;
}
$name = $_SESSION['name'];
$profId = $_SESSION['user_id'];

if (isset($_SESSION['pfp'])) {
  $imagePath = str_replace("C:\\wamp64\\www\\hassan_el_annabi\\", "http://localhost/hassan_el_annabi/", $_SESSION['pfp']);
  $imagePath = str_replace("\\", "/", $imagePath);
} else {
  $imagePath = "http://localhost/hassan_el_annabi/images/user_pfp_yellow.png";
} 

?> 