
const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')


// ADDING A FUNCTION FOR TOGGLE SIDEBAR
function toggleSidebar(){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')
   
    // DECLARING SIDEBAR TO SHOW AND ROTATE THE SVG ICON  
    Array.from(sidebar.getElementsByClassName('show')).forEach(ul=>{
        ul.classList.remove('show')
        ul.previousElementSibling.classList.remove('rotate')
    } )
}

// ADDING FUNCTION FOR TOGGLE SUBMENU
function toggleSubMenu(button){
    button.nextElementSibling.classList.toggle('show') 
    button.classList.toggle('rotate')
    // CLOSING THE SUBMENU WHEN THE TOGGLE SIDEBAR IS SELECTED
    if(sidebar.classList.contains('close')){
        sidebar.classList.toggle('close')
            toggleButton.classList.toggle('rotate')
    }
}

