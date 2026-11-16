```javascript
/* =========================================================
   ONPA — MENU RESPONSIVE
========================================================= */

document.addEventListener("DOMContentLoaded", () => {

    /* =====================================================
       ELEMENTS
    ===================================================== */

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

    const mobilePeche =
        mobilePecheButton
            ? mobilePecheButton.closest(".mobile-dropdown")
            : null;

    const mobileLinks =
        document.querySelectorAll(
            ".mobile-link, .mobile-navigation a"
        );


    /* =====================================================
       OUVRIR LE MENU
    ===================================================== */

    function openMobileMenu() {

        if (!mobileNavigation) return;

        mobileNavigation.classList.add("is-open");

        if (mobileOverlay) {
            mobileOverlay.classList.add("is-visible");
        }

        if (mobileMenuButton) {
            mobileMenuButton.classList.add("is-open");

            mobileMenuButton.setAttribute(
                "aria-expanded",
                "true"
            );

            mobileMenuButton.setAttribute(
                "aria-label",
                "Fermer le menu"
            );
        }

        document.body.classList.add(
            "mobile-menu-open"
        );
    }


    /* =====================================================
       FERMER LE MENU
    ===================================================== */

    function closeMobileMenu() {

        if (!mobileNavigation) return;

        mobileNavigation.classList.remove("is-open");

        if (mobileOverlay) {
            mobileOverlay.classList.remove("is-visible");
        }

        if (mobileMenuButton) {

            mobileMenuButton.classList.remove(
                "is-open"
            );

            mobileMenuButton.setAttribute(
                "aria-expanded",
                "false"
            );

            mobileMenuButton.setAttribute(
                "aria-label",
                "Ouvrir le menu"
            );
        }

        document.body.classList.remove(
            "mobile-menu-open"
        );
    }


    /* =====================================================
       TOGGLE MENU
    ===================================================== */

    if (mobileMenuButton) {

        mobileMenuButton.addEventListener(
            "click",
            () => {

                const isOpen =
                    mobileNavigation &&
                    mobileNavigation.classList.contains(
                        "is-open"
                    );

                if (isOpen) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }

            }
        );

    }


    /* =====================================================
       BOUTON FERMER
    ===================================================== */

    if (mobileClose) {

        mobileClose.addEventListener(
            "click",
            closeMobileMenu
        );

    }


    /* =====================================================
       OVERLAY
    ===================================================== */

    if (mobileOverlay) {

        mobileOverlay.addEventListener(
            "click",
            closeMobileMenu
        );

    }


    /* =====================================================
       SOUS-MENU PÊCHE
    ===================================================== */

    if (mobilePecheButton && mobilePeche) {

        mobilePecheButton.setAttribute(
            "aria-expanded",
            "false"
        );

        mobilePecheButton.addEventListener(
            "click",
            () => {

                const isOpen =
                    mobilePeche.classList.contains(
                        "is-open"
                    );

                mobilePeche.classList.toggle(
                    "is-open"
                );

                mobilePecheButton.setAttribute(
                    "aria-expanded",
                    String(!isOpen)
                );

            }
        );

    }


    /* =====================================================
       CLIQUER SUR UN LIEN MOBILE
    ===================================================== */

    mobileLinks.forEach(link => {

        link.addEventListener(
            "click",
            event => {

                /*
                 * Le bouton PÊCHE n'est pas concerné.
                 */
                if (
                    link.classList.contains(
                        "mobile-dropdown-button"
                    )
                ) {
                    return;
                }

                /*
                 * Les liens avec # sont traités normalement.
                 */
                if (
                    link.getAttribute("href") &&
                    link.getAttribute("href") !== "#"
                ) {
                    closeMobileMenu();
                }

            }
        );

    });


    /* =====================================================
       ESCAPE
    ===================================================== */

    document.addEventListener(
        "keydown",
        event => {

            if (event.key === "Escape") {

                const isOpen =
                    mobileNavigation &&
                    mobileNavigation.classList.contains(
                        "is-open"
                    );

                if (isOpen) {
                    closeMobileMenu();
                }

            }

        }
    );


    /* =====================================================
       REDIMENSIONNEMENT
    ===================================================== */

    window.addEventListener(
        "resize",
        () => {

            /*
             * Si on revient sur desktop,
             * on ferme automatiquement le menu mobile.
             */

            if (window.innerWidth >= 1100) {
                closeMobileMenu();
            }

        }
    );


    /* =====================================================
       RECHERCHE
    ===================================================== */

    const searchButton =
        document.getElementById("searchButton");

    const searchPanel =
        document.getElementById("searchPanel");

    const searchClose =
        document.getElementById("searchClose");

    const searchInput =
        document.getElementById("searchInput");

    const searchSubmit =
        document.getElementById("searchSubmit");


    function openSearch() {

        if (!searchPanel) return;

        searchPanel.classList.add("is-open");

        if (searchInput) {

            setTimeout(() => {
                searchInput.focus();
            }, 150);

        }

    }


    function closeSearch() {

        if (!searchPanel) return;

        searchPanel.classList.remove(
            "is-open"
        );

    }


    if (searchButton) {

        searchButton.addEventListener(
            "click",
            () => {

                if (
                    searchPanel.classList.contains(
                        "is-open"
                    )
                ) {
                    closeSearch();
                } else {
                    openSearch();
                }

            }
        );

    }


    if (searchClose) {

        searchClose.addEventListener(
            "click",
            closeSearch
        );

    }


    if (searchSubmit && searchInput) {

        searchSubmit.addEventListener(
            "click",
            () => {

                const query =
                    searchInput.value.trim();

                if (!query) {

                    searchInput.focus();

                    return;
                }

                /*
                 * Pour le moment :
                 * message simple.
                 *
                 * Tu pourras remplacer cette partie
                 * plus tard par ton vrai moteur de recherche.
                 */

                console.log(
                    "Recherche ONPA :",
                    query
                );

            }
        );

        searchInput.addEventListener(
            "keydown",
            event => {

                if (event.key === "Enter") {

                    event.preventDefault();

                    searchSubmit.click();

                }

            }
        );

    }


    /* =====================================================
       FERMER RECHERCHE AVEC ESCAPE
    ===================================================== */

    document.addEventListener(
        "keydown",
        event => {

            if (event.key === "Escape") {
                closeSearch();
            }

        }
    );


    /* =====================================================
       CLIC EN DEHORS DU PANNEAU DE RECHERCHE
    ===================================================== */

    document.addEventListener(
        "click",
        event => {

            if (!searchPanel || !searchPanel.classList.contains("is-open")) {
                return;
            }

            const clickedInsideSearch =
                searchPanel.contains(event.target);

            const clickedSearchButton =
                searchButton &&
                searchButton.contains(event.target);

            if (
                !clickedInsideSearch &&
                !clickedSearchButton
            ) {
                closeSearch();
            }

        }
    );

});
```
s