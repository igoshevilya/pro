<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
      <div class="max-w-7xl mx-auto">
        
   
 
    
        <nav class="flex space-x-4  place-content-center" aria-label="Tabs">
          <a href="{{route('gallery' )}}" class="{{request()->is('ph/myprofile/gallery*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              Портфолио
          </a>
          <a href="{{route('service' )}}" class="{{request()->is('ph/myprofile/service*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              Услуги
          </a>
          <a href="{{route('info' )}}" class="{{request()->is('ph/myprofile/info*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              Информация
          </a>
      
        </nav>
  
  
      </div>
    </div>
  </div>