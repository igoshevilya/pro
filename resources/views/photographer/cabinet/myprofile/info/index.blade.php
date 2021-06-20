@extends('templates.default')
@section('content')
@include('photographer.cabinet.myprofile.partials.nav')

<div id="app" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <p class="my-2 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-3xl">
    Редактирование профиля
</p>
  <div class="max-w-7xl mt-6 rounded-lg mx-auto bg-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="">




          <form class="form-horizontal" id="form1" method="POST" action="{{ route('postform') }}">
            {{ csrf_field() }}
          <!-- Step Content -->
          <div class="py-10">	
           
  
                         
              <div class="mb-5">
                <label for="spec" class="font-medium mb-1 text-gray-700 block">Основная специальность*</label>
                <input id="spec" name="spec" type="text"
                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                  placeholder="Свадебный фотограф" required>
              </div>
  
                          <label for="firstname" class="font-medium mb-1 text-gray-700 block">Выберите категории, в которых вы проводите фотосъемки</label>
                          <div class="mb-5 grid sm:grid-cols-3 gap-2 place-items-stretch">
                          
                          @foreach ($categories as $category)
                          
                          <label class="items-center">
                              <div class="border rounded-md bg-white m-1 p-3">                    
                              <input type="checkbox" name="category[]" value="{{$category->title}}" class="form-checkbox h-5 w-5 text-indigo-600">
                              <span class="ml-2 text-gray-700">{{ $category->title }}</span>       
                              </div>                     
                          </label>
                          @endforeach
                          </div>
  
              <div class="mb-5">
                <label for="experience" class="font-medium mb-1 text-gray-700 block">Год начала деятельности*</label>
                <input type="number" id="experience" name="experience" 
                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                  placeholder="2013" required>
              </div>
  
                          <div class="mb-5">
                <label for="price" class="font-medium mb-1 text-gray-700 block">Стоимость съёмки в час</label>
                <input type="number" id="price" name="price" 
                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                  placeholder="1000 ₽">
              </div>
              
  
                          <div class="mb-1 ">
                              <label for="about" class="font-medium mb-1 text-gray-700 block">Дополнительная информация о своей деятельности*</label>
                            
                              <textarea name="about" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50" id="description" rows="5"  value="{{ old('description') }}"
                                  placeholder="Оброзование, сертификаты, курсы, награды..." required></textarea>
                          </div>
            
              <div class="mb-5">
                <label for="portfolio" class="font-medium mb-1 text-gray-700 block">Ваше портфолио*</label>
                <input type="text" id="portfolio" name="portfolio" 
                  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                  placeholder="Введите ссылку на ваше портфолио" required>
              </div>
            
           
  
              <div id="app" class="mb-5">
                <div class="mb-5">
                  <span class="text-xl font-medium text-gray-700">Контакты и профили в социальных сетях </span></div>
                <div class="mb-5">
                  <label for="phone" class="font-medium mb-1 text-gray-700 block">Номер телефона*</label>
                  <input id="phone" name="phone" v-mask="'+# ###-###-##-##'"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                    placeholder="+7 978-111-11-11" required value="{{old('phone', Auth::user()->phone ?? '') }}" >                
                </div>
                
                <div class="mb-5">
                  <label for="gender" class="font-bold mb-1 text-gray-700 block">Пол</label>
                  
                  <div class="flex">
                    <label
                      class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                      <div class="text-teal-600 mr-3">
                        <input type="radio" x-model="gender" value="Male" class="form-radio focus:outline-none focus:shadow-outline"  />
                      </div>
                      <div class="select-none text-gray-700">Мужской</div>
                    </label>
    
                    <label
                      class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                      <div class="text-teal-600 mr-3">
                        <input type="radio" x-model="gender" value="Female" class="form-radio focus:outline-none focus:shadow-outline"/>
                      </div>
                      <div class="select-none text-gray-700">Женский</div>
                    </label>
                  </div>
                </div>
            
                <div class="mb-5">
                  <label for="vk" class="font-medium mb-1 text-gray-700 block">Вконтакте</label>
                  <input type="text" id="vk" name="vk"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                    placeholder="@login"  >
                </div>
                <div class="mb-5">
                  <label for="inst" class="font-medium mb-1 text-gray-700 block">Instagram</label>
                  <input type="text" id="inst" name="inst"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                    placeholder="@login"  >
                </div>
                <div class="mb-5">
                  <label for="fb" class="font-medium mb-1 text-gray-700 block">Facebook</label>
                  <input type="text" id="fb" name="fb"
                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-50"
                    placeholder="@login"  >
                </div>
  
            
                </div>
                <div class="pt-5">
                  <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Сохранить
                    </button>
             
                  
                  </div>
                </div>
              </div>
                
  
        </form>
      </div>
    </div>
  </div>
@endsection