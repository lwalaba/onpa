/* =====================================================
   DOCUMENTS ONPA
===================================================== */

document.addEventListener("DOMContentLoaded", () => {


    /* =================================================
       DONNÉES DES DOCUMENTS
       Remplace les fichiers par tes vrais PDF.
    ================================================== */

    const documents = [

        {
            id: 1,

            name: "ORDONNANCE-LOI N°13/003 DU 23 FEVRIER 2013 PORTANT REFORME DES PROCEDURES RELATIVES A L'ASSIETTE, AU CONTROLE ET AUX MODALITES DE RECOUVREMENT DES RECETTES NON FISCALES TELLE QUE MODIFIEE ET COMPLETEE PAR LES LOIS DE FINANCES",

            category: "Lois",

            size: "457.6 Ko",

            date: "23 février 2013",

            file: "documents/ordonnance-loi-13-003.pdf"

        },

        {
            id: 2,

            name: "TEXTES COORDONNES ET MIS A JOUR LE 05 AVRIL 2024",

            category: "Lois",

            size: "92.2 Mo",

            date: "05 avril 2024",

            file: "documents/textes-coordonnes-2024.pdf"

        },

        {
            id: 3,

            name: "Décret portant organisation et fonctionnement de l'Office National de Pêche et d'Aquaculture",

            category: "Décrets",

            size: "1.2 Mo",

            date: "15 juin 2023",

            file: "documents/decret-onpa.pdf"

        },

        {
            id: 4,

            name: "Arrêté ministériel relatif à la réglementation de la pêche en République Démocratique du Congo",

            category: "Arrêtés",

            size: "850 Ko",

            date: "10 janvier 2024",

            file: "documents/arrete-peche.pdf"

        },

        {
            id: 5,

            name: "Rapport annuel des activités de l'ONPA",

            category: "Rapports",

            size: "3.5 Mo",

            date: "2024",

            file: "documents/rapport-annuel-onpa.pdf"

        },

        {
            id: 6,

            name: "Guide de bonnes pratiques pour une aquaculture durable",

            category: "Guides",

            size: "2.1 Mo",

            date: "2024",

            file: "documents/guide-aquaculture.pdf"

        },

        {
            id: 7,

            name: "Réglementation relative à la protection des ressources halieutiques",

            category: "Réglementation",

            size: "1.8 Mo",

            date: "2023",

            file: "documents/reglementation-ressources.pdf"

        },

        {
            id: 8,

            name: "Rapport sur le développement de la pêche artisanale en RDC",

            category: "Rapports",

            size: "4.2 Mo",

            date: "2023",

            file: "documents/rapport-peche-artisanale.pdf"

        },

        {
            id: 9,

            name: "Guide pratique de l'aquaculture en République Démocratique du Congo",

            category: "Guides",

            size: "5.6 Mo",

            date: "2022",

            file: "documents/guide-pratique-aquaculture.pdf"

        },

        {
            id: 10,

            name: "Arrêté portant mesures de conservation des ressources aquatiques",

            category: "Arrêtés",

            size: "720 Ko",

            date: "2022",

            file: "documents/arrete-conservation.pdf"

        }

    ];


    /* =================================================
       ÉLÉMENTS HTML
    ================================================== */

    const tableBody =
        document.getElementById("documentsTableBody");

    const emptyState =
        document.getElementById("emptyState");

    const searchInput =
        document.getElementById("searchInput");

    const categoryFilter =
        document.getElementById("categoryFilter");

    const itemsPerPage =
        document.getElementById("itemsPerPage");

    const pagination =
        document.getElementById("pagination");

    const totalDocuments =
        document.getElementById("totalDocuments");


    /* =================================================
       ÉTAT
    ================================================== */

    let currentPage = 1;

    let perPage =
        parseInt(itemsPerPage.value);


    /* =================================================
       FILTRAGE
    ================================================== */

    function getFilteredDocuments() {

        const search =
            searchInput.value.toLowerCase().trim();

        const category =
            categoryFilter.value;

        return documents.filter(document => {

            const matchesSearch =
                document.name.toLowerCase().includes(search);

            const matchesCategory =
                category === "all" ||
                document.category === category;

            return matchesSearch && matchesCategory;

        });

    }


    /* =================================================
       AFFICHAGE DU TABLEAU
    ================================================== */

    function renderTable() {

        const filtered =
            getFilteredDocuments();

        const total =
            filtered.length;

        const totalPages =
            Math.ceil(total / perPage);

        // Si la page actuelle dépasse le nombre de pages

        if (currentPage > totalPages && totalPages > 0) {
            currentPage = totalPages;
        }

        const start =
            (currentPage - 1) * perPage;

        const end =
            start + perPage;

        const pageDocuments =
            filtered.slice(start, end);


        // Vider le tableau

        tableBody.innerHTML = "";


        // Aucun document

        if (pageDocuments.length === 0) {

            emptyState.style.display = "block";

        } else {

            emptyState.style.display = "none";


            pageDocuments.forEach(document => {

                const row =
                    document.createElement("tr");


                row.innerHTML = `

                    <td>
                        <div class="document-name">
                            ${document.name}
                        </div>
                    </td>

                    <td>
                        <span class="document-category">
                            ${document.category}
                        </span>
                    </td>

                    <td>
                        <span class="document-size">
                            ${document.size}
                        </span>
                    </td>

                    <td>

                        <div class="action-buttons">

                            <button
                                class="action-btn"
                                data-action="view"
                                data-file="${document.file}">

                                <span class="action-icon">◉</span>
                                Voir

                            </button>

                            <button
                                class="action-btn pdf"
                                data-action="download"
                                data-file="${document.file}">

                                <span class="action-icon">⇩</span>
                                PDF

                            </button>

                        </div>

                    </td>

                `;


                tableBody.appendChild(row);

            });

        }


        // Total

        totalDocuments.textContent =
            `Total : ${total} élément${total > 1 ? "s" : ""}`;


        // Pagination

        renderPagination(totalPages);

    }


    /* =================================================
       PAGINATION
    ================================================== */

    function renderPagination(totalPages) {

        pagination.innerHTML = "";


        if (totalPages <= 1) {
            return;
        }


        // Bouton précédent

        const previous =
            document.createElement("button");

        previous.className = "page-btn";

        previous.textContent = "‹";

        previous.disabled =
            currentPage === 1;

        previous.addEventListener("click", () => {

            if (currentPage > 1) {

                currentPage--;

                renderTable();

            }

        });

        pagination.appendChild(previous);


        // Numéros de pages

        for (let i = 1; i <= totalPages; i++) {

            const button =
                document.createElement("button");

            button.className = "page-btn";

            button.textContent = i;

            if (i === currentPage) {
                button.classList.add("active");
            }

            button.addEventListener("click", () => {

                currentPage = i;

                renderTable();

            });

            pagination.appendChild(button);

        }


        // Bouton suivant

        const next =
            document.createElement("button");

        next.className = "page-btn";

        next.textContent = "›";

        next.disabled =
            currentPage === totalPages;

        next.addEventListener("click", () => {

            if (currentPage < totalPages) {

                currentPage++;

                renderTable();

            }

        });

        pagination.appendChild(next);

    }


    /* =================================================
       RECHERCHE
    ================================================== */

    searchInput.addEventListener("input", () => {

        currentPage = 1;

        renderTable();

    });


    /* =================================================
       FILTRE
    ================================================== */

    categoryFilter.addEventListener("change", () => {

        currentPage = 1;

        renderTable();

    });


    /* =================================================
       ÉLÉMENTS PAR PAGE
    ================================================== */

    itemsPerPage.addEventListener("change", () => {

        perPage =
            parseInt(itemsPerPage.value);

        currentPage = 1;

        renderTable();

    });


    /* =================================================
       ACTIONS : VOIR / PDF
    ================================================== */

    tableBody.addEventListener("click", event => {

        const button =
            event.target.closest("[data-action]");

        if (!button) {
            return;
        }

        const file =
            button.dataset.file;

        const action =
            button.dataset.action;


        if (action === "view") {

            // Ouvre le PDF dans un nouvel onglet

            window.open(file, "_blank");

        }


        if (action === "download") {

            // Téléchargement du PDF

            const link =
                document.createElement("a");

            link.href = file;

            link.download = file.split("/").pop();

            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);

        }

    });


    /* =================================================
       INITIALISATION
    ================================================== */

    renderTable();

});