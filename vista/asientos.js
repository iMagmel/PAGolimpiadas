 let claseSeleccionada = "";
    let asientosIdaSeleccionados = 0;

    function seleccionarClase(clase) {
      claseSeleccionada = clase;
      alert("Has seleccionado la clase: " + clase);
      cambiarPaso("ida");
      generarAsientos(document.getElementById("asientos-ida-a"), 1, true);
      generarAsientos(document.getElementById("asientos-ida-b"), 26, true);
    }

    function volverAPaso(paso) {
      if (paso === "clase") {
        cambiarPaso("clase");
        limpiarAsientos();
      } else if (paso === "ida") {
        cambiarPaso("ida");
        document.getElementById("asientos-vuelta-a").innerHTML = "";
        document.getElementById("asientos-vuelta-b").innerHTML = "";
      }
    }

    function cambiarPaso(paso) {
      document.querySelectorAll('.paso').forEach(p => p.classList.remove('activo-seccion'));
      document.querySelectorAll('.barra-pasos div').forEach(p => p.classList.remove('activo'));

      if (paso === "clase") {
        document.getElementById("paso-clase").classList.add("activo-seccion");
        document.getElementById("paso1").classList.add("activo");
      } else if (paso === "ida") {
        document.getElementById("paso-ida").classList.add("activo-seccion");
        document.getElementById("paso2").classList.add("activo");
      } else if (paso === "vuelta") {
        document.getElementById("paso-vuelta").classList.add("activo-seccion");
        document.getElementById("paso3").classList.add("activo");
      } else if (paso === "resumen") {
        document.getElementById("paso-resumen").classList.add("activo-seccion");
        document.getElementById("paso4").classList.add("activo");
      }
    }

    function generarAsientos(contenedor, inicio, esIda) {
      for (let i = 0; i < 25; i++) {
        const asiento = document.createElement('div');
        asiento.classList.add('asiento');
        asiento.textContent = inicio + i;

        asiento.onclick = () => {
          asiento.classList.toggle('seleccionado');

          if (esIda) {
            if (asiento.classList.contains('seleccionado')) {
              asientosIdaSeleccionados++;
            } else {
              asientosIdaSeleccionados--;
            }

            if (asientosIdaSeleccionados > 0) {
              cambiarPaso("vuelta");
              if (!document.getElementById("asientos-vuelta-a").hasChildNodes()) {
                generarAsientos(document.getElementById("asientos-vuelta-a"), 1, false);
                generarAsientos(document.getElementById("asientos-vuelta-b"), 26, false);
              }
            } else {
              cambiarPaso("ida");
              document.getElementById("asientos-vuelta-a").innerHTML = "";
              document.getElementById("asientos-vuelta-b").innerHTML = "";
            }
          }
        };

        contenedor.appendChild(asiento);
      }
    }

    function mostrarResumen() {
      const asientosIda = document.querySelectorAll('#asientos-ida-a .seleccionado, #asientos-ida-b .seleccionado').length;
      const asientosVuelta = document.querySelectorAll('#asientos-vuelta-a .seleccionado, #asientos-vuelta-b .seleccionado').length;

      document.getElementById("contenido-resumen").innerHTML = `
        <strong>Clase seleccionada:</strong> ${claseSeleccionada}<br>
        <strong>Asientos de ida:</strong> ${asientosIda}<br>
        <strong>Asientos de vuelta:</strong> ${asientosVuelta}<br>
        <strong>Total de asientos:</strong> ${asientosIda + asientosVuelta}
      `;

      cambiarPaso("resumen");
    }

    function finalizarReserva() {
      alert("¡Reserva confirmada con éxito! Gracias por elegirnos.");
      location.reload(); // Reinicia la página
    }

    function limpiarAsientos() {
      document.getElementById("asientos-ida-a").innerHTML = "";
      document.getElementById("asientos-ida-b").innerHTML = "";
      document.getElementById("asientos-vuelta-a").innerHTML = "";
      document.getElementById("asientos-vuelta-b").innerHTML = "";
      asientosIdaSeleccionados = 0;
    }