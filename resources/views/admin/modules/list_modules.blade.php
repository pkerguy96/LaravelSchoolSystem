@extends('admin.dashboard')
@section('title', 'Liste modules')
@section('content')
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Liste des modules</h1>
    <div class="w-full bg-white shadow-md rounded-md overflow-hidden">
        <div class="w-full rounded-md overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr
                        class="text-xs font-bold tracking-wide uppercase text-left border-b border-grey-darkest text-grey-900">
                        <th class="px-4 py-3 text-center">Code</th>
                        <th class="px-4 py-3 text-center">Title</th>
                        <th class="px-4 py-3 text-center">Professeur</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($data as $row)
                        <tr class="text-grey-900 even:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $row->code_unique }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ $row->nom_module }}
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                @if ($row->prof)
                                    {{ $row->prof->nom }} {{ $row->prof->prenom }}
                                @else
                                    _
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2 items-center justify-center text-sm">
                                    <a href="{{ route('edit.module', $row->id) }}"
                                        class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100">
                                        <svg class="w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M39.7 14.7 33.3 8.3 35.4 6.2Q36.25 5.35 37.525 5.375Q38.8 5.4 39.65 6.25L41.8 8.4Q42.65 9.25 42.65 10.5Q42.65 11.75 41.8 12.6ZM37.6 16.8 12.4 42H6V35.6L31.2 10.4Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('delete.module', $row->id) }}"
                                        class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100">
                                        <svg class="w-5 h-5" fill="currentcolor" viewBox="0 0 48 48">
                                            <path
                                                d="M12.65 43.05Q10.85 43.05 9.45 41.7Q8.05 40.35 8.05 38.5V10.9H5.15V6.35H16.55V4H31.4V6.35H42.8V10.9H39.9V38.5Q39.9 40.35 38.55 41.7Q37.2 43.05 35.3 43.05ZM17.85 34.6H21.55V14.7H17.85ZM26.5 34.6H30.25V14.7H26.5Z" />
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
