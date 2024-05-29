<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>école de musique</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <link rel="stylesheet" href="../hassan_el_annabi/css/home.css" />

    <style>
/* This is the header for the event section */
.event-header {
  margin-top: 100px;
  margin-bottom: 30px;
  text-align: center;
  font-family: 'Marko One', sans-serif;
}

/* General styling for elements with the Marko One font */
.marko-one-regular {
  font-family: 'Marko One', serif;
  font-weight: 400;
  font-style: normal;
}

/* Flexbox centering for any dropdown filters for events */
.choose.dropdown {
  display: flex;
  justify-content: center;
  margin-bottom: 80px;
}

/* Center text within the dropdown menu */
.dropdown-menu {
  text-align: center;
}

/* Styling for secondary buttons, potentially for filtering */
.choose .btn-secondary {
  background-color: #4e73df;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 5px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
}

.choose .btn-secondary:hover {
  background-color: #3658d4;
}

/* This will be the new container for the event cards, using Flexbox */
.event-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
}

/* Style for the event cards */
.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 300px; /* Adjust width as needed */
  height: auto;
  background: #e9ecf2;
  border-radius: 15px;
  box-shadow: 1px 5px 60px 0px #100a886b;
  margin: 20px;
  padding: 15px;
  color: #2e323b;
}

/* Adjust the image size for event images */
.card img {
  width: 100%; /* Full width of the card */
  height: auto; /* Maintain aspect ratio */
  object-fit: cover; /* Cover the area without stretching the image */
  object-position: center; /* Center the image within the allotted area */
  border-top-left-radius: 15px; /* Round the top left corner of the image */
  border-top-right-radius: 15px; /* Round the top right corner of the image */
}

/* Style for the event name (title) */
.card .event-name {
  font-weight: 600;
  font-size: 18px; /* Larger font size for the title */
  margin-top: 15px; /* Space above the title */
}

/* Style for the event date */
.card .event-date {
  font-weight: 400;
  font-size: 16px; /* Smaller font size for the date */
  color: #4e73df; /* A different color for the date */
  margin-bottom: 15px; /* Space below the date */
}

/* Style for the event description */
.card .event-description {
  font-size: 14px; /* Adjust the font size as needed */
  margin-bottom: 20px; /* Space below the description */
}

.event-slider {
  width: 100%;
  overflow: hidden;
  margin-top: 60px; /* Adjusted from your previous margin */
}

/* This will be the container for your sliding events */
.event-logos {
  width: 300%; /* Width should be enough to contain all your items side by side */
  display: flex;
  align-items: center;
  animation: slide 30s linear infinite; /* Duration depends on content width */
}

/* Style for individual event cards within the slider */
.event-logos .card {
  flex: 0 0 auto; /* Do not grow, do not shrink, base on width */
  width: 350px; /* Card width from previous CSS */
  margin: 0 25px; /* Spacing between cards, adjust as needed */
  /* Other styles like height, background, padding, etc., stay the same */
}

/* Adjusted animation to ensure continuous loop */
@keyframes slide {
  0% { transform: translateX(0); }
  100% { transform: translateX(-2700px); /* 9 events * 300px width each */ }
}

.header-container {
  display: flex;             /* Establishes a flexbox context */
  align-items: center;       /* Vertically aligns the image and heading */
}

.heading-img {
  margin-left: 10px;
  margin-right: 10px;
}

