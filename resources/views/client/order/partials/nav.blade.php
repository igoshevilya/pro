<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class=" px-4 my-1 sm:px-6 lg:px-8 py-4 bg-white shadow sm:rounded-md">
      <div class="max-w-7xl mx-auto">
        
        <nav class="flex space-x-4  place-content-center" aria-label="Tabs">
          <a href="{{route('myorder.client' )}}" class="{{request()->is('myorder/published*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              Опубликованные
          </a>
          <a href="{{route('myorder.execution.client' )}}" class="{{request()->is('myorder/execution*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              В работе
          </a>
             <a href="{{route('myorder.history.client' )}}" class="{{request()->is('myorder/history*') ? 'bg-indigo-100 text-indigo-700 px-3 py-2' : 'text-gray-500 hover:text-gray-700 px-3 py-2'}} font-medium text-sm rounded-md">
              История
          </a>
      
        </nav>
  
      </div>
    </div>
  </div>