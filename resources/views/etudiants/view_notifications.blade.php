@extends('etudiants.students_page')
@section('title', 'Notifications')
@section('content')
<h1 class="text-2xl md:text-4xl font-black text-gray-900">Notifications</h1>
<div class="p-4 text-left w-full bg-white shadow-md rounded-md">
    <div class="w-full flex flex-col gap-4">
        @forelse ($data as $row)
        <div class="flex items-center gap-2 rounded-md px-4 py-2 text-grey-900 bg-gray-50">
            <div class="w-full flex flex-col">
                <span class="text-md text-gray-900 font-black">{{ $row->notification_msg }}</span>
                <span class="text-xs text-gray-400 font-black">
                    {{ $row->updated_at }}
                </span>
            </div>
        </div>
        @empty
        <div class="flex flex-col gap-2 rounded-md text-grey-900 bg-gray-50 px-4 py-2">
            <p class="text-md text-gray-900 text-center">
                Aucun notifications trouve.
            </p>
        </div>
        @endforelse
    </div>
</div>
@endsection