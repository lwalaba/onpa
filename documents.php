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
    <link rel="stylesheet" href="css/documents.css">
    <script src="js/menu.js"></script>
    <script src="js/documents.js"></script>
</head>


<body>
<?php include("headers.php"); ?>
<!-- =========================================================
     BREADCRUMB
========================================================= -->






<!-- =========================================================
     ARTICLE
========================================================= -->

<main class="article-page">

    


    <div class="container">

    <br> <br>

    

                <h2>
                    Liste des documents
                </h2>
    
      <section class="documents-section">

       

        <div class="documents-toolbar">

       


            <div class="document-actions">

                <div class="search-box">

                    <span>⌕</span>

                    <input
                        type="search"
                        id="searchInput"
                        placeholder="Rechercher un document...">

                </div>


                <select id="categoryFilter"
                        class="category-select">

                    <option value="all">
                        Toutes les catégories
                    </option>

                    <option value="Lois">
                        Lois
                    </option>

                    <option value="Décrets">
                        Décrets
                    </option>

                    <option value="Arrêtés">
                        Arrêtés
                    </option>

                    <option value="Réglementation">
                        Réglementation
                    </option>

                    <option value="Rapports">
                        Rapports
                    </option>

                    <option value="Guides">
                        Guides
                    </option>

                </select>

            </div>

        </div>


        <!-- =================================================
             TABLEAU
        ================================================== -->

        <div class="table-wrapper">

            <table class="documents-table">

                <thead>

                    <tr>

                        <th>
                            Nom du document
                        </th>

                        <th>
                            Catégorie
                        </th>

                        <th>
                            Taille
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>

                 <tbody>

                                     <?php 
                     
                $code_site="3BB94";

                                      $details= $DB ->query("SELECT * FROM activites WHERE code='$code_site'  ORDER BY id DESC");
                                     ?>


                                                         <?php   foreach($details as $details): ?>

                                                         <tr >
                                                            <td><?= $details->titre; ?></td>

                                                            <td></td>
                                                            <td></td>
                                                            <td><a href="https://cms.wbs-rdc.com/contenu/users/fichiers/<?= $details->fichier; ?>" target='_blank'>Télécharger</a></td>
                                                             
                                                     </tr>


                                                               <?php   endforeach ?>

                                </tbody>

            </table>


            <!-- MESSAGE SI AUCUN DOCUMENT -->

            <div id="emptyState"
                 class="empty-state">

                <div class="empty-icon">
                    ▤
                </div>

                <h3>
                    Aucun document trouvé
                </h3>

                <p>
                    Essayez une autre recherche ou
                    une autre catégorie.
                </p>

            </div>

        </div>


        <!-- =================================================
             PAGINATION
        ================================================== -->

        <div class="table-footer">

            <div class="items-per-page">

                <span>
                    Éléments par page :
                </span>

                <select id="itemsPerPage">

                    <option value="5">
                        5
                    </option>

                    <option value="10" selected>
                        10
                    </option>

                    <option value="25">
                        25
                    </option>

                    <option value="50">
                        50
                    </option>

                </select>

            </div>


            <div id="pagination"
                 class="pagination">
                <!-- Généré par JavaScript -->
            </div>


            <div id="totalDocuments"
                 class="total-documents">
                Total : 0 éléments
            </div>

        </div>

    </section>
    </div>

    <br> <br>

</main>

<?php include("footer.php"); ?>

<script src="js/script.js"></script>
<script src="js/documents.js"></script>

</body>

</html>