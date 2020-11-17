var detalle = document.querySelector('#detalle');

detalle.addEventListener('change', (event) => {
    var codigo = document.querySelector('#codigo');
    var detalleOculto = document.querySelector('#detalle_oculto');

    codigo.value  = event.target.value;

    var detalle = event.target.options[event.target.selectedIndex].text;
   	detalleOculto.value = detalle;
   	console.log(detalleOculto);
   	console.log(codigo.value);   	
});