@if($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: ''+
                    '@foreach($errors->all() as $error)' +
                        '{{ $error }}' +
                    '@endforeach'
            })
        });
    </script>
@endif
@if(session('success'))

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: ''+
                    '{{ session()->get("success") }}'+
                    '@if(session("restore"))' +
                        'You can <a href="{{ route("blog.admin.posts.restore", session()->get("restore")) }}">recover post</a>, if you want.\n' +
                    '@endif'
            })
        });
    </script>
@endif
