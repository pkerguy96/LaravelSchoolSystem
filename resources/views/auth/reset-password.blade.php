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
    <title>Reset Password</title>
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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="w-full flex flex-col gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="old-password-input">Ancien mot de passe</label>
                        <div class="w-full relative">
                            <input name="password" id="old-password-input" type="password"
                                placeholder="Ancien mot de passe"
                                class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                            <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                                <button data-password-trigger data-target="#old-password-input"
                                    data-mutable="#old-password-show|#old-password-hide" type="button"
                                    class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-200 hover:bg-gray-200"
                                    aria-label="Button">
                                    <svg id="old-password-show" class="text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M24 31.5Q27.55 31.5 30.025 29.025Q32.5 26.55 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q20.45 14.5 17.975 16.975Q15.5 19.45 15.5 23Q15.5 26.55 17.975 29.025Q20.45 31.5 24 31.5ZM24 28.6Q21.65 28.6 20.025 26.975Q18.4 25.35 18.4 23Q18.4 20.65 20.025 19.025Q21.65 17.4 24 17.4Q26.35 17.4 27.975 19.025Q29.6 20.65 29.6 23Q29.6 25.35 27.975 26.975Q26.35 28.6 24 28.6ZM24 38Q16.7 38 10.8 33.85Q4.9 29.7 2 23Q4.9 16.3 10.8 12.15Q16.7 8 24 8Q31.3 8 37.2 12.15Q43.1 16.3 46 23Q43.1 29.7 37.2 33.85Q31.3 38 24 38Z">
                                        </path>
                                    </svg>
                                    <svg id="old-password-hide" class="hidden text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M40.8 44.8 32.4 36.55Q30.65 37.25 28.45 37.625Q26.25 38 24 38Q16.7 38 10.75 33.925Q4.8 29.85 2 23Q3 20.4 4.775 17.925Q6.55 15.45 9.1 13.2L2.8 6.9L4.9 4.75L42.75 42.6ZM24 31.5Q24.7 31.5 25.5 31.375Q26.3 31.25 26.85 31L16 20.15Q15.75 20.75 15.625 21.5Q15.5 22.25 15.5 23Q15.5 26.6 18 29.05Q20.5 31.5 24 31.5ZM37.9 33.5 31.45 27.05Q31.95 26.25 32.225 25.175Q32.5 24.1 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q22.9 14.5 21.85 14.75Q20.8 15 19.95 15.55L14.45 10Q16.2 9.2 18.925 8.6Q21.65 8 24.25 8Q31.4 8 37.325 12.075Q43.25 16.15 46 23Q44.7 26.2 42.65 28.85Q40.6 31.5 37.9 33.5ZM29.25 24.85 22.15 17.75Q23.6 17.2 25.15 17.525Q26.7 17.85 27.85 18.95Q29 20.1 29.45 21.525Q29.9 22.95 29.25 24.85Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="new-password-input">Nouveau mot de passe</label>
                        <div class="w-full relative">
                            <input name="password_confirmation" id="new-password-input" type="password"
                                placeholder="Nouveau mot de passe"
                                class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                            <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                                <button data-password-trigger data-target="#new-password-input"
                                    data-mutable="#new-password-show|#new-password-hide" type="button"
                                    class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-200 hover:bg-gray-200"
                                    aria-label="Button">
                                    <svg id="new-password-show" class="text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M24 31.5Q27.55 31.5 30.025 29.025Q32.5 26.55 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q20.45 14.5 17.975 16.975Q15.5 19.45 15.5 23Q15.5 26.55 17.975 29.025Q20.45 31.5 24 31.5ZM24 28.6Q21.65 28.6 20.025 26.975Q18.4 25.35 18.4 23Q18.4 20.65 20.025 19.025Q21.65 17.4 24 17.4Q26.35 17.4 27.975 19.025Q29.6 20.65 29.6 23Q29.6 25.35 27.975 26.975Q26.35 28.6 24 28.6ZM24 38Q16.7 38 10.8 33.85Q4.9 29.7 2 23Q4.9 16.3 10.8 12.15Q16.7 8 24 8Q31.3 8 37.2 12.15Q43.1 16.3 46 23Q43.1 29.7 37.2 33.85Q31.3 38 24 38Z">
                                        </path>
                                    </svg>
                                    <svg id="new-password-hide" class="hidden text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M40.8 44.8 32.4 36.55Q30.65 37.25 28.45 37.625Q26.25 38 24 38Q16.7 38 10.75 33.925Q4.8 29.85 2 23Q3 20.4 4.775 17.925Q6.55 15.45 9.1 13.2L2.8 6.9L4.9 4.75L42.75 42.6ZM24 31.5Q24.7 31.5 25.5 31.375Q26.3 31.25 26.85 31L16 20.15Q15.75 20.75 15.625 21.5Q15.5 22.25 15.5 23Q15.5 26.6 18 29.05Q20.5 31.5 24 31.5ZM37.9 33.5 31.45 27.05Q31.95 26.25 32.225 25.175Q32.5 24.1 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q22.9 14.5 21.85 14.75Q20.8 15 19.95 15.55L14.45 10Q16.2 9.2 18.925 8.6Q21.65 8 24.25 8Q31.4 8 37.325 12.075Q43.25 16.15 46 23Q44.7 26.2 42.65 28.85Q40.6 31.5 37.9 33.5ZM29.25 24.85 22.15 17.75Q23.6 17.2 25.15 17.525Q26.7 17.85 27.85 18.95Q29 20.1 29.45 21.525Q29.9 22.95 29.25 24.85Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col md:flex-row justify-end items-center gap-2">
                        <button type="submit"
                            class="h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                            <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48">
                                <path
                                    d="M26 43.25Q22.1 43.25 18.475 41.725Q14.85 40.2 12.35 37.55L15.65 34.3Q17.75 36.5 20.45 37.6Q23.15 38.7 26 38.7Q32.1 38.7 36.425 34.375Q40.75 30.05 40.75 24Q40.75 17.95 36.4 13.6Q32.05 9.25 26 9.25Q20.05 9.25 15.65 13.575Q11.25 17.9 11.3 23.95V24.7L14.85 21.1L17.25 23.5L9 31.75L0.75 23.5L3.15 21.1L6.75 24.65V23.9Q6.7 20.05 8.175 16.525Q9.65 13 12.275 10.4Q14.9 7.8 18.425 6.225Q21.95 4.65 26 4.65Q30 4.65 33.55 6.2Q37.1 7.75 39.725 10.325Q42.35 12.9 43.85 16.45Q45.35 20 45.35 24Q45.35 32.1 39.725 37.675Q34.1 43.25 26 43.25ZM22 31.7Q21.35 31.7 20.825 31.175Q20.3 30.65 20.3 30V24Q20.3 23.25 20.875 22.775Q21.45 22.3 22.3 22.25V20Q22.3 18.45 23.375 17.35Q24.45 16.25 26 16.25Q27.55 16.25 28.65 17.35Q29.75 18.45 29.75 20V22.25Q30.55 22.3 31.15 22.775Q31.75 23.25 31.75 24V30Q31.75 30.65 31.2 31.175Q30.65 31.7 30 31.7ZM23.75 22.25H28.3V20Q28.3 19 27.65 18.35Q27 17.7 26 17.7Q25 17.7 24.375 18.35Q23.75 19 23.75 20Z" />
                            </svg>
                            <span>Réinitialiser</span>
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
