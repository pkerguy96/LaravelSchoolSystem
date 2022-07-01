@extends('etudiants.students_page')
@section('title', 'Messages')
@section('content')
<div class="flex gap-4 items-center justify-between">
    <h1 class="text-2xl md:text-4xl font-black text-gray-900">Messages</h1>
    <a href="{{ route('send.messsage') }}" class="flex items-center shadow-md justify-between cursor-pointer p-2 rounded-md focus:outline-none bg-blue-500 focus:bg-blue-300 hover:bg-blue-300">
        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
            <path d="M22.3 28.3H25.75V21.8H32.25V18.35H25.75V11.85H22.3V18.35H15.8V21.8H22.3ZM2.95 45V7.55Q2.95 5.7 4.3 4.325Q5.65 2.95 7.5 2.95H40.5Q42.35 2.95 43.725 4.325Q45.1 5.7 45.1 7.55V32.6Q45.1 34.45 43.725 35.8Q42.35 37.15 40.5 37.15H10.8Z" />
        </svg>
    </a>
</div>


<div class="w-full flex gap-4 flex-wrap items-start">
    @php

    $users = App\Models\User::select("*")->whereNotNull('last_seen')->where('id','!=',Auth::user()->id)->orderBy('last_seen', 'DESC')->paginate(10);
    $online_users=[];
    foreach ( $users as $user){
    if ($user->useronline()){
    array_push($online_users,$user);
    }

    }

    @endphp
    <div class="overflow-hidden w-full md:w-56 order-1">
        <div class="bg-white rounded-md shadow-md flex flex-col gap-2 p-4">

            @forelse ( $online_users as $user )



            <a href="{{route('send.messsage.directly',$user->id)}}" class="flex gap-2 items-center">
                <img src="{{ !empty($user->profile_photo_path)
                            ? url('upload/profilepic/' . $user->profile_photo_path)
                            : url('upload/no_image.jpg') }}" class="w-8 h-8 rounded-full pointer-events-none object-cover">
                <p class="text-gray-900">{{ $user->last_name }} {{ $user->name }}</p>
            </a>

            @empty
            <p class="text-gray-900">Aucun utilisateur online</p>

            @endforelse

        </div>
    </div>
    <div class="p-4 text-left w-full bg-white shadow-md rounded-md flex-1 md:order-1">
        <div class="w-full flex flex-col gap-4">
            @forelse ($threads as $row)
            <div class="flex items-center gap-2 rounded-md px-4 py-2 text-grey-900 {{ $row->userUnreadMessagesCount(Auth::id()) ? 'bg-blue-50' : 'bg-gray-50' }}">
                <a href="{{ route('conversation.talk', $row->id) }}" class="w-full flex flex-col">
                    <span class="text-md text-gray-900 font-black">{{ $row->subject }}</span>
                    <span class="text-xs text-gray-400 font-black">
                        {{ $row->updated_at->diffForHumans() }}
                    </span>
                </a>
                <div class="flex ml-auto md:ml-0">
                    <a href="{{ route('messages.destroy', $row->id) }}" class="flex items-center justify-between cursor-pointer p-1 rounded-md focus:outline-none focus:bg-gray-100 hover:bg-gray-100" aria-label="Delete">
                        <svg class="w-4 h-4" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                            <path d="M13.05 42Q11.85 42 10.95 41.1Q10.05 40.2 10.05 39V10.5H8V7.5H17.4V6H30.6V7.5H40V10.5H37.95V39Q37.95 40.2 37.05 41.1Q36.15 42 34.95 42ZM18.35 34.7H21.35V14.75H18.35ZM26.65 34.7H29.65V14.75H26.65Z">
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="flex flex-col gap-2 rounded-md text-grey-900 bg-gray-50 px-4 py-2">
                <p class="text-md text-gray-900 text-center">
                    Aucun messages trouve.
                </p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection