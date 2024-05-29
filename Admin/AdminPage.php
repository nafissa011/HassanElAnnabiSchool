<?php

require 'adminlogin.php';

?> 


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page admin</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


   <link rel="stylesheet" href="../css/style.css">
	 <style>
  .cards-row {
    display: flex;
    justify-content: space-around; 
    flex-wrap: wrap; 
  }

  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: calc(33.333% - 20px); 
    border-radius: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
    margin: 10px; 
    background: #fff;
  }

  .card img {
    border-radius: 10px 10px 0 0;
    padding: 20px;
    width: 50%;
  }

  .card-container {
    padding: 2px 16px;
  }

  .card-title {
    color: #333;
    font-size: 24px;
    margin: 10px 0;
  }

  .card-link {
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
    margin-bottom: 15px;
    display: inline-block;
  }

  .card-link:hover {
    text-decoration: underline;
  }

  @media (max-width: 800px) {
    .card {
      width: calc(50% - 20px); 
    }
  }

  @media (max-width: 500px) {
    .card {
      width: 100%; 
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

<section id="cards">
<div class="cards-row">
<div class="card">
  <img src="../images/stud_card.png" alt="Avatar" style="width:100px">
  <div class="card-container">
    <h4 class="card-title">Elèves</h4>
    <a href="studManagement.php" class="card-link">View</a>
  </div>
</div>
<div class="card">
  <img src="../images/prof_card.png" alt="Avatar" style="width:100px" >
  <div class="card-container">
    <h4 class="card-title">Professeurs</h4>
    <a href="profManagement" class="card-link">View</a>
  </div>
</div>
<div class="card">
  <img src="../images/cours_card.png" alt="Avatar" style="width:100px">
  <div class="card-container">
    <h4 class="card-title">Cours</h4>
    <a href="#" class="card-link">View</a>
  </div>
</div>
</div>

<div class="cards-row">
<div class="card">
  <img src="../images/cat_card.png" alt="Avatar" style="width:100px">
  <div class="card-container">
    <h4 class="card-title">Catégories</h4>
    <a href="#" class="card-link">View</a>
  </div>
</div>
<div class="card">
  <img src="../images/event.png" alt="Avatar" style="width:100px" >
  <div class="card-container">
    <h4 class="card-title">Evènements</h4>
    <a href="eventManagement.php" class="card-link">View</a>
  </div>
</div>
<div class="card">
  <img src="../images/schedule.png" alt="Avatar" style="width:100px">
  <div class="card-container">
    <h4 class="card-title">Emploi du temps</h4>
    <a href="scheduleManagement.php" class="card-link">View</a>
  </div>
</div>
</div>
</section>






<script src="../js/script.js"></script>

   
</body>
</html>