<form action="{{ route('users.destroy', $datas->id) }}" method="post" enctype="multipart/form-data">
  @method('delete')
  @csrf
  <div class="modal fade" id="ModalDelete{{$datas->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">{{ __('User Delete') }}</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>   
              <div class="modal-body">You sure you want to delete <b>{{$datas->name}}</b>?</div>
              <div class="modal-footer">
                  <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                  <button type="submit" class="btn btn-outline-danger">{{ __('Delete') }}</button>
              </div>
          </div>
      </div>
  </div>   
</form>