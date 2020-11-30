let modalTitle = document.querySelector(".modal-title");
let btnAgendar = document.querySelector(".btn-agendar");
let btnConfirmar = document.querySelector(".btnConfirmarAsesoria");

btnAgendar.addEventListener("click", ()=>{
    modalTitle.innerHTML = "Asesoría";    
});

btnConfirmar.addEventListener("click", ()=>{
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    );
});
