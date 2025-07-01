let claseSeleccionada = "";
let asientosIdaSeleccionados = 0;
let servicioAuto = false;

let destino = "";
let fechaSalida = "";
let fechaVuelta = "";
let numPasaje = "";
let transporte = "";
let estadia = ""; // puede usarse como comentario general u observación opcional

function cargarDatosResumen(datos) {
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
  } else if (paso === "servicios") {
    document.getElementById("paso-servicios").classList.add("activo-seccion");
    document.getElementById("paso4").classList.add("activo");
  } else if (paso === "resumen") {
    document.getElementById("paso-resumen").classList.add("activo-seccion");
    document.getElementById("paso5").classList.add("activo");
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
    cambiarPaso("servicios");
  } else {
    alert("Debe seleccionar al menos un asiento de vuelta.");
  }
}

function mostrarResumen() {
  servicioAuto = document.getElementById("servicio-auto").checked;

  const tipoAuto = document.getElementById("tipo-auto").value;
  const modeloAuto = document.getElementById("modelo-auto").value;

  const asientosIda = document.querySelectorAll('#asientos-ida-a .seleccionado, #asientos-ida-b .seleccionado').length;
  const asientosVuelta = document.querySelectorAll('#asientos-vuelta-a .seleccionado, #asientos-vuelta-b .seleccionado').length;

  document.getElementById("resumen-destino").textContent = destino || "No especificado";
  document.getElementById("resumen-fecha-salida").textContent = fechaSalida || "No especificado";
  document.getElementById("resumen-fecha-vuelta").textContent = fechaVuelta || "No especificado";
  document.getElementById("resumen-num-pasaje").textContent = numPasaje || "No especificado";
  document.getElementById("resumen-transporte").textContent = transporte || "No especificado";
  document.getElementById("resumen-estadia").textContent = estadia || "No especificado";

  let resumenHTML = `
    <div class="item-resumen">
      <label>Destino:</label> <span>${destino || "No especificado"}</span>
    </div>
    <div class="item-resumen">
      <label>Fecha de salida:</label> <span>${fechaSalida || "No especificado"}</span>
    </div>
    <div class="item-resumen">
      <label>Fecha de vuelta:</label> <span>${fechaVuelta || "No especificado"}</span>
    </div>
    <div class="item-resumen">
      <label>Número del pasaje:</label> <span>${numPasaje || "No especificado"}</span>
    </div>
    <div class="item-resumen">
      <label>Transporte:</label> <span>${transporte || "No especificado"}</span>
    </div>
    <div class="item-resumen">
      <label>Estadía:</label> <span>${estadia || "No especificado"}</span>
    </div>
    <div class="item-resumen extra-resumen">
      <strong>Clase seleccionada:</strong> ${claseSeleccionada || "No seleccionada"}<br>
      <strong>Asientos de ida:</strong> ${asientosIda}<br>
      <strong>Asientos de vuelta:</strong> ${asientosVuelta}<br>
      <strong>Total de asientos:</strong> ${asientosIda + asientosVuelta}
    </div>
  `;

  if (servicioAuto) {
    resumenHTML += `
      <div class="item-resumen extra-resumen">
        <strong>Alquiler de auto:</strong><br>
        - Tipo: ${tipoAuto || "No especificado"}<br>
        - Modelo: ${modeloAuto || "No especificado"}
      </div>
    `;
  } else {
    resumenHTML += `
      <div class="item-resumen extra-resumen">
        <strong>Alquiler de auto:</strong> No
      </div>
    `;
  }

  resumenHTML += `
    <div class="item-resumen">
      <label>Eliminar:</label> <button id="btn-eliminar" onclick="eliminarReserva()">🗑️</button>
    </div>
  `;

  document.getElementById("contenido-resumen").innerHTML = resumenHTML;

  cambiarPaso("resumen");
}

function eliminarReserva() {
  document.getElementById("contenido-resumen").innerHTML = "";
  alert("Reserva eliminada.");
  cambiarPaso("clase");

  claseSeleccionada = "";
  asientosIdaSeleccionados = 0;
  servicioAuto = false;
  destino = "";
  fechaSalida = "";
  fechaVuelta = "";
  numPasaje = "";
  transporte = "";
  estadia = "";

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

function toggleSelectAuto() {
  const checkbox = document.getElementById("servicio-auto");
  const select = document.getElementById("seleccion-auto");
  select.style.display = checkbox.checked ? "block" : "none";
}

function validarYMostrarResumen() {
  const quiereAuto = document.getElementById("servicio-auto").checked;
  const tipoAuto = document.getElementById("tipo-auto").value;

  if (quiereAuto && tipoAuto === "") {
    alert("Por favor, seleccioná un tipo de auto.");
    return;
  }

  mostrarResumen();
}

// Lista de modelos por tipo de auto
const modelosPorTipo = {
  compacto: ["Fiat Mobi", "Toyota Etios", "Renault Kwid"],
  suv: ["Toyota SW4", "Volkswagen Taos", "Chevrolet Tracker"],
  familiar: ["Peugeot Rifter", "Renault Kangoo", "Volkswagen Suran"],
  lujo: ["BMW Serie 5", "Audi A6", "Mercedes-Benz Clase E"]
};

function actualizarModelosAuto() {
  const tipoSelect = document.getElementById("tipo-auto");
  const modeloSelect = document.getElementById("modelo-auto");
  const tipoSeleccionado = tipoSelect.value;

  // Reiniciar
  modeloSelect.innerHTML = '<option value="">-- Seleccioná un modelo --</option>';
  modeloSelect.disabled = true;

  if (tipoSeleccionado && modelosPorTipo[tipoSeleccionado]) {
    modelosPorTipo[tipoSeleccionado].forEach(modelo => {
      const option = document.createElement("option");
      option.value = modelo;
      option.textContent = modelo;
      modeloSelect.appendChild(option);
    });
    modeloSelect.disabled = false;
  }
}



// Ejemplo de carga de datos:
// cargarDatosResumen({
//   destino: "Bariloche",
//   fechaSalida: "2025-07-15",
//   fechaVuelta: "2025-07-25",
//   numPasaje: "A12345",
//   transporte: "Avión",
//   estadia: "No aplica"
// });
