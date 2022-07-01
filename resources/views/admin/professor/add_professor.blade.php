@extends('admin.dashboard')
@section('title', 'Nouveau professeur')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Nouveau professeur</h1>
    <div class="p-4 text-left bg-white shadow-md w-full rounded-md">
        <form action="{{ route('save.professor') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full flex flex-col gap-4">
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="last-name">Nom</label>
                        <input id="last-name" name="nom" placeholder="Nom" type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="first-name">prenom</label>
                        <input id="first-name" name="prenom" placeholder="prenom" type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="phone">Telephone</label>
                        <input id="phone" name="phone" placeholder="Telephone" type="tel"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="email">Email</label>
                        <input id="email" name="email" placeholder="Email" type="email"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="address">Adresse</label>
                    <textarea id="address" name="adress" placeholder="Adresse"
                        class="h-24 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="password-input">Mot de passe</label>
                    <div class="w-full relative">
                        <input data-element-generate id="password-input" name="password" type="text"
                            placeholder="Mot de passe" readonly
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 border-none" />
                        <div class="absolute top-0 right-4 h-full rounded-md py-2 flex gap-2 items-center">
                            <button data-element-copy data-target="#password-input" type="button"
                                class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-200 hover:bg-gray-200">
                                <svg id="password-show" class="text-grey-900 w-5 h-5" fill="currentcolor"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M16.2 38.35q-1.9 0-3.225-1.375Q11.65 35.6 11.65 33.8V6.7q0-1.8 1.325-3.175Q14.3 2.15 16.2 2.15h21.05q1.9 0 3.25 1.375T41.85 6.7v27.1q0 1.8-1.35 3.175-1.35 1.375-3.25 1.375Zm-7.4 7.4q-1.95 0-3.275-1.375T4.2 41.2V11.75h4.6V41.2h22.95v4.55Z" />
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
                                d="M43.1 13.4V38.5Q43.1 40.35 41.75 41.7Q40.4 43.05 38.5 43.05H9.5Q7.65 43.05 6.3 41.7Q4.95 40.35 4.95 38.5V9.5Q4.95 7.6 6.3 6.25Q7.65 4.9 9.5 4.9H34.6ZM24 35.2Q26.1 35.2 27.6 33.725Q29.1 32.25 29.1 30.1Q29.1 28 27.625 26.5Q26.15 25 24 25Q21.9 25 20.4 26.475Q18.9 27.95 18.9 30.1Q18.9 32.2 20.375 33.7Q21.85 35.2 24 35.2ZM12.2 19.15H29.9V12.2H12.2Z" />
                        </svg>
                        <span>Enregistrer</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script defer>
        Starter.add(copyElementText, generatePassword);
    </script>
@endsection
