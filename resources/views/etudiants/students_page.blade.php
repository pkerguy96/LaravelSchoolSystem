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
    @include('etudiants.commun.header')
    <main>
        <section class="container mx-auto py-8 md:py-16 px-4 md:px-0 flex flex-col gap-10">
            @yield('content')
        </section>
    </main>
    <script defer>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            Toaster[type](" {{ Session::get('message') }} ");
        @endif

        const bullet = document.querySelector("#not-bullet"),
            wrap = document.querySelector("#not-wrap");

        async function getNotifications(n = 5) {
            const req = await fetch("/notification/view/all"),
                res = await (await req.json()).data;
            if (res.length === 0) {
                wrap.innerHTML = `<div class="rounded-md bg-gray-50 p-2 text-center">Aucun nouveau messages</div>`
                bullet.remove();
            } else {
                const rows = res.slice(0, n).map(data =>
                        `<div class="rounded-md bg-gray-50 p-2">${data.notification_msg}</div>`)
                    .join("");
                wrap.innerHTML = rows;
            }
        }

        function setMessagesAsRead() {
            bullet.remove();
            fetch("/notification/seen")
        }

        Starter.add(createStyleElement, toggleElementVisibility, getNotifications).init()
    </script>
</body>

</html>
