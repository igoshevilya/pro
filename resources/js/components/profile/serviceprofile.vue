<template>

<div class="mx-auto">
     

    
    <!-----------Услуги--------->
    <div class=" py-6">
              <section class="grid 2xl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-10">
              
               <article v-for="service in services" :key="service.id"  class="mx-auto group w-full   rounded-2xl shadow transform duration-500 border-t px-6 py-4">
                <div class="">
                    <h2 class="overflow-ellipsis overflow-hidden w-auto text-lg font-medium text-Gray-700">{{ service.title }}</h2>
                    <p class="mt-2 overflow-ellipsis overflow-hidden text-sm text-gray-700"> {{ service.description }} </p>
                </div>
 <div class="flex mt-2">

      <div class="w-1/2 flex items-center">
     <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
</svg>
<div>
<p class="text-base font-semibold text-gray-700 leading-none">{{ service.price }} ₽</p>
<p class="text-sm text-gray-500 leading-none">за час</p>
</div>
     </div>
      <div class="w-1/2 flex items-center">
     <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
<div>
<p class="text-base font-semibold text-gray-700 leading-none">{{ service.photo }}</p>
<p class="text-sm text-gray-500 leading-none">фото в час</p>
</div>
     </div>

     
 </div>




                    
              
               </article>
        </section>
           </div>
    <!-----------Услуги--------->
                 
    
    
    </div>
</template>

<script>

    export default {
        data() {
            return {
                services: {},
              
            }
        },
        methods: {

                    
            //GET ALL services
            getservices() {
                axios.get('service/' + window.location.href.split("/").slice(-1)[0] )
                     .then(response => {
                        this.services = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
         
        },
        mounted() {
            this.getservices();     
        }
    }
</script>
