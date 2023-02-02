<script type="application/javascript">
    function restoreItem(e) {
        let id = e.getAttribute('data-id');
        let url = e.getAttribute('data-url');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "it will restore!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Restore it!',
            cancelButtonText: 'No, Cencel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: url + id,
                        success: function(data) {
                            if (data.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                }).then((result) => {
                                    // Reload the Page
                                    location.reload();
                                })
                                $("#" + id + "").remove(); // you can add name div to remove
                            }
                        }
                    });
                }
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your file has been restored',
                    'error'
                );
            }
        });
    }
</script>
