const dropdownLink = document.getElementById('dropdownNavbarLink');
const dropdownMenu = document.getElementById('dropdownNavbar');
const arrowIcon = document.getElementById('arrowIcon');

dropdownLink.addEventListener('click', () => {
    // Si el menú está oculto, mostramos la altura completa; si no, la reducimos a 0.
    if (dropdownMenu.classList.contains('hidden')) {
        dropdownMenu.classList.remove('hidden');
        dropdownMenu.style.height = dropdownMenu.scrollHeight + 'px';
        arrowIcon.classList.add('rotate-180'); // Gira el ícono hacia arriba
    } else {
        dropdownMenu.style.height = '0px';
        setTimeout(() => dropdownMenu.classList.add('hidden'), 300); // Escondemos después de la animación
        arrowIcon.classList.remove('rotate-180'); // Regresa el ícono a su posición original
    }
});
