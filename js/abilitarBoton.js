const radioButtons = document.querySelectorAll("input[type='radio']");

const botonEnviar = document.getElementById("botonEnviar");
let radiochecked = 0;

botonEnviar.value = "te faltan " + (10-radiochecked);
// Escucha cambios en los radio buttons
radioButtons.forEach(function(radioButton) {
    // radioButton.disabled = true;
    radioButton.addEventListener("change", function() {
        if(radioButton.checked) {
            radiochecked++;
            if(radiochecked < 10) {
                botonEnviar.value = "te faltan " + (10-radiochecked);
                botonEnviar.disabled = true;
            }
            else {
                botonEnviar.value = "Enviar respuestas";
                botonEnviar.disabled = false;
            }
        }
    });
});
