<?php
session_start();
require_once 'db.class.php';
$DB = new DB();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Actualités de l'Office National de Pêche et d'Aquaculture - ONPA RDC">

    
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
     <link rel="stylesheet"  href="css/styless.css">
    <link rel="stylesheet" href="css/presentation.css">
     <link rel="stylesheet" href="css/actualites.css">
     <link rel="stylesheet" href="css/news.css">
      <script src="js/news.js"></script>
    <script src="js/menu.js"></script>
</head>

<body>

<?php include("headers.php"); ?>


<main class="news-container">


    <section class="news-list-section">

        <div class="news-toolbar">

            <div>


                <h2 style="font-size:20px;">
                    NOS ACTUALITES
                </h2>

            </div>


            

        </div>


         <?php 
                     
                $code_site="3BB94";

                                      $details= $DB ->query("SELECT * FROM  actualites  WHERE code='$code_site'  ORDER BY dates DESC");
                                     ?>

        <!-- =================================================
             GRILLE ACTUALITÉS
        ================================================== -->

        <div class="news-grid">


            <?php   foreach($details as $details): ?>

            <article class="news-card"
                     data-category="peche">

                <div class="card-image">

                    <img src="https://cms.wbs-rdc.com/contenu/users/images/<?= $details->image; ?>"
                         alt="Pêche en RDC">

                   

                </div>

                <div class="card-content">

                  

                    <h3>
                        <?= $details->titre; ?>
                    </h3>

                    <p>
                                   <?php if (strlen($details->contenu) > 100) :?>
                                    <p class="mb-25"><?= substr($details->contenu, 0, 100); ?>...</p>
                                    <?php else:?>
                                        <p class="mb-25"><?= $details->contenu; ?></p>
                                    <?php endif;?>
                    </p>

                    <a href="actualite-detail.php?id=<?= $details->id; ?>" class="card-link">
                        Lire la suite
                        <span>→</span>
                    </a>

                </div>

            </article>

<?php   endforeach ?>
            

           

        </div>


     
    </section>

<br><br>
</main>

<?php include("footer.php"); ?>


</body>
</html>