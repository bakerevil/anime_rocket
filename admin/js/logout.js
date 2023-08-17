document.getElementById("logoutButton").addEventListener("click", function() {
    sessionStorage.removeItem('user')
    window.location.href = "../../index.html";
});