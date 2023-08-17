const sinopsisCont = document.getElementById("sinopsisCont");

let opciones = {
    method: 'POST'
};

function get_sipnosis() {
    
    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_sipnosis");
    

    fetch('./playcarp/consulta_play.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(sipnosis => {
                template += `<p>${sipnosis}</p>`;
            });
            sinopsisCont.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener la sinopsis:", error);
        });
}

get_sipnosis();






