<aside id="sidebar-menu" class="w-full md:w-64 bottom-0 left-0 fixed md:relative bg-blue-500 hidden md:block z-10"
    style="min-height: calc(100vh - 72px)">
    <ul class="flex flex-col gap-2 md:gap-1 p-4">
        <li>
            <button data-element-trigger data-target="#menu-1"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40 
                        @if (request()->is('Admin/view/etudient') || request()->is('Admin/ajoute/etudient')) font-black bg-gray-50 bg-opacity-40 @endif
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path
                        d="M1.1 41.5v-5.8q0-2.1 1.075-3.775Q3.25 30.25 5.15 29.4q3.75-1.6 6.775-2.35 3.025-.75 6.225-.75 3.3 0 6.3.75t6.75 2.35q1.9.8 3 2.45 1.1 1.65 1.1 3.85v5.8Zm37.75 0v-5.7q0-3.25-1.625-5.4-1.625-2.15-4.275-4 3 .5 5.65 1.225 2.65.725 4.45 1.575 1.75.95 2.825 2.675Q46.95 33.6 46.95 35.95v5.55ZM18.2 23.3q-3.6 0-5.775-2.175Q10.25 18.95 10.25 15.4q0-3.6 2.2-5.8 2.2-2.2 5.75-2.2 3.5 0 5.75 2.2t2.25 5.75q0 3.6-2.25 5.775Q21.7 23.3 18.2 23.3Zm11.35 0q-.65 0-1.175-.075T27.15 22.9q1.3-1.35 1.925-3.25t.625-4.25q0-2.4-.625-4.225Q28.45 9.35 27.15 7.8q.55-.2 1.2-.3.65-.1 1.2-.1 3.5 0 5.725 2.225Q37.5 11.85 37.5 15.35q0 3.55-2.225 5.75t-5.725 2.2Z" />
                </svg>
                <span class="text-md font-semibold">Etudients</span>
                <svg class="text-white w-6 h-6 ml-auto" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path d="M24 31.8 10.9 18.7 14.2 15.45 24 25.35 33.85 15.5 37.1 18.75Z" />
                </svg>
            </button>
            <ul id="menu-1" class="hidden py-2 space-y-2 w-11/12 ml-auto">
                <li>
                    <a href="{{ route('etudient.list') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                        @if (request()->is('Admin/view/etudient')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M5.6 39.95V38.3h4.2v-1.35H7.7V35.3h2.1v-1.35H5.6V32.3h6.5v7.65Zm10.2-1.65v-4.55h27.1v4.55ZM5.15 27.85v-1.6l3.3-3.85h-3.3v-2.25h6.95v1.6L8.75 25.6h3.35v2.25ZM15.8 26.2v-4.55h27.1v4.55ZM7.7 15.8v-5.55H5.6v-2.2H10v7.75Zm8.1-1.75V9.5h27.1v4.55Z" />
                        </svg>
                        <span class="text-md font-semibold">Liste</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cree.etudient') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                        @if (request()->is('Admin/ajoute/etudient')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M22 34.2h3.95V26h8.25v-3.95h-8.25V13.8H22v8.25h-8.2V26H22ZM9.45 43.1q-1.85 0-3.2-1.35t-1.35-3.2V9.45q0-1.9 1.35-3.25t3.2-1.35h29.1q1.9 0 3.25 1.35t1.35 3.25v29.1q0 1.85-1.35 3.2t-3.25 1.35Z" />
                        </svg>
                        <span class="text-md font-semibold">Nouveau</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <button data-element-trigger data-target="#menu-2"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40 
                        @if (request()->is('Admin/view/Professor') || request()->is('Admin/Add/Professor')) font-black bg-gray-50 bg-opacity-40 @endif
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M35.4 29.6q-2.4 0-3.975-1.575Q29.85 26.45 29.85 24.1q0-2.35 1.575-3.925Q33 18.6 35.35 18.6q2.35 0 3.9 1.575 1.55 1.575 1.55 3.875 0 2.4-1.55 3.975Q37.7 29.6 35.4 29.6ZM24.75 41.5v-3.3q0-1.55.675-2.675.675-1.125 1.925-1.775 1.85-.85 3.9-1.325t4.15-.475q2 0 3.975.475T43.3 33.75q1.2.65 1.925 1.775.725 1.125.725 2.675v3.3ZM19.2 23.35q-3.8 0-6.2-2.4-2.4-2.4-2.4-6.2 0-3.8 2.4-6.2 2.4-2.4 6.2-2.4 3.8 0 6.25 2.4t2.45 6.2q0 3.8-2.45 6.2-2.45 2.4-6.25 2.4ZM2.15 41.5v-5.8q0-2.05 1.05-3.725 1.05-1.675 3-2.575 3.45-1.55 6.625-2.325Q16 26.3 19.2 26.3q1.7 0 3.125.175T25.45 27l-3.8 3.95q-.6.7-.3 1.5t.3 4.5v4.55Z" />
                </svg>
                <span class="text-md font-semibold">Professeurs</span>
                <svg class="text-white w-6 h-6 ml-auto" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path d="M24 31.8 10.9 18.7 14.2 15.45 24 25.35 33.85 15.5 37.1 18.75Z" />
                </svg>
            </button>
            <ul id="menu-2" class="hidden py-2 space-y-2 w-11/12 ml-auto">
                <li>
                    <a href="{{ route('professor.list') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                            @if (request()->is('Admin/view/Professor')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M5.6 39.95V38.3h4.2v-1.35H7.7V35.3h2.1v-1.35H5.6V32.3h6.5v7.65Zm10.2-1.65v-4.55h27.1v4.55ZM5.15 27.85v-1.6l3.3-3.85h-3.3v-2.25h6.95v1.6L8.75 25.6h3.35v2.25ZM15.8 26.2v-4.55h27.1v4.55ZM7.7 15.8v-5.55H5.6v-2.2H10v7.75Zm8.1-1.75V9.5h27.1v4.55Z" />
                        </svg>
                        <span class="text-md font-semibold">Liste</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('add.professeur') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                            @if (request()->is('Admin/Add/Professor')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M22 34.2h3.95V26h8.25v-3.95h-8.25V13.8H22v8.25h-8.2V26H22ZM9.45 43.1q-1.85 0-3.2-1.35t-1.35-3.2V9.45q0-1.9 1.35-3.25t3.2-1.35h29.1q1.9 0 3.25 1.35t1.35 3.25v29.1q0 1.85-1.35 3.2t-3.25 1.35Z" />
                        </svg>
                        <span class="text-md font-semibold">Nouveau</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <button data-element-trigger data-target="#menu-3"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40 
                        @if (request()->is('Admin/View/Modules') || request()->is('Admin/Add/Modules')) font-black bg-gray-50 bg-opacity-40 @endif
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M11 22.9 24.05 1.85l13 21.05Zm25.3 23.15q-4.05 0-6.925-2.85t-2.875-7q0-4.05 2.85-6.95 2.85-2.9 6.95-2.9t6.95 2.9q2.85 2.9 2.85 6.95 0 4.15-2.85 7-2.85 2.85-6.95 2.85ZM3.25 44.8V27.3H20.7v17.5Z" />
                </svg>
                <span class="text-md font-semibold">Modules</span>
                <svg class="text-white w-6 h-6 ml-auto" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path d="M24 31.8 10.9 18.7 14.2 15.45 24 25.35 33.85 15.5 37.1 18.75Z" />
                </svg>
            </button>
            <ul id="menu-3" class="hidden py-2 space-y-2 w-11/12 ml-auto">
                <li>
                    <a href="{{ route('module.list') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                             @if (request()->is('Admin/View/Modules')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M5.6 39.95V38.3h4.2v-1.35H7.7V35.3h2.1v-1.35H5.6V32.3h6.5v7.65Zm10.2-1.65v-4.55h27.1v4.55ZM5.15 27.85v-1.6l3.3-3.85h-3.3v-2.25h6.95v1.6L8.75 25.6h3.35v2.25ZM15.8 26.2v-4.55h27.1v4.55ZM7.7 15.8v-5.55H5.6v-2.2H10v7.75Zm8.1-1.75V9.5h27.1v4.55Z" />
                        </svg>
                        <span class="text-md font-semibold">Liste</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('add.module') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                             @if (request()->is('Admin/Add/Modules')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M22 34.2h3.95V26h8.25v-3.95h-8.25V13.8H22v8.25h-8.2V26H22ZM9.45 43.1q-1.85 0-3.2-1.35t-1.35-3.2V9.45q0-1.9 1.35-3.25t3.2-1.35h29.1q1.9 0 3.25 1.35t1.35 3.25v29.1q0 1.85-1.35 3.2t-3.25 1.35Z" />
                        </svg>
                        <span class="text-md font-semibold">Nouveau</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <button data-element-trigger data-target="#menu-4"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40 
                        @if (request()->is('Admin/List/Devoirs') || request()->is('Admin/Add/Devoirs')) font-black bg-gray-50 bg-opacity-40 @endif
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M7.5 41q-1.85 0-3.2-1.35t-1.35-3.2V11q0-1.85 1.35-3.225T7.5 6.4h13.15l3.4 3.4H40.5q1.9 0 3.25 1.375T45.1 14.4H7.5v22.3l5.1-19.3h35.5l-5.15 19.3q-.75 2.4-2.15 3.35-1.4.95-3.8.95Z" />
                </svg>
                <span class="text-md font-semibold">Devoirs</span>
                <svg class="text-white w-6 h-6 ml-auto" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path d="M24 31.8 10.9 18.7 14.2 15.45 24 25.35 33.85 15.5 37.1 18.75Z" />
                </svg>
            </button>
            <ul id="menu-4" class="hidden py-2 space-y-2 w-11/12 ml-auto">
                <li>
                    <a href="{{ route('list.devoirs') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                            @if (request()->is('Admin/List/Devoirs')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M5.6 39.95V38.3h4.2v-1.35H7.7V35.3h2.1v-1.35H5.6V32.3h6.5v7.65Zm10.2-1.65v-4.55h27.1v4.55ZM5.15 27.85v-1.6l3.3-3.85h-3.3v-2.25h6.95v1.6L8.75 25.6h3.35v2.25ZM15.8 26.2v-4.55h27.1v4.55ZM7.7 15.8v-5.55H5.6v-2.2H10v7.75Zm8.1-1.75V9.5h27.1v4.55Z" />
                        </svg>
                        <span class="text-md font-semibold">Liste</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ajoute.devoir') }}"
                        class="flex items-center text-white gap-2 p-2 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                            @if (request()->is('Admin/Add/Devoirs')) font-black bg-gray-50 bg-opacity-40 @endif
                        ">
                        <svg class="text-white w-5 h-5" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48">
                            <path
                                d="M22 34.2h3.95V26h8.25v-3.95h-8.25V13.8H22v8.25h-8.2V26H22ZM9.45 43.1q-1.85 0-3.2-1.35t-1.35-3.2V9.45q0-1.9 1.35-3.25t3.2-1.35h29.1q1.9 0 3.25 1.35t1.35 3.25v29.1q0 1.85-1.35 3.2t-3.25 1.35Z" />
                        </svg>
                        <span class="text-md font-semibold">Nouveau</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.notification') }}"
                class="flex items-center text-white gap-2 p-3 w-full rounded-md focus:outline-none focus:bg-gray-100 focus:bg-opacity-40 hover:bg-gray-50 hover:bg-opacity-40
                        @if (request()->is('Admin/Notifications')) font-black bg-gray-50 bg-opacity-40 @endif    
                    ">
                <svg class="text-white w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 48 48">
                    <path
                        d="M24 36.7q1.05 0 1.775-.725.725-.725.775-1.775H21.4q.05 1.05.8 1.775.75.725 1.8.725Zm-9.35-5.6H33.3v-2.45h-2V22.7q0-3-1.55-5.4-1.55-2.4-4.35-3v-1.65q0-.55-.4-.975-.4-.425-1-.425-.7 0-1.075.4t-.375 1v1.65q-2.7.6-4.3 2.9-1.6 2.3-1.6 5.15v6.3h-2Zm9.4 13.95q-4.45 0-8.35-1.6-3.9-1.6-6.725-4.425Q6.15 36.2 4.55 32.3q-1.6-3.9-1.6-8.35 0-4.4 1.6-8.25 1.6-3.85 4.425-6.7Q11.8 6.15 15.7 4.525 19.6 2.9 24.05 2.9q4.4 0 8.25 1.625Q36.15 6.15 39 9q2.85 2.85 4.475 6.7Q45.1 19.55 45.1 24q0 4.4-1.625 8.3Q41.85 36.2 39 39.025q-2.85 2.825-6.7 4.425-3.85 1.6-8.25 1.6Z" />
                </svg>
                <span class="text-md font-semibold">Notifications</span>
            </a>
        </li>
    </ul>
</aside>
