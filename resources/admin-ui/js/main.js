function deleteConfirm(route) {
    Swal.fire({
        title: 'Вы уверены?',
        text: "Данное действие нельзя будет отменить!",
        showCancelButton: true,
        confirmButtonText: 'Да',
        cancelButtonText: 'Выйти',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                success: function(result) {
                    Swal.fire(result, '', 'success').then((result) => {
                        location.reload();
                    });
                },
                error: function(result) {
                    Swal.fire('Ошибка! Попробуйте позже!', '', 'error')
                }
            });

        }
    })
}