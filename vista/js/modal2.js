const abrir_modal = document.querySelector('.modal_abrir');
const abrir_modal2 = document.querySelector('.modal_abrir2');
const modal_section = document.querySelector('.modal_section');
const modal_section2 = document.querySelector('.modal_section2');
const cerrar_modal = document.querySelectorAll('.finalizar');


//abrir modal cliente
abrir_modal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal_section.classList.add('modal--show');
});

//abrir modal producto


//cerrar modal
cerrar_modal.forEach((boton) => {
    boton.addEventListener('click', (e)=>{
        e.preventDefault();
        modal_section.classList.remove('modal--show');
    });
});


//rellenar campos PROVEEDOR
document.getElementById('modal_proveedor').addEventListener('click', function() {
    // Obtener el proveedor seleccionado
    var proveedorSeleccionado = document.querySelector('input[name="proveedor_seleccionado"]:checked');

    // Verificar si hay un proveedor seleccionado
    if (proveedorSeleccionado) {
        // Obtener los valores del proveedor seleccionado
        var ID_proveedor = proveedorSeleccionado.parentElement.nextElementSibling.textContent;
        var nombre = proveedorSeleccionado.parentElement.nextElementSibling.nextElementSibling.textContent;
       
        // Llenar los campos del formulario con los valores del cliente seleccionado
        document.getElementById('id_proveedor_input').value = ID_proveedor;
        document.getElementById('proveedor_nombre_input').value = nombre;

    } else {
        alert('Por favor, seleccione un proveedor antes de guardar.');
    }
});

