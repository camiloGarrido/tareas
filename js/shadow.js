const alertPlaceholder = document.getElementById("liveAlertPlaceholder");
const appendAlert = (message, type) => {
  const wrapper = document.createElement("div");
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    "</div>",
  ].join("");

  alertPlaceholder.append(wrapper);
};

function obtenerInformacion() {
  fetch("logica/tareas.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta de la red");
      }
      return response.json(); // Convertir la respuesta a JSON
    })
    .then((data) => {
      console.log(data);

      if (data.length > 0) {
        completarTabla(data);
      } else {
        document.getElementById("contenidoTabla").innerHTML = `  <tr>
                                <td colspan="5" class="text-center table-warning" >Sin contenido</td>
                            </tr>`;
      }
    })
    .catch((error) => {
      console.error("Hubo un problema con la solicitud Fetch:", error);
    });
}

function save() {
  let nombre = document.getElementById("nombre").value;
  let descripcion = document.getElementById("contenido").value;
  var url = "logica/tareas.php";
  var data = { nombre, descripcion, save: 1 };

  fetch(url, {
    method: "POST", // or 'PUT'
    body: JSON.stringify(data), // data can be `string` or {object}!
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .catch((error) => console.error("Error:", error))
    .then((response) => {
      if (response.message == 200) {
        appendAlert("Se guardo la tarea", "success");
        obtenerInformacion();
      }
    });
}

function completarTabla(data) {
  let string = "";
  for (let i = 0; i < data.length; i++) {
    const item = data[i];
    let estado =
      item.estado == "1"
        ? { nombre: "Activo", class: "bg-info-subtle" }
        : item.estado == "2"
        ? { nombre: "Terminado", class: "bg-success-subtle" }
        : { nombre: "Eliminado", class: "bg-danger-subtle" };

    string += `<tr>
        <th scope="row">${item.id}</th>
        <td>${item.Nombre}</td>
        <td>${item.descripcion}</td>
        <td>
            <div class="${estado.class} text-secondary text-center p-1 border-opacity-10 rounded">
            ${estado.nombre}
            </div>
        </td>
        <td class="text-center" >
            <div class="btn-group" role="group" >
                <button type="button" class="btn btn-success">Completar</button>
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>    
        </td>
    </tr>`;
  }
  document.getElementById("contenidoTabla").innerHTML = string;
}
