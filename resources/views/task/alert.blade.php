@foreach ($tasks as $task)
    <div class="modal fade" id="late-notification-{{ $task->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">{{ $task->task_name }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white">Ok, Got it</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="due-today-notification-{{ $task->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-warning modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-warning">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">{{ $task->task_name }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this! </h4>
                        <p>Work on it right away! Today is due</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('tasks.edit', $task->id) }}" type="button" class="btn btn-white">Upload Your
                        Work</a>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="future-notification-{{ $task->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">{{ $task->task_name }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white">Ok, Got it</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
