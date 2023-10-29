const aTag = document.querySelectorAll('a[data-target="#updateInfo"]');

const title = document.getElementById("updateTile");
const input = document.getElementById("updateDatum");
const xButton = document.getElementById("fadeButton");
const wideButton = document.getElementById("updateInfo");

function eraseInfo(){
    input.value = "";
    console.log("borrando input")
}

aTag.forEach(function(enlace) {
    enlace.addEventListener("click", function(event) {
        console.log("link precionado " + enlace.id);
        eraseInfo();

        var id = enlace.id.split("_")[1];
        console.log(id);
        input.name = id;
        switch (id) {
            case '0':
                title.textContent = "Ingresa el nuevo Nombre(s)";
                input.type = "text";
                input.placeholder = "first name";
                input.patter = "";
                break;
            case '1':
                title.textContent = "Ingresa los nuevos Apellidos";
                input.type = "text";
                input.placeholder = "last name";
                input.patter = "";
                break;
            case '2':
                title.textContent = "Ingresa el nuevo Correo";
                input.type = "email";
                input.placeholder = "email@example.com";
                input.patter = "^.+@.+\..+$";
                break;
            case '3':
                title.textContent = "Ingresa la nueva Contraseña";
                input.type = "password";
                input.placeholder = "password";
                input.patter = "";
                break;
            default:
                break;
        }
    });
});