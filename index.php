<?php
session_start();
require_once 'db.class.php';
$DB = new DB();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="Office National de Pêche et d'Aquaculture - République Démocratique du Congo">

    <title>
        ONPA | Office National de Pêche et d'Aquaculture
    </title>

<link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
   
    <link rel="stylesheet"  href="css/menu.css">
     <link rel="stylesheet"  href="css/styles.css">
    <link rel="stylesheet" href="css/presentation.css">
    <script src="js/menu.js"></script>
</head>


<body>

<?php include("headers.php"); ?>


<main>

    <!-- =====================================================
         HERO / ACCUEIL
    ====================================================== -->

    <section class="hero" id="accueil">

        <!-- SLIDER -->
        <div class="hero-slider">

            <!-- SLIDE 1 -->
            <article class="hero-slide active">

                <div class="hero-content">

                    <h1>
                        Pour une gestion durable
                        des ressources halieutiques et aquacoles
                        au service du développement
                        de la <span>RDC</span>
                    </h1>

                    <div class="hero-line"></div>

                    <p>
                        L'ONPA œuvre pour la promotion de la pêche
                        responsable, le développement de l'aquaculture
                        et la valorisation des ressources aquatiques
                        de la République Démocratique du Congo.
                    </p>

                    <a href="#apropos" class="hero-button">
                        <span>EN SAVOIR PLUS</span>
                        <strong>→</strong>
                    </a>

                </div>

                <div class="hero-image">

                    <img
                        src="assets/images/hero-1.png"
                        alt="Pêcheurs sur un lac en République Démocratique du Congo">

                </div>

            </article>


            <!-- SLIDE 2 -->
            <article class="hero-slide">

                <div class="hero-content">

                    <h1>
                        Pour une pêche
                        responsable et durable
                        au service des communautés
                        de la <span>RDC</span>
                    </h1>

                    <div class="hero-line"></div>

                    <p>
                        L'ONPA accompagne les acteurs du secteur
                        de la pêche pour une exploitation responsable
                        et durable des ressources halieutiques.
                    </p>

                    <a href="#missions" class="hero-button">
                        <span>NOS MISSIONS</span>
                        <strong>→</strong>
                    </a>

                </div>

                <div class="hero-image">

                    <img
                        src="assets/images/hero-2.jpg"
                        alt="Pêche artisanale en RDC">

                </div>

            </article>


            <!-- SLIDE 3 -->
            <article class="hero-slide">

                <div class="hero-content">

                    <h1>
                        Développer
                        l'aquaculture pour
                        renforcer la sécurité
                        alimentaire en <span>RDC</span>
                    </h1>

                    <div class="hero-line"></div>

                    <p>
                        Promouvoir le développement de l'aquaculture
                        et favoriser la création d'activités économiques
                        durables autour des ressources aquatiques.
                    </p>

                    <a href="#aquaculture" class="hero-button">
                        <span>AQUACULTURE</span>
                        <strong>→</strong>
                    </a>

                </div>

                <div class="hero-image">

                    <img
                        src="assets/images/hero-3.jpg"
                        alt="Aquaculture en République Démocratique du Congo">

                </div>

            </article>


            <!-- SLIDE 4 -->
            <article class="hero-slide">

                <div class="hero-content">

                    <h1>
                        Valoriser les ressources
                        aquatiques pour un
                        développement
                        <span>durable</span>
                    </h1>

                    <div class="hero-line"></div>

                    <p>
                        L'ONPA contribue à la valorisation des ressources
                        aquatiques et au développement d'une économie
                        bleue durable en République Démocratique du Congo.
                    </p>

                    <a href="#actualites" class="hero-button">
                        <span>DÉCOUVRIR</span>
                        <strong>→</strong>
                    </a>

                </div>

                <div class="hero-image">

                    <img
                        src="assets/images/hero-4.jpg"
                        alt="Ressources aquatiques de la RDC">

                </div>

            </article>

        </div>




        <!-- FLÈCHE SUIVANTE -->
        <button
            class="hero-arrow hero-arrow-next"
            id="heroNext"
            type="button"
            aria-label="Slide suivante">

            ›

        </button>

    </section>

<section class="director-message">

    <div class="director-container">

        <!-- PHOTO -->
        <div class="director-photo">
            <img
                src="assets/images/president.png"
                alt="Directeur Général de l'ONPA">
        </div>

        <!-- MESSAGE -->
        <div class="director-content">

          

            <h2>
                ONPA, vision du Chef de l'Etat Congolais
            </h2>

            <div class="director-line"></div>

            <p class="director-quote">
                L'Office National de Pêche et d'Aquaculture "ONPA" en sigle a été créé en juin 2022 par Son Excellence Monsieur 
                    Félix-Antoine TSHISEKEDI TSHILOMBO, Président de la République et Chef de l'Etat, pour augmenter la production halieutique et aquacole en RDCongo afin que "le poisson soit l'aliment quotidien du plus démuni des congolais." 
            </p>

           

        </div>

        

    </div>

</section>
<!-- =====================================================
     ÉTAPE 3 — CHIFFRES CLÉS ONPA
===================================================== -->

<section class="onpa-stats" id="chiffres-cles">

    <!-- Décoration supérieure -->
    <div class="stats-top-line"></div>

    <div class="stats-container">

        <!-- =================================================
             INTRODUCTION
        ================================================== -->

        <div class="stats-header">

            <span class="stats-kicker">
                L'ONPA EN CHIFFRES
            </span>

            <h2>
                La pêche et l'aquaculture
                <span>en chiffres</span>
            </h2>

            <div class="stats-title-line"></div>

            <p>
                Découvrez quelques indicateurs clés qui illustrent
                l'importance du secteur de la pêche et de
                l'aquaculture en République Démocratique du Congo.
            </p>

        </div>


        <!-- =================================================
             STATISTIQUES
        ================================================== -->

        <div class="stats-grid">


            <!-- STAT 1 -->
            <article class="stat-card">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            d="M3 17c3-4 6-4 9 0s6 4 9 0"/>

                        <path
                            d="M5 13c1.5-2 3-3 5-3"/>

                        <path
                            d="M14 10c2 0 4 1 5 3"/>

                        <path
                            d="M12 4v6"/>

                        <path
                            d="M9 7l3-3 3 3"/>

                    </svg>

                </div>

                <div class="stat-number">

                    <span
                        class="counter"
                        data-target="25000">
                        0
                    </span>

                    <span class="stat-plus">+</span>

                </div>

                <h3>
                    Pêcheurs accompagnés
                </h3>

                <p>
                    Acteurs du secteur soutenus
                    dans leurs activités.
                </p>

            </article>


            <!-- STAT 2 -->
            <article class="stat-card">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            d="M3 12c3-5 7-7 9-7s6 2 9 7c-3 5-7 7-9 7s-6-2-9-7z"/>

                        <circle
                            cx="12"
                            cy="12"
                            r="2.5"/>

                        <path
                            d="M6 8l-2-3"/>

                        <path
                            d="M18 8l2-3"/>

                    </svg>

                </div>

                <div class="stat-number">

                    <span
                        class="counter"
                        data-target="850">
                        0
                    </span>

                    <span class="stat-plus">+</span>

                </div>

                <h3>
                    Sites aquacoles
                </h3>

                <p>
                    Sites et exploitations aquacoles
                    recensés et accompagnés.
                </p>

            </article>


            <!-- STAT 3 -->
            <article class="stat-card">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            d="M4 19h16"/>

                        <path
                            d="M6 19V9"/>

                        <path
                            d="M10 19V5"/>

                        <path
                            d="M14 19v-7"/>

                        <path
                            d="M18 19V3"/>

                    </svg>

                </div>

                <div class="stat-number">

                    <span
                        class="counter"
                        data-target="125000">
                        0
                    </span>

                    <span class="stat-unit">
                        T
                    </span>

                </div>

                <h3>
                    Production annuelle
                </h3>

                <p>
                    Estimation de la production
                    halieutique et aquacole.
                </p>

            </article>


            <!-- STAT 4 -->
            <article class="stat-card">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            d="M12 21s7-5.2 7-11A7 7 0 0 0 5 10c0 5.8 7 11 7 11z"/>

                        <circle
                            cx="12"
                            cy="10"
                            r="2.5"/>

                    </svg>

                </div>

                <div class="stat-number">

                    <span
                        class="counter"
                        data-target="26">
                        0
                    </span>

                </div>

                <h3>
                    Provinces couvertes
                </h3>

                <p>
                    Présence et interventions
                    à travers la RDC.
                </p>

            </article>

        </div>



    </div>

</section>

<!-- =====================================================
     ÉTAPE 4 — ACTUALITÉS & ANNONCES
===================================================== -->

<section class="onpa-news" id="actualites">

    <div class="news-container">

        <!-- =================================================
             COLONNE ACTUALITÉS
        ================================================== -->

        <div class="news-main">

            <div class="news-header">

                <div>
                    <span class="news-kicker">
                        ACTUALITÉS
                    </span>

                    <h2>
                        Actualités
                    </h2>
                </div>

               <a href="actualites.php"> <button
                    class="news-view-all"
                    id="newsViewAll"
                    type="button"
                    aria-expanded="false">

                    <span>VOIR TOUTES</span>

                    <strong class="news-arrow">
                        →
                    </strong>

                </button>
        </a>
            </div>


            <!-- =================================================
                 GRILLE DES ACTUALITÉS
            ================================================== -->

             <?php 
                     
                $code_site="3BB94";

                                      $details= $DB ->query("SELECT * FROM  actualites  WHERE code='$code_site'  ORDER BY dates DESC LIMIT 3");
                                     ?>


            <div class="news-grid">


                <!-- ACTUALITÉ 1 -->

                 
<?php   foreach($details as $details): ?>
                <article class="news-card">

                    <a href="actualite-detail.php?id=<?= $details->id; ?>" class="news-card-link">

                        <div class="news-image">

                            <img src="https://cms.wbs-rdc.com/contenu/users/images/<?= $details->image; ?>" >


                        </div>


                        <div class="news-content">

                            <h3>
                               <?= $details->titre; ?>
                            </h3>

                            <div class="news-date">

                                <span class="calendar-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true">

                                        <rect
                                            x="3"
                                            y="5"
                                            width="18"
                                            height="16"
                                            rx="2">
                                        </rect>

                                        <line
                                            x1="7"
                                            y1="3"
                                            x2="7"
                                            y2="7">
                                        </line>

                                        <line
                                            x1="17"
                                            y1="3"
                                            x2="17"
                                            y2="7">
                                        </line>

                                        <line
                                            x1="3"
                                            y1="10"
                                            x2="21"
                                            y2="10">
                                        </line>

                                    </svg>

                                </span>

                                <span>
                                    <?= $details->dates; ?>
                                </span>

                            </div>

                        </div>

                    </a>

                </article>
 <?php   endforeach ?>
               
            </div>

        </div>


        <!-- =================================================
             COLONNE ANNONCES IMPORTANTES
        ================================================== -->

        <aside class="important-announcements">

            <div class="announcements-header">

                <div class="announcement-bell">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <path
                            d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9">
                        </path>

                        <path
                            d="M10 21h4">
                        </path>

                    </svg>

                </div>

                <h2>
                    ANNONCES IMPORTANTES
                </h2>

            </div>


            <div class="announcements-line"></div>


            <div class="announcements-list">


                <!-- ANNONCE 1 -->

                <div class="announcement-item">

                    <div class="announcement-date">

                        <strong>
                            20
                        </strong>

                        <span>
                            MAI
                        </span>

                    </div>

                    <div class="announcement-text">
                        Fermeture temporaire de la
                        pêche sur le Lac Mai-Ndombe
                    </div>

                </div>


                <!-- ANNONCE 2 -->

                <div class="announcement-item">

                    <div class="announcement-date">

                        <strong>
                            18
                        </strong>

                        <span>
                            MAI
                        </span>

                    </div>

                    <div class="announcement-text">
                        Appel à projets pour la
                        promotion de l'aquaculture
                    </div>

                </div>


                <!-- ANNONCE 3 -->

                <div class="announcement-item">

                    <div class="announcement-date">

                        <strong>
                            12
                        </strong>

                        <span>
                            MAI
                        </span>

                    </div>

                    <div class="announcement-text">
                        Atelier de sensibilisation sur
                        la pêche durable à Matadi
                    </div>

                </div>

            </div>


            <button
                class="announcements-button"
                id="announcementsButton"
                type="button">

                TOUTES LES ANNONCES

            </button>

        </aside>

    </div>

</section>

<?php include("footer.php"); ?>

</main>


<script src="js/script.js"></script>
</body>

</html>