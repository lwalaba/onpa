/* =====================================================
   ONPA — MENU MOBILE RESPONSIVE
===================================================== */

document.addEventListener("DOMContentLoaded", function () {

    /* =================================================
       ELEMENTS
    ================================================= */

    const mobileMenuButton =
        document.getElementById("mobileMenuButton");

    const mobileNavigation =
        document.getElementById("mobileNavigation");

    const mobileClose =
        document.getElementById("mobileClose");

    const mobileOverlay =
        document.getElementById("mobileOverlay");

    const mobilePecheButton =
        document.getElementById("mobilePecheButton");

    const mobilePecheContent =
        document.getElementById("mobilePecheContent");

    const mobilePecheDropdown =
        mobilePecheButton
            ? mobilePecheButton.closest(".mobile-dropdown")
            : null;

    const mobileLinks =
        document.querySelectorAll(".mobile-link");


    /* =================================================
       VERIFICATION
    ================================================= */

    if (
        !mobileMenuButton ||
        !mobileNavigation
    ) {
        return;
    }


    /* =================================================
       OUVRIR LE MENU
    ================================================= */

    function openMobileMenu() {

        mobileNavigation.classList.add("show");

        if (mobileOverlay) {
            mobileOverlay.classList.add("show");
        }

        mobileMenuButton.classList.add("open");

        mobileMenuButton.setAttribute(
            "aria-expanded",
            "true"
        );

        mobileNavigation.setAttribute(
            "aria-hidden",
            "false"
        );

        /*
         * Empêche la page principale
         * de défiler derrière le menu.
         */
        document.body.style.overflow = "hidden";
    }


    /* =================================================
       FERMER LE MENU
    ================================================= */

    function closeMobileMenu() {

        mobileNavigation.classList.remove("show");

        if (mobileOverlay) {
            mobileOverlay.classList.remove("show");
        }

        mobileMenuButton.classList.remove("open");

        mobileMenuButton.setAttribute(
            "aria-expanded",
            "false"
        );

        mobileNavigation.setAttribute(
            "aria-hidden",
            "true"
        );

        /*
         * Réactive le scroll de la page.
         */
        document.body.style.overflow = "";


        /*
         * Fermer également le sous-menu PÊCHE.
         */
        if (mobilePecheDropdown) {

            mobilePecheDropdown.classList.remove("open");

        }

        if (mobilePecheButton) {

            mobilePecheButton.setAttribute(
                "aria-expanded",
                "false"
            );

        }

        if (mobilePecheContent) {

            mobilePecheContent.setAttribute(
                "aria-hidden",
                "true"
            );

        }
    }


    /* =================================================
       BOUTON HAMBURGER
    ================================================= */

    mobileMenuButton.addEventListener(
        "click",
        function () {

            const isOpen =
                mobileNavigation.classList.contains("show");

            if (isOpen) {

                closeMobileMenu();

            } else {

                openMobileMenu();

            }

        }
    );


    /* =================================================
       BOUTON FERMER
    ================================================= */

    if (mobileClose) {

        mobileClose.addEventListener(
            "click",
            function () {

                closeMobileMenu();

            }
        );

    }


    /* =================================================
       OVERLAY
    ================================================= */

    if (mobileOverlay) {

        mobileOverlay.addEventListener(
            "click",
            function () {

                closeMobileMenu();

            }
        );

    }


    /* =================================================
       SOUS-MENU PÊCHE
    ================================================= */

    if (
        mobilePecheButton &&
        mobilePecheDropdown &&
        mobilePecheContent
    ) {

        mobilePecheButton.addEventListener(
            "click",
            function () {

                const isOpen =
                    mobilePecheDropdown.classList.toggle(
                        "open"
                    );


                mobilePecheButton.setAttribute(
                    "aria-expanded",
                    String(isOpen)
                );


                mobilePecheContent.setAttribute(
                    "aria-hidden",
                    String(!isOpen)
                );

            }
        );

    }


    /* =================================================
       FERMER APRÈS CLIC SUR UN LIEN
    ================================================= */

    mobileLinks.forEach(
        function (link) {

            link.addEventListener(
                "click",
                function () {

                    closeMobileMenu();

                }
            );

        }
    );


    /* =================================================
       TOUCHE ESCAPE
    ================================================= */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                mobileNavigation.classList.contains("show")
            ) {

                closeMobileMenu();

                mobileMenuButton.focus();

            }

        }
    );


    /* =================================================
       RETOUR AUTOMATIQUE EN DESKTOP
       lorsque l'écran dépasse 760px
    ================================================= */

    window.addEventListener(
        "resize",
        function () {

            if (window.innerWidth > 760) {

                closeMobileMenu();

            }

        }
    );


    /* =================================================
       ETAT INITIAL ACCESSIBILITÉ
    ================================================= */

    mobileMenuButton.setAttribute(
        "aria-expanded",
        "false"
    );

    mobileNavigation.setAttribute(
        "aria-hidden",
        "true"
    );

    if (mobilePecheButton) {

        mobilePecheButton.setAttribute(
            "aria-expanded",
            "false"
        );

    }

    if (mobilePecheContent) {

        mobilePecheContent.setAttribute(
            "aria-hidden",
            "true"
        );

    }

});

