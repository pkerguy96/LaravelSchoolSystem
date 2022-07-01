@extends('main_master')
@section('title', 'Liste remises')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Liste des remises</h1>
    <div class="w-full bg-white shadow-md rounded-md overflow-hidden">
        <div class="w-full rounded-md overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr
                        class="text-xs font-bold tracking-wide uppercase text-left border-b border-grey-darkest text-grey-900">
                        <th class="px-4 py-3 text-center">Etudient</th>
                        <th class="px-4 py-3 text-center">Module</th>
                        <th class="px-4 py-3 text-center">Devoir</th>
                        <th class="px-4 py-3 text-center">Document</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($response as $row)
                        <tr class="text-grey-900 even:bg-gray-50">
                            @php
                                $modulename = App\Models\Modules::where('id', $row->remises->id_module)->get();
                            @endphp
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $row->userinfo->name }} {{ $row->userinfo->last_name }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $modulename[0]->nom_module }}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                {{ $row->remises->nom_tp }}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                <a href="{{ asset('upload/student_tp/' . $row->fichier) }}"
                                    class="w-full block cursor-pointer focus:outline-none focus:underline hover:underline">
                                    {{ $row->fichier }}
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2 items-center justify-center text-sm">
                                    <a href="{{ route('professeur.note', ['id' => $row->id, 'user_id' => $row->id_user]) }}"
                                        class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M39.7 14.7 33.3 8.3 35.4 6.2Q36.25 5.35 37.525 5.375Q38.8 5.4 39.65 6.25L41.8 8.4Q42.65 9.25 42.65 10.5Q42.65 11.75 41.8 12.6ZM37.6 16.8 12.4 42H6V35.6L31.2 10.4Z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
