<script type="application/javascript">
    function deleteItem(e) {
        let id = e.getAttribute('data-id');
        console.log(id)
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
            text: "Data will be move to the trash",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, remove it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: "users/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": 'DELETE',
                        },
                        success: function(data) {
                            if (data.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Your data has been deleted'
                                }).then((result) => {
                                    location.reload();
                                })
                                $("#" + id + "").remove(); // you can add name div to remove
                            } else {
                                swalWithBootstrapButtons.fire(
                                    data.title,
                                    data.message,
                                    "warning"
                                ).then((result) => {
                                    // Reload the Page
                                    location.reload();
                                })
                                $("#" + username + "").remove(); // you can add name div to remove
                            }
                        }

                    });
                }
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                );
            }
        });
    }
</script>
