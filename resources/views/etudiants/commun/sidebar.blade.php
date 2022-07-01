 <!-- sidebar start -->


 <aside id="sidebar" class="w-full md:w-64 fixed md:relative hidden md:block z-10">
     <div class="overflow-y-auto px-3 h-screen bg-gray-800">
         <div class="flex items-center justify-between md:justify-center mx-2 mb-4 h-14">
             <!-- sidebar logo start -->
             <a href="https://flowbite.com" class="flex items-center">
                 <span class="self-center text-2xl text-xl font-bold whitespace-nowrap text-white">Flowbite</span>
             </a>
             <!-- sidebar logo end -->
             <!-- sidebar icon start -->
             <button onclick="trigger(event)" data-target="sidebar" type="button" class="bg-gray-800 md:hidden cursor-pointer flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white md:hidden">
                 <svg class="w-4 h-4 text-gray-400 hover:text-white cursor-pointer pointer-events-none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.775 460.775">
                     <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55  c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55  c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505  c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55  l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719  c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z" />
                 </svg>
             </button>
             <!-- sidebar icon end -->
         </div>
         <!-- sidebar menu start -->
         <ul class="space-y-2">
             <li>
                 <button onclick="trigger(event)" data-target="devs" type="button" class="flex items-center p-2 w-full text-base font-normal rounded-lg transition duration-75 text-white hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                     <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="flex-1 ml-3 text-left whitespace-nowrap pointer-events-none">Devoirs</span>
                     <svg class="w-6 h-6 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                     </svg>
                 </button>
                 <ul id="devs" class="hidden py-2 space-y-2">
                     <li>
                         <a href="{{ route('prof.devoirs') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 text-white hover:bg-gray-700">Liste</a>
                     </li>
                     <li>
                         <a href="{{ route('add.devoir') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 text-white hover:bg-gray-700">Nouveau</a>
                     </li>
                 </ul>
             </li>
             <li>
                 <a href="#" class="flex items-center p-2 w-full text-base font-normal rounded-lg transition duration-75 text-white hover:bg-gray-700">
                     <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                     </svg>
                     <span class="flex-1 ml-3 text-left whitespace-nowrap pointer-events-none">Remise</span>
                 </a>
             </li>
         </ul>
         <!-- sidebar menu end -->
     </div>
 </aside>
 <!-- sidebar end -->