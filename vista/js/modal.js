const abrir_modal = document.querySelector('.modal_abrir');
const abrir_modal2 = document.querySelector('.modal_abrir2');
const abrir_modal3 = document.querySelector('.modal_abrir3');
const modal_section = document.querySelector('.modal_section');
const modal_section2 = document.querySelector('.modal_section2');
const modal_section3 = document.querySelector('.modal_section3');
const cerrar_modal = document.querySelectorAll('.finalizar');

//abrir modal cliente
abrir_modal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal_section.classList.add('modal--show');
});

//abrir modal producto
abrir_modal2.addEventListener('click', (e)=>{
    e.preventDefault();
    modal_section2.classList.add('modal--show');
});

//abrir modal otro
abrir_modal3.addEventListener('click', (e)=>{
    e.preventDefault();
    modal_section3.classList.add('modal--show');
});

//cerrar modal
cerrar_modal.forEach((boton) => {
    boton.addEventListener('click', (e)=>{
        e.preventDefault();
        modal_section.classList.remove('modal--show');
        modal_section2.classList.remove('modal--show');
    });
});


//rellenar campos cliente
document.getElementById('modal_cliente').addEventListener('click', function() {
    // Obtener el cliente seleccionado
    var clienteSeleccionado = document.querySelector('input[name="cliente_seleccionado"]:checked');

    // Verificar si hay un cliente seleccionado
    if (clienteSeleccionado) {
        // Obtener los valores del cliente seleccionado
        var codigo = clienteSeleccionado.parentElement.nextElementSibling.textContent;
        var cedula = clienteSeleccionado.parentElement.nextElementSibling.nextElementSibling.textContent;
        var nombre = clienteSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        var apellido = clienteSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        var telefono = clienteSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        var fecha_actual = new Date().toISOString().split('T')[0];

        // Llenar los campos del formulario con los valores del cliente seleccionado
        document.getElementById('cliente_codigo_input').value = codigo;
        document.getElementById('cliente_cedula_input').value = cedula;
        document.getElementById('cliente_nombre_input').value = nombre;
        document.getElementById('cliente_apellido_input').value = apellido;
        document.getElementById('cliente_telefono_input').value = telefono;
        document.getElementById('fecha_s').value = fecha_actual;
    } else {
        alert('Por favor, seleccione un cliente antes de guardar.');
    }
});


//activar y desactivar input number
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.producto_seleccionado');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const inputNumber = this.closest('tr').querySelector('.cant_seleccionada');
            inputNumber.disabled = !this.checked;

            if (!this.checked) {
                inputNumber.value = 1;
            }
        });
    });
});

//crear lista de productos
document.getElementById('modal_producto').addEventListener('click', function() {
    var productosSeleccionados = [];
    var cant_final = 0;
    var producto_id = 0;
    var productoSeleccionadoElements = document.querySelectorAll('.producto_seleccionado:checked');
    productoSeleccionadoElements.forEach(function(element) {
        var nombreProducto = element.closest('tr').querySelector('.nombre_prod').textContent;
        var idProducto = element.value;
        var cantidadSeleccionada = element.closest('tr').querySelector('.cant_seleccionada').value;
        var precio = element.closest('tr').querySelector('.precio_prod').textContent;
        var subtotal = cantidadSeleccionada * precio;
        
        productosSeleccionados.push({ id: idProducto, cantidad: cantidadSeleccionada, nombre: nombreProducto, precio: precio, subtotal: subtotal });
    });

    var listaProductosDiv = document.querySelector('.lista_productos');
    listaProductosDiv.innerHTML = '<ul>';
    productosSeleccionados.forEach(function(producto) {
        listaProductosDiv.innerHTML += '<li>ID: ' + producto.id + ', Nombre: ' + producto.nombre + ', Precio: ' + producto.precio + ', Cantidad: ' + producto.cantidad + ', Subtotal: ' + producto.subtotal + '</li>';
        cant_final += producto.cantidad;
        producto_id += producto.id;
        document.getElementById('cant_salida').value = cant_final;
        document.getElementById('id_producto').value = producto_id;
        
    });
    listaProductosDiv.innerHTML += '</ul>';

});


//verifica el checkbox para agregar o quitar
document.addEventListener('DOMContentLoaded', function() {
    var productosSeleccionados = [];
    
    const checkboxes = document.querySelectorAll('.producto_seleccionado');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const inputNumber = this.closest('tr').querySelector('.cant_seleccionada');
            //console.log(inputNumber);
            inputNumber.disabled = !this.checked;

            if (this.checked) {
                var nombreProducto = this.closest('tr').querySelector('.nombre_prod').textContent;
                var idProducto = this.value;
                var precio = this.closest('tr').querySelector('.precio_prod').textContent;
                var subtotal = inputNumber.value * precio;
                var cantidadSeleccionada = this.closest('tr').querySelector('.cant_seleccionada').value;
                //console.log('separacion de datos');
                //console.log(cantidadSeleccionada);
                productosSeleccionados.push({ id: idProducto, cantidad: cantidadSeleccionada, nombre: nombreProducto, precio:precio, subtotal: subtotal });
            } else {
                // Remove the unchecked product from the list
                var uncheckedProductId = this.value;
                productosSeleccionados = productosSeleccionados.filter(function(producto) {
                    return producto.id !== uncheckedProductId;
                });
            }

            // Update the displayed list
            updateProductList(productosSeleccionados);
            
        });
    });
});

//actualizar lista
function updateProductList(productosSeleccionados) {
    var listaProductosDiv = document.querySelector('.lista_productos');
    var content = '<ul id="lista_productos">';
    var cant_final = 0;
    var producto_id = 0;

    productosSeleccionados.forEach(function(producto) {
        content += '<li>ID: ' + producto.id + ', Nombre: ' + producto.nombre + ', Cantidad: ' + producto.cantidad + ', Precio: ' + producto.precio + ', Subtotal: ' + producto.subtotal + '</li>';
        cant_final += producto.cantidad; // Add subtotal to total
        producto_id = producto.id;
    });
    content += '</ul>';
    listaProductosDiv.innerHTML = content;

    // Update cant_salida
    document.getElementById('cant_salida').value = cant_final;
    document.getElementById('id_producto').value = producto_id;

}


//rellenar campos PROVEEDOR
document.getElementById('modal_proveedor').addEventListener('click', function() {
    // Obtener el proveedor seleccionado
    var proveedorSeleccionado = document.querySelector('input[name="proveedor_seleccionado"]:checked');

    // Verificar si hay un proveedor seleccionado
    if (proveedorSeleccionado) {
        // Obtener los valores del proveedor seleccionado
        var ID_proveedor = proveedorSeleccionado.parentElement.nextElementSibling.textContent;
        var nombre = proveedorSeleccionado.parentElement.nextElementSibling.nextElementSibling.textContent;
        var direccion = proveedorSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        var telefono = proveedorSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        var correo = proveedorSeleccionado.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
       
        // Llenar los campos del formulario con los valores del cliente seleccionado
        document.getElementById('id_proveedor_input').value = ID_proveedor;
        document.getElementById('proveedor_nombre_input').value = nombre;
        document.getElementById('proveedor_direccion_input').value = direccion;
        document.getElementById('proveedor_telefono_input').value = telefono;
        document.getElementById('proveedor_correo_input').value = correo;
    } else {
        alert('Por favor, seleccione un proveedor antes de guardar.');
    }
});