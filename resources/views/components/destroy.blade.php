<!-- END: Page CSS-->
<span onclick="deleteData({{$url}},{{$id}})">
<button class="btn btn-danger " title="delete">

        <i class="icon ti-trash"></i>
</button>
</span>

<script>
    function deleteData(url, id) {
        swal({
            title: "آیا از حذف مطمئن هستید؟",
            text: "اگر حذف شود تمام دیتای مرتبط با آن حذف می گردد!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            cancelButtonColor: '#d33',
        })
            .then((result) => {

                if (result) {

                    $.ajax({

                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        url: url + '/' + id,
                        type: "DELETE",
                        success: function () {
                            swal({
                                title: "عملیات موفق",
                                text: "عملیات حذف با موفقیت انجام گردید",
                                icon: "success",
                                timer: '3500'
                            });
                            window.location.reload(true);
                        },
                        error: function () {
                            swal({
                                title: "خطا...",
                                // text: data.message,
                                type: 'error',
                                timer: '3500'
                            })
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */

                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swal(
                        'لغو',
                        'عملیات لغو گردید:)',
                        'error'
                    )
                    window.location.reload(true);
                }
            });
    }
</script>
