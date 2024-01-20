document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleBtn');
    const nestedUlElements = document.querySelectorAll('.dropdown > ul > li > a');
    const dropdownUlLiA =document.querySelectorAll(".sidenav ul li a");
    const dropdownHoverUl = document.querySelectorAll(".sidenav ul .dropdown ul")
    const dropdowns = document.querySelectorAll(".dropdown")
    const overlay = document.getElementById('overlay');
    const sideNav = document.querySelector('.sidenav');
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.card');
    const noResultsMessage = document.getElementById('noResultsMessage');

    toggleBtn.addEventListener('click', function () {
        sideNav.classList.toggle('open');
        overlay.classList.toggle('active')
    });
    overlay.addEventListener("click", () => {
        sideNav.classList.remove("open");
        overlay.classList.remove("active");
    });
    nestedUlElements.forEach(element => {
        element.addEventListener("click", () => {
            sideNav.classList.remove("open");
            overlay.classList.remove("active");
        })
    })
    dropdownUlLiA.forEach(element => {
        element.addEventListener("mouseover", () => {
            element.classList.add("hovered")
        })
        element.addEventListener("mouseout", () => {
            element.classList.remove("hovered")
        })
        element.addEventListener("click", () => {
            element.classList.remove("hovered")
            dropdownHoverUl.forEach(hide => {
                hide.style.display = "none";
            })
        })
    })
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener("mouseover", () => {
            const ul = dropdown.querySelectorAll('ul')
            ul.forEach(element => {
                element.style.display = "initial"
            })
        })
        dropdown.addEventListener("mouseout", () => {
            const ul = dropdown.querySelectorAll('ul')
            ul.forEach(element => {
                element.style.display = "none"
            })
        })
    })


    // Add an event listener for the input field
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.trim().toLowerCase();
        let matchFound = false; // Flag to check if any match is found

        // Loop through all cards and hide/show based on the search term
        cards.forEach(function (card) {
            const cardName = card.id.toLowerCase();
            const cardContent = card.textContent.toLowerCase();

            if (cardName.includes(searchTerm) || cardContent.includes(searchTerm)) {
                card.style.display = 'flex'; // Show the card
                matchFound = true;
            } else {
                card.style.display = 'none'; // Hide the card
            }
        });

        // Show/hide the "no results" message
        noResultsMessage.style.display = matchFound ? 'none' : 'block';
    });

    // Add click event listeners to scroll to the clicked card
    cards.forEach(function (card) {
        card.addEventListener('click', function () {
            // Scroll to the clicked card
            window.location.hash = '#' + card.id;
        });
    });
});