```javascript
/* =========================================================
   ONPA — MENU RESPONSIVE
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const menuButton =
        document.getElementById("mobileMenuButton");

    const mobileMenu =
        document.getElementById("mobileNavigation");

    const closeButton =
        document.getElementById("mobileClose");

    const overlay =
        document.getElementById("mobileOverlay");

    const pecheButton =
        document.getElementById("mobilePecheButton");

    const mobileDropdown =
        pecheButton
            ? pecheButton.closest(".mobile-dropdown")
            : null;


    /* =====================================================
       OUVRIR
    ===================================================== */

    function openMenu() {

        if (!mobileMenu) return;

        mobileMenu.classList.add("is-open");

        if (overlay) {
            overlay.classList.add("is-visible");
        }

        if (menuButton) {

            menuButton.classList.add("is-open");

            menuButton.setAttribute(
                "aria-expanded",
                "true"
            );

            menuButton.setAttribute(
                "aria-label",
                "Fermer le menu"
            );
        }

        document.body.classList.add(
            "mobile-menu-open"
        );
    }


    /* =====================================================
       FERMER
    ===================================================== */

    function closeMenu() {

        if (!mobileMenu) return;

        mobileMenu.classList.remove("is-open");

        if (overlay) {
            overlay.classList.remove("is-visible");
        }

        if (menuButton) {

            menuButton.classList.remove("is-open");

            menuButton.setAttribute(
                "aria-expanded",
                "false"
            );

            menuButton.setAttribute(
                "aria-label",
                "Ouvrir le menu"
            );
        }

        document.body.classList.remove(
            "mobile-menu-open"
        );
    }


    /* =====================================================
       HAMBURGER
    ===================================================== */

    if (menuButton) {

        menuButton.addEventListener(
            "click",
            function () {

                if (
                    mobileMenu &&
                    mobileMenu.classList.contains(
                        "is-open"
                    )
                ) {
                    closeMenu();
                } else {
                    openMenu();
                }

            }
        );

    }


    /* =====================================================
       BOUTON X
    ===================================================== */

    if (closeButton) {

        closeButton.addEventListener(
            "click",
            closeMenu
        );

    }


    /* =====================================================
       OVERLAY
    ===================================================== */

    if (overlay) {

        overlay.addEventListener(
            "click",
            closeMenu
        );

    }


    /* =====================================================
       SOUS-MENU PÊCHE
    ===================================================== */

    if (pecheButton && mobileDropdown) {

        pecheButton.setAttribute(
            "aria-expanded",
            "false"
        );

        pecheButton.addEventListener(
            "click",
            function () {

                const opened =
                    mobileDropdown.classList.toggle(
                        "is-open"
                    );

                pecheButton.setAttribute(
                    "aria-expanded",
                    opened
                );

            }
        );

    }


    /* =====================================================
       FERMER APRÈS CLIC SUR UN LIEN
    ===================================================== */

    const links =
        mobileMenu
            ? mobileMenu.querySelectorAll(
                "a"
            )
            : [];

    links.forEach(function (link) {

        link.addEventListener(
            "click",
            function () {

                closeMenu();

            }
        );

    });


    /* =====================================================
       TOUCHE ESCAPE
    ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                mobileMenu &&
                mobileMenu.classList.contains(
                    "is-open"
                )
            ) {

                closeMenu();

            }

        }
    );


    /* =====================================================
       RETOUR DESKTOP
    ===================================================== */

    window.addEventListener(
        "resize",
        function () {

            if (window.innerWidth >= 1100) {

                closeMenu();

            }

        }
    );

});
```
