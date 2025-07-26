// Buttons
const buttonInfo = document.getElementById("buttonInfo");
const buttonClients = document.getElementById("buttonClients");
const buttonServices = document.getElementById("buttonServices");
const buttonCompta = document.getElementById("buttonCompta");
const buttonMsg = document.getElementById("buttonMsg");
const buttonComs = document.getElementById("buttonComs");

// Sections
const dInfo = document.getElementById("dInfo");
const dClients = document.getElementById("dClients");
const dServices = document.getElementById("dServices");
const dCompta = document.getElementById("dCompta");
const dMsg = document.getElementById("dMsg");
const dComs = document.getElementById("dComs");

buttonInfo.addEventListener("click", event =>
    {
        dInfo.style.display = "block";

        dClients.style.display = "none";
        dCompta.style.display = "none";
        dMsg.style.display = "none";
        dComs.style.display = "none";
        dServices.style.display = "none";
    }
)
buttonClients.addEventListener("click", event =>
    {
        dClients.style.display = "block";

        dInfo.style.display = "none";
        dCompta.style.display = "none";
        dMsg.style.display = "none";
        dComs.style.display = "none";
        dServices.style.display = "none";
    }
)
buttonServices.addEventListener("click", event =>
    {
        dServices.style.display = "block";

        dInfo.style.display = "none";
        dClients.style.display = "none";
        dCompta.style.display = "none";
        dMsg.style.display = "none";
        dComs.style.display = "none";
    }
)
buttonCompta.addEventListener("click", event =>
    {
        dCompta.style.display = "block";

        dInfo.style.display = "none";
        dClients.style.display = "none";
        dMsg.style.display = "none";
        dComs.style.display = "none";
        dServices.style.display = "none";
    }
)
buttonMsg.addEventListener("click", event =>
    {
        dMsg.style.display = "block";

        dInfo.style.display = "none";
        dClients.style.display = "none";
        dCompta.style.display = "none";
        dComs.style.display = "none";
        dServices.style.display = "none";
    }
)
buttonComs.addEventListener("click", event =>
    {
        dComs.style.display = "block";

        dInfo.style.display = "none";
        dClients.style.display = "none";
        dCompta.style.display = "none";
        dMsg.style.display = "none";
        dServices.style.display = "none";
    }
)