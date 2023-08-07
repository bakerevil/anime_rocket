togglesidebar.addEventListener("click", (event) => {
    event.preventDefault()
    sidebar.classList.add("active")
    
})

closesidebar.addEventListener("click", (event) => {
    event.preventDefault()
    sidebar.classList.remove("active")
    
})

