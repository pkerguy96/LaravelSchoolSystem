@extends('main_master')
@section('title', 'Liste devoirs')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Liste des devoirs</h1>
    <div class="w-full bg-white shadow-md rounded-md overflow-hidden">
        <div class="w-full rounded-md overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr
                        class="text-xs font-bold tracking-wide uppercase text-left border-b border-grey-darkest text-grey-900">
                        <th class="px-4 py-3 text-center">Title</th>
                        <th class="px-4 py-3 text-center">Date limite</th>
                        <th class="px-4 py-3 text-center">Document</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($data as $row)
                        <tr class="text-grey-900 even:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $row->nom_tp }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ Carbon\carbon::parse($row->date_limite)->toCookieString() }}
                            </td>
                            <td class="px-4 py-3 text-xs text-center">
                                <a href="{{ asset('upload/student_tp/' . $row->fichier) }}"
                                    class="w-full block cursor-pointer focus:outline-none focus:underline hover:underline">
                                    {{ $row->fichier }}
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2 items-center justify-center text-sm">
                                    <a href="{{ route('profedit.devoir', $row->id) }}"
                                        class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M39.7 14.7 33.3 8.3 35.4 6.2Q36.25 5.35 37.525 5.375Q38.8 5.4 39.65 6.25L41.8 8.4Q42.65 9.25 42.65 10.5Q42.65 11.75 41.8 12.6ZM37.6 16.8 12.4 42H6V35.6L31.2 10.4Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('delete.devoirtp', $row->id) }}"
                                        class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M13.05 42Q11.85 42 10.95 41.1Q10.05 40.2 10.05 39V10.5H8V7.5H17.4V6H30.6V7.5H40V10.5H37.95V39Q37.95 40.2 37.05 41.1Q36.15 42 34.95 42ZM18.35 34.7H21.35V14.75H18.35ZM26.65 34.7H29.65V14.75H26.65Z">
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
