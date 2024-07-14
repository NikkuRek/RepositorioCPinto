/*USO DE AJAX*/

function Funcion01() {
    const selectedValue = document.getElementById("valor").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("zona07").innerHTML = this.responseText;
        }
        if (this.readyState == 4 && this.status == 404) {
            window.alert("Error en carga de información");
        }
    };
    xhttp.open("POST", "../vista/mensaje04.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("numero=" + selectedValue);
};
