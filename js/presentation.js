/* =========================================================
   ONPA — MOT DU DIRECTEUR
   SEARCH
========================================================= */


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



/* =========================================================
   OPEN SEARCH
========================================================= */

if (searchButton) {

    searchButton.addEventListener("click", () => {

        searchPanel.classList.add("active");

        setTimeout(() => {

            searchInput.focus();

        }, 300);

    });

}



/* =========================================================
   CLOSE SEARCH
========================================================= */

if (searchClose) {

    searchClose.addEventListener("click", () => {

        searchPanel.classList.remove("active");

    });

}



/* =========================================================
   ESCAPE
========================================================= */

document.addEventListener("keydown", (event) => {

    if (event.key === "Escape") {

        searchPanel.classList.remove("active");

    }

});



/* =========================================================
   SEARCH
========================================================= */

if (searchSubmit) {

    searchSubmit.addEventListener("click", () => {

        const query =
            searchInput.value.trim();

        if (!query) {

            searchInput.focus();

            return;

        }

        console.log(
            "Recherche ONPA :",
            query
        );

        /*
            Ici tu pourras connecter
            ton véritable moteur de recherche.
        */

    });

}