let claseSeleccionada = "";
let asientosIdaSeleccionados = 0;
let hotelSeleccionado = "";
let servicioAuto = false;
let servicioExcursion = false;

// Nuevas variables para datos del resumen que vienen de la BD o selección previa
let destino = "";
let fechaSalida = "";
let fechaVuelta = "";
let numPasaje = "";
let transporte = "";
let estadia = "";

// Ejemplo: función para asignar estos datos (podés llamar esta función cuando tengas los datos reales)
function cargarDatosResumen(datos) {
  // Por ejemplo, datos es un objeto con las propiedades que necesitamos
  destino = datos.destino || "";
  fechaSalida = datos.fechaSalida || "";
  fechaVuelta = datos.fechaVuelta || "";
  numPasaje = datos.numPasaje || "";
  transporte = datos.transporte || "";
  estadia = datos.estadia || "";
}

function seleccionarClase(clase) {
  claseSeleccionada = clase;
  alert("Has seleccionado la clase: " + clase);
  cambiarPaso("ida");
  generarAsientos(document.getElementById("asientos-ida-a"), 1, true);
  generarAsientos(document.getElementById("asientos-ida-b"), 26, true);
}

function seleccionarHotel(hotel) {
  hotelSeleccionado = hotel;
  estadia = hotel; // Actualizo también estadía para el resumen
  alert("Hotel seleccionado: " + hotel);
  cambiarPaso("servicios");
}

function volverAPaso(paso) {
  if (paso === "clase") {
    cambiarPaso("clase");
    limpiarAsientos();
  } else if (paso === "ida") {
    cambiarPaso("ida");
    document.getElementById("asientos-vuelta-a").innerHTML = "";
    document.getElementById("asientos-vuelta-b").innerHTML = "";
  } else if (paso === "vuelta") {
    cambiarPaso("vuelta");
  } else if (paso === "hotel") {
    cambiarPaso("hotel");
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
  } else if (paso === "hotel") {
    document.getElementById("paso-hotel").classList.add("activo-seccion");
    document.getElementById("paso4").classList.add("activo");
  } else if (paso === "servicios") {
    document.getElementById("paso-servicios").classList.add("activo-seccion");
    document.getElementById("paso5").classList.add("activo");
  } else if (paso === "resumen") {
    document.getElementById("paso-resumen").classList.add("activo-seccion");
    document.getElementById("paso6").classList.add("activo");
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
        asientosIdaSeleccionados = document.querySelectorAll(
          '#asientos-ida-a .seleccionado, #asientos-ida-b .seleccionado'
        ).length;
      }
    };

    contenedor.appendChild(asiento);
  }
}

function confirmarIda() {
  asientosIdaSeleccionados = document.querySelectorAll(
    '#asientos-ida-a .seleccionado, #asientos-ida-b .seleccionado'
  ).length;

  if (asientosIdaSeleccionados > 0) {
    cambiarPaso("vuelta");
    if (!document.getElementById("asientos-vuelta-a").hasChildNodes()) {
      generarAsientos(document.getElementById("asientos-vuelta-a"), 1, false);
      generarAsientos(document.getElementById("asientos-vuelta-b"), 26, false);
    }
  } else {
    alert("Debe seleccionar al menos un asiento de ida.");
  }
}

function confirmarVuelta() {
  const asientosVuelta = document.querySelectorAll(
    '#asientos-vuelta-a .seleccionado, #asientos-vuelta-b .seleccionado'
  ).length;

  if (asientosVuelta > 0) {
    cambiarPaso("hotel");
  } else {
    alert("Debe seleccionar al menos un asiento de vuelta.");
  }
}

function mostrarResumen() {
  servicioAuto = document.getElementById("servicio-auto").checked;
  servicioExcursion = document.getElementById("servicio-excursion").checked;

  const asientosIda = document.querySelectorAll('#asientos-ida-a .seleccionado, #asientos-ida-b .seleccionado').length;
  const asientosVuelta = document.querySelectorAll('#asientos-vuelta-a .seleccionado, #asientos-vuelta-b .seleccionado').length;

  // Llenar los spans del HTML con los datos
  document.getElementById("resumen-destino").textContent = destino || "No especificado";
  document.getElementById("resumen-fecha-salida").textContent = fechaSalida || "No especificado";
  document.getElementById("resumen-fecha-vuelta").textContent = fechaVuelta || "No especificado";
  document.getElementById("resumen-num-pasaje").textContent = numPasaje || "No especificado";
  document.getElementById("resumen-transporte").textContent = transporte || "No especificado";
  document.getElementById("resumen-estadia").textContent = estadia || "No especificado";

  // Agregar info extra (clase, asientos, servicios)
  const resumenExtra = `
    <br><strong>Clase seleccionada:</strong> ${claseSeleccionada || "No seleccionada"}<br>
    <strong>Asientos de ida:</strong> ${asientosIda}<br>
    <strong>Asientos de vuelta:</strong> ${asientosVuelta}<br>
    <strong>Total de asientos:</strong> ${asientosIda + asientosVuelta}<br>
    <strong>Servicios adicionales:</strong><br>
    - Alquiler de auto: ${servicioAuto ? "Sí" : "No"}<br>
    - Excursiones: ${servicioExcursion ? "Sí" : "No"}
  `;
  document.getElementById("contenido-resumen").innerHTML = `
  <div class="item-resumen">
    <label>Destino:</label> <span id="resumen-destino">${destino || "No especificado"}</span>
  </div>
  <div class="item-resumen">
    <label>Fecha de salida:</label> <span id="resumen-fecha-salida">${fechaSalida || "No especificado"}</span>
  </div>
  <div class="item-resumen">
    <label>Fecha de vuelta:</label> <span id="resumen-fecha-vuelta">${fechaVuelta || "No especificado"}</span>
  </div>
  <div class="item-resumen">
    <label>Número del pasaje:</label> <span id="resumen-num-pasaje">${numPasaje || "No especificado"}</span>
  </div>
  <div class="item-resumen">
    <label>Transporte:</label> <span id="resumen-transporte">${transporte || "No especificado"}</span>
  </div>
  <div class="item-resumen">
    <label>Estadía:</label> <span id="resumen-estadia">${estadia || "No especificado"}</span>
  </div>
  <div class="item-resumen extra-resumen">
    <strong>Clase seleccionada:</strong> ${claseSeleccionada || "No seleccionada"}<br>
    <strong>Asientos de ida:</strong> ${asientosIda}<br>
    <strong>Asientos de vuelta:</strong> ${asientosVuelta}<br>
    <strong>Total de asientos:</strong> ${asientosIda + asientosVuelta}<br>
    <strong>Servicios adicionales:</strong><br>
    - Alquiler de auto: ${servicioAuto ? "Sí" : "No"}<br>
    - Excursiones: ${servicioExcursion ? "Sí" : "No"}
  </div>
  <div class="item-resumen">
    <label>Eliminar:</label> <button id="btn-eliminar" onclick="eliminarReserva()">🗑️</button>
  </div>
`;

  cambiarPaso("resumen");
}

function eliminarReserva() {
  // Ejemplo simple: limpiar todo el resumen y volver a paso 1 (clase)
  document.getElementById("contenido-resumen").innerHTML = "";
  alert("Reserva eliminada.");
  cambiarPaso("clase");

  // Limpiar variables
  claseSeleccionada = "";
  asientosIdaSeleccionados = 0;
  hotelSeleccionado = "";
  servicioAuto = false;
  servicioExcursion = false;
  destino = "";
  fechaSalida = "";
  fechaVuelta = "";
  numPasaje = "";
  transporte = "";
  estadia = "";

  // Limpiar asientos visualmente
  limpiarAsientos();
}

function finalizarReserva() {
  alert("¡Reserva confirmada con éxito! Gracias por elegirnos.");
  location.reload();
}

function limpiarAsientos() {
  document.getElementById("asientos-ida-a").innerHTML = "";
  document.getElementById("asientos-ida-b").innerHTML = "";
  document.getElementById("asientos-vuelta-a").innerHTML = "";
  document.getElementById("asientos-vuelta-b").innerHTML = "";
  asientosIdaSeleccionados = 0;
}
//para cuando haya que cargar los datos de la bd hay que gacer esto
// cargarDatosResumen({
//   destino: "Bariloche",
//   fechaSalida: "2025-07-15",
//   fechaVuelta: "2025-07-25",
//   numPasaje: "A12345",
//   transporte: "Avión",
//   estadia: "Hotel Premium"
// });
const resumenExtra = `
  <div class="item-resumen extra-resumen">
    <strong>Clase seleccionada:</strong> ${claseSeleccionada || "No seleccionada"}<br>
    <strong>Asientos de ida:</strong> ${asientosIda}<br>
    <strong>Asientos de vuelta:</strong> ${asientosVuelta}<br>
    <strong>Total de asientos:</strong> ${asientosIda + asientosVuelta}<br>
    <strong>Servicios adicionales:</strong><br>
    - Alquiler de auto: ${servicioAuto ? "Sí" : "No"}<br>
    - Excursiones: ${servicioExcursion ? "Sí" : "No"}
  </div>
  <div class="item-resumen">
    <label>Eliminar:</label> <button id="btn-eliminar" onclick="eliminarReserva()">🗑️</button>
  </div>
`;
