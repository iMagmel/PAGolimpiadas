document.addEventListener('DOMContentLoaded', function() {
  // Solo ejecutar si estamos en móvil
  if (window.innerWidth <= 767) {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn'); // El botón hamburguesa
    const navBar = document.querySelector('.nav-bar'); // La barra de navegación
    const navLinks = document.querySelectorAll('.nav-links a'); // Los enlaces dentro del menú

    if (!mobileMenuBtn || !navBar) return; // Verificamos que el botón y la barra existan

    // Alternar visibilidad del menú al hacer clic en el botón hamburguesa
    mobileMenuBtn.addEventListener('click', function(e) {
      e.stopPropagation(); // Evitar propagación del evento
      navBar.classList.toggle('show'); // Mostrar u ocultar el menú
    });

    // Cerrar menú al hacer clic en un enlace del menú
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navBar.classList.remove('show'); // Ocultar el menú después de hacer clic
      });
    });

    // Cerrar menú si se hace clic fuera del menú o del botón hamburguesa
    document.addEventListener('click', function(e) {
      if (!navBar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        navBar.classList.remove('show'); // Ocultar el menú si se hace clic fuera
      }
    });
  }
});
