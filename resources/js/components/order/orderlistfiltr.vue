<template>

<div class="mx-auto">
     

    <div class=" ">

         <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1 ">
            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Фильтр</h2>

              <form class="mt-4">
                    <div class="">
                      <label class="text-sm  text-gray-700 tracking-wide">
					Название
				</label>
                        <input  v-model="title" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" placeholder="Название">
                    </div>

                    <div class="mt-3">
                      <label class="text-sm  text-gray-700 tracking-wide">
					Стоимость
          
				</label>

        <div class="md:flex flex-row md:space-x-2 w-full text-xs ">
                        <span class="self-end text-sm  text-gray-700">от</span><input v-model="pricemin" type="number" class="border py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" placeholder="1000">
                         <span class="self-end text-sm  text-gray-700">до</span><input  v-model="pricemax" type="number" class="border py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" placeholder="1000">
                    </div></div>

                    <div class="mt-3">
                      <label class="text-sm  text-gray-700 tracking-wide">
					Локация
				</label>
                        <input v-model="location" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" placeholder="Симферополь">
                    </div>

                <div class="mt-3">
                      <label class="text-sm  text-gray-700 tracking-wide">
					Дата съёмки
				</label>
                        <input v-model="date" v-mask="'####-##-##'" type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" placeholder="2021-05-04">
                    </div>
                    <div class="mt-3 flex justify-between">
                        <button type="submit"  @click.prevent="changeType" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none sm:text-sm">
                            
                            Применить фильтр
                        </button>
                          <button type="submit" @click.prevent="reset" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none sm:text-sm"  >
                           Сбросить 
                        </button>
                    </div>
                </form>
            </div>
        </section>



        <div class="space-y-6 lg:col-start-1 lg:col-span-2">

<section v-for="order in orders" :key="order.id" aria-labelledby="applicant-information-title" class="mb-4">
      

                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                              {{ order.title }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                             {{ order.category.title }}
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
<infinite-loading spinner="spiral" :identifier="infiniteId" @infinite="infiniteHandler"><span slot="no-more">Заданий больше нет</span></infinite-loading>


           </div>
                  </div>
    </div>       
        </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';
import {TheMask} from 'vue-the-mask'
export default {  
  data() {
    return {  
      page: 1,  
      title: null,
      pricemin: null,
      pricemax: null,
      location: null,  
      date: null,  
      orders: [],
      infiniteId: +new Date(),
    };
  },
  components: {TheMask, InfiniteLoading},
  methods: {
      reset() {
                this.title = null;
                this.pricemin = null;
                this.pricemax = null;
                this.location = null;
                this.date = null;
                this.infiniteHandler();
            },
    //GET ALL services
    infiniteHandler($state) {
      axios
        .get("order/orderlist", {
          params: {
            page: this.page,
            title: this.title,
            pricemin: this.pricemin,
            pricemax: this.pricemax,
            location: this.location,
            date: this.date,
            
           
          },
        })
        .then(({data} ) => {

if (data.data.length) {
          this.page += 1;
          this.orders.push(...data.data);
          $state.loaded();
            
        }
else {
          $state.complete();
        }         
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    changeType() {
      this.page = 1;
      this.orders = [];
      this.infiniteId += 1;
    },
  },

  mounted() {
  // this.InfiniteLoading(); 
  },
};
</script>
