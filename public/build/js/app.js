function iniciarApp(){eventListeners(),darkMode(),inboxColor(),showPassword(),subMenu()}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));let passbtn=document.querySelector("#passview");const pass=document.querySelector("#password");let slides=document.getElementsByClassName("slide"),dots=document.getElementsByClassName("dot");function darkMode(){const e=window.matchMedia("(prefers-color-scheme: dark");e.matches?document.body.classList.add(".dark-mode"):document.body.classList.remove(".dark-mode"),e.addEventListener("change",(function(){e.matches?document.body.classList.add(".dark-mode"):document.body.classList.remove(".dark-mode")}));const s=document.querySelector(".dark-mode-boton");s.addEventListener("click",(function(){document.body.classList.toggle("dark-mode"),s.classList.toggle("fa-moon"),s.classList.toggle("fa-sun"),document.body.classList.contains("dark-mode")?localStorage.setItem("modo-oscuro","true"):localStorage.setItem("modo-oscuro","false")})),"true"===localStorage.getItem("modo-oscuro")?(document.body.classList.add("dark-mode"),s.classList.remove("fa-moon"),s.classList.add("fa-sun")):(document.body.classList.remove("dark-mode"),s.classList.remove("fa-sun"),s.classList.add("fa-moon"))}function eventListeners(){const e=document.querySelector(".mobile-menu");e&&e.addEventListener("click",navegacionResponsive)}function navegacionResponsive(){const e=document.querySelector(".barra"),s=document.querySelector(".navegacion"),o=document.querySelector(".btnMenu");s.classList.toggle("mostrar"),e.classList.toggle("no-borde"),o.classList.toggle("fa-bars"),o.classList.toggle("fa-xmark")}function inboxColor(){document.querySelectorAll(".grid-inbox").forEach((function(e){1==e.dataset.status&&e.classList.add("leido")}))}function showPassword(){passbtn&&(passbtn.onclick=()=>{!0===passbtn.checked?pass.type="text":pass.type="password"})}function subMenu(){document.querySelectorAll(".submenu-btn").forEach((function(e){e.addEventListener("mouseover",s=>{const o=s.target.id,t=document.querySelector("#menu-"+o);t&&(t.classList.add("ver-menu"),e.addEventListener("mouseleave",e=>{t.classList.remove("ver-menu")}),t.addEventListener("mouseleave",e=>{t.classList.remove("ver-menu")}))})}))}
//# sourceMappingURL=app.js.map
