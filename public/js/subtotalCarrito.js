window.onload = function () {

    var precioP = document.querySelector(".precioP");
    var cantidadP = document.querySelector(".cantidadP");
    var precioTotal = document.querySelector(".precioTotal");

    var contenido = (precioP.innerHTML).slice(1,precioP.innerHTML.length);
    
    cantidadP.addEventListener("change", function(){
        
        var resultado = cantidadP.value * contenido;
        precioTotal.innerHTML = "$ " + resultado;
        
    })
}