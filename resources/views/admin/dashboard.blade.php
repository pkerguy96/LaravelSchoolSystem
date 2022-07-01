<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" />
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ URL::asset('js/core.js') }}"></script>
    <title>@yield('title')</title>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-family: "Roboto", sans-serif;
            font-family: "Roboto Mono", monospace;
        }
    </style>
</head>

<body class="bg-gray-200">
    @include('admin.content.header')
    <main class="flex">
        @include('admin.content.sidebar')
        <section class="flex-1 max-w-full overflow-y-auto" style="height: calc(100vh - 72px)">
            <div class="container mx-auto py-4 md:py-6 px-4 flex flex-col gap-10">
                @yield('content')
            </div>
        </section>
    </main>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            Toaster[type](" {{ Session::get('message') }} ");
        @endif
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Es-tu sûr?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimez-le !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Supprimé!',
                            'élève a été supprimé',
                            'success'
                        )
                    }
                })

            });
        });
        Starter.add(createStyleElement, toggleElementVisibility).init()
    </script>
</body>

</html>
