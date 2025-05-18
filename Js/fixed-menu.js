document.addEventListener('DOMContentLoaded', function() {
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el enlace navegue
            const dropdownContent = this.nextElementSibling;
            if (dropdownContent) {
                dropdownContent.classList.toggle('show');
            }
        });
    });

    // Cierra los dropdowns cuando se hace clic fuera de ellos
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown-trigger') && !event.target.closest('.dropdown')) {
            const dropdowns = document.querySelectorAll('.dropdown-content.show');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
});