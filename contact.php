<?php
/**
 * ============================================================
 * ONPA RDC - PAGE CONTACT
 * ============================================================
 * Fichier : contact.php
 * ============================================================
 */

session_start();

/*
|--------------------------------------------------------------------------
| CONFIGURATION
|--------------------------------------------------------------------------
| Remplace ces valeurs par les coordonnées officielles de l'ONPA.
*/

$contact_email = "contact@onpa-rdc.com";
$contact_phone = "+243 XXX XXX XXX";
$contact_address = "Kinshasa, République Démocratique du Congo";


/*
|--------------------------------------------------------------------------
| TRAITEMENT DU FORMULAIRE
|--------------------------------------------------------------------------
*/

$success_message = "";
$error_message = "";

$nom = "";
$email = "";
$telephone = "";
$objet = "";
$message = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

   $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
$telephone = isset($_POST["telephone"]) ? trim($_POST["telephone"]) : "";
$objet = isset($_POST["objet"]) ? trim($_POST["objet"]) : "";
$message = isset($_POST["message"]) ? trim($_POST["message"]) : "";


    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    if ($nom === "" || $email === "" || $objet === "" || $message === "") {

        $error_message = "Veuillez remplir tous les champs obligatoires.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error_message = "Veuillez saisir une adresse e-mail valide.";

    } else {

        /*
        |--------------------------------------------------------------------------
        | PROTECTION DES EN-TÊTES
        |--------------------------------------------------------------------------
        */

        $email = str_replace(["\r", "\n"], "", $email);
        $nom = str_replace(["\r", "\n"], "", $nom);
        $objet = str_replace(["\r", "\n"], "", $objet);


        /*
        |--------------------------------------------------------------------------
        | DESTINATAIRE
        |--------------------------------------------------------------------------
        */

        $to = $contact_email;


        /*
        |--------------------------------------------------------------------------
        | SUJET
        |--------------------------------------------------------------------------
        */

        $subject = "Contact ONPA - " . $objet;


        /*
        |--------------------------------------------------------------------------
        | CONTENU DU MESSAGE
        |--------------------------------------------------------------------------
        */

        $email_body =
            "NOUVEAU MESSAGE DEPUIS LE SITE ONPA\n\n" .
            "Nom complet : " . $nom . "\n" .
            "E-mail : " . $email . "\n" .
            "Téléphone : " . ($telephone ?: "Non renseigné") . "\n" .
            "Objet : " . $objet . "\n\n" .
            "MESSAGE\n" .
            "--------------------------------------------------\n" .
            $message . "\n";


        /*
        |--------------------------------------------------------------------------
        | EN-TÊTES
        |--------------------------------------------------------------------------
        */

        $headers = [];

        $headers[] = "From: ONPA Site Web <" . $contact_email . ">";
        $headers[] = "Reply-To: " . $email;
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-Type: text/plain; charset=UTF-8";


        /*
        |--------------------------------------------------------------------------
        | ENVOI
        |--------------------------------------------------------------------------
        */

        $mail_sent = @mail(
            $to,
            $subject,
            $email_body,
            implode("\r\n", $headers)
        );


        if ($mail_sent) {

            $success_message =
                "Votre message a bien été envoyé. " .
                "Nous vous répondrons dans les meilleurs délais.";

            $nom = "";
            $email = "";
            $telephone = "";
            $objet = "";
            $message = "";

        } else {

            /*
            |--------------------------------------------------------------------------
            | Si mail() n'est pas configuré sur le serveur
            |--------------------------------------------------------------------------
            */

            $error_message =
                "Votre message n'a pas pu être envoyé pour le moment. " .
                "Veuillez réessayer plus tard ou nous contacter directement par e-mail.";

        }
    }
}

?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Contactez l'Office National de Pêche et d'Aquaculture de la République Démocratique du Congo."
    >

    <meta
        name="keywords"
        content="ONPA, RDC, pêche, aquaculture, contact, République Démocratique du Congo"
    >

    <title>
        Contact | ONPA - Office National de Pêche et d'Aquaculture
    </title>


    <!-- =====================================================
         GOOGLE FONT
    ====================================================== -->

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

