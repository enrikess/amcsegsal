$(document).ready(function () {
    cmbElemento();

});

//LLenar el combo Elemento
var cmbElemento = () => {
    fetch(`${config.route}/segsal/elemento/listar`, {
        headers: {
            "X-CSRF-TOKEN": config.token,
            "Content-type": "application/json",
        },
        method: "POST",
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (response) {
            var TextoCombo = "";
            for (let i = 0; i < response.length; i++) {
                TextoCombo += `<option value="${response[i].id}">${response[i].nombre}</option>`;
            }
            document.querySelector("#cmbElemento").innerHTML = TextoCombo;
            cmbLineamiento();
        });
};

//LLenar el combo Lineamiento
var cmbLineamiento = () => {
    var ElementoId = document.querySelector("#cmbElemento").value;

    fetch(`${config.route}/segsal/lineamiento/listar`, {
        headers: {
            "X-CSRF-TOKEN": config.token,
            "Content-type": "application/json",
        },
        method: "POST",
        body: JSON.stringify({ ElementoId: ElementoId }),
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (response) {
            var TextoCombo = "";
            for (let i = 0; i < response.length; i++) {
                TextoCombo += `<option value="${response[i].id}">${response[i].nombre}</option>`;
            }
            document.querySelector("#cmbLineamiento").innerHTML = TextoCombo;
        })
        .then(() => {
            idLineamiento = document.querySelector("#cmbLineamiento").value;
            preguntasLineamiento(idLineamiento);
        });
};

//Mostrar y ocultar las preguntas segun el lineamiento
var preguntasLineamiento = (idLineamiento) => {
    var divLineamiento = document.querySelectorAll(`[id^='lineamiento_']`);
    divLineamiento.forEach((e) => {
        e.classList.remove("d-none");
        e.classList.add("d-none");
        if (e.id == `lineamiento_${idLineamiento}`) {
            e.classList.remove("d-none");
        }
    });
};

//desactivar campos de la pregunta
var estado_pregunta = (estado, nroPregunta) => {
    var cumplimiento = document.querySelectorAll(
        `[name='cumple[${nroPregunta}]']`
    );
    var fuente = document.querySelector(`[name='fuente[${nroPregunta}]']`);
    var observacion = document.querySelector(
        `[name='observacion[${nroPregunta}]']`
    );
    if (estado.checked == true) {
        cumplimiento.forEach((e) => {
            e.disabled = false;
            e.checked = false;
        });
        fuente.value = "";
        fuente.disabled = false;
        observacion.value = "";
        observacion.disabled = false;
    } else {
        cumplimiento.forEach((e) => {
            e.disabled = true;
            e.checked = false;
        });
        fuente.value = "";
        fuente.disabled = true;
        observacion.value = "";
        observacion.disabled = true;
    }
};

var calcularResultados = () => {
    var elementos = document.querySelectorAll(`#cmbElemento option`);
    //se guardaran todos los respultados del elemento
    var resultados = [];

    elementos.forEach((elemento) => {
        //creamos el array para el elemento
        var respuesta = [];
        respuesta["id"] = elemento.value;
        respuesta["elemento"] = elemento.textContent;
        respuesta["aplica"] = 0;
        respuesta["cumplen"] = 0;
        respuesta["porcentaje"] = 0;
        respuesta["estado"] = "";
        resultados[elemento.value] = respuesta;
    });

    //verificacion si aplica y si cumple
    elementos.forEach((elemento) => {
        var preguntas = document.querySelectorAll(
            `[data-elemento='${elemento.value}'] [id^='pregunta_']`
        );
        preguntas.forEach((pregunta) => {
            if (pregunta.querySelector(`[id^='aplica']`).checked) {
                resultados[`${elemento.value}`]["aplica"]++;
                pregunta.querySelector(`[name^='cumple']`).checked
                    ? resultados[`${elemento.value}`]["cumplen"]++
                    : resultados[`${elemento.value}`]["cumplen"];
            }
        });
    });

    //calcular porcentaje y estimacion
    fetch(`${config.route}/segsal/estimacion/listar`, {
        headers: {
            "X-CSRF-TOKEN": config.token,
            "Content-type": "application/json",
        },
        method: "POST",
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (response) {
        resultados.forEach((resultado) => {
            resultado["cumplen"]
                ? (resultado["porcentaje"] = (
                        (resultado["cumplen"] / resultado["aplica"]) *
                        100
                    ).toFixed(2))
                : (resultado["porcentaje"] = 0);

            response.forEach((e) => {
                if (
                    parseInt(resultado["porcentaje"]) >= e.min &&
                    parseInt(resultado["porcentaje"]) <= e.max
                ) {
                    console.log(resultado["porcentaje"]);
                    resultado["estado"] = e.nombre;
                    resultado["color"] = e.color;
                }
            });
        });
        console.log(resultados);
    })
    .then(function (response) {
        //completar la tabla de resultados
        var tablaResultados = document.querySelectorAll(
            "table#tabla_linea_base_resultado [id^='elemento_resultado_']"
        );

        tablaResultados.forEach((elemento) => {
            idElemento = elemento.dataset.resultadoelemento;

            elemento.querySelector(
                `[id^='total_${idElemento}']`
            ).innerHTML = resultados[idElemento]["aplica"];
            elemento.querySelector(
                `[id^='cumplen_${idElemento}']`
            ).innerHTML = resultados[idElemento]["cumplen"];
            elemento.querySelector(
                `[id^='porcentaje_${idElemento}']`
            ).innerHTML = resultados[idElemento]["porcentaje"];
            elemento.querySelector(
                `[id^='estado_${idElemento}']`
            ).innerHTML = `<span class='btn btn-bold btn-sm btn-font-sm btn-label-${resultados[idElemento]["color"]}' >${resultados[idElemento]["estado"]}</span>`;
        });
    });
};
