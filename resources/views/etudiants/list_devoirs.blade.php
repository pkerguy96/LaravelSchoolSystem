@extends('etudiants.students_page')
@section('title', $module_tp->nom_tp)
@section('content')
    @php
    $data = App\Models\user_tp::where('id_module_tp', $module_tp->id)
        ->where('id_user', Auth::user()->id)
        ->get();
    @endphp
    <div class="w-full flex flex-col gap-10">
        <h1 class="text-2xl md:text-4xl font-black text-gray-900">{{ $module_tp->nom_tp }}</h1>
        <a href="{{ asset('upload/devoirs/' . $module_tp->fichier) }}"
            class="h-12 px-6 py-2 text-white w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center shadow-md focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
            <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path
                    d="M10.25 42.2Q8.45 42.2 7.075 40.85Q5.7 39.5 5.7 37.6V28.2H10.25V37.6Q10.25 37.6 10.25 37.6Q10.25 37.6 10.25 37.6H37.7Q37.7 37.6 37.7 37.6Q37.7 37.6 37.7 37.6V28.2H42.25V37.6Q42.25 39.5 40.85 40.85Q39.45 42.2 37.7 42.2ZM24 31.25 12.8 20.05 16.05 16.85 21.7 22.55V4.65H26.25V22.55L31.9 16.85L35.25 20.05Z" />
            </svg>
            <span>Telecharger Devoir</span>
        </a>
        <p class="w-full text-md">
            {{ $module_tp->description }}
        </p>
    </div>
    <div class="w-full flex flex-col gap-10 mt-8">
        <h1 class="text-2xl md:text-4xl font-black text-gray-900">Statut de remise</h1>
        <div class="p-4 text-left bg-white shadow-md w-full rounded-md">
            <div class="w-full flex flex-col gap-4">
                <div class="w-full flex flex-col md:flex-row gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900 w-full font-black">Date limite</label>
                        <div
                            class="h-12 flex items-center text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            {{ date('D d M Y H:i:s', strtotime($module_tp->date_limite)) }}
                        </div>
                    </div>
                    @if (count($data) > 0)
                        <div class="w-full flex flex-col gap-2">
                            <label class="text-md flex text-gray-900 w-full font-black">Date Remise</label>
                            <div
                                class="h-12 flex items-center text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                {{ date('D d M Y H:i:s', strtotime($data[0]->date_depot)) }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="w-full flex flex-col md:flex-row gap-4">
                    @if (isset($data[0]->fichier))
                        <div class="w-full flex flex-col gap-2">
                            <label class="text-md flex text-gray-900 w-full font-black">Remises de fichiers</label>
                            <div
                                class="h-12 flex items-center justify-between text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <a href="{{ asset('upload/student_tp/' . $data[0]->fichier) }}"
                                    class="block w-full cusror-pointer focus:outline-none focus:underline hover:underline">{{ $data[0]->fichier }}</a>
                                <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M10.25 42.2Q8.45 42.2 7.075 40.85Q5.7 39.5 5.7 37.6V28.2H10.25V37.6Q10.25 37.6 10.25 37.6Q10.25 37.6 10.25 37.6H37.7Q37.7 37.6 37.7 37.6Q37.7 37.6 37.7 37.6V28.2H42.25V37.6Q42.25 39.5 40.85 40.85Q39.45 42.2 37.7 42.2ZM24 31.25 12.8 20.05 16.05 16.85 21.7 22.55V4.65H26.25V22.55L31.9 16.85L35.25 20.05Z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                    @if (isset($data[0]->note))
                        <div class="w-full flex flex-col gap-2">
                            <label class="text-md flex text-gray-900 w-full font-black">Note</label>
                            <div
                                class="h-12 flex items-center text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                {{ number_format($data[0]->note, 2, '.', ',') }}
                            </div>
                        </div>
                    @endif
                </div>
                @if (isset($data[0]->commentaire))
                    <div class="w-full flex flex-col gap-2">
                        <label class="text-md flex text-gray-900 w-full font-black">Commentaire</label>
                        <div class="flex items-center text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            style="min-height: 3rem;">
                            {{ $data[0]->commentaire }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (count($data) > 0)
            <div class="mx-auto flex justify-center items-center w-max mt-4 max-w-full">
                <p class="w-full text-white bg-green-600 px-4 py-2 text-center rounded-md">
                    Vous avez déjà soumis votre devoir
                </p>
            </div>
        @else
            @if (date(strtotime($module_tp->date_limite)) > date(strtotime(carbon\carbon::now())))
                <div class="w-full flex flex-col md:flex-row justify-center items-center gap-2">
                    <form id="form" action="{{ route('student.devoir.add') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @php
                            $id = Auth::user()->id;
                        @endphp
                        <input type="hidden" name="module_tp_id" value="{{ $module_tp->id }}">
                        <input type="hidden" name="user_id" value="{{ $id }}">
                        <button onclick="clicked(event)"
                            class="relative h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 justify-center items-center shadow-md focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300"
                            type="button">
                            <input type="file" name="file" onchange="changed(event)" class="hidden w-0 h-0" />
                            <svg class="text-grey-900 w35 h-5 pointer-events-none" fill="currentcolor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path
                                    d="M10.25 42.2Q8.45 42.2 7.075 40.85Q5.7 39.5 5.7 37.6V28.2H10.25V37.6Q10.25 37.6 10.25 37.6Q10.25 37.6 10.25 37.6H37.7Q37.7 37.6 37.7 37.6Q37.7 37.6 37.7 37.6V28.2H42.25V37.6Q42.25 39.5 40.85 40.85Q39.45 42.2 37.7 42.2ZM21.7 31.25V13.45L16.05 19.15L12.8 15.85L24 4.65L35.25 15.85L31.9 19.15L26.25 13.45V31.25Z" />
                            </svg>
                            <span class="pointer-events-none">Ajouter devoir</span>
                        </button>
                    </form>
                </div>
            @else
                <div class="mx-auto flex justify-center items-center w-max mt-4 max-w-full">
                    <p class="w-full text-white bg-red-600 px-4 py-2 text-center rounded-md">
                        le délai déjà dépassé. contactez votre professeur ou un administrateur pour obtenir de l'aide
                    </p>
                </div>
            @endif
        @endif
    </div>
    <script defer>
        function changed(e) {
            if (e.target.files.length) {
                document.querySelector("#form").submit();
            }
        }

        function clicked(e) {
            if (e.target.type === "button") e.target.firstElementChild.click();
        }
    </script>
@endsection
