<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{ $id_billpru }}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_admin{{ $id_billpru }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      {!! Form::open(['route'=>['bills_pru.destroy',$id_billpru],'method'=>'delete']) !!}
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
        {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
      </div>
      {!! Form::close() !!}
    </div>

  </div>
</div>