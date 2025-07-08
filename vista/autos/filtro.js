function filtrarCategoria(categoria) {
  const autos = document.querySelectorAll('.auto-card');
  autos.forEach(auto => {
    if (categoria === 'todos' || auto.classList.contains(categoria)) {
      auto.style.display = 'block';
    } else {
      auto.style.display = 'none';
    }
  });
}

function mostrarDetalles(card) {
  card.classList.toggle('active');
}
