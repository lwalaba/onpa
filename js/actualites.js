document.addEventListener("DOMContentLoaded", () => {

    const filters =
        document.querySelectorAll(".filter");

    const cards =
        document.querySelectorAll(".news-card");


    filters.forEach(filter => {

        filter.addEventListener("click", () => {

            const category =
                filter.dataset.filter;


            // Bouton actif

            filters.forEach(item => {

                item.classList.remove("active");

            });

            filter.classList.add("active");


            // Filtrage

            cards.forEach(card => {

                const cardCategory =
                    card.dataset.category;


                if (
                    category === "all" ||
                    cardCategory === category
                ) {

                    card.style.display = "";

                    setTimeout(() => {

                        card.style.opacity = "1";

                    }, 20);

                } else {

                    card.style.display = "none";

                }

            });

        });

    });

});