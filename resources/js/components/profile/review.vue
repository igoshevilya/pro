<template>

<div class="mx-auto">
     

    

    <div class=" py-6">
              <section class="grid  gap-10">
              
               <article v-for="review in reviews" :key="review.id"  class="mx-auto group w-full   rounded-2xl shadow transform duration-500 border-t px-6 py-4">
                <div class="">
                    <div class="mt-3 flex items-center">
                <div class="flex-shrink-0">
                  <a :href=" review.client.user">
                    <span class="sr-only">{{ review.client.first_name }} {{ review.client.last_name }}</span>
                   
                    <img class="h-10 w-10 rounded-full" :src="'../'+(review.avatar ? review.avatar.thumbnail : 'image/noava.svg')"> 
                   
                  </a>
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    <a :href="review.client.user" class="hover:underline">
                      {{ review.client.first_name }} {{ review.client.last_name }}
                    </a>
                  </p>
                  <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-16">
                      {{ review.created_at }}
                    </time>
                  
                  </div>
                </div>
              </div>
                   
                    <p class="mt-2 overflow-ellipsis overflow-hidden text-sm text-gray-700"> {{ review.text }} </p>
                </div>


     


    
              
               </article>
        </section>
           </div>

                 
    
    
    </div>
</template>

<script>

    export default {
        data() {
            return {
            
                reviews: {},
              
            }
        },
        methods: {

            getservices() {
                axios.get('review/' + window.location.href.split("/").slice(-1)[0] )
                     .then(response => {
                        this.reviews = response.data;
                       
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
