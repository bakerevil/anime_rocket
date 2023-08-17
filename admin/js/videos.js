const checkboxes = document.querySelectorAll(".checkboxes")
const tabla = document.querySelector('#cuerpo');
let opciones = {
    method: 'POST'
}

let formdata = new FormData()

function get_data () {
    formdata.append("funcion", "get_data")
    opciones.body = formdata
    fetch('consultav.php', opciones)
        .then(respuesta => respuesta.json())
        .then(resultado => {
            let template = ``
            resultado.forEach(elemento => {

                template += `
                            <tr>
                                <th>
                                    <input type="checkbox" value="${elemento.id}"  class="checkboxes">
                                </th>
                                <td>${elemento.capitulo}</td>
                                <td><img src="https://picsum.photos/50"></td>
                                <td>${elemento.categoria}</td>
                                <td>${elemento.anime}</td>
                                <td>${elemento.fechai}</td>
                                <td>${elemento.fechap}</td>
                                <td>${elemento.orden}</td>
                                <td>${elemento.status}</td>
                                <td>
                                <a href="#" class="btn_editar btnact" data-id="${elemento.id}">Editar</a>
                                </td>
                                
                            </tr>
                            
                    `
            });
            tabla.innerHTML = template
            showDeleteIcon();
            refresh.style.display = "none"
        });
}
const showForm = () => {
    if (data.style.display != "none") {
        data.style.display = "none"
        insert_data.style.display = "block"
        refresh.style.display = "inline-block"
    }
}
get_data()
btnNew.addEventListener("click", (event) => {
    event.preventDefault()
    showForm()
})
btnSave.addEventListener("click", (event) => {
    event.preventDefault()
    if (capitulo.value != "" && foto.value != "" && video.value != "" && categoria.value != "" && anime.value != "" && fecha_insertada.value != "" && fecha_publicada.value != ""  && statuses.value != "" ){
        let formdata = new FormData(form)
        formdata.append("funcion", "insert_data")
        if (btnSave.hasAttribute("data-id")) {
            formdata.set("funcion", "update_data")
            formdata.append("id", btnSave.getAttribute("data-id"))
        }
        opciones.body = formdata
        fetch('consultav.php', opciones)
            .then(respuesta => respuesta.json())
            .then(resultado => {
                alert(resultado.text)
                if (resultado.status == "success") {
                    data.style.display = "block"
                    form.reset()
                    insert_data.style.display = "none"
                    get_data()
                    btnSave.innerText = "Guardar"
                    btnSave.removeAttribute("data-id")
                }
            })
    }
})
let refresh = document.getElementById('refresh');
refresh.addEventListener('click', _ => {
            location.reload();
            console.log('refresh')
})
SelectAll.addEventListener("change", checkbox => {
    const checkboxes = document.querySelectorAll(".checkboxes")
    checkboxes.forEach(element => {
        element.checked = false
    })
    if (SelectAll.checked) {
        checkboxes.forEach(element => {
            element.checked = true
        })
    }
    showDeleteIcon()
})
const isSelected = item => item.checked
const showDeleteIcon = () => {
    const checkboxes = document.querySelectorAll(".checkboxes")
    const arrayCheckboxes = Array.from(checkboxes)
    const someChecked = arrayCheckboxes.some(isSelected)
    btnBorrar.style.display = "none"
    if (someChecked) {
        btnBorrar.style.display = "inline-block"
    }
}
tabla.addEventListener("click", event => {
    if (event.target.classList.contains('btn_editar')) {
        event.preventDefault()
        showForm()
        const formData = new FormData()
        const id = event.target.getAttribute('data-id')
        formData.append("funcion", "get_one")
        formData.append("id", id)
        fetch("consultav.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(row => {
                capitulo.value = row.capitulo
                foto.value = row.foto
                categoria.value = row.categoria
                anime.value = row.anime
                fecha_insertada.value = row.fechai
                fecha_publicada.value = row.fechap
                statuses.value = row.status
                btnSave.setAttribute("data-id", row.id)
                btnSave.innerText = "Editar"
            })
    }
    if (event.target.classList.contains('checkboxes')) {
        showDeleteIcon()
    }
})

btnBorrar.addEventListener("click", event => {
    event.preventDefault()
    const confirmDelete = confirm("Estás seguro de borrar los datos?")
    if (confirmDelete) {
        const checkboxes = document.querySelectorAll(".checkboxes")
        const arrayCheckboxes = Array.from(checkboxes)
        const itemsCheckbox = arrayCheckboxes
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value)

        const formData = new FormData()
        formData.append("funcion", "delete_data")
        formData.append("data", itemsCheckbox)
        fetch("consultav.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(json => {
                if (json.status == "success") {
                    get_data()
                    showDeleteIcon()
                }
            })
    }
})