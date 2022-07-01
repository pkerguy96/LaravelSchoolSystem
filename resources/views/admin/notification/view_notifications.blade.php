@extends('admin.dashboard')
@section('title', 'Notifications')
@section('content')
<div class="flex gap-4 items-center justify-between">
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Notifications</h1>
    <a href="{{ route('write.notification') }}" class="flex items-center shadow-md justify-between cursor-pointer p-2 rounded-md focus:outline-none bg-blue-500 focus:bg-blue-300 hover:bg-blue-300" aria-label="Delete">
        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <path d="M22.4 29.8h3.3v-4.1h4.1v-3.3h-4.1v-4.15h-3.3v4.15h-4.15v3.3h4.15ZM5.95 39.1v-4.6h4.65V20.4q0-4.5 2.675-8.225Q15.95 8.45 20.45 7.35v-1.2q0-1.5 1.05-2.475Q22.55 2.7 24 2.7t2.5.975q1.05.975 1.05 2.475v1.2q4.55 1.05 7.275 4.775Q37.55 15.85 37.55 20.4v14.1h4.55v4.6Zm18.1 6q-1.75 0-3.075-1.275-1.325-1.275-1.325-3.075h8.75q0 1.85-1.3 3.1t-3.05 1.25Z" />
        </svg>
    </a>
</div>
<div class="p-4 text-left w-full bg-white shadow-md rounded-md">
    <div class="w-full flex flex-col gap-4">
        @forelse ($data as $row)
        <div class="flex items-center gap-2 rounded-md px-4 py-2 text-grey-900 bg-gray-50">
            <div class="w-full flex flex-col">
                <span class="text-md text-gray-900 font-black">{{ $row->notification_msg }}</span>
                <span class="text-xs text-gray-400 font-black">
                    {{ $row->updated_at->diffForHumans() }}
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