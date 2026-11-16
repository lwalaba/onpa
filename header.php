<header class="site-header" id="siteHeader">


   
    <div class="header-main">

        <div class="header-container">


            <!-- LOGO + IDENTITE -->

            <a
                href="index.php"
                class="brand"
                aria-label="ONPA - Accueil">


                <div class="brand-logo">

                    <img
                        src="assets/logo.png"
                        alt="Logo ONPA">

                </div>


                <div class="brand-information">

                    <div class="brand-name">
                        ONPA
                    </div>

                    <div class="brand-title">
                        OFFICE NATIONAL DE
                        <br>
                        PÊCHE ET D'AQUACULTURE
                    </div>

                    <div class="brand-country">

                        RÉPUBLIQUE DÉMOCRATIQUE
                        DU CONGO

                    </div>

                </div>

            </a>



            <!-- ACTIONS HEADER -->

            <div class="header-actions">


                <!-- DRAPEAU RDC -->

                <button
                    class="country-button"
                    type="button"
                    aria-label="République Démocratique du Congo">

                    <span class="flag-rdc">

                        <span class="flag-yellow"></span>
                        <span class="flag-red"></span>
                        <span class="flag-blue"></span>

                    </span>

                </button>



                <!-- RECHERCHE -->

                <button
                    class="search-button"
                    id="searchButton"
                    type="button"
                    aria-label="Rechercher">

                    <svg
                        viewBox="0 0 24 24"
                        aria-hidden="true">

                        <circle
                            cx="11"
                            cy="11"
                            r="6.5">
                        </circle>

                        <line
                            x1="16"
                            y1="16"
                            x2="21"
                            y2="21">
                        </line>

                    </svg>

                </button>



                <!-- ESPACE PARTENAIRES -->

                <a
                    href="#"
                    class="partner-button">

                    <span class="partner-icon">

                        <svg
                            viewBox="0 0 24 24"
                            aria-hidden="true">

                            <circle
                                cx="12"
                                cy="8"
                                r="3.5">
                            </circle>

                            <path
                                d="M5 21c0-4 3-7 7-7s7 3 7 7">
                            </path>

                        </svg>

                    </span>

                    <span>
                        ESPACE PARTENAIRES
                    </span>

                </a>



                <!-- BOUTON MOBILE -->

                <button
                    class="mobile-menu-button"
                    id="mobileMenuButton"
                    type="button"
                    aria-label="Ouvrir le menu"
                    aria-expanded="false">

                    <span></span>
                    <span></span>
                    <span></span>

                </button>

            </div>

        </div>

    </div>


    <div
        class="search-panel"
        id="searchPanel">

        <div class="search-container">

            <div class="search-input-wrapper">


                <svg
                    class="search-input-icon"
                    viewBox="0 0 24 24">

                    <circle
                        cx="11"
                        cy="11"
                        r="6.5">
                    </circle>

                    <line
                        x1="16"
                        y1="16"
                        x2="21"
                        y2="21">
                    </line>

                </svg>


                <input
                    type="search"
                    id="searchInput"
                    placeholder="Rechercher sur le site..."
                    autocomplete="off">


                <button
                    class="search-close"
                    id="searchClose"
                    type="button"
                    aria-label="Fermer">

                    ×

                </button>

            </div>


            <button
                class="search-submit"
                id="searchSubmit"
                type="button">

                RECHERCHER

            </button>

        </div>

    </div>



    <!-- =================================================
         NAVIGATION DESKTOP
    ================================================== -->

    <nav
        class="main-navigation"
        id="mainNavigation"
        aria-label="Navigation principale">

        <div class="navigation-container">


            <a
                href="index.php"
                class="nav-link ">

                ACCUEIL

            </a>


             <!-- PECHE -->

            <div class="nav-dropdown">

                <button
                    class="nav-dropdown-button">
                   <a href="#" class="nav-link ">
                    A PROPOS
                    </a>
                    <svg
                        viewBox="0 0 20 20">

                        <polyline
                            points="5,7 10,12 15,7">
                        </polyline>

                    </svg>

                </button>


                <div class="dropdown-menu">


                    <a href="presentation.php">

                       

                        Présentation

                    </a>


                    <a href="organigramme.php">

                        

                        Organigramme

                    </a>



                </div>

            </div>
            
            <!-- PECHE -->

            

           
<!-- =================================================
     PÊCHE
================================================= -->

<div class="nav-dropdown">

    <button
        type="button"
        class="nav-dropdown-button">

        <span>PÊCHE</span>

        <svg viewBox="0 0 20 20" aria-hidden="true">
            <polyline points="5,7 10,12 15,7"></polyline>
        </svg>

    </button>


    <div class="dropdown-menu">
     
     <a href="ressources_halieutiques.php" style="font-size: 12px;">
            Ressources halieutiques
    </a>
     
        <!-- FILIÈRES DE PÊCHE -->
        <div class="dropdown-submenu">

            <button
                type="button"
                class="dropdown-submenu-button" style="font-size: 12px;">

                <span>Filières de pêche</span>

                <svg viewBox="0 0 20 20" aria-hidden="true">
                    <polyline points="7,5 12,10 7,15"></polyline>
                </svg>

            </button>


            <!-- SOUS-MENU -->
            <div class="dropdown-submenu-menu">
                
                <a href="peche_durable.php">
                    Pêche durable
                </a>

                <a href="peche_industrielle.php">
                    Pêche industrielle
                </a>

                <a href="peche_semi_industrielle.php">
                    Pêche semi-industrielle
                </a>

                <a href="peche_artisanalle.php">
                    Pêche artisanale
                </a>
                <a href="peche_maritime.php">
                    Pêche artisanale maritime
                </a>
                <a href="peche_continentale.php">
                    Pêche artisanale continentale
                </a>
                <a href="peche_artisanalle_lacuste.php">
                    Pêche artisanale lacuste
                </a>

                

                

                


            </div>

        </div>
        
         <!-- FIN FILIÈRES DE PÊCHE -->

         <div class="dropdown-submenu">

            <button
                type="button"
                class="dropdown-submenu-button" style="font-size: 12px;">

                <span style="font-size: 12px;">Typologie des pêcheurs</span>

                <svg viewBox="0 0 20 20" aria-hidden="true">
                    <polyline points="7,5 12,10 7,15"></polyline>
                </svg>

            </button>


            <!-- SOUS-MENU -->
            <div class="dropdown-submenu-menu">

                <a href="pecheurs_professionnels.php">
                    Pêcheurs professionnels
                </a>

                <a href="pecheurs_non_professionnels.php">
                    Pêcheurs non professionnels ou occasionnels
                </a>


            </div>

        </div>

         <a href="organisation_pecheurs.php" style="font-size: 12px;"> Organisation des pêcheurs</a>

         

        <div class="dropdown-submenu">

           
          
            <a href="transport_produits.php" style="font-size: 12px;">
                            Transport des Produits de pêche
            </a>

         

              
            

        </div>

        

    </div>

</div>
```


            <!-- FIN  PECHE -->
            <a
                href="#aquaculture"
                class="nav-link">

                AQUACULTURE

            </a>

            <a
                href="#statistiques"
                class="nav-link">

                STATISTIQUES

            </a>



            <a
                href="actualites.php"
                class="nav-link">

                ACTUALITÉS

            </a>



             <!-- PECHE -->

            <div class="nav-dropdown">

                <button
                    class="nav-dropdown-button">
                   <a href="#" class="nav-link ">
                    DOCUMENTATION
                    </a>
                    <svg
                        viewBox="0 0 20 20">

                        <polyline
                            points="5,7 10,12 15,7">
                        </polyline>

                    </svg>

                </button>


                <div class="dropdown-menu">


                    <a href="reglementation.php">

                       

                        Réglementation

                    </a>


                    <a href="documents.php">

                        

                        Documents

                    </a>



                </div>

            </div>
            
            <!-- PECHE -->

           <a
                href="bailleurs_parts.php"
                class="nav-link ">

                BAILLEURS & PARTENAIRES

            </a>


            <a
                href="contact.php"
                class="nav-link">

                CONTACT

            </a>


        </div>

    </nav>



</header>



<!-- =====================================================
     MENU MOBILE
===================================================== -->

<div
    class="mobile-navigation"
    id="mobileNavigation">


    <div class="mobile-navigation-header">

     <a
                href="#"
                class="brand"
                aria-label="ONPA - Accueil">


                <div class="brand-logo">

                    <img
                        src="assets/logo.png"
                        alt="Logo ONPA">

                </div>


                <div class="brand-information">

                    <div class="brand-name" style="color:white;">
                        ONPA
                    </div>

                    <div class="brand-title" style="color:white;">
                        OFFICE NATIONAL DE
                        <br>
                        PÊCHE ET D'AQUACULTURE
                    </div>

                    <div class="brand-country">

                        RÉPUBLIQUE DÉMOCRATIQUE
                        DU CONGO

                    </div>

                </div>

            </a>

    <button
        id="mobileClose"
        type="button"
        aria-label="Fermer le menu"
    >
        ×
    </button>

</div>



    <div class="mobile-navigation-links">


        <a
            href="#accueil"
            class="mobile-link active">

            ACCUEIL

        </a>


        

         <div class="mobile-dropdown">

            <button
                class="mobile-dropdown-button"
                id="mobilePecheButton">

                <span>
                    À PROPOS
                </span>

                <span class="mobile-arrow">
                    +
                </span>

            </button>


            <div
                class="mobile-dropdown-content"
                id="mobilePecheContent">

                <a href="presentation.php">
                    Présentation
                </a>

                <a href="organigramme.php">
                    Organigramme
                </a>


            </div>

        </div>

        <div class="mobile-dropdown">

    <button
        type="button"
        class="mobile-dropdown-button">

        <span>PÊCHE</span>

        <span class="mobile-arrow">+</span>

    </button>


    <div class="mobile-dropdown-content peche-content">

        <!-- RESSOURCES HALIEUTIQUES -->

        <a href="ressources_halieutiques.php">
            Ressources halieutiques
        </a>


        <!-- FILIÈRES DE PÊCHE -->

        <div class="mobile-submenu">

            <button
                type="button"
                class="mobile-submenu-button">

                <span>Filières de pêche</span>

                <span class="mobile-submenu-arrow">+</span>

            </button>

            <div class="mobile-submenu-content">

                <a href="peche_durable.php">
                    Pêche durable
                </a>

                <a href="peche_industrielle.php">
                    Pêche industrielle
                </a>

                <a href="peche_semi_industrielle.php">
                    Pêche semi-industrielle
                </a>

                <a href="peche_artisanalle.php">
                    Pêche artisanale
                </a>

                <a href="peche_maritime.php">
                    Pêche artisanale maritime
                </a>

                <a href="peche_continentale.php">
                    Pêche artisanale continentale
                </a>

                <a href="peche_artisanalle_lacuste.php">
                    Pêche artisanale lacustre
                </a>

            </div>

        </div>


        <!-- TYPOLOGIE DES PÊCHEURS -->

        <div class="mobile-submenu">

            <button
                type="button"
                class="mobile-submenu-button">

                <span>Typologie des pêcheurs</span>

                <span class="mobile-submenu-arrow">+</span>

            </button>

            <div class="mobile-submenu-content">

                <a href="#peche-continentale">
                    Pêcheurs professionnels
                </a>

                <a href="#peche-maritime">
                    Pêcheurs non professionnels ou occasionnels
                </a>

            </div>

        </div>


        <!-- ORGANISATION DES PÊCHEURS -->

        <div class="mobile-submenu">

            <button
                type="button"
                class="mobile-submenu-button">

                <span>Organisation des pêcheurs</span>

                <span class="mobile-submenu-arrow">+</span>

            </button>

            <div class="mobile-submenu-content">

                <a href="#peche-continentale">
                    Pêche continentale
                </a>

                <a href="#peche-maritime">
                    Pêche maritime
                </a>

                <a href="#peche-artisanale">
                    Pêche artisanale
                </a>

                <a href="#peche-industrielle">
                    Pêche industrielle
                </a>

            </div>

        </div>


        <!-- TRANSPORT -->

        <a href="transport_produits.php">
            Transport des produits de pêche
        </a>

    </div>

</div>


        <a
            href="#aquaculture"
            class="mobile-link">

            AQUACULTURE

        </a>


        <div class="mobile-dropdown">

            <button
                class="mobile-dropdown-button"
                id="mobilePecheButton">

                <span>
                    DOCUMENTATION
                </span>

                <span class="mobile-arrow">
                    +
                </span>

            </button>


            <div
                class="mobile-dropdown-content"
                id="mobilePecheContent">

                <a href="reglementation.php">
                    Réglementation
                </a>

                <a href="documents.php">
                    Documentation
                </a>


            </div>

        </div>


        <a
            href="#statistiques"
            class="mobile-link">

            STATISTIQUES

        </a>


        <a
            href="#actualites"
            class="mobile-link">

            ACTUALITÉS

        </a>


        <a
            href="#documents"
            class="mobile-link">

            DOCUMENTS

        </a>


        <a
            href="contact.php"
            class="mobile-link">

            CONTACT

        </a>


        <a
            href="#"
            class="mobile-partner-button">

            <span>♙</span>

            ESPACE PARTENAIRES

        </a>


    </div>

</div>



<!-- OVERLAY MOBILE -->

<div
    class="mobile-overlay"
    id="mobileOverlay">
</div>