</style>



  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">
          <img
            src="../hassan_el_annabi/images/logoHass1.png"
            alt=""
            width="300px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="../hassan_el_annabi/home.php"
                >Accueil</a
              >
            </li>
            
            <li class="nav-item dropdown">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/music.png" alt="Musique" style="vertical-align: middle" width="40px" class="heading-img" />
                <a class="nav-link dropdown-toggle" href="#" id="coursDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Musique</a> 
             
             
              <ul class="dropdown-menu" aria-labelledby="coursDropdown">
                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/solfège.png" alt="Solfège" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Solfège.php">Solfège</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/piano.png" alt="Piano" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Piano.php">Piano</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/guitar.png" alt="Guitare" style="vertical-align: middle" width="40px" class="heading-img" />
                    <a class="dropdown-item nav-link heading" href="Guitar.php">Guitare</a> 
                  </div>
                </li>

                <li>
                  <div class="header-container">
                    <img src="../hassan_el_annabi/images/violon.png" alt="Violon" style="vertical-align: middle" width="50px"  class="heading-img"/>
                    <a class="dropdown-item nav-link heading" href="Violon.php">Violon</a> 
                  </div>
                </li>
              </ul>
              </div>
            </li>

          
            <li class="nav-item">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/ballet.png" alt="Danse Classique" style="vertical-align: middle" width="40px" />
                <a class="nav-link heading" href="DanseClassique.php">Danse classique</a> 
              </div>
            </li>
            <li class="nav-item">
              <div class="header-container">
                <img src="../hassan_el_annabi/images/art_dramatique.png" alt="Art Dramatique" style="vertical-align: middle" width="40px" />
                <a class="nav-link heading" href="ArtDramatique.php">Art dramatique</a> 
              </div>
            </li>
            


            <li class="nav-item">
              <a class="nav-link" href="home.php #events">Evènements</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="aboutDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                A propos 
              </a>
              <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                <li>
                  <a class="dropdown-item" href="home.php #about-us">À propos de nous</a>
                </li>
                <li><a class="dropdown-item" href="scheduleHome.php">Planning</a></li>
                <li>
                  <a class="dropdown-item" href="listeprof.php"
                    >Nos Professeurs</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="home.php #contact"
                    >Contact</a
                  >
                </li>
              </ul>
            </li>

          </ul>
          <a href="login.html" class="btn btn-brand ms-lg-3">Connexion</a>
        </div>
      </div>
    </nav>

    <!-- Home -->
    <section
      id="accueil"
      class="min-vh-100 d-flex align-items-center text-center"
      style="
        background-image: url('../hassan_el_annabi/images/background5.png');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      "
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1
              data-aos="fade-left"
              class="text-uppercase text-white fw-semibold display-1"
            >
              Bienvenue à l'école Hassan-El-Annabi
            </h1>
            <h5 class="text-white mt-3 mb-4" data-aos="fade-right">
              école communale de musique ,de danse classique et d'art dramatique
            </h5>
            <div data-aos="fade-up" data-aos-delay="50">
              <a href="signup.html" class="btn btn-brand me-2">S'inscrire</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--events-->
    <section id="events" class="section-padding border-top">
    
    <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

$categorieChoisie = isset($_GET['categorie']) ? $_GET['categorie'] : '';

if (!empty($categorieChoisie)) {
    $sql = "SELECT Event_id, Nom_Event, Date_Event, description, Id_cat_art, image 
            FROM evènement WHERE Id_cat_art = '".$conn->real_escape_string($categorieChoisie)."'";
} else {
    $sql = "SELECT Event_id, Nom_Event, Date_Event, description, Id_cat_art, image FROM evènement";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='event-slider'>";
    echo "<div class='event-logos'>";
    
    for ($i = 0; $i < 2; $i++) {
        $result->data_seek(0);
        
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            if (!empty($row["image"])) {
              // Convertir le chemin du système en URL web
              $imagePath = str_replace("C:\\wamp64\\www\\hassan_el_annabi\\", "http://localhost/hassan_el_annabi/", $row["image"]);
              $imagePath = str_replace("\\", "/", $imagePath); // Remplacer les antislashs par des slashs pour l'URL
              echo "<img src='" . htmlspecialchars($imagePath) . "' alt='Image de l'évènement'' class='event-image'>";
          }
            
            echo "<h3 class='event-name'>" . htmlspecialchars($row["Nom_Event"]) . "</h3>";
            echo "<p class='event-date'>" . htmlspecialchars($row["Date_Event"]) . "</p>";
            echo "<p class='event-description'>" . htmlspecialchars($row["description"]) . "</p>";
            echo "</div>";
        }
    }
    
    echo "</div>";
    echo "</div>";
} else {
    echo "Aucun évènement trouvé";
}

$conn->close();
?>





    </section>

    <!-- cours -->
    <section id="cours" class="section-padding border-top">
      <div class="container">
        <div class="row">
          <div
            class="col-12 text-center"
            data-aos="fade-down"
            data-aos-delay="150"
          >
            <div class="section-title">
              <h1 class="display-4 fw-semibold">Cours</h1>
              <div class="line"></div>
              <p>
                Libérez votre créativité et éveillez vos sens et vos talents
              </p>
            </div>
          </div>
        </div>
        <div class="row g-4 text-center">
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="150"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/solfège.png" />
              </div>
              <h5 class="mt-4 mb-3">Solfège</h5>
              <p>
                Développer votre compréhension avec nos instructeurs qualifiés
                qui vous guideront pour enrichir votre expérience musicale.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="250"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/piano.png" />
              </div>
              <h5 class="mt-4 mb-3">Piano</h5>
              <p>
                Découvrez notre programme de cours de piano captivants, conçus
                pour les débutants, les intermédiaires et les avancés.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="350"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/guitar.png" />
              </div>
              <h5 class="mt-4 mb-3">Guitare</h5>
              <p>
                Explorez la joie de jouer de la guitare à travers nos cours sur
                mesure, adaptés à tous les niveaux et tous les styles musicaux.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="450"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/violon.png"  />
              </div>
              <h5 class="mt-4 mb-3">Violon</h5>
              <p>
                Découvrez l'art du violon avec nos cours personnalisés ! Notre
                école de musique propose des leçons adaptées à tous les niveaux.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="550"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/ballet.png" alt="" />
              </div>
              <h5 class="mt-4 mb-3">Dance Classique</h5>
              <p>
                Explorez la grâce de la danse classique avec nos cours pour tous
                niveaux, enseignés par des professionnels pour développer votre
                art et votre musicalité.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-sm-6"
            data-aos="fade-down"
            data-aos-delay="650"
          >
            <div class="service theme-shadow p-lg-5 p-4">
              <div class="iconbox">
                <img src="images/art_dramatique.png" alt="" />
              </div>
              <h5 class="mt-4 mb-3">Art Dramatique</h5>
              <p>
                Explorez les personnages, l'improvisation et la maîtrise de la
                scène avec nos instructeurs passionnés pour libérer votre
                potentiel artistique.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--About Us-->
    <section id="about-us" class="section-padding border-top">
      <div class="container">
        <div class="row">
          <div
            class="col-12 text-center"
            data-aos="fade-down"
            data-aos-delay="150"
          >
            <div class="section-title">
              <h1 class="display-4 fw-semibold">A propos de nous</h1>
              <div class="line"></div>
              <p>
                Nous nous concentrons sur la création d'expériences pour nos
                étudiants, les poussent à surmonter leurs limites et les
                encouragent à suivre les désirs de leur cœur. L'art peut aider
                les étudiants à gagner en confiance en soi, à s'exprimer de
                manière créative et à développer une communauté fondée sur
                l'amour de l'apprentissage!
              </p>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Notre approche</h2>
            <ul class="list-of-features">
              <li>Leçons de musique privées</li>
              <li>Professeurs attentionnés</li>
              <li>Liberté d'essayer de nouvelles choses</li>
              <li>Tous les niveaux de compétence</li>
              <li>Tarifs compétitifs</li>
            </ul>
          </div>
          <div class="col-md-6">
            <img
              src="../hassan_el_annabi//images/profAboutUs.png"
              class="img-fluid"
              alt="Students and teacher with musical instruments"
              style="border: 2px solid #6970dd; border-radius: 5px"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- contact -->

    <section id="contact" class="section-padding border-top">
      <div class="contact-form">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="section-title">
                <h1 class="display-4 fw-semibold">Contactez-nous</h1>
                <div class="line1"></div>
              </div>
            </div>
          </div>
          <div class="main">
            <div class="content">
              <h2>Contact Information</h2>
              <ul class="contact-info">
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  Address: Annaba
                </li>
                <li><i class="fas fa-phone"></i> Phone: +213 0565783395</li>
                <li>
                  <i class="fas fa-envelope"></i> Email: Hassan23@gmail.com
                </li>
              </ul>
            </div>
            <div class="form-img">
              <img src="images/contact.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-5">
            <div class="col-lg-3 col-sm-6">
              <a href="#"
                ><img src="./assets/images/logo-white.svg" alt=""
              /></a>
              <div class="line"></div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Exercitationem, hic!
              </p>
              <div class="social-icons">
                <a href="#"><i class="ri-twitter-fill"></i></a>
                <a href="#"><i class="ri-instagram-fill"></i></a>
                <a href="#"><i class="ri-github-fill"></i></a>
                <a href="#"><i class="ri-dribbble-fill"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">SERVICES</h5>
              <div class="line"></div>
              <ul>
                <li><a href="#">Musique</a></li>
                <li><a href="DanseClassique.php">Danse classique</a></li>
                <li><a href="ArtDramatique.php">Art Dramatique</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">ABOUT</h5>
              <div class="line"></div>
              <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Company</a></li>
                <li><a href="#">Career</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
              <h5 class="mb-0 text-white">CONTACT</h5>
              <div class="line"></div>
              <ul>
                <li>Address: Annaba</li>
                <li>Phone: +213 0565783395</li>
                <li>Email: Hassan23@gmail.com/li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row g-4 justify-content-between">
            <div class="col-auto">
              <p class="mb-0">
                © Copyright Hassan-El-Aannabi. All Rights Reserved
              </p>
            </div>
            <div class="col-auto">
              <p class="mb-0">Designed with 💜 By M&N</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
    "></script>
    <script>
      document.addEventListener("DOMContentLoaded", (event) => {
        var submenus = document.querySelectorAll(".dropdown-submenu");
        for (var i = 0; i < submenus.length; i++) {
          submenus[i].addEventListener("click", function (e) {
            e.stopPropagation();
            this.querySelector(".dropdown-menu").classList.toggle("show");
          });
        }
      });
    </script>
    <script>
      // JavaScript to pause scrolling on mouseover
      document
        .querySelector(".scroll-wrapper")
        .addEventListener("mouseover", function () {
          this.style.animationPlayState = "paused";
        });

      document
        .querySelector(".scroll-wrapper")
        .addEventListener("mouseout", function () {
          this.style.animationPlayState = "running";
        });
    </script>
  </body>
</html>
