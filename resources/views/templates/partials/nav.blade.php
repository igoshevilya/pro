<header class="">
    <nav x-data="{ open: false }" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/">
                            <img class="block lg:hidden h-12 w-auto" src="{{ asset('/image/logo.svg') }}" alt="Disigo">
                            <img class="hidden lg:block h-12 w-auto" src="{{ asset('/image/logo-text.svg') }}"
                                alt="Disigo">
                        </a>
                    </div>
                    
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                          @role('photographer')
                            <a href="{{ route('myresponses.ph') }}"
                                class="{{ request()->is('ph/myorder*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Мои заказы
                            </a>
                            <a href="{{ route('order.order') }}"
                                class="{{ request()->is('ph/order*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Поиск заказа
                            </a>
                            <a href="{{ route('gallery') }}"
                                class="{{ request()->is('ph/myprofile*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Мой профиль
                            </a>                            
                            @endrole 
                            @role('user')
                            <a href="{{route('order.create')}}" class="{{ request()->is('order/create*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                              Создать задание
                            </a> 
                            <a href="{{route('myorder.client')}}" class="{{ request()->is('myorder/published*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                              Мои задания
                            </a>
                            <a href="{{route('catalog')}}" class="{{ request()->is('catalog*') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}    inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                              Каталог фотографов
                            </a>
                            @endrole 
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center z-50">
                       @auth
                      

                        <div class="flex ">
                            <div x-data="{ dropdownOpen: false }" class="relative my-32">
                                <button @click="dropdownOpen = !dropdownOpen" class="text-gray-400 relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                                </button>
                        
                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                        
                                <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
                                    <div class="py-2">
                                        @foreach (Auth::user()->unreadNotifications  as $notification) 
                                        <div class="flex items-center mt-3 hover:bg-gray-100 rounded-lg px-1 py-1">
                                            
                                            <div class="ml-3">
                                                <span class="font-medium text-sm">{{$notification->data['user']}}</span>
                                                <p class="text-sm">{{$notification->data['message']}}</p>
                                                <span class="text-sm text-indigo-400 font-semibold">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div> 
                                                                                 
                                        </div>

                                        
                                        @endforeach                                       
                                    </div>
                                    <a href="{{route('clear')}}" class="block bg-gray-800 text-white text-center font-medium py-2">Пометить все прочитанными</a>
                                </div>
                            </div>
                        </div>
                      
                        <!-- Profile dropdown -->
                        <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"
                            class="ml-3 relative ">
                            <div>
                                <button type="button"
                                    class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="user-menu" aria-expanded="false" @click="open = !open" aria-haspopup="true"
                                    x-bind:aria-expanded="open">
                                    <span class="sr-only">Открыть меню пользователя</span>

                                    @if (Auth::user()->avatar)
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ asset('/') . Auth::user()->avatar->thumbnail }}" alt="">
                                    @else

                                        <svg class="h-8 w-8 text-indigo-700" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                            y="0px" viewBox="0 0 45.532 45.532" xml:space="preserve">
                                            <path xmlns="http://www.w3.org/2000/svg" fill="#4f46e5" id="svg_2"
                                                d="m22.766,0.001c-12.572,0 -22.766,10.192 -22.766,22.765s10.193,22.765 22.766,22.765c12.574,0 22.766,-10.192 22.766,-22.765s-10.192,-22.765 -22.766,-22.765zm0,6.807c4.16,0 7.531,3.372 7.531,7.53c0,4.159 -3.371,7.53 -7.531,7.53c-4.158,0 -7.529,-3.371 -7.529,-7.53c0,-4.158 3.371,-7.53 7.529,-7.53zm-0.005,32.771c-4.149,0 -7.949,-1.511 -10.88,-4.012c-0.714,-0.609 -1.126,-1.502 -1.126,-2.439c0,-4.217 3.413,-7.592 7.631,-7.592l8.762,0c4.219,0 7.619,3.375 7.619,7.592c0,0.938 -0.41,1.829 -1.125,2.438c-2.93,2.502 -6.731,4.013 -10.881,4.013z" />
                                        </svg>

                                    @endif
                                </button>
                            </div>
                            
                            <transition enter-active-class="transition ease-out duration-200"
                                enter-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <div x-description="Dropdown menu, show/hide based on menu state." x-show="open"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu"
                                    style="display: none;">
                                    <a href="{{ route('profile.index',Auth::user()->user) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">{{Auth::user()->getName()}}</a>
                                    <a href="{{ route('setting') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Настройки</a>
                                    <a href="{{ route('get-logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Выйти</a>
                                </div>
                            </transition>

                        </div>
                    @endauth
                    @guest
                        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 z-50">
                            <a href="{{ route('login') }}"
                                class="whitespace-nowrap text-sm  text-gray-500 hover:text-gray-900">
                                Войти
                            </a>
                            <a href="{{ route('register') }}"
                                class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-3 border border-transparent rounded-full shadow-sm text-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Зарегистрироваться
                            </a>
                        </div>

                    @endguest
                </div>


                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                        x-bind:aria-expanded="open.toString()">
                        <span class="sr-only">Открыть меню пользователя</span>
                        <svg x-description="Icon when menu is closed.

Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                            :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-description="Icon when menu is open.

Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                            :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>











        <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu"
            x-show="open" style="display: none;">

            <div class="pt-2 pb-3 space-y-1">
              @role('photographer')
                <a href="{{ route('myresponses.ph') }}"
                    class="{{ request()->is('ph/myorder*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">Мои
                    заказы</a>
                <a href="{{ route('order.order') }}"
                    class="{{ request()->is('ph/order*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">Поиск
                    заказа</a>
                <a href="{{ route('gallery') }}"
                    class="{{ request()->is('ph/gallery*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">Мой
                    профиль</a>
                    @endrole 
                    @role('user')
                    <a href="{{ route('order.create') }}"
                    class="{{ request()->is('order/create*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">
                    Создать задание</a>
                <a href="{{ route('myorder.client') }}"
                    class="{{ request()->is('/myorder*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">
                    Мои задания</a>
                <a href="{{ route('order.create') }}"
                    class="{{ request()->is('ph/gallery*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} text-base font-medium border-l-4 block pl-3 pr-4 py-2 ">
                    Каталог фотографов</a>

                  
                    @endrole 
            </div>

            <div class="pt-4 pb-3 border-t border-gray-200">
                @auth
                    <div class="flex items-center px-4">

                        <div class="flex-shrink-0">
                            @if (Auth::user()->avatar)
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ asset('/') . Auth::user()->avatar->thumbnail }}" alt="">
                            @else

                                <svg class="h-8 w-8 text-indigo-700" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 45.532 45.532" xml:space="preserve">
                                    <path xmlns="http://www.w3.org/2000/svg" fill="#4f46e5" id="svg_2"
                                        d="m22.766,0.001c-12.572,0 -22.766,10.192 -22.766,22.765s10.193,22.765 22.766,22.765c12.574,0 22.766,-10.192 22.766,-22.765s-10.192,-22.765 -22.766,-22.765zm0,6.807c4.16,0 7.531,3.372 7.531,7.53c0,4.159 -3.371,7.53 -7.531,7.53c-4.158,0 -7.529,-3.371 -7.529,-7.53c0,-4.158 3.371,-7.53 7.529,-7.53zm-0.005,32.771c-4.149,0 -7.949,-1.511 -10.88,-4.012c-0.714,-0.609 -1.126,-1.502 -1.126,-2.439c0,-4.217 3.413,-7.592 7.631,-7.592l8.762,0c4.219,0 7.619,3.375 7.619,7.592c0,0.938 -0.41,1.829 -1.125,2.438c-2.93,2.502 -6.731,4.013 -10.881,4.013z" />
                                </svg>

                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->getName() }}</div>

                        </div>
                        <button>
                           
                        </button>
                        <div class=" ">
                            <div x-data="{ dropdownOpen: false }" class="">
                                <button @click="dropdownOpen = !dropdownOpen" class="text-gray-400 relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                                </button>
                        
                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                        
                                <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
                                    <div class="py-2">
                                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                            <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold" href="#">Sara Salah</span> replied on the <span class="font-bold text-blue-500" href="#">Upload Image</span> artical . 2m
                                            </p>
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                            <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="avatar">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                            </p>
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                            <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span class="font-bold text-blue-500" href="#">Test with TDD</span> artical . 1h
                                            </p>
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2">
                                            <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80" alt="avatar">
                                            <p class="text-gray-600 text-sm mx-2">
                                                <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                            </p>
                                        </a>
                                    </div>
                                    <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
    

                <div class="mt-3 space-y-1">

                    <a href="#"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Настройки</a>
                    <a href="{{ route('get-logout') }}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Выйти</a>
                </div>
                @endauth
                @guest
                <div class="mt-3 space-y-1">
                    <a href="{{ route('login') }}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Войти
                    </a>
                    <a href="{{ route('register') }}"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Зарегистрироваться
                    </a>
                </div>

            @endguest
            </div>
        </div>
        
    </nav>

 
    


</header>
