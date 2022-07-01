@php
$id = Auth::user()->id;
$data = App\Models\professeur::find($id);
@endphp
<header class="bg-blue-500 text-white shadow-md relative z-20">
    <nav class="flex flex-wrap items-center mx-auto md:gap-4 justify-between">
        <div class="w-max md:w-64 ml-4 md:ml-0 flex items-center justify-center gap-4 py-4">
            <button data-element-trigger data-target="#sidebar-menu" data-mutable="#sidebar-show|#sidebar-hide"
                class="md:hidden flex items-center justify-center rounded-md text-white">
                <svg id="sidebar-show" class="block h-6 w-6 pointer-events-none" fill="currentcolor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path d="M6 36V33H42V36ZM6 25.5V22.5H42V25.5ZM6 15V12H42V15Z"></path>
                </svg>
                <svg id="sidebar-hide" class="h-6 w-6 pointer-events-none hidden" fill="currentcolor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path
                        d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z">
                    </path>
                </svg>
            </button>
            <div class="flex flex-no-shrink items-center">
                <a href="#" class="font-black text-xl tracking-tight">
                    <div class="flex gap-2 items-center">
                        <svg class="text-white w-10 h-10" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M23.95 42.2 9.1 34.15V22.35L1.25 18.1L23.95 5.7L46.75 18.1V34.25H42.75V20.4L38.85 22.35V34.15ZM23.95 25.95 38.25 18.1 23.95 10.4 9.75 18.1ZM23.95 37.7 34.8 31.7V24.75L23.95 30.45L13.1 24.65V31.7ZM24 25.95ZM23.95 29.95ZM23.95 29.95Z" />
                        </svg>
                        <h1 class="text-lg text-white font-bold text-center">SCHOOL System</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex gap-4 mr-4">
            <div class="md:relative flex items-center">
                <button data-element-trigger data-target="#navbar-account-menu"
                    class="flex items-center justify-center rounded-md text-white">
                    <img class="w-8 h-8 rounded-full pointer-events-none object-cover"
                        src="
							{{ !empty($data->profile_photo_path) ? url('upload/profilepic/' . $data->profile_photo_path) : url('upload/no_image.jpg') }}
						">
                </button>
                <div id="navbar-account-menu"
                    class="absolute right-0 top-16 md:top-8 mt-1 min-w-full md:min-w-min w-48 rounded-md shadow-md bg-white p-2 hidden"
                    role="menu">
                    <a href="{{ route('profile.user') }}"
                        class="flex items-center gap-2 p-2 text-gray-900 rounded-md cursor-pointer focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-100 hover:bg-opacity-40
                            @if (request()->is('Professeur/profile/edit')) font-black bg-gray-100 bg-opacity-40 @endif
                        ">
                        <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M28.4 27.05H36.8V24.65H28.4ZM28.4 32.65H36.8V30.25H28.4ZM30.35 12.85H40.5Q42.4 12.85 43.75 14.2Q45.1 15.55 45.1 17.45V40.5Q45.1 42.35 43.75 43.7Q42.4 45.05 40.5 45.05H7.5Q5.65 45.05 4.3 43.7Q2.95 42.35 2.95 40.5V17.45Q2.95 15.55 4.3 14.2Q5.65 12.85 7.5 12.85H17.75V7.05Q17.75 5.45 19 4.175Q20.25 2.9 21.85 2.9H26.2Q27.8 2.9 29.075 4.175Q30.35 5.45 30.35 7.05ZM22.3 15.7H25.75V7.5H22.3ZM17.75 30.25Q18.85 30.25 19.6 29.475Q20.35 28.7 20.35 27.55Q20.35 26.45 19.6 25.7Q18.85 24.95 17.7 24.95Q16.6 24.95 15.825 25.7Q15.05 26.45 15.05 27.6Q15.05 28.7 15.825 29.475Q16.6 30.25 17.75 30.25ZM11.65 36H23.5V35.35Q23.5 34.45 23.05 33.75Q22.6 33.05 21.95 32.85Q20.35 32.3 19.45 32.125Q18.55 31.95 17.7 31.95Q16.75 31.95 15.7 32.175Q14.65 32.4 13.3 32.85Q12.55 33.1 12.1 33.75Q11.65 34.4 11.65 35.35Z" />
                        </svg>
                        <span class="text-sm">Profile</span>
                    </a>
                    <a href="{{ route('prof.settings') }}"
                        class="flex items-center gap-2 p-2 text-gray-900 rounded-md cursor-pointer focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-100 hover:bg-opacity-40
                            @if (request()->is('Professeur/profile/Settings')) font-black bg-gray-100 bg-opacity-40 @endif
                        ">
                        <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M18.45 45.05 17.4 38.4Q16.7 38.2 15.85 37.7Q15 37.2 14.45 36.75L8.25 39.6L2.6 29.6L8.25 25.5Q8.2 25.25 8.2 24.775Q8.2 24.3 8.2 24Q8.2 23.7 8.2 23.275Q8.2 22.85 8.25 22.5L2.6 18.3L8.25 8.4L14.55 11.25Q15.05 10.9 15.9 10.4Q16.75 9.9 17.4 9.7L18.45 2.9H29.6L30.6 9.65Q31.35 9.85 32.175 10.35Q33 10.85 33.55 11.25L39.85 8.4L45.45 18.3L39.7 22.35Q39.75 22.75 39.825 23.2Q39.9 23.65 39.9 24Q39.9 24.35 39.825 24.775Q39.75 25.2 39.7 25.55L45.45 29.6L39.75 39.6L33.55 36.75Q33 37.2 32.125 37.725Q31.25 38.25 30.65 38.4L29.6 45.05ZM23.95 30.35Q26.6 30.35 28.45 28.5Q30.3 26.65 30.3 24Q30.3 21.4 28.45 19.525Q26.6 17.65 23.95 17.65Q21.25 17.65 19.425 19.525Q17.6 21.4 17.6 24Q17.6 26.65 19.425 28.5Q21.25 30.35 23.95 30.35Z" />
                        </svg>
                        <span class="text-sm">Réglages</span>
                    </a>
                    <a href="{{ route('admin.logout') }}"
                        class="flex items-center gap-2 p-2 text-gray-900 rounded-md cursor-pointer focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-100 hover:bg-opacity-40">
                        <svg class="text-grey-900 w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M9.05 43.15Q7.15 43.15 5.8 41.8Q4.45 40.45 4.45 38.6V9.4Q4.45 7.5 5.8 6.15Q7.15 4.8 9.05 4.8H23.9V9.4H9.05Q9.05 9.4 9.05 9.4Q9.05 9.4 9.05 9.4V38.6Q9.05 38.6 9.05 38.6Q9.05 38.6 9.05 38.6H23.9V43.15ZM33.4 34.3 30.1 31.15 34.95 26.3H18.2V21.75H34.85L30 16.9L33.3 13.7L43.6 24.05Z" />
                        </svg>
                        <span class="text-sm">Déconnecter</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
