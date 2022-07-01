@extends('main_master')
@section('title', 'Profile')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Réglage du Profile</h1>
    <div class="p-4 text-left bg-white shadow-md w-full rounded-md">
        <form action="{{ route('update.professeur') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $data->id }}">
            <div class="w-full flex flex-col gap-4">
                <div class="w-full md:w-max mx-auto flex flex-col gap-2 items-center">
                    <img id="image" class="rounded-md mx-auto w-52 h-52 object-cover bg-gray-50"
                        src="
                    {{ !empty($data->profile_photo_path)
                        ? url('upload/profilepic/' . $data->profile_photo_path)
                        : url('upload/no_image.jpg') }}
                " />
                    <label for="file" class="flex flex-col justify-center items-center w-max">
                        <button onclick="clicked(event)"
                            class="relative h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 justify-center items-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300"
                            type="button">
                            <input data-element-preview data-target="#image" type="file" name="file"
                                class="hidden w-0 h-0" />
                            <svg class="text-grey-900 w35 h-5 pointer-events-none" fill="currentcolor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path
                                    d="M10.25 42.2Q8.45 42.2 7.075 40.85Q5.7 39.5 5.7 37.6V28.2H10.25V37.6Q10.25 37.6 10.25 37.6Q10.25 37.6 10.25 37.6H37.7Q37.7 37.6 37.7 37.6Q37.7 37.6 37.7 37.6V28.2H42.25V37.6Q42.25 39.5 40.85 40.85Q39.45 42.2 37.7 42.2ZM21.7 31.25V13.45L16.05 19.15L12.8 15.85L24 4.65L35.25 15.85L31.9 19.15L26.25 13.45V31.25Z" />
                            </svg>
                            <span class="pointer-events-none">Ajouter avatar</span>
                        </button>
                    </label>
                    @error('file')
                        <span class="font-bold text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="first-name">Nom</label>
                        <input id="first-name" name="nom" value="{{ $data->nom }}" placeholder="Nom" type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="last-name">Prenom</label>
                        <input id="last-name" name="prenom" value="{{ $data->prenom }}" placeholder="Prenom"
                            type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="phone">Telephone</label>
                        <input id="phone" name="phone" value="{{ $data->phone }}" placeholder="Telephone"
                            type="tel"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="email">Email</label>
                        <input id="email" name="email" value="{{ $data->email }}" placeholder="Email" type="email"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="address">Adresse</label>
                    <textarea id="address" name="adress" placeholder="Adresse"
                        class="h-24 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">{{ $data->adress }}</textarea>
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
        function clicked(e) {
            if (e.target.type === "button") e.target.firstElementChild.click();
        }

        Starter.add(previewElementFile("img"))
    </script>
@endsection
