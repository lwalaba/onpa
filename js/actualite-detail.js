/* =========================================================
   ONPA — PAGE DETAIL ACTUALITE
========================================================= */


const openMenu =
    document.getElementById("openMenu");

const closeMenu =
    document.getElementById("closeMenu");

const mainNav =
    document.getElementById("mainNav");


/* =========================================================
   MENU MOBILE
========================================================= */

if (openMenu) {

    openMenu.addEventListener("click", () => {

        mainNav.classList.add("open");

    });

}


if (closeMenu) {

    closeMenu.addEventListener("click", () => {

        mainNav.classList.remove("open");

    });

}


/* Fermer le menu après clic */

document
    .querySelectorAll(".main-nav a")
    .forEach(link => {

        link.addEventListener("click", () => {

            mainNav.classList.remove("open");

        });

    });



/* =========================================================
   RECHERCHE
========================================================= */

const searchButton =
    document.getElementById("searchButton");

const searchPanel =
    document.getElementById("searchPanel");

const searchInput =
    document.getElementById("searchInput");


if (searchButton) {

    searchButton.addEventListener("click", () => {

        searchPanel.classList.add("show");

        setTimeout(() => {

            searchInput.focus();

        }, 100);

    });

}


/* Fermer recherche */

if (searchPanel) {

    searchPanel.addEventListener("click", event => {

        if (event.target === searchPanel) {

            searchPanel.classList.remove("show");

        }

    });

}


/* ESC */

document.addEventListener("keydown", event => {

    if (event.key === "Escape") {

        searchPanel.classList.remove("show");

        mainNav.classList.remove("open");

    }

});



/* =========================================================
   PARTAGE
========================================================= */

const shareButtons =
    document.querySelectorAll("[data-share]");


shareButtons.forEach(button => {

    button.addEventListener("click", async () => {

        const type =
            button.dataset.share;

        const url =
            window.location.href;

        const title =
            document.title;


        /* FACEBOOK */

        if (type === "facebook") {

            window.open(
                `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
                "_blank",
                "width=600,height=500"
            );

        }


        /* WHATSAPP */

        if (type === "whatsapp") {

            window.open(
                `https://wa.me/?text=${encodeURIComponent(title + " " + url)}`,
                "_blank"
            );

        }


        /* LINKEDIN */

        if (type === "linkedin") {

            window.open(
                `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`,
                "_blank",
                "width=600,height=500"
            );

        }


        /* COPIER */

        if (type === "copy") {

            try {

                await navigator.clipboard.writeText(url);

                button.innerHTML =
                    '<i class="fa-solid fa-check"></i>';

                setTimeout(() => {

                    button.innerHTML =
                        '<i class="fa-solid fa-link"></i>';

                }, 1800);

            }

            catch (error) {

                alert(
                    "Impossible de copier le lien."
                );

            }

        }

    });

});