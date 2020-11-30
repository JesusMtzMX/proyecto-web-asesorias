let btnAgendar = document.querySelector(".btn-agendar");
let sesion = document.querySelector("#variable_sesion").value;

btnAgendar.addEventListener("click", ()=>{
    if(sesion === 'Asesorado')
    {        
        window.location="../app/agendar-asesoria.php";
    }
    else if(sesion === 'Asesor')
    {
        alert('Para obtener asesoría por parte de otros asesores, debes crear una cuenta de asesorado.');
    }
    else
    {
        window.location="../app/iniciar_sesion.php";
    }
});