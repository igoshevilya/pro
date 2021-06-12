<template>

<div class="mx-auto">
     

    <div class=" ">


<section v-for="order in orders" :key="order.id" aria-labelledby="applicant-information-title" class="mb-4">
      

                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                              {{ order.title }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                             Категория
                            </p>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">

                            <dl class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-4">
                      <div class="sm:col-span-1">        
                  <div class="flex items-center">
                <div class="flex-shrink-0">
                  <a :href=" '../user/'+order.client.user">
                    <span class="sr-only">{{ order.client.first_name }} {{ order.client.last_name }}</span>
                   
                    <img class="h-10 w-10 rounded-full" :src="'../'+(order.avatar ? order.avatar.thumbnail : 'image/noava.svg')"> 
                   
                  </a>
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-gray-900">
                    <a :href="'../user/'+order.client.user" class="hover:underline">
                      {{ order.client.first_name }} {{ order.client.last_name }}
                    </a>
                  </p>
                  <div class="flex space-x-1 text-sm text-gray-500">
                    <time datetime="2020-03-16">
                      {{ order.created_at }}
                    </time>
                  
                  </div>
                </div>
              </div>
              </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Дата съёмки
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                      {{ order.date }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Локация
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                      {{ order.location }}
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Стоимость съёмки
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                      {{ order.price }} ₽
                                    </dd>
                                </div>
                                <div class="sm:col-span-3">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Описание
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 truncate ">
                                      {{ order.description }}
                                    </dd>
                                </div>
                                <div class="mt-4 flex justify-end sm:col-span-1">
                                  <a :href="`order/show/${order.id}/`"><button type="button"
                                      class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                      Подробнее
                                  </button></a>
                              </div>
                            </dl>
                         
                        </div>



                    </div>
                </section>




           </div>

                 
    
    
    </div>
</template>

<script>

    export default {
        data() {
            return {
            
                orders: {},
              
            }
        },
        methods: {

                     //GET ALL services
            getorders() {
                axios.get('order/orderlist')
                     .then(response => {
                        this.orders = response.data;
                       
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
          
        },
           
                  
        mounted() {
            this.getorders();     
        }
    }
</script>
