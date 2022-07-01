@extends('admin.dashboard')
@section('title', 'Reglage')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Réglage du mot de passe</h1>
    <div class="p-4 text-left bg-white shadow-md w-full rounded-md">
        <form action="{{ route('admin.password') }}" method="post">
            @csrf
            <div class="w-full flex flex-col gap-4">
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="old-password">Ancien mot de passe</label>
                    <div class="w-full relative">
                        <input id="old-password" name="old_password" type="password" placeholder="Ancien mot de passe"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                        <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                            <button data-password-trigger data-target="#old-password"
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
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="new-password">Nouveau mot de passe</label>
                        <div class="w-full relative">
                            <input id="new-password" name="password" type="password" placeholder="Nouveau mot de passe"
                                class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                            <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                                <button data-password-trigger data-target="#new-password"
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
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="confirm-password">Confirmez le mot de passe</label>
                        <div class="w-full relative">
                            <input id="confirm-password" name="pasword" type="password"
                                placeholder="Confirmez le mot de passe"
                                class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                            <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                                <button data-password-trigger data-target="#confirm-password"
                                    data-mutable="#confirm-password-show|#confirm-password-hide" type="button"
                                    class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-200 hover:bg-gray-200"
                                    aria-label="Button">
                                    <svg id="confirm-password-show" class="text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M24 31.5Q27.55 31.5 30.025 29.025Q32.5 26.55 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q20.45 14.5 17.975 16.975Q15.5 19.45 15.5 23Q15.5 26.55 17.975 29.025Q20.45 31.5 24 31.5ZM24 28.6Q21.65 28.6 20.025 26.975Q18.4 25.35 18.4 23Q18.4 20.65 20.025 19.025Q21.65 17.4 24 17.4Q26.35 17.4 27.975 19.025Q29.6 20.65 29.6 23Q29.6 25.35 27.975 26.975Q26.35 28.6 24 28.6ZM24 38Q16.7 38 10.8 33.85Q4.9 29.7 2 23Q4.9 16.3 10.8 12.15Q16.7 8 24 8Q31.3 8 37.2 12.15Q43.1 16.3 46 23Q43.1 29.7 37.2 33.85Q31.3 38 24 38Z">
                                        </path>
                                    </svg>
                                    <svg id="confirm-password-hide" class="hidden text-grey-900 w-5 h-5" fill="currentcolor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                        <path
                                            d="M40.8 44.8 32.4 36.55Q30.65 37.25 28.45 37.625Q26.25 38 24 38Q16.7 38 10.75 33.925Q4.8 29.85 2 23Q3 20.4 4.775 17.925Q6.55 15.45 9.1 13.2L2.8 6.9L4.9 4.75L42.75 42.6ZM24 31.5Q24.7 31.5 25.5 31.375Q26.3 31.25 26.85 31L16 20.15Q15.75 20.75 15.625 21.5Q15.5 22.25 15.5 23Q15.5 26.6 18 29.05Q20.5 31.5 24 31.5ZM37.9 33.5 31.45 27.05Q31.95 26.25 32.225 25.175Q32.5 24.1 32.5 23Q32.5 19.45 30.025 16.975Q27.55 14.5 24 14.5Q22.9 14.5 21.85 14.75Q20.8 15 19.95 15.55L14.45 10Q16.2 9.2 18.925 8.6Q21.65 8 24.25 8Q31.4 8 37.325 12.075Q43.25 16.15 46 23Q44.7 26.2 42.65 28.85Q40.6 31.5 37.9 33.5ZM29.25 24.85 22.15 17.75Q23.6 17.2 25.15 17.525Q26.7 17.85 27.85 18.95Q29 20.1 29.45 21.525Q29.9 22.95 29.25 24.85Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row justify-end items-center gap-2">
                    <button type="submit"
                        class="h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                        <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M43.1 13.4V38.5Q43.1 40.35 41.75 41.7Q40.4 43.05 38.5 43.05H9.5Q7.65 43.05 6.3 41.7Q4.95 40.35 4.95 38.5V9.5Q4.95 7.6 6.3 6.25Q7.65 4.9 9.5 4.9H34.6ZM24 35.2Q26.1 35.2 27.6 33.725Q29.1 32.25 29.1 30.1Q29.1 28 27.625 26.5Q26.15 25 24 25Q21.9 25 20.4 26.475Q18.9 27.95 18.9 30.1Q18.9 32.2 20.375 33.7Q21.85 35.2 24 35.2ZM12.2 19.15H29.9V12.2H12.2Z" />
                        </svg>
                        <span>Enregistrer</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script defer>
        Starter.add(togglePasswordVisibility);
    </script>
@endsection
