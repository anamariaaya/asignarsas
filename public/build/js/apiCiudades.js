const ciudad={id:"",nombre:"",activa:""},checkCiudad=document.querySelectorAll(".check-ciudad");function leerCheckbox(){checkCiudad.forEach(e=>{e.addEventListener("click",e=>{guardarSeleccion(e)})})}function guardarSeleccion(e){ciudad.id=e.target.id,ciudad.nombre=e.target.dataset.nombre,"1"===e.target.value?ciudad.activa="0":ciudad.activa="1",enviarSeleccion()}async function enviarSeleccion(){const{id:e,nombre:a,activa:c}=ciudad,t=new FormData;t.append("id",e),t.append("nombre",a),t.append("activa",c);try{const e="http://localhost:3000/api/ciudad",a=await fetch(e,{method:"POST",body:t});(await a.json()).resultado&&Swal.fire({title:"Ciudad Actualizada",text:"Ya puedes revisar tus cambios",icon:"success"}).then(()=>{window.location.reload()})}catch(e){console.log(e),Swal.fire({title:"Error",text:"Mensaje no enviado. Intenta de nuevo",icon:"error"})}}document.addEventListener("DOMContentLoaded",()=>{leerCheckbox()});
//# sourceMappingURL=apiCiudades.js.map