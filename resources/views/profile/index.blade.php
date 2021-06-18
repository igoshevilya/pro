@extends('templates.default')
@section('content')

    <main class="max-w-7xl mx-auto sm:px-6 py-4 lg:px-8">
        <!-- Card profile --> 
        <div class="bg-white px-6 py-2 mb-4  rounded-lg md:p-0 overflow-hidden">
            <div class="mt-6 md:flex md:p-0 md:mt-0 ">
                @if (!empty($user->avatar->image))
                <img class="w-32 h-32  mx-auto rounded-full object-cover lg:mx-0 md:w-48 lg:w-1/4 md:h-auto md:rounded-none"
                src="{{ asset('/') . $user->avatar->image }}" alt="">
            @else
            <div class="py-4 px-10">
                <svg class=" w-32 h-32 md:w-48 mx-auto md:h-auto text-indigo-700" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                    y="0px" viewBox="0 0 45.532 45.532" xml:space="preserve">
                    <path xmlns="http://www.w3.org/2000/svg" fill="#4f46e5" id="svg_2"
                        d="m22.766,0.001c-12.572,0 -22.766,10.192 -22.766,22.765s10.193,22.765 22.766,22.765c12.574,0 22.766,-10.192 22.766,-22.765s-10.192,-22.765 -22.766,-22.765zm0,6.807c4.16,0 7.531,3.372 7.531,7.53c0,4.159 -3.371,7.53 -7.531,7.53c-4.158,0 -7.529,-3.371 -7.529,-7.53c0,-4.158 3.371,-7.53 7.529,-7.53zm-0.005,32.771c-4.149,0 -7.949,-1.511 -10.88,-4.012c-0.714,-0.609 -1.126,-1.502 -1.126,-2.439c0,-4.217 3.413,-7.592 7.631,-7.592l8.762,0c4.219,0 7.619,3.375 7.619,7.592c0,0.938 -0.41,1.829 -1.125,2.438c-2.93,2.502 -6.731,4.013 -10.881,4.013z" />
                </svg>
            </div>
            @endif
                
                <div class="pt-6 text-center space-y-4 md:p-8 md:text-left lg:p-8 lg:pl-12">
                    <h1 class="text-3xl font-bold text-primary">{{ $user->getName() }}</h1>
                    @if(!empty($user->photographer->spec))
                    <span class="text-sm text-gray- 400 font-light">{{$user->photographer->spec}}</span>
                    @endif
                    @if(!empty($user->userprofile->description))
                    <p class="text-md text-gray-500 font-light">{{$user->userprofile->description}}</p> 
                    @endif  
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <!-- Aside -->
            <div class="col-span-1 ">
                <div class="bg-white rounded-lg lg:space-y-4 px-6 py-8">


                   <div class="grid lg:grid-cols-1 mt-2 grid-cols-2 gap-2 lg:place-items-center">
                    @if(!empty($user->phone))
                    <div class="items-center flex flex-grow-0">
                            
                        <span class="font-medium px-4 py-2 flex  items-center rounded-full  bg-indigo-500 text-white border border-indigo-500 undefined ">
                              <svg class="icon line" width="20" height="20" id="phone" xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 24 24">
                                  <path
                                      d="M21,15v3.93a2,2,0,0,1-2.29,2A18,18,0,0,1,3.14,5.29,2,2,0,0,1,5.13,3H9a1,1,0,0,1,1,.89,10.74,10.74,0,0,0,1,3.78,1,1,0,0,1-.42,1.26l-.86.49a1,1,0,0,0-.33,1.46,14.08,14.08,0,0,0,3.69,3.69,1,1,0,0,0,1.46-.33l.49-.86A1,1,0,0,1,16.33,13a10.74,10.74,0,0,0,3.78,1A1,1,0,0,1,21,15Z"
                                      style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.5;">
                                  </path>
                              </svg>
                              {{$user->phone}}                              
                            </span>
    
                            
                        </div>
                  
                    
                          
                        @endif
                        @if($type == 2)
                        
                        <div class="flex mt-2 text-white text-md sm:text-gray-500">
                            @if(!empty($user->photographer->vk))
                                <a href="https://vk.com/{{$user->photographer->vk}}" class=" text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Vk</span>
                                   
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path xmlns="http://www.w3.org/2000/svg" d="M15.684 0H8.316C1.592 0 0 1.592 0 8.316v7.368C0 22.408 1.592 24 8.316 24h7.368C22.408 24 24 22.408 24 15.684V8.316C24 1.592 22.391 0 15.684 0zm3.692 17.123h-1.744c-.66 0-.864-.525-2.05-1.727-1.033-1-1.49-1.135-1.744-1.135-.356 0-.458.102-.458.593v1.575c0 .424-.135.678-1.253.678-1.846 0-3.896-1.118-5.335-3.202C4.624 10.857 4.03 8.57 4.03 8.096c0-.254.102-.491.593-.491h1.744c.44 0 .61.203.78.677.863 2.49 2.303 4.675 2.896 4.675.22 0 .322-.102.322-.66V9.721c-.068-1.186-.695-1.287-.695-1.71 0-.204.17-.407.44-.407h2.744c.373 0 .508.203.508.643v3.473c0 .372.17.508.271.508.22 0 .407-.136.813-.542 1.254-1.406 2.151-3.574 2.151-3.574.119-.254.322-.491.763-.491h1.744c.525 0 .644.27.525.643-.22 1.017-2.354 4.031-2.354 4.031-.186.305-.254.44 0 .78.186.254.796.779 1.203 1.253.745.847 1.32 1.558 1.473 2.05.17.49-.085.744-.576.744z"/>
                                    </svg>
                                </a>
                                @endif 
                                @if(!empty($user->photographer->inst))       
                                <a href="https://www.instagram.com/{{$user->photographer->inst}}" class="ml-3 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path xmlns="http://www.w3.org/2000/svg" d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                    </svg>
                                </a>
                                @endif 
                                @if(!empty($user->photographer->fb))
                                <a href="https://www.facebook.com/{{$user->photographer->fb}}" class="ml-3 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path xmlns="http://www.w3.org/2000/svg" d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"/>
                                    </svg>
                                </a>
                                @endif 
                        </div>
                        @endif
                   </div>
                   
                    <div class="mt-2 grid grid-cols-2 gap-1 lg:grid-cols-1">
                        @if(!empty($user->city))  <div>Город: <span class="font-medium text-gray-900">{{$user->city}}</span></div>
                        @endif
                        @if($type == 2)
                            <div>Опыт: <span class="font-medium text-gray-900">{{ $user->ExperienceUser()  }}</span></div>
                            @if(!empty($user->photographer->price)) 
                            <div>Стоимость работы: <span class="font-medium text-gray-900">{{$user->photographer->price}} ₽/час</span></div>                        
                            @endif 
                        @endif
                        @if($type == 1)
                        <div>Создано заданий: 10</div>
                        <div>Возраст: 18 лет</div>                       
                        @endif
                       
                       
                       
                       
                    </div>  
                </div>
            </div>





            
            <div class="lg:col-span-3">
     

                <!-- Projects -->
                <div class="bg-white px-6 py-8 mb-4  rounded-lg row-span-2">
                    <div id="app">
                        @if($type == 2)
                        <profile/>
                        @endif
                        @if($type == 1)
                        @if($user->review->isEmpty())
                        <h3 class="text-xl">Еще нет отзывов</h3>
                        @else
                        <h3 class="text-xl">Отзывы фотографов:</h3>
                        <reviewclient-profile/>
                        @endif
                        @endif
                        
                   
                      
                       
                      
                    </div>                  
                 </div>
            </div>

        </div>
    </main>
@endsection
