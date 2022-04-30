const body = document.querySelector("body"),
sidebar = document.querySelector(".sidebar"),
toggle = document.querySelector(".toggle"),
searchBtn = document.querySelector(".search-box");



toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("close");
});

searchBtn.addEventListener("click", () =>{
    sidebar.classList.remove("close");
});

function sumar(){
    const $total = document.getElementById('spTotal');
    let subtotal = 0;
    [ ...document.getElementsByClassName("monto")].forEach(function(element){
        if(element.value !== ''){
            subtotal += parseFloat(element.value) * 12;
        }
    });

    $total.value = subtotal;
}

function mostrarNumero(){
    document.getElementById("numero").innerHTML = document.getElementById("numeroTarjet").value;
}

function mostrarNombre(){
    document.getElementById("nombre").innerHTML = document.getElementById("name").value;
}

function mostrarFecha(){
    document.getElementById("fecha").innerHTML = document.getElementById("dateVenci").value;
}

function mostrarTipo(){
    document.getElementById("tipo").innerHTML = document.getElementById("tipoTarjet").value;
}