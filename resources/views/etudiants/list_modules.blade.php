@extends('etudiants.students_page')
@section('title', 'Liste modules')
@section('content')
    @php
    $id = Auth::user()->id;
    $data = App\Models\Modules::latest()->get();
    @endphp
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Liste des modules</h1>
    <div class="w-full bg-white rounded-md overflow-hidden shadow-md">
        <div class="w-full rounded-md overflow-x-auto">
            <table class="w-full table-auto">
                <tbody class="divide-y divide-gray-100">
                    @foreach ($data as $row)
                        <tr class="text-grey-900 even:bg-gray-50">
                            <td class="px-4 py-3 text-md">
                                <a href="{{ route('devoirs.list', $row->id) }}"
                                    class="w-full block cursor-pointer focus:outline-none focus:underline hover:underline">
                                    {{ $row->nom_module }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
