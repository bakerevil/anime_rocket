photo.addEventListener('change',(files) =>{
const fileUpload = files.target.files[0]
const form = new FormData()
form.append ("file" , fileUpload)
form.append("funcion", "set_avatar")
fetch("cons.php",{
    method: "POST",
    body: form

  }).then(response => response.json())
  .then(json => {
    if (json.status == 'succes'){
        avatar.value = json.file
        avatarPreview.setAttribute("src", "../../../public/" + json.file)
    }
    alert (json.text);
  })
});