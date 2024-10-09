let serviciosSeleccionados = [];
let totalPrecio = 0;

// Función para manejar el cambio de estado del checkbox
function toggleServicio(checkbox, nombreServicio, precioServicio) {
    // Verificar si el checkbox está marcado
    if (checkbox.checked) {
        // Agregar el servicio y su precio al arreglo
        serviciosSeleccionados.push({ nombre: nombreServicio, precio: precioServicio });
        totalPrecio += precioServicio; // Sumar el precio al total
    } else {
        // Eliminar el servicio y su precio del arreglo
        serviciosSeleccionados = serviciosSeleccionados.filter(servicio => servicio.nombre !== nombreServicio);
        totalPrecio -= precioServicio; // Restar el precio del total
    }

    // Actualizar la lista de servicios seleccionados y el total en la interfaz
    actualizarInterfaz();
}

// Función para actualizar la interfaz
function actualizarInterfaz() {
    const listaServicios = document.getElementById("listaServicios");
    const totalPrecioElement = document.getElementById("totalPrecio");
    const totalServiciosElement = document.getElementById("totalServicios");

    // Limpiar la lista actual
    listaServicios.innerHTML = '';

    // Agregar los servicios seleccionados a la lista
    serviciosSeleccionados.forEach(servicio => {
        const li = document.createElement("li");
        li.textContent = `${servicio.nombre} - BS${servicio.precio}`;
        listaServicios.appendChild(li);
    });

    // Actualizar el total de precio y la cantidad de servicios
    totalPrecioElement.textContent = `BS${totalPrecio.toFixed(2)}`;
    totalServiciosElement.textContent = serviciosSeleccionados.length.toString();
}