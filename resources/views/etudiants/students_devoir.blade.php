@extends('etudiants.students_page')
@section('title', 'Liste devoirs')
@section('content')
    @if (!$module_tp->isEmpty())
        @php
            $user_id = Auth::user()->id;
            $data = App\Models\user_module::where('user_id', $user_id)
                ->where('module_id', $module_tp[0]->id_module)
                ->get();
        @endphp
        @if (count($data) > 0)
            <h1 class="text-2xl md:text-4xl font-black text-gray-900">Liste des devoirs</h1>
            <div class="bg-white rounded-md overflow-hidden shadow-md">
                <div class="w-full rounded-md overflow-x-auto">
                    <table class="w-full table-auto">
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($module_tp as $row)
                                <tr class="text-grey-900 even:bg-gray-50">
                                    <td class="px-4 py-3 text-md">
                                        <a href="{{ route('deposite.tp', $row->id) }}"
                                            class="w-full block cursor-pointer focus:outline-none focus:underline hover:underline">
                                            {{ $row->nom_tp }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-grey-900 even:bg-gray-50">
                                    <td class="px-4 py-3 text-md text-center font-black">
                                        chi haja hna
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h1 class="text-2xl md:text-4xl font-black text-gray-900">S'inscrire pour ce module</h1>
            <form action="{{ route('register.module') }}" method="post">
                @csrf
                <input type="hidden" name='user_id' value="{{ $user_id }}">
                <input type="hidden" name='module_id' value="{{ $module_tp[0]->id_module }}">
                <button type="submit"
                    class="h-12 mx-auto px-6 py-2 text-white w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center shadow-md focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                    <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 48 48">
                        <path
                            d="M24.05 45.05Q19.6 45.05 15.7 43.45Q11.8 41.85 8.975 39.025Q6.15 36.2 4.55 32.3Q2.95 28.4 2.95 23.95Q2.95 19.55 4.55 15.7Q6.15 11.85 8.975 9Q11.8 6.15 15.7 4.525Q19.6 2.9 24.05 2.9Q28.45 2.9 32.3 4.525Q36.15 6.15 39 9Q41.85 11.85 43.475 15.7Q45.1 19.55 45.1 24Q45.1 28.4 43.475 32.3Q41.85 36.2 39 39.025Q36.15 41.85 32.3 43.45Q28.45 45.05 24.05 45.05ZM22.4 34.2H25.85V25.9H34.2V22.45H25.85V13.8H22.4V22.45H13.8V25.9H22.4Z" />
                    </svg>
                    <span>S'inscrire</span>
                </button>
            </form>
        @endif
    @else
        <div class="mx-auto flex justify-center items-center w-max mt-4">
            <h1 class="text-white text-2xl pb-4">
                <p class="w-full text-white px-4 py-2 text-center rounded-md">
                    Aucun tp n'est soumis pour le moment par le professeur
                </p>
            </h1>
        </div>
    @endif
@endsection