<link rel="stylesheet"  href="css/styles.css">
    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <style>

        /* =====================================================
           VARIABLES
        ===================================================== */

        :root {

            --onpa-blue-dark: #002b67;

            --onpa-blue: #075bd3;

            --onpa-blue-soft: #eef5ff;

            --onpa-yellow: #ffd21c;

            --onpa-text: #101828;

            --onpa-text-light: #4f6075;

            --onpa-border: #e2e7ee;

            --onpa-background: #ffffff;

            --onpa-radius: 7px;

            --onpa-container: 1730px;
        }


        /* =====================================================
           RESET
        ===================================================== */

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;
        }


        html {

            scroll-behavior: smooth;
        }


        body {

            font-family: "Poppins", sans-serif;

            background: #ffffff;

            color: var(--onpa-text);

            line-height: 1.6;

            overflow-x: hidden;
        }


        img {

            max-width: 100%;

            display: block;
        }


        a {

            text-decoration: none;

            color: inherit;
        }


        button,
        input,
        select,
        textarea {

            font-family: inherit;
        }


        /* =====================================================
           TOP HEADER
        ===================================================== */

        .top-header {

            height: 4px;

            background: var(--onpa-blue);
        }


        /* =====================================================
           HEADER PRINCIPAL
        ===================================================== */

        .header-main {

            background: #ffffff;
        }


        .header-container {

            max-width: var(--onpa-container);

            margin: 0 auto;

            padding: 18px 50px 10px;

            min-height: 165px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 40px;
        }


        /* =====================================================
           BRAND
        ===================================================== */

        .brand {

            display: flex;

            align-items: center;

            gap: 27px;

            min-width: 0;
        }


        .brand-logo {

            width: 118px;

            height: 118px;

            flex: 0 0 118px;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .brand-logo img {

            width: 100%;

            height: 100%;

            object-fit: contain;
        }


        .brand-text {

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .brand-name {

            font-size: 68px;

            font-weight: 800;

            line-height: .95;

            letter-spacing: -3px;

            color: #111827;
        }


        .brand-title {

            margin-top: 10px;

            font-size: 21px;

            line-height: 1.08;

            font-weight: 800;

            color: #101828;

            text-transform: uppercase;
        }


        .brand-country {

            margin-top: 6px;

            color: #365274;

            font-size: 13px;

            font-weight: 500;

            letter-spacing: .1px;

            text-transform: uppercase;
        }


        /* =====================================================
           HEADER ACTIONS
        ===================================================== */

        .header-actions {

            display: flex;

            align-items: center;

            gap: 18px;

            flex-shrink: 0;
        }


        .rdc-flag {

            width: 36px;

            height: 25px;

            object-fit: cover;

            margin-right: 12px;
        }


        .search-button {

            width: 64px;

            height: 64px;

            border-radius: 50%;

            background: #f5f8fc;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--onpa-text);

            font-size: 23px;

            transition: .25s;
        }


        .search-button:hover {

            background: var(--onpa-blue-soft);

            color: var(--onpa-blue);
        }


        .partner-button {

            height: 64px;

            padding: 0 32px;

            border-radius: 9px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 14px;

            background: var(--onpa-blue-dark);

            color: #ffffff;

            font-size: 14px;

            font-weight: 700;

            text-transform: uppercase;

            transition: .25s;
        }


        .partner-button:hover {

            background: var(--onpa-blue);

        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .main-nav {

            background: var(--onpa-blue-dark);

            color: #ffffff;

            position: relative;

            z-index: 1000;
        }


        .nav-container {

            max-width: 1850px;

            margin: 0 auto;

            padding: 0 42px;

            min-height: 70px;

            display: flex;

            align-items: stretch;

            justify-content: space-between;
        }


        .nav-item {

            position: relative;

            display: flex;

            align-items: stretch;
        }


        .nav-link {

            min-height: 70px;

            padding: 0 17px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            color: #ffffff;

            font-size: 14px;

            font-weight: 700;

            white-space: nowrap;

            text-transform: uppercase;

            transition: .25s;
        }


        .nav-link:hover {

            color: var(--onpa-yellow);
        }


        .nav-link.active {

            color: var(--onpa-yellow);
        }


        .nav-arrow {

            font-size: 12px;

            transition: transform .25s;
        }


        .nav-item:hover .nav-arrow {

            transform: rotate(180deg);
        }


        /* =====================================================
           DROPDOWN
        ===================================================== */

        .dropdown-menu {

            position: absolute;

            top: 70px;

            left: 0;

            min-width: 250px;

            background: #ffffff;

            border-top: 3px solid var(--onpa-yellow);

            box-shadow: 0 15px 35px rgba(0, 43, 103, .18);

            opacity: 0;

            visibility: hidden;

            transform: translateY(8px);

            transition: .22s;

            z-index: 2000;
        }


        .nav-item:hover .dropdown-menu {

            opacity: 1;

            visibility: visible;

            transform: translateY(0);
        }


        .dropdown-link {

            display: block;

            padding: 13px 18px;

            color: var(--onpa-text);

            font-size: 13px;

            font-weight: 500;

            border-bottom: 1px solid #edf0f4;

            transition: .2s;
        }


        .dropdown-link:last-child {

            border-bottom: none;
        }


        .dropdown-link:hover {

            background: var(--onpa-blue-soft);

            color: var(--onpa-blue);
        }


        /* =====================================================
           SOUS-MENUS IMBRIQUÉS
        ===================================================== */

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu > .dropdown-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .submenu-arrow {
            font-size: 10px;
            transition: transform .2s;
        }

        .dropdown-submenu-menu {
            position: absolute;
            top: -3px;
            left: 100%;
            min-width: 270px;
            background: #ffffff;
            border-top: 3px solid var(--onpa-yellow);
            box-shadow: 0 15px 35px rgba(0, 43, 103, .18);
            opacity: 0;
            visibility: hidden;
            transform: translateX(8px);
            transition: .22s;
            z-index: 2100;
        }

        .dropdown-submenu:hover > .dropdown-submenu-menu {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .dropdown-submenu:hover > .submenu-toggle .submenu-arrow {
            transform: rotate(180deg);
        }

        /* =====================================================
           MOBILE MENU BUTTON
        ===================================================== */

        .mobile-menu-button {

            display: none;

            width: 45px;

            height: 45px;

            border: none;

            border-radius: 6px;

            background: var(--onpa-blue-dark);

            color: #ffffff;

            cursor: pointer;

            font-size: 20px;
        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {

            max-width: var(--onpa-container);

            margin: 0 auto;

            padding: 70px 50px 100px;
        }


        /* =====================================================
           PAGE TITLE
        ===================================================== */

        .page-heading {

            margin-bottom: 50px;
        }


        .page-kicker {

            color: var(--onpa-blue);

            font-size: 15px;

            font-weight: 700;

            letter-spacing: 2px;

            text-transform: uppercase;

            margin-bottom: 12px;
        }


        .page-title {

            font-size: 50px;

            line-height: 1.15;

            font-weight: 700;

            color: var(--onpa-text);

            letter-spacing: -1px;

            margin-bottom: 25px;
        }


        .page-introduction {

            max-width: 1100px;

            color: #40546d;

            font-size: 18px;

            line-height: 1.75;
        }


        /* =====================================================
           CONTACT GRID
        ===================================================== */

        .contact-grid {

            display: grid;

            grid-template-columns: minmax(320px, 420px) 1fr;

            gap: 55px;

            align-items: start;
        }


        /* =====================================================
           CONTACT INFORMATION
        ===================================================== */

        .contact-information {

            border: 1px solid var(--onpa-border);

            border-radius: 8px;

            padding: 35px;

            background: #ffffff;
        }


        .contact-information-title {

            font-size: 25px;

            font-weight: 700;

            color: var(--onpa-text);

            margin-bottom: 12px;
        }


        .contact-information-intro {

            color: var(--onpa-text-light);

            font-size: 14px;

            line-height: 1.75;

            margin-bottom: 25px;
        }


        .contact-info-item {

            display: flex;

            gap: 16px;

            padding: 19px 0;

            border-bottom: 1px solid #edf0f4;
        }


        .contact-info-item:last-child {

            border-bottom: none;

            padding-bottom: 0;
        }


        .contact-info-icon {

            width: 44px;

            height: 44px;

            flex: 0 0 44px;

            border-radius: 7px;

            background: var(--onpa-blue-soft);

            color: var(--onpa-blue);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;
        }


        .contact-info-content {

            min-width: 0;
        }


        .contact-info-content strong {

            display: block;

            color: var(--onpa-text);

            font-size: 14px;

            font-weight: 700;

            margin-bottom: 3px;
        }


        .contact-info-content span,
        .contact-info-content a {

            display: block;

            color: var(--onpa-text-light);

            font-size: 13px;

            line-height: 1.6;

            word-break: break-word;
        }


        .contact-info-content a:hover {

            color: var(--onpa-blue);
        }


        /* =====================================================
           FORMULAIRE
        ===================================================== */

        .contact-form-container {

            border: 1px solid var(--onpa-border);

            border-radius: 8px;

            padding: 40px;

            background: #ffffff;
        }


        .contact-form-title {

            font-size: 25px;

            font-weight: 700;

            color: var(--onpa-text);

            margin-bottom: 7px;
        }


        .contact-form-description {

            color: var(--onpa-text-light);

            font-size: 14px;

            margin-bottom: 30px;
        }


        .form-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 22px;
        }


        .form-group {

            margin-bottom: 22px;
        }


        .form-label {

            display: block;

            color: var(--onpa-text);

            font-size: 13px;

            font-weight: 600;

            margin-bottom: 8px;
        }


        .required {

            color: #d92d20;
        }


        .form-control {

            width: 100%;

            min-height: 49px;

            padding: 12px 15px;

            border: 1px solid #d7dee8;

            border-radius: 5px;

            background: #ffffff;

            color: var(--onpa-text);

            font-size: 13px;

            outline: none;

            transition: .2s;
        }


        .form-control::placeholder {

            color: #98a2b3;
        }


        .form-control:hover {

            border-color: #bcc7d5;
        }


        .form-control:focus {

            border-color: var(--onpa-blue);

            box-shadow: 0 0 0 3px rgba(7, 91, 211, .08);
        }


        textarea.form-control {

            min-height: 175px;

            resize: vertical;

            line-height: 1.6;
        }


        select.form-control {

            cursor: pointer;

            background-color: #ffffff;
        }


        /* =====================================================
           FORM FOOTER
        ===================================================== */

        .form-footer {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            margin-top: 5px;
        }


        .form-note {

            color: #7b8798;

            font-size: 11px;

            line-height: 1.6;

            max-width: 500px;
        }


        .submit-button {

            min-height: 49px;

            padding: 0 28px;

            border: none;

            border-radius: 5px;

            background: var(--onpa-blue-dark);

            color: #ffffff;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            white-space: nowrap;

            transition: .25s;
        }


        .submit-button:hover {

            background: var(--onpa-blue);

            transform: translateY(-1px);
        }


        /* =====================================================
           ALERTES
        ===================================================== */

        .alert {

            padding: 14px 17px;

            margin-bottom: 25px;

            border-radius: 5px;

            font-size: 13px;

            line-height: 1.6;
        }


        .alert-success {

            color: #176b3a;

            background: #edf9f1;

            border: 1px solid #b8e3c7;
        }


        .alert-error {

            color: #a32920;

            background: #fff2f0;

            border: 1px solid #f0c2bd;
        }


        /* =====================================================
           MAP SECTION
        ===================================================== */

        .map-section {

            margin-top: 75px;
        }


        .section-heading {

            margin-bottom: 25px;
        }


        .section-kicker {

            color: var(--onpa-blue);

            font-size: 14px;

            font-weight: 700;

            letter-spacing: 1.8px;

            text-transform: uppercase;

            margin-bottom: 8px;
        }


        .section-title {

            color: var(--onpa-text);

            font-size: 32px;

            font-weight: 700;

            line-height: 1.2;
        }


        .map-container {

            width: 100%;

            height: 390px;

            border: 1px solid var(--onpa-border);

            border-radius: 8px;

            overflow: hidden;

            background: #eef3f8;
        }


        .map-container iframe {

            width: 100%;

            height: 100%;

            border: 0;

            display: block;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .site-footer {

            background: var(--onpa-blue-dark);

            color: #ffffff;

            margin-top: 20px;
        }


        .footer-container {

            max-width: var(--onpa-container);

            margin: 0 auto;

            padding: 60px 50px 25px;
        }


        .footer-grid {

            display: grid;

            grid-template-columns: 2fr 1fr 1fr 1fr;

            gap: 50px;

            padding-bottom: 45px;
        }


        .footer-brand {

            font-size: 30px;

            font-weight: 800;

            margin-bottom: 14px;
        }


        .footer-description {

            max-width: 480px;

            color: rgba(255,255,255,.72);

            font-size: 13px;

            line-height: 1.8;
        }


        .footer-title {

            font-size: 14px;

            font-weight: 700;

            text-transform: uppercase;

            margin-bottom: 18px;
        }


        .footer-links {

            list-style: none;
        }


        .footer-links li {

            margin-bottom: 10px;
        }


        .footer-links a {

            color: rgba(255,255,255,.68);

            font-size: 13px;

            transition: .2s;
        }


        .footer-links a:hover {

            color: var(--onpa-yellow);
        }


        .footer-contact-item {

            display: flex;

            gap: 10px;

            color: rgba(255,255,255,.68);

            font-size: 13px;

            margin-bottom: 12px;
        }


        .footer-contact-item i {

            color: var(--onpa-yellow);

            margin-top: 4px;

            width: 15px;
        }


        .footer-bottom {

            border-top: 1px solid rgba(255,255,255,.13);

            padding-top: 20px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            color: rgba(255,255,255,.52);

            font-size: 11px;
        }

        /* =====================================================
   MENU PRINCIPAL - ORDINATEUR
===================================================== */

.main-navigation {
    width: 100%;
}

.navigation-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.nav-menu {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 5px;
    width: 100%;
}

.nav-item {
    position: relative;
    display: flex;
    align-items: center;
}

.nav-link {
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
}


/* =====================================================
   SOUS-MENU - ORDINATEUR
===================================================== */

.nav-dropdown {
    position: relative;
}

.nav-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;

    display: none;

    min-width: 240px;
    background: #ffffff;

    z-index: 9999;
}

.nav-dropdown:hover > .nav-dropdown-menu {
    display: block;
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 991px) {

    .navigation-container {
        display: block;
    }

    .nav-menu {
        display: none;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;

        width: 100%;
    }

    .nav-menu.active {
        display: flex;
    }

    .nav-item {
        display: block;
        width: 100%;
    }

    .nav-link {
        display: flex;
        justify-content: space-between;
        width: 100%;
        white-space: normal;
    }

    /* Sous-menu vertical */
    .nav-dropdown-menu {
        position: static;

        width: 100%;
        min-width: 0;

        display: none;
    }

    .nav-dropdown.active > .nav-dropdown-menu {
        display: block;
    }

}


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 1250px) {

            .header-container {

                padding-left: 30px;

                padding-right: 30px;
            }


            .brand-name {

                font-size: 55px;
            }


            .brand-title {

                font-size: 17px;
            }


            .brand-logo {

                width: 100px;

                height: 100px;

                flex-basis: 100px;
            }


            .nav-container {

                padding: 0 20px;
            }


            .nav-link {

                padding: 0 9px;

                font-size: 11px;
            }


            .page-content {

                padding-left: 30px;

                padding-right: 30px;
            }


            .footer-container {

                padding-left: 30px;

                padding-right: 30px;
            }
        }


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 1000px) {

            .header-container {

                min-height: 135px;
            }


            .brand-logo {

                width: 85px;

                height: 85px;

                flex-basis: 85px;
            }


            .brand-name {

                font-size: 45px;

                letter-spacing: -2px;
            }


            .brand-title {

                font-size: 14px;
            }


            .brand-country {

                font-size: 10px;
            }


            .partner-button {

                padding: 0 20px;

                font-size: 11px;
            }


            .contact-grid {

                grid-template-columns: 1fr;

                gap: 30px;
            }


            .contact-information {

                width: 100%;
            }


            .footer-grid {

                grid-template-columns: 1fr 1fr;
            }
        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 768px) {

            .header-container {

                min-height: auto;

                padding: 15px 20px;

                gap: 10px;
            }


            .brand {

                gap: 11px;
            }


            .brand-logo {

                width: 62px;

                height: 62px;

                flex-basis: 62px;
            }


            .brand-name {

                font-size: 31px;

                letter-spacing: -1.5px;
            }


            .brand-title {

                font-size: 9px;

                margin-top: 5px;
            }


            .brand-country {

                font-size: 7px;

                margin-top: 3px;
            }


            .header-actions {

                gap: 8px;
            }


            .rdc-flag {

                width: 30px;

                height: 20px;

                margin-right: 0;
            }


            .search-button {

                width: 43px;

                height: 43px;

                font-size: 17px;
            }


            .partner-button {

                display: none;
            }


            /* MOBILE NAV */

            .main-nav {

                min-height: 58px;
            }


            .nav-container {

                min-height: 58px;

                padding: 0 15px;

                display: flex;

                justify-content: flex-end;
            }


            .mobile-menu-button {

                display: flex;

                align-items: center;

                justify-content: center;
            }


            .nav-menu {

                position: absolute;

                top: 58px;

                left: 0;

                right: 0;

                display: none;

                flex-direction: column;

                background: var(--onpa-blue-dark);

                box-shadow: 0 15px 30px rgba(0,0,0,.2);
            }


            .nav-menu.open {

                display: flex;
            }


            .nav-item {

                width: 100%;

                display: block;

                border-bottom: 1px solid rgba(255,255,255,.10);
            }


            .nav-link {

                width: 100%;

                min-height: 50px;

                padding: 0 20px;

                justify-content: space-between;

                font-size: 12px;
            }


            .dropdown-menu {

                position: static;

                width: 100%;

                min-width: 0;

                display: none;

                opacity: 1;

                visibility: visible;

                transform: none;

                box-shadow: none;

                border-top: 1px solid rgba(255,255,255,.1);

                background: #012459;
            }


            .nav-item.submenu-open .dropdown-menu {

                display: block;
            }


            .nav-item:hover .dropdown-menu {

                opacity: 1;

                visibility: visible;

                transform: none;
            }


            .dropdown-link {

                padding: 12px 35px;

                color: rgba(255,255,255,.85);

                border-bottom: 1px solid rgba(255,255,255,.08);
            }


            .dropdown-link:hover {

                background: rgba(255,255,255,.06);

                color: var(--onpa-yellow);
            }


            .dropdown-submenu {
                position: static;
            }

            .dropdown-submenu > .dropdown-link {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-left: 50px;
            }

            .dropdown-submenu-menu {
                position: static;
                width: 100%;
                min-width: 0;
                display: none;
                opacity: 1;
                visibility: visible;
                transform: none;
                box-shadow: none;
                border-top: 1px solid rgba(255,255,255,.08);
                background: #001d4b;
            }

            .dropdown-submenu.submenu-open > .dropdown-submenu-menu {
                display: block;
            }

            .dropdown-submenu-menu .dropdown-link {
                padding-left: 70px;
                background: transparent;
            }

            .dropdown-submenu.submenu-open > .submenu-toggle .submenu-arrow {
                transform: rotate(90deg);
            }

            /* PAGE */

            .page-content {

                padding: 45px 20px 70px;
            }


            .page-heading {

                margin-bottom: 35px;
            }


            .page-kicker {

                font-size: 12px;

                letter-spacing: 1.5px;
            }


            .page-title {

                font-size: 34px;

                margin-bottom: 17px;
            }


            .page-introduction {

                font-size: 14px;

                line-height: 1.8;
            }


            /* CONTACT */

            .contact-information {

                padding: 25px 20px;
            }


            .contact-form-container {

                padding: 25px 20px;
            }


            .contact-information-title,
            .contact-form-title {

                font-size: 22px;
            }


            .form-row {

                grid-template-columns: 1fr;

                gap: 0;
            }


            .form-footer {

                flex-direction: column;

                align-items: stretch;
            }


            .form-note {

                max-width: none;
            }


            .submit-button {

                width: 100%;
            }


            /* MAP */

            .map-section {

                margin-top: 55px;
            }


            .section-title {

                font-size: 27px;
            }


            .map-container {

                height: 300px;
            }


            /* FOOTER */

            .footer-container {

                padding: 45px 20px 20px;
            }


            .footer-grid {

                grid-template-columns: 1fr;

                gap: 30px;

                padding-bottom: 35px;
            }


            .footer-bottom {

                flex-direction: column;

                align-items: flex-start;

                gap: 8px;
            }
        }


        /* =====================================================
           PETIT MOBILE
        ===================================================== */

        @media (max-width: 480px) {

            .brand-logo {

                width: 54px;

                height: 54px;

                flex-basis: 54px;
            }


            .brand-name {

                font-size: 27px;
            }


            .brand-title {

                font-size: 8px;
            }


            .brand-country {

                display: none;
            }


            .rdc-flag {

                display: none;
            }


            .search-button {

                width: 40px;

                height: 40px;
            }


            .page-title {

                font-size: 30px;
            }


            .contact-info-item {

                gap: 12px;
            }


            .contact-info-icon {

                width: 40px;

                height: 40px;

                flex-basis: 40px;
            }
        }

    </style>

</head>


<body>


<!-- =========================================================
     HEADER
========================================================== -->

 <?php require 'headers.php' ;?>


<!-- =========================================================
     CONTENU PRINCIPAL
========================================================== -->

<main>


    <div class="page-content">


        <!-- =================================================
             TITRE
        ================================================== -->

        <section class="page-heading">


            <div class="page-kicker">
                CONTACT
            </div>


            <h1 class="page-title">
                Nous contacter
            </h1>


            <p class="page-introduction">

                Pour toute demande d'information, de collaboration,
                d'orientation ou de renseignement concernant les
                activités de pêche et d'aquaculture en République
                Démocratique du Congo, l'Office National de Pêche
                et d'Aquaculture est à votre écoute.

            </p>


        </section>


        <!-- =================================================
             CONTACT
        ================================================== -->

        <section class="contact-grid">


            <!-- =================================================
                 COORDONNÉES
            ================================================== -->

            <div class="contact-information">


                <h2 class="contact-information-title">

                    Nos coordonnées

                </h2>


                <p class="contact-information-intro">

                    Retrouvez ci-dessous les principales informations
                    permettant de joindre l'Office National de Pêche
                    et d'Aquaculture.

                </p>


                <!-- ADRESSE -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>


                    <div class="contact-info-content">

                        <strong>
                            Adresse
                        </strong>

                        <span>
                            <?= htmlspecialchars($contact_address) ?>
                        </span>

                    </div>

                </div>


                <!-- TELEPHONE -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>


                    <div class="contact-info-content">

                        <strong>
                            Téléphone
                        </strong>

                        <a
                            href="tel:<?= htmlspecialchars($contact_phone) ?>"
                        >

                            <?= htmlspecialchars($contact_phone) ?>

                        </a>

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <i class="fa-solid fa-envelope"></i>

                    </div>


                    <div class="contact-info-content">

                        <strong>
                            E-mail
                        </strong>

                        <a
                            href="mailto:<?= htmlspecialchars($contact_email) ?>"
                        >

                            <?= htmlspecialchars($contact_email) ?>

                        </a>

                    </div>

                </div>


                <!-- HORAIRES -->

                <div class="contact-info-item">

                    <div class="contact-info-icon">

                        <i class="fa-regular fa-clock"></i>

                    </div>


                    <div class="contact-info-content">

                        <strong>
                            Horaires
                        </strong>

                        <span>
                            Lundi – Vendredi
                        </span>

                        <span>
                            08h00 – 16h00
                        </span>

                    </div>

                </div>


            </div>


            <!-- =================================================
                 FORMULAIRE
            ================================================== -->

            <div class="contact-form-container">


                <h2 class="contact-form-title">

                    Envoyez-nous un message

                </h2>


                <p class="contact-form-description">

                    Remplissez le formulaire ci-dessous.
                    Les champs marqués d'un
                    <span class="required">*</span>
                    sont obligatoires.

                </p>


                <!-- =================================================
                     MESSAGE SUCCÈS
                ================================================== -->

                <?php if ($success_message !== ""): ?>

                    <div class="alert alert-success">

                        <i class="fa-solid fa-circle-check"></i>

                        &nbsp;

                        <?= htmlspecialchars($success_message) ?>

                    </div>

                <?php endif; ?>


                <!-- =================================================
                     MESSAGE ERREUR
                ================================================== -->

                <?php if ($error_message !== ""): ?>

                    <div class="alert alert-error">

                        <i class="fa-solid fa-circle-exclamation"></i>

                        &nbsp;

                        <?= htmlspecialchars($error_message) ?>

                    </div>

                <?php endif; ?>


                <!-- =================================================
                     FORMULAIRE
                ================================================== -->

                <form
                    action="contact.php"
                    method="POST"
                    autocomplete="on"
                >


                    <!-- NOM + EMAIL -->

                    <div class="form-row">


                        <div class="form-group">

                            <label
                                for="nom"
                                class="form-label"
                            >

                                Nom complet

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                id="nom"
                                name="nom"
                                class="form-control"
                                value="<?= htmlspecialchars($nom) ?>"
                                placeholder="Votre nom complet"
                                autocomplete="name"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label
                                for="email"
                                class="form-label"
                            >

                                Adresse e-mail

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                value="<?= htmlspecialchars($email) ?>"
                                placeholder="exemple@email.com"
                                autocomplete="email"
                                required
                            >

                        </div>


                    </div>


                    <!-- TELEPHONE + OBJET -->

                    <div class="form-row">


                        <div class="form-group">

                            <label
                                for="telephone"
                                class="form-label"
                            >

                                Téléphone

                            </label>


                            <input
                                type="tel"
                                id="telephone"
                                name="telephone"
                                class="form-control"
                                value="<?= htmlspecialchars($telephone) ?>"
                                placeholder="+243 XXX XXX XXX"
                                autocomplete="tel"
                            >

                        </div>


                        <div class="form-group">

                            <label
                                for="objet"
                                class="form-label"
                            >

                                Objet

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                id="objet"
                                name="objet"
                                class="form-control"
                                required
                            >

                                <option value="">
                                    Sélectionnez un objet
                                </option>


                                <option
                                    value="Information générale"
                                    <?= $objet === "Information générale" ? "selected" : "" ?>
                                >
                                    Information générale
                                </option>


                                <option
                                    value="Pêche"
                                    <?= $objet === "Pêche" ? "selected" : "" ?>
                                >
                                    Pêche
                                </option>


                                <option
                                    value="Aquaculture"
                                    <?= $objet === "Aquaculture" ? "selected" : "" ?>
                                >
                                    Aquaculture
                                </option>


                                <option
                                    value="Réglementation"
                                    <?= $objet === "Réglementation" ? "selected" : "" ?>
                                >
                                    Réglementation
                                </option>


                                <option
                                    value="Statistiques"
                                    <?= $objet === "Statistiques" ? "selected" : "" ?>
                                >
                                    Statistiques
                                </option>


                                <option
                                    value="Partenariat"
                                    <?= $objet === "Partenariat" ? "selected" : "" ?>
                                >
                                    Partenariat
                                </option>


                                <option
                                    value="Demande institutionnelle"
                                    <?= $objet === "Demande institutionnelle" ? "selected" : "" ?>
                                >
                                    Demande institutionnelle
                                </option>


                                <option
                                    value="Autre"
                                    <?= $objet === "Autre" ? "selected" : "" ?>
                                >
                                    Autre demande
                                </option>


                            </select>

                        </div>


                    </div>


                    <!-- MESSAGE -->

                    <div class="form-group">

                        <label
                            for="message"
                            class="form-label"
                        >

                            Votre message

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            id="message"
                            name="message"
                            class="form-control"
                            placeholder="Écrivez votre message..."
                            required
                        ><?= htmlspecialchars($message) ?></textarea>

                    </div>


                    <!-- FORM FOOTER -->

                    <div class="form-footer">


                        <div class="form-note">

                            Les informations transmises via ce formulaire
                            sont utilisées uniquement pour traiter votre
                            demande.

                        </div>


                        <button
                            type="submit"
                            class="submit-button"
                        >

                            <i class="fa-solid fa-paper-plane"></i>

                            Envoyer le message

                        </button>


                    </div>


                </form>


            </div>


        </section>


        <!-- =================================================
             CARTE
        ================================================== -->

        <section class="map-section">


            <div class="section-heading">

                <div class="section-kicker">
                    LOCALISATION
                </div>


                <h2 class="section-title">
                    Où nous trouver
                </h2>

            </div>


            <div class="map-container">

                <!--
                --------------------------------------------------
                CARTE PROVISOIRE

                Remplace "Kinshasa, RDC" par l'adresse exacte
                de l'ONPA lorsque celle-ci est confirmée.
                --------------------------------------------------
                -->

                <iframe
                    src="https://www.google.com/maps?q=Kinshasa%2C%20Democratic%20Republic%20of%20the%20Congo&output=embed"
                    loading="lazy"
                    title="Localisation de l'ONPA à Kinshasa"
                    referrerpolicy="no-referrer-when-downgrade"
                >
                </iframe>

            </div>


        </section>


    </div>

</main>


<!-- =========================================================
     FOOTER
========================================================== -->

<?php include("footer.php"); ?>

<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    var mobileMenuButton =
        document.getElementById("mobileMenuButton");

    var navMenu =
        document.getElementById("navMenu");

    if (mobileMenuButton && navMenu) {

        mobileMenuButton.addEventListener("click", function () {

            var isOpen =
                navMenu.classList.toggle("open");

            mobileMenuButton.setAttribute(
                "aria-expanded",
                isOpen ? "true" : "false"
            );

            var icon =
                mobileMenuButton.querySelector("i");

            if (icon) {
                icon.classList.toggle("fa-bars", !isOpen);
                icon.classList.toggle("fa-xmark", isOpen);
            }
        });
    }


    /* Sous-menus principaux */
    var dropdownItems =
        document.querySelectorAll(".nav-item.has-dropdown");

    for (var i = 0; i < dropdownItems.length; i++) {

        (function (item) {

            var link =
                item.querySelector(".nav-link");

            if (!link) {
                return;
            }

            link.addEventListener("click", function (event) {

                if (window.innerWidth <= 768) {

                    event.preventDefault();

                    for (var j = 0; j < dropdownItems.length; j++) {

                        if (dropdownItems[j] !== item) {
                            dropdownItems[j].classList.remove(
                                "submenu-open"
                            );
                        }
                    }

                    item.classList.toggle("submenu-open");
                }
            });

        })(dropdownItems[i]);
    }


    /* Sous-menus imbriqués : Filières / Typologie */
    var nestedSubmenus =
        document.querySelectorAll(".dropdown-submenu");

    for (var k = 0; k < nestedSubmenus.length; k++) {

        (function (submenu) {

            var toggle =
                submenu.querySelector(".submenu-toggle");

            if (!toggle) {
                return;
            }

            toggle.addEventListener("click", function (event) {

                if (window.innerWidth <= 768) {

                    event.preventDefault();

                    var siblings =
                        submenu.parentNode.children;

                    for (var n = 0; n < siblings.length; n++) {

                        if (
                            siblings[n] !== submenu &&
                            siblings[n].classList &&
                            siblings[n].classList.contains("dropdown-submenu")
                        ) {
                            siblings[n].classList.remove(
                                "submenu-open"
                            );
                        }
                    }

                    submenu.classList.toggle("submenu-open");
                }
            });

        })(nestedSubmenus[k]);
    }


    /* Fermeture après clic sur un vrai lien */
    var realLinks =
        document.querySelectorAll(
            ".dropdown-menu a:not(.submenu-toggle)"
        );

    for (var m = 0; m < realLinks.length; m++) {

        realLinks[m].addEventListener("click", function () {

            if (window.innerWidth <= 768) {

                navMenu.classList.remove("open");

                mobileMenuButton.setAttribute(
                    "aria-expanded",
                    "false"
                );

                for (var p = 0; p < dropdownItems.length; p++) {
                    dropdownItems[p].classList.remove(
                        "submenu-open"
                    );
                }

                for (var q = 0; q < nestedSubmenus.length; q++) {
                    nestedSubmenus[q].classList.remove(
                        "submenu-open"
                    );
                }

                var icon =
                    mobileMenuButton.querySelector("i");

                if (icon) {
                    icon.classList.remove("fa-xmark");
                    icon.classList.add("fa-bars");
                }
            }
        });
    }


    /* Fermeture lors du retour sur desktop */
    window.addEventListener("resize", function () {

        if (window.innerWidth > 768) {

            navMenu.classList.remove("open");

            for (var r = 0; r < dropdownItems.length; r++) {
                dropdownItems[r].classList.remove(
                    "submenu-open"
                );
            }

            for (var s = 0; s < nestedSubmenus.length; s++) {
                nestedSubmenus[s].classList.remove(
                    "submenu-open"
                );
            }

            mobileMenuButton.setAttribute(
                "aria-expanded",
                "false"
            );

            var icon =
                mobileMenuButton.querySelector("i");

            if (icon) {
                icon.classList.remove("fa-xmark");
                icon.classList.add("fa-bars");
            }
        }
    });


    /* Effet léger au scroll */
    var headerMain =
        document.querySelector(".header-main");

    window.addEventListener("scroll", function () {

        if (!headerMain) {
            return;
        }

        if (window.scrollY > 30) {
            headerMain.style.boxShadow =
                "0 5px 20px rgba(0,43,103,.08)";
        } else {
            headerMain.style.boxShadow = "none";
        }
    });

});

</script>


</body>

</html>