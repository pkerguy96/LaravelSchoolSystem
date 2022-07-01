<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="{{ URL::asset('js/core.js') }}"></script>
    <title>Forgot Password</title>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-family: "Roboto", sans-serif;
            font-family: "Roboto Mono", monospace;
        }
    </style>
</head>


<body>
    <main class="flex items-center justify-center min-h-screen bg-gray-100 p-4 md:p-0">
        <div class="p-4 text-left bg-white shadow-md w-full md:w-2/5 rounded-md">
            <div class="flex flex-col items-center">
                <svg class="text-grey-900 w-24 h-24" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M23.95 42.2 9.1 34.15V22.35L1.25 18.1L23.95 5.7L46.75 18.1V34.25H42.75V20.4L38.85 22.35V34.15ZM23.95 25.95 38.25 18.1 23.95 10.4 9.75 18.1ZM23.95 37.7 34.8 31.7V24.75L23.95 30.45L13.1 24.65V31.7ZM24 25.95ZM23.95 29.95ZM23.95 29.95Z" />
                </svg>
                <h1 class="text-2xl font-bold text-center mb-6">SCHOOL System</h1>
            </div>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="w-full flex flex-col gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="email">Email adresse</label>
                        <input id="email" name="email" :value="old('email')" placeholder="Email adresse"
                            type="email"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="w-full flex flex-col md:flex-row justify-end items-center gap-2">
                        <button type="submit"
                            class="h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                            <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48">
                                <path d="M5 41.05V28.75L21.65 24L5 19.15V6.9L45.35 24Z" />
                            </svg>
                            <span>Envoyer</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
