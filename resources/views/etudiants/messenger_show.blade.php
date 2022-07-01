@extends('etudiants.students_page')
@section('title', 'Conversation')
@section('content')
    <h1 class="text-2xl md:text-4xl text-gray-900">
        <span class="font-black">Sujet:</span> {{ $thread->subject }}
    </h1>
    <div class="p-4 text-left w-full bg-white shadow-md rounded-md">
        <div class="w-full flex flex-col gap-4">
            @foreach ($thread->messages as $message)
                <div class="flex flex-col rounded-md gap-1 text-grey-900 bg-gray-50 px-4 py-2">
                    <h1 class="text-md text-gray-900 font-black">{{ $message->user->name }}
                        {{ $message->user->last_name }}</h1>
                    <p class="text-md text-gray-900">
                        {{ $message->body }}
                    </p>
                    <span
                        class="text-xs text-right text-gray-400 font-black">{{ $message->created_at->diffForHumans() }}</span>
                </div>
            @endforeach
            <form action="{{ route('messages.update', $thread) }}" method="post">
                @csrf
                @method('PUT')
                <div class="w-full flex flex-col gap-4">
                    <div class="w-full flex flex-col gap-2">
                        <textarea id="message" name="message" placeholder="Message"
                            class="h-24 text-md w-full bg-gray-50 text-gray-900 px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="w-full flex flex-col md:flex-row justify-end items-center gap-2">
                        <button type="submit"
                            class="h-12 px-6 py-2 text-white order-1 w-full min-w-max md:w-48 rounded-md flex gap-2 items-center justify-center focus:outline-none bg-blue-500 hover:bg-blue-300 focus:bg-blue-300">
                            <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 48 48">
                                <path d="M5 41.05V28.75L21.65 24L5 19.15V6.9L45.35 24Z" />
                            </svg>
                            <span>Envoyer</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
