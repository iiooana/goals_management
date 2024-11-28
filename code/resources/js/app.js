import './bootstrap';
import 'font-awesome/css/font-awesome.min.css';

const html = document.getElementsByTagName("html")[0];
const icon =  document.getElementById("icon-theme");
if(localStorage.getItem('theme-color') === null){
    localStorage.setItem("theme-color","dark");
}
updateTheme();


/**
 *  function region
 */
function updateTheme(){
    switch(localStorage.getItem('theme-color'))  {
        case "light":
            html.classList.remove("dark");
            icon.classList.add("fa-moon-o");    
            icon.classList.remove("fa-sun-o");
            break;
        default:
            html.classList.add("dark");
            icon.classList.add("fa-sun-o");
            icon.classList.remove("fa-moon-o");    
            break;    
    }
}
function toogleTheme(){
    if(html.classList.contains("dark")){
        localStorage.setItem("theme-color","light");
    }else{
        localStorage.setItem("theme-color","dark");
    }
    updateTheme();
}
/**
 *  end function region
 */
window.toogleTheme = toogleTheme;