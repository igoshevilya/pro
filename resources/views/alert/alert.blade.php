
<div id="alert-box">  
  <div class="max-w-7xl mt-3 mx-auto sm:px-6 lg:px-8">
    
    @if(session()->has('info'))
        <div class="alert alert-info fade show" role="alert">
            {{ session()->get('info') }}
        </div>
    @elseif(session()->has('success'))

   
     
          
    <div class="rounded-md bg-green-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-green-400" x-description="Heroicon name: solid/check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
  </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">
            {{ session()->get('success') }}
          </p>
        </div>
        <div class="ml-auto pl-3">
          <div class="-mx-1.5 -my-1.5">
            
          </div>
        </div>
      </div>
    </div>
  
        
     
    @elseif(session()->has('danger'))
        <div class="alert alert-danger fade show" role="alert">
            {{ session()->get('danger') }}
        </div>
    @elseif(session()->has('warning'))
        <div class="alert alert-warning fade show" role="alert">
            {{ session()->get('warning') }}
        </div>
    @endif

</div>
</div>
</div>