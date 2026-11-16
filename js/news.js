```javascript
document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       RÉCUPÉRATION DES CARTES
    ===================================================== */

    const newsCards = document.querySelectorAll(".news-card");


    /* =====================================================
       GESTION DES IMAGES
    ===================================================== */

    newsCards.forEach(function (card) {

        const image = card.querySelector(".card-image img");
        const imageContainer = card.querySelector(".card-image");


        if (!image) {
            return;
        }


        image.addEventListener("error", function () {

            image.style.display = "none";

            imageContainer.classList.add("image-error");

        });


        /*
         * Petite amélioration du chargement
         */
        image.setAttribute("loading", "lazy");

    });


    /* =====================================================
       ACCESSIBILITÉ DES LIENS
    ===================================================== */

    newsCards.forEach(function (card) {

        const link = card.querySelector(".card-link");

        if (!link) {
            return;
        }

        link.addEventListener("keydown", function (event) {

            if (event.key === "Enter") {
                link.click();
            }

        });

    });


    /* =====================================================
       ANIMATION À L'APPARITION
    ===================================================== */

    if ("IntersectionObserver" in window) {

        const observer = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add(
                            "news-card-visible"
                        );

                        observer.unobserve(entry.target);

                    }

                });

            },
            {
                threshold: 0.10
            }
        );


        newsCards.forEach(function (card) {

            card.classList.add("news-card-hidden");

            observer.observe(card);

        });

    }

});
```
