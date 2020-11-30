<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade py-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- IDAsesoria, IDAsesor, IDAsesorado, Tema, AreaEstudio, Fecha -->
        <input type="text" class="input form-control my-2" name="idAsesor" id="idAsesor" placeholder="IDASESOR" disabled>        
        <input type="text" class="input form-control my-2" name="IDAsesorado" id="IDAsesorado" value="<?= $_SESSION['username']?>" disabled>
        <input type="text" class="input form-control my-2" name="Tema" id="Tema" placeholder="Tema">
        <input type="text" class="input form-control my-2" name="AreaEstudio" id="AreaEstudio" placeholder="AreaEstudio">
        <input type="date" class="input form-control my-2" name="Fecha" id="Fecha" placeholder="Fecha">            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary btnConfirmarAsesoria">Aceptar</button>
      </div>
    </div>
  </div>
</div>