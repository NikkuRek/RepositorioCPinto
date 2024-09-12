//#region Funciones de boton de tallas inferior

document.getElementById("agregarInput").addEventListener("click", function () {

    var contenedor = document.getElementById("contenedorInputs");
    var nuevoInput = document.createElement("input");
    nuevoInput.name = "idtall";
    nuevoInput.className = "form-control form-control-sm";
    nuevoInput.value = "Id: " + document.getElementById("idtallapi").value + ' - Cantidad: ' + document.getElementById("cantidad").value;
    contenedor.appendChild(nuevoInput);

});

document.getElementById("agregarInput").addEventListener("click", function () {

    var contenedor = document.getElementById("contenedorInputs");
    var nuevoInput = document.createElement("input");
    nuevoInput.name = "idtallas[]";
    nuevoInput.value = document.getElementById("idtallapi").value;
    nuevoInput.type = 'hidden';
    contenedor.appendChild(nuevoInput);

});

document.getElementById("agregarInput").addEventListener("click", function () {

    var contenedor = document.getElementById("contenedorInputs");
    var nuevoInput = document.createElement("input");
    nuevoInput.name = "cantidades[]";
    nuevoInput.value = document.getElementById("cantidad").value;
    nuevoInput.type = 'hidden';
    contenedor.appendChild(nuevoInput);

});
//#endregion
//Fin de funciones de tallas inferior

//#region funciones de boton de tallas superior

document.getElementById("agregarInput2").addEventListener("click", function () {

    var contenedor2 = document.getElementById("contenedorInputs2");
    var nuevoInput2 = document.createElement("input");
    nuevoInput2.name = "idtall2";
    nuevoInput2.className = "form-control form-control-sm";
    nuevoInput2.value = "Id: " + document.getElementById("idtallasu").value + ' - Cantidad: ' + document.getElementById("cantidadsu").value;
    contenedor2.appendChild(nuevoInput2);

});

document.getElementById("agregarInput2").addEventListener("click", function () {

    var contenedor2 = document.getElementById("contenedorInputs2");
    var nuevoInput2 = document.createElement("input");
    nuevoInput2.name = "idtallassu[]";
    nuevoInput2.value = document.getElementById("idtallasu").value;
    nuevoInput2.type = 'hidden';
    contenedor2.appendChild(nuevoInput2);

});

document.getElementById("agregarInput2").addEventListener("click", function () {

    var contenedor2 = document.getElementById("contenedorInputs2");
    var nuevoInput2 = document.createElement("input");
    nuevoInput2.name = "cantidadessu[]";
    nuevoInput2.value = document.getElementById("cantidadsu").value;
    nuevoInput2.type = 'hidden';
    contenedor2.appendChild(nuevoInput2);

});

//#endregion

document.getElementById("checkboxSuperior").addEventListener('change', function () {
    var btnSuperior = document.getElementById("btnSuperior");
    var collapseOne = document.getElementById("collapseOne");
    if (this.checked) {
        btnSuperior.disabled = false;
        collapseOne.classList.add("show");
    } else {
        btnSuperior.disabled = true;
        collapseOne.classList.remove("show");
    }
});

document.getElementById('checkboxInferior').addEventListener('change', function () {
    var btninferior = document.getElementById('btnInferior');
    var collapseTwo = document.getElementById('collapseTwo');
    if (this.checked) {
        btnInferior.disabled = false;
        collapseTwo.classList.add('show');
    } else {
        btnInferior.disabled = true;
        collapseTwo.classList.remove('show');
    }
});

document.getElementById('imagen').addEventListener('change', function(event){
    const file = event.target.files[0]
    const reader = new FileReader()

    reader.onload = function(){
        let output = document.getElementById('preview')
        output.src =reader.result
        output.style.display = 'block'
    }

    reader.readAsDataURL(file)
})

// Ejecutar la función al cargar la página y cada vez que cambie un input
calcularMultiplicacion(); // Calcular la multiplicación inicial (en caso de que haya valores precargados)
cantidadprendasInput.addEventListener('input', calcularMultiplicacion);
preciounitarioInput.addEventListener('input', calcularMultiplicacion);


function Limpiar() {
    var t = document.getElementById("f1").getElementsByTagName("input");
    for (var i=0; i<t.length; i++) {
        t[i].value = "";
    }
}

// Inicializar los botones como deshabilitados si los checkboxes no están marcados
document.getElementById('btnSuperior').disabled = !document.getElementById('checkboxSuperior').checked;
document.getElementById('btnInferior').disabled = !document.getElementById('checkboxInferior').checked;	
