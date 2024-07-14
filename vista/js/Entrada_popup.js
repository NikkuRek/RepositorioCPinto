const abrir_modal = document.querySelector('.modal_abrir');
const abrir_modal2 = document.querySelector('.modal_abrir2');
const modal_section = document.querySelector('.modal_section');
const modal_section2 = document.querySelector('.modal_section2');
const cerrar_modal = document.querySelectorAll('.finalizar');
const abrir_modal_modificar = document.querySelector('.modal_abrir_modificar');
const abrir_modal_agregar = document.querySelector('.modal_abrir_agregar');

if( abrir_modal_modificar ){
    abrir_modal_modificar.addEventListener('click', (e) => {
    e.preventDefault();
    modal_abrir_modificar.classList.add('modal--show');
    });
}
if( abrir_modal_modificar ){
    abrir_modal_agregar.addEventListener('click', (e) => {
    e.preventDefault();
    modal_abrir_agregar.classList.add('modal--show');
    });
}
 

//abrir modal cliente
//abrir_modal.addEventListener('click', (e)=>{
    //e.preventDefault();
    //modal_section.classList.add('modal--show');
//});

//abrir modal producto


//cerrar modal
cerrar_modal.forEach((boton) => {
    boton.addEventListener('click', (e)=>{
        e.preventDefault();
        modal_section.classList.remove('modal--show');
    });
});

document.getElementById('modal_eproducto').addEventListener('click', function() {
    // Obtener el proveedor seleccionado
    var productoSeleccionado = document.querySelector('input[name="producto_seleccionado"]:checked');

    // Verificar si hay un proveedor seleccionado
    if (productoSeleccionado) {
        // Obtener los valores del proveedor seleccionado
        var ID_producto = productoSeleccionado.parentElement.nextElementSibling.textContent;
        var nombre = productoSeleccionado.parentElement.nextElementSibling.nextElementSibling.textContent;
       
        // Llenar los campos del formulario con los valores del cliente seleccionado
        document.getElementById('id_producto').value = ID_producto;
        document.getElementById('nombre_producto').value = nombre;

    } else {
        alert('Por favor, seleccione un proveedor antes de guardar.');
    }
});


function Operacion() {

    Swal.fire({
    title:'Confirmacion',
    text:'Se ha registrado la entrada exitosamente',
    icon:'success',
    confirmButtonColor:'#3085d6',
    confirmButtonText:'Ok'
    });
};