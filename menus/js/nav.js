document.addEventListener("DOMContentLoaded", function () {
    const navToggle = document.querySelector(".nav-toggle");
    const navList = document.querySelector(".nav ul");
    const dropdowns = document.querySelectorAll(".dropdown");

    // Adicione um evento de clique ao botão de alternância do menu
    navToggle.addEventListener("click", function () {
        // Toggle class 'show' na lista de navegação para exibir ou ocultar o menu
        navList.classList.toggle("show");
    });

    // Adicione um evento de clique para cada dropdown
    dropdowns.forEach(function (dropdown) {
        const dropdownContent = dropdown.querySelector(".dropdown-content");

        dropdown.addEventListener("click", function () {
            // Toggle class 'show' no submenu do dropdown atual
            dropdownContent.classList.toggle("show-submenu");
        });
    });
});