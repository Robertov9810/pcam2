<i class="fa fa-proceso-plus"></i> Nuevo proceso
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<form>
    <div class="modal-body">
    <div class="form-group">
    <label for="proceso">Tipo de proceso</label>
    <input type="text" class="form-control" id="proceso" placeholder="Proceso" required="" v-model="Tipoproceso.proceso">
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    <button type="submit class=btn btn-primary" @click.precent="crear">Crear proceso</button>
    </div>
    </form>






</form>

data(){
    return {
        usuarios: [],
        crearProceso:{proceso:''}
    }
}