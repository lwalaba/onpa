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
        content="Actualité de l'Office National de Pêche et d'Aquaculture - RDC">

    <title>
        Actualité | ONPA - Office National de Pêche et d'Aquaculture
    </title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    

    <!-- ICONS -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    
      <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet" href="css/actualite-detail.css">
    
<style>
.nav-link {
    color: #bcbfe4 !important;
    background-color: #0a1f88 !important;
}
</style>
</head>


<body>

<?php include("headers.php"); ?>



<main class="article-page">

    <div class="container">


        <!-- EN-TÊTE ARTICLE -->

        <div class="article-header" style="margin-top: -40px;">

            <span class="article-category">

                ACTUALITÉS ONPA

            </span>
<?php 

                $id_article=$_GET['id'];

                                      $details= $DB ->query("SELECT * FROM  actualites  WHERE id='$id_article'  ORDER BY dates DESC");
?>

                <?php   foreach($details as $details): ?>

            <h1 style="font-size: 20px;">

                 <?= $details->titre; ?>

            </h1>


            <div class="article-meta">

                <span>

                    <i class="fa-regular fa-calendar"></i>

                    <?= $details->dates; ?>

                </span>


                <span>

                    <i class="fa-regular fa-folder"></i>

                    Actualités

                </span>

            </div>

        </div>



        <!-- CONTENU PRINCIPAL -->

        <div class="article-layout">


            <!-- ARTICLE -->

            <article class="article-content">


                <div class="article-image">

                    <img
                        src="https://cms.wbs-rdc.com/contenu/users/images/<?= $details->image; ?>"
                        alt="Équipe de travail de l'ONPA">

                </div>


                <div class="article-body">

                    


                    <p>

            <?= $details->contenu; ?>

                    </p>





            <?php   endforeach ?>


                    <!-- PARTAGE -->

                    <div class="article-share">

                        <span>
                            Partager cette actualité
                        </span>


                        <div class="share-buttons">

                            <button
                                data-share="facebook"
                                aria-label="Facebook">

                                <i class="fa-brands fa-facebook-f"></i>

                            </button>


                            <button
                                data-share="whatsapp"
                                aria-label="WhatsApp">

                                <i class="fa-brands fa-whatsapp"></i>

                            </button>


                            <button
                                data-share="linkedin"
                                aria-label="LinkedIn">

                                <i class="fa-brands fa-linkedin-in"></i>

                            </button>


                            <button
                                data-share="copy"
                                aria-label="Copier le lien">

                                <i class="fa-solid fa-link"></i>

                            </button>

                        </div>

                    </div>

                </div>

            </article>

<?php 
                     
                $code_site="3BB94";

                                      $detail= $DB ->query("SELECT * FROM  actualites  WHERE code='$code_site'  ORDER BY dates DESC LIMIT 3");
                                     ?>

            <!-- SIDEBAR -->

            <aside class="article-sidebar">


                <!-- ACTUALITÉS RÉCENTES -->

                <div class="sidebar-box">

                    <h3>
                        Actualités récentes
                    </h3>

 <?php   foreach($detail as $detail): ?>
                    <a
                        href="actualite-detail.php?id=<?= $detail->id; ?>"
                        class="recent-news">

                        <img
                            src="https://cms.wbs-rdc.com/contenu/users/images/<?= $detail->image; ?>"
                            alt="Actualité ONPA">


                        <div>

                            <h4>

                                <?= $detail->titre; ?>

                            </h4>

                            <span>

                               <?= $detail->dates; ?>

                            </span>

                        </div>

                    </a>


                  <?php   endforeach ?>  

                    

                </div>


                <!-- RETOUR -->

                <a
                    href="actualites.php"
                    class="back-button">

                    <i class="fa-solid fa-arrow-left"></i>

                    Toutes les actualités

                </a>

            </aside>

        </div>

    </div>

</main>



<!-- =========================================================
     FOOTER
========================================================= -->
<?php include("footer.php"); ?>

</body>

</html>