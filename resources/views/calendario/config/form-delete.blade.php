{!! Form::open(['route' => ['calendario.deleteConfig', $gestion->id_calendario],'method' => 'delete', 'class' => 'form-eliminar']) !!}
<div class="modal fade bs-example-modal-sm" id="form-delete-{{$gestion->id_calendario}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Eliminar Gestion</h4>
            </div>
            <div class="modal-body">
                <p>Confirme para eliminar la gestion.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}