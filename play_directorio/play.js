const sinopsisConte = document.getElementById("sinopsisConte");
const nombrecont = document.getElementById("nombrecont");
const catego = document.getElementById("catego");
const tip = document.getElementById("tip");


let opciones = {
    method: 'POST'
};

function get_sipnosis() {
    
    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_sipnosis");
    

    fetch('./play_directorio/consulta.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(sipnosis => {
                template += `<p>${sipnosis}</p>`;
            });
            sinopsisConte.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener la sinopsis:", error);
        });
}
get_sipnosis();


function get_nombre() {
    
    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_nombre");
    

    fetch('./play_directorio/consulta.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(titulo => {
                template += `<p>${titulo}</p>`;
            });
            nombrecont.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener la sinopsis:", error);
        });
}
get_nombre();


function get_categoria() {

    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_categoria");
    

    fetch('./play_directorio/consulta.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(categorias => {
                template += `<p>${categorias}</p>`;
            });
            catego.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener la categoria:", error);
        });
}
get_categoria();

function get_tipo() {

    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_tipo");
    

    fetch('./play_directorio/consulta.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(tipos => {
                template += `<p>${tipos}</p>`;
            });
            tip.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener el tipo:", error);
        });
}
get_tipo();

function get_votos() {

    opciones.body = new FormData(); 
    opciones.body.append("funcion", "get_tipo");
    

    fetch('./play_directorio/consulta.php', opciones) 
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = '';
            resultado.forEach(votos => {
                template += `<p>${votos}</p>`;
            });
            nombrecont.innerHTML = template;
        })
        .catch(error => {
            console.error("Error al obtener el tipo:", error);
        });
}
get_votos();