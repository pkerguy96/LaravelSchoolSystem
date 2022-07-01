@extends('main_master')
@section('title', $devoirs->nom_tp)
@section('content')
    <link rel="stylesheet" href="/css/select.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker-full.min.js"></script>
    <style data-for="date">
        .datepicker,
        .datepicker-picker,
        .days,
        .datepicker-grid {
            width: 100%;
        }

        [data-custom-date] {
            appearance: none;
            -webkit-appearance: none;
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath d='M9 44Q7.8 44 6.9 43.1Q6 42.2 6 41V10Q6 8.8 6.9 7.9Q7.8 7 9 7H12.25V4H15.5V7H32.5V4H35.75V7H39Q40.2 7 41.1 7.9Q42 8.8 42 10V41Q42 42.2 41.1 43.1Q40.2 44 39 44ZM9 41H39Q39 41 39 41Q39 41 39 41V19.5H9V41Q9 41 9 41Q9 41 9 41Z'/%3E%3C/svg%3E");
        }
    </style>
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Modifier devoir</h1>
    <div class="p-4 text-left bg-white shadow-md w-full rounded-md">
        <form action="{{ route('modifypf.devoir') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="devoir_id" value="{{ $devoirs->id }}">
            <div class="w-full flex flex-col gap-4">
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="title">Titre</label>
                        <input id="title" name="nom_tp" value="{{ $devoirs->nom_tp }}" placeholder="Titre"
                            type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="relative w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900" for="date">Date limite</label>
                        <input data-custom-date value="{{ $devoirs->date_limite }}" readonly id="date"
                            name="date_limite" placeholder="Date limite" type="text"
                            class="h-12 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 cursor-pointer" />
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="module">Module</label>
                    <select data-custom-select id="module" name="module">
                        <option disabled>Module</option>
                        @foreach ($data as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $devoirs->id_module ? 'selected' : '' }}>
                                {{ $row->nom_module }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Description"
                        class="h-24 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">{{ $devoirs->description }}</textarea>
                </div>
                <div class="w-full flex flex-col gap-2">
                    <label class="text-md flex text-gray-900" for="file">Document</label>
                    <label for="file" class="w-full">
                        <button onclick="clicked(event)"
                            class="relative h-24 px-6 py-2 text-gray-900 w-full rounded-md flex flex-col gap-2 justify-center items-center focus:outline-none bg-gray-50 hover:bg-gray-100 focus:bg-gray-100"
                            type="button">
                            <input type="file" name="file" onchange="preview(event)" class="hidden w-0 h-0" />
                            <svg class="text-grey-900 w-16 h-16 pointer-events-none" fill="currentcolor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path
                                    d="M10.25 42.2Q8.45 42.2 7.075 40.85Q5.7 39.5 5.7 37.6V28.2H10.25V37.6Q10.25 37.6 10.25 37.6Q10.25 37.6 10.25 37.6H37.7Q37.7 37.6 37.7 37.6Q37.7 37.6 37.7 37.6V28.2H42.25V37.6Q42.25 39.5 40.85 40.85Q39.45 42.2 37.7 42.2ZM21.7 31.25V13.45L16.05 19.15L12.8 15.85L24 4.65L35.25 15.85L31.9 19.15L26.25 13.45V31.25Z" />
                            </svg>
                            <span data-preview class="pointer-events-none">Document</span>
                        </button>
                    </label>
                    @error('file')
                        <span class="font-bold text-red-700">{{ $message }}</span>
                    @enderror
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
        function preview(event) {
            if (event.target.files.length > 0) {
                var preview = document.querySelector("[data-preview]");
                preview.innerText = event.target.files[0].name;
            }
        }

        function clicked(e) {
            if (e.target.type === "button") e.target.firstElementChild.click();
        }

        Starter.add(createSelectElement, createDateElement);
    </script>
@endsection
