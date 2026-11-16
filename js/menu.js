/* =========================================================
   MENU ONPA
========================================================= */

document.addEventListener("DOMContentLoaded", function () {


    /* =====================================================
       MENU MOBILE
    ===================================================== */

    var mobileMenuButton =
        document.getElementById("mobileMenuButton");

    var navMenu =
        document.getElementById("navMenu");


    if (mobileMenuButton && navMenu) {

        mobileMenuButton.addEventListener(
            "click",
            function () {

                var isOpen =
                    navMenu.classList.toggle("open");


                /* ARIA */

                mobileMenuButton.setAttribute(
                    "aria-expanded",
                    isOpen ? "true" : "false"
                );


                /* Icône */

                var icon =
                    mobileMenuButton.querySelector("i");


                if (icon) {

                    icon.classList.toggle(
                        "fa-bars",
                        !isOpen
                    );

                    icon.classList.toggle(
                        "fa-xmark",
                        isOpen
                    );
                }

            }
        );
    }



    /* =====================================================
       SOUS-MENUS PRINCIPAUX
    ===================================================== */

    var dropdownItems =
        document.querySelectorAll(
            ".nav-item.has-dropdown"
        );


    for (
        var i = 0;
        i < dropdownItems.length;
        i++
    ) {

        (function (item) {

            var link =
                item.querySelector(".nav-link");


            if (!link) {
                return;
            }


            link.addEventListener(
                "click",
                function (event) {

                    /*
                     * Sur mobile :
                     * le clic ouvre le sous-menu
                     */

                    if (window.innerWidth <= 768) {

                        event.preventDefault();


                        /* Fermer les autres */

                        for (
                            var j = 0;
                            j < dropdownItems.length;
                            j++
                        ) {

                            if (
                                dropdownItems[j] !== item
                            ) {

                                dropdownItems[j]
                                    .classList
                                    .remove(
                                        "submenu-open"
                                    );
                            }
                        }


                        /* Ouvrir / fermer */

                        item.classList.toggle(
                            "submenu-open"
                        );
                    }

                }
            );

        })(dropdownItems[i]);
    }



    /* =====================================================
       SOUS-MENUS IMBRIQUÉS
       Filières / Typologie
    ===================================================== */

    var nestedSubmenus =
        document.querySelectorAll(
            ".dropdown-submenu"
        );


    for (
        var k = 0;
        k < nestedSubmenus.length;
        k++
    ) {

        (function (submenu) {

            var toggle =
                submenu.querySelector(
                    ".submenu-toggle"
                );


            if (!toggle) {
                return;
            }


            toggle.addEventListener(
                "click",
                function (event) {

                    if (window.innerWidth <= 768) {

                        event.preventDefault();


                        /*
                         * Fermer les autres
                         * sous-menus du même niveau
                         */

                        var siblings =
                            submenu.parentNode.children;


                        for (
                            var n = 0;
                            n < siblings.length;
                            n++
                        ) {

                            if (

                                siblings[n] !== submenu &&

                                siblings[n].classList &&

                                siblings[n]
                                    .classList
                                    .contains(
                                        "dropdown-submenu"
                                    )

                            ) {

                                siblings[n]
                                    .classList
                                    .remove(
                                        "submenu-open"
                                    );
                            }
                        }


                        /*
                         * Ouvrir / fermer
                         */

                        submenu.classList.toggle(
                            "submenu-open"
                        );
                    }

                }
            );

        })(nestedSubmenus[k]);
    }



    /* =====================================================
       FERMETURE APRÈS CLIC SUR UN VRAI LIEN
    ===================================================== */

    var realLinks =
        document.querySelectorAll(
            ".dropdown-menu a:not(.submenu-toggle)"
        );


    for (
        var m = 0;
        m < realLinks.length;
        m++
    ) {

        realLinks[m].addEventListener(
            "click",
            function () {

                if (window.innerWidth <= 768) {

                    /* Fermer menu */

                    navMenu.classList.remove("open");


                    mobileMenuButton.setAttribute(
                        "aria-expanded",
                        "false"
                    );


                    /* Fermer sous-menus */

                    for (
                        var p = 0;
                        p < dropdownItems.length;
                        p++
                    ) {

                        dropdownItems[p]
                            .classList
                            .remove(
                                "submenu-open"
                            );
                    }


                    for (
                        var q = 0;
                        q < nestedSubmenus.length;
                        q++
                    ) {

                        nestedSubmenus[q]
                            .classList
                            .remove(
                                "submenu-open"
                            );
                    }


                    /* Remettre l'icône ☰ */

                    var icon =
                        mobileMenuButton.querySelector(
                            "i"
                        );


                    if (icon) {

                        icon.classList.remove(
                            "fa-xmark"
                        );

                        icon.classList.add(
                            "fa-bars"
                        );
                    }

                }

            }
        );
    }



    /* =====================================================
       RETOUR DESKTOP
    ===================================================== */

    window.addEventListener(
        "resize",
        function () {

            if (window.innerWidth > 768) {

                navMenu.classList.remove(
                    "open"
                );


                /* Fermer les menus */

                for (
                    var r = 0;
                    r < dropdownItems.length;
                    r++
                ) {

                    dropdownItems[r]
                        .classList
                        .remove(
                            "submenu-open"
                        );
                }


                for (
                    var s = 0;
                    s < nestedSubmenus.length;
                    s++
                ) {

                    nestedSubmenus[s]
                        .classList
                        .remove(
                            "submenu-open"
                        );
                }


                /* ARIA */

                mobileMenuButton.setAttribute(
                    "aria-expanded",
                    "false"
                );


                /* Icône */

                var icon =
                    mobileMenuButton.querySelector(
                        "i"
                    );


                if (icon) {

                    icon.classList.remove(
                        "fa-xmark"
                    );

                    icon.classList.add(
                        "fa-bars"
                    );
                }

            }

        }
    );



    /* =====================================================
       EFFET AU SCROLL
    ===================================================== */

    var headerMain =
        document.querySelector(
            ".header-main"
        );


    window.addEventListener(
        "scroll",
        function () {

            if (!headerMain) {
                return;
            }


            if (window.scrollY > 30) {

                headerMain.style.boxShadow =
                    "0 5px 20px rgba(0,43,103,.08)";

            } else {

                headerMain.style.boxShadow =
                    "none";
            }

        }
    );

});