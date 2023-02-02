<div class="modal fade bd-create-paidleave" id="bd-create-paidleave" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card" style="text-align: start">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="modal-title">{{ __('Make a submission') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('paidleave.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('attendance.paidleave.formCreate')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
