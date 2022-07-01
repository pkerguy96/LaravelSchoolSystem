<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="{{ URL::asset('js/core.js') }}"></script>
    <title>Login</title>
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
                <svg class="text-grey-900 w-24 h-24" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path d="M23.95 42.2 9.1 34.15V22.35L1.25 18.1L23.95 5.7L46.75 18.1V34.25H42.75V20.4L38.85 22.35V34.15ZM23.95 25.95 38.25 18.1 23.95 10.4 9.75 18.1ZM23.95 37.7 34.8 31.7V24.75L23.95 30.45L13.1 24.65V31.7ZM24 25.95ZM23.95 29.95ZM23.95 29.95Z" />
                </svg>
                <h1 class="text-2xl font-bold text-center mb-6">SCHOOL System</h1>
            </div>
            <x-guest-layout>
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
            </x-guest-layout>
            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                @csrf
                <div class="w-full flex flex-col gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="email">Email adresse</label>
                        <input id="email" name="email" :value="old('email')" placeholder="Email adresse" type="text" class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 border-none" />

                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="password-input">Mot de passe</label>
                        <div class="w-full relative">
                            <input id="password-input" name="password" type="password" placeholder="Mot de passe" class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 border-none" />
                            <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                                <button data-password-trigger data-target="#password-input" data-mutable="#password-show|#password-hide" type="button" class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-200 hover:bg-gray-200" aria-label="Button">
                                    <svg id="password-show" class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path d="M24 31.5Q27.55 31.5 30.025 29.025Q32.5 26.55 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q20.45 14.5 17.975 16.975Q15.5 19.45 15.5 23Q15.5 26.55 17.975 29.025Q20.45 31.5 24 31.5ZM24 28.6Q21.65 28.6 20.025 26.975Q18.4 25.35 18.4 23Q18.4 20.65 20.025 19.025Q21.65 17.4 24 17.4Q26.35 17.4 27.975 19.025Q29.6 20.65 29.6 23Q29.6 25.35 27.975 26.975Q26.35 28.6 24 28.6ZM24 38Q16.7 38 10.8 33.85Q4.9 29.7 2 23Q4.9 16.3 10.8 12.15Q16.7 8 24 8Q31.3 8 37.2 12.15Q43.1 16.3 46 23Q43.1 29.7 37.2 33.85Q31.3 38 24 38Z">
                                        </path>
                                    </svg>
                                    <svg id="password-hide" class="hidden text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path d="M40.8 44.8 32.4 36.55Q30.65 37.25 28.45 37.625Q26.25 38 24 38Q16.7 38 10.75 33.925Q4.8 29.85 2 23Q3 20.4 4.775 17.925Q6.55 15.45 9.1 13.2L2.8 6.9L4.9 4.75L42.75 42.6ZM24 31.5Q24.7 31.5 25.5 31.375Q26.3 31.25 26.85 31L16 20.15Q15.75 20.75 15.625 21.5Q15.5 22.25 15.5 23Q15.5 26.6 18 29.05Q20.5 31.5 24 31.5ZM37.9 33.5 31.45 27.05Q31.95 26.25 32.225 25.175Q32.5 24.1 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q22.9 14.5 21.85 14.75Q20.8 15 19.95 15.55L14.45 10Q16.2 9.2 18.925 8.6Q21.65 8 24.25 8Q31.4 8 37.325 12.075Q43.25 16.15 46 23Q44.7 26.2 42.65 28.85Q40.6 31.5 37.9 33.5ZM29.25 24.85 22.15 17.75Q23.6 17.2 25.15 17.525Q26.7 17.85 27.85 18.95Q29 20.1 29.45 21.525Q29.9 22.95 29.25 24.85Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                            <span class="font-bold text-red-700">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row justify-between items-center gap-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-500 underline order-2 md:order-1">
                            Mot de passe oublié? </a>
                        @endif
                        <button type="submit" class="h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                            <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M24.15 43.15V38.6H39.05Q39.05 38.6 39.05 38.6Q39.05 38.6 39.05 38.6V9.4Q39.05 9.4 39.05 9.4Q39.05 9.4 39.05 9.4H24.15V4.8H39.05Q40.85 4.8 42.225 6.15Q43.6 7.5 43.6 9.4V38.6Q43.6 40.45 42.225 41.8Q40.85 43.15 39.05 43.15ZM19.65 34.3 16.35 31.15 21.15 26.3H4.45V21.75H21.05L16.25 16.9L19.55 13.7L29.9 24.05Z" />
                            </svg>
                            <span>S'identifier</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script defer>
        Starter.add(togglePasswordVisibility).init();
    </script>
</body>

</html>