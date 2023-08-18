const pathArray = window.location.pathname.split('/')
const module = (pathArray[5] != "") ? pathArray[5] : pathArray[4]

const php = {
  usuarios: "consulta.php",
  videos: "consultav.php",
  listas: "cons.php"
}

photo.addEventListener('change',(files) =>{
const fileUpload = files.target.files[0]
const form = new FormData()
form.append ("file" , fileUpload)
form.append("funcion", "set_avatar")
fetch(php[module],{
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

video.addEventListener('change',(files) =>{
  const fileUpload = files.target.files[0]
  const form = new FormData()
  form.append ("file" , fileUpload)
  form.append("funcion", "set_video")
  fetch(php[module],{
      method: "POST",
      body: form
  
      }).then(response => response.json())
      .then(json => {
        if (json.status == 'succes'){
            videoprev.value = json.file
            videoPreview.setAttribute("src", "../../../public/" + json.file)
        }
        alert (json.text);
      })
    });