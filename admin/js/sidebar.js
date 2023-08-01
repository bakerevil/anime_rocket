let estado = "open";

function showHideSideBar(){
    
    var links = document.getElementsByClassName("txtLink");
    if (estado=="open"){
        let angle = 0,
    img = document.getElementById('img_container');
    document.getElementById('img_container').onclick = function(){
    angle = (angle + 180) % 360;
    img.className = "rotate" + angle;
    }
    document.getElementById("sideBar").style.width="80px";
    document.getElementById("sideBar").style.width="80px";
    document.getElementById("main").style.marginLeft="80px";
    document.getElementById("imgInfo").style.width="50px";
    document.getElementById("texto-info").style.display="none";
    for (var i = links.length - 1; i >= 0; i--){
        links[i].style.display = "none"
    }
    estado ="close";
    }
    else if (estado=="close"){
        let angle = 180,
    img = document.getElementById('img_container');
    document.getElementById('img_container').onclick = function(){
    angle = (angle - 180) % 360;
    img.className = "rotate" + angle;
    }
    document.getElementById("sideBar").style.width="250px";
    document.getElementById("main").style.marginLeft="250px";
    document.getElementById("imgInfo").style.width="112px";
    document.getElementById("texto-info").style.display="block";
    for (var i = links.length - 1; i >= 0; i--){
        links[i].style.display = "inline"
    }
    estado ="open";
    }
}