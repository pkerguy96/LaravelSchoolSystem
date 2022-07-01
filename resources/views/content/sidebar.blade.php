<aside id="sidebar-menu" class="w-full md:w-64 bottom-0 left-0 fixed md:relative bg-blue-500 hidden md:block z-10"
    style="min-height: calc(100vh - 72px)">
    <ul class="flex flex-col gap-2 md:gap-1 p-4">
        <li>
            <a href="{{ route('prof.devoirs') }}"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40 
                        @if (request()->is('Professeur/view/all')) font-black bg-gray-50 bg-opacity-40 @endif
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path
                        d="M14.55 33.5H27.45V30.65H14.55ZM14.55 25.5H33.45V22.65H14.55ZM14.55 17.5H33.45V14.65H14.55ZM9.5 43.2Q7.6 43.2 6.275 41.825Q4.95 40.45 4.95 38.6V9.55Q4.95 7.7 6.275 6.35Q7.6 5 9.5 5H18.6Q19.15 3.25 20.575 2.125Q22 1 24 1Q26 1 27.425 2.125Q28.85 3.25 29.4 5H38.5Q40.45 5 41.775 6.35Q43.1 7.7 43.1 9.55V38.6Q43.1 40.45 41.775 41.825Q40.45 43.2 38.5 43.2ZM24 8.6Q24.85 8.6 25.45 8Q26.05 7.4 26.05 6.55Q26.05 5.75 25.45 5.125Q24.85 4.5 24 4.5Q23.15 4.5 22.55 5.1Q21.95 5.7 21.95 6.55Q21.95 7.4 22.55 8Q23.15 8.6 24 8.6Z" />
                </svg>
                <span class="text-md font-semibold">Liste devoirs</span>
            </a>
        </li>
        <li>
            <a href="{{ route('add.devoir') }}"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                        @if (request()->is('Professeur/Add/Devoirs')) font-black bg-gray-50 bg-opacity-40 @endif 
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M22 34.2H25.95V26H34.2V22.05H25.95V13.8H22V22.05H13.8V26H22ZM9.5 43.05Q7.65 43.05 6.3 41.7Q4.95 40.35 4.95 38.5V9.5Q4.95 7.6 6.3 6.25Q7.65 4.9 9.5 4.9H38.5Q40.4 4.9 41.75 6.25Q43.1 7.6 43.1 9.5V38.5Q43.1 40.35 41.75 41.7Q40.4 43.05 38.5 43.05Z" />
                </svg>
                <span class="text-md font-semibold">Nouveau devoir</span>
            </a>
        </li>
        <li>
            <a href="{{ route('remise.page') }}"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                        @if (request()->is('Professeur/all/Devoirs')) font-black bg-gray-50 bg-opacity-40 @endif    
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M4.95 40.5V16.5Q4.2 16.25 3.575 15.325Q2.95 14.4 2.95 12.75V7.55Q2.95 5.7 4.3 4.325Q5.65 2.95 7.5 2.95H40.5Q42.35 2.95 43.725 4.325Q45.1 5.7 45.1 7.55V12.75Q45.1 14.4 44.45 15.325Q43.8 16.25 43.1 16.5V40.5Q43.1 42.35 41.725 43.75Q40.35 45.15 38.5 45.15H9.5Q7.65 45.15 6.3 43.75Q4.95 42.35 4.95 40.5ZM40.5 12.75Q40.5 12.75 40.5 12.75Q40.5 12.75 40.5 12.75V7.55Q40.5 7.55 40.5 7.55Q40.5 7.55 40.5 7.55H7.5Q7.5 7.55 7.5 7.55Q7.5 7.55 7.5 7.55V12.75Q7.5 12.75 7.5 12.75Q7.5 12.75 7.5 12.75ZM17.4 27.15H30.65V23.75H17.4Z" />
                </svg>
                <span class="text-md font-semibold">Remises</span>
            </a>
        </li>
    </ul>
</aside>
