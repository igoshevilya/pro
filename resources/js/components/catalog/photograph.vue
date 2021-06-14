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
<div v-for="user in users" :key="user.id" class="shadow rounded-2xl p-4 bg-white dark:bg-gray-800">
    <div class="flex flex-row items-start gap-4">
      <a :href="'../user/'+user.user">
        <img :src="'../'+(user.avatar ? user.avatar.thumbnail : 'image/noava.svg')" class="w-28 h-28 rounded-lg"/>
        
                    <span class="sr-only">{{ user.first_name }} {{ user.last_name }}</span>
                   
                  </a>
        <div class="h-28 w-full flex flex-col justify-between">
            <div><a :href="'../user/'+user.user">
                <p class="text-gray-800 dark:text-white text-xl font-medium">
                    {{ user.first_name }} {{ user.last_name }}
                           
                </p> </a>
                <p v-if="user.userprofile" class="text-gray-400 text-xs">
                    {{ user.userprofile.special }} 
                </p>
            </div>
            <div class="rounded-lg bg-blue-100 dark:bg-white p-2 w-full">
                <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                    <p  class="flex flex-col">
                        Город
                        <span class="text-black dark:text-indigo-500 font-bold">
                            {{ user.city ? user.city : 'Не указан' }}
                        </span>
                    </p>
                    <p class="flex flex-col">
                        Выполнено заданий
                        <span class="text-black dark:text-indigo-500 font-bold">
                            455
                        </span>
                    </p>
                    <p class="flex flex-col">
                        Рейтинг
                        <span class="text-black dark:text-indigo-500 font-bold">
                            9.3
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-between gap-4 mt-6">
        <button type="button" class="w-1/2 px-4 py-2 text-base border rounded-lg text-grey-500 bg-white hover:bg-gray-200 ">
            Chat
        </button>
        <button type="button" class="w-1/2 px-4 py-2 text-base border rounded-lg text-white bg-indigo-500 hover:bg-indigo-700 ">
            Add friend
        </button>
    </div>
</div>

<infinite-loading spinner="spiral" :identifier="infiniteId" @infinite="infiniteHandler"><span slot="no-more">Фотографов больше нет</span></infinite-loading>


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
      users: [],
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
                this.changeType();
            },
    //GET ALL services
    infiniteHandler($state) {
      axios
        .get("photograph", {
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
          this.users.push(...data.data);
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
