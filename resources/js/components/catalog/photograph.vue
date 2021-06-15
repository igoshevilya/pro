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
            <div>
              <a :href="'../user/'+user.user">
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
                        <span class="text-black dark:text-indigo-500 text-sm font-medium">
                            {{ user.city ? user.city : 'Не указан' }}
                        </span>
                    </p>
                    <p class="flex flex-col">
                        Стоимость за час
                        <span class="text-black dark:text-indigo-500 text-sm font-medium">
                            4000 ₽
                        </span>
                    </p>
                    <p class="flex flex-col">
                        Выполненых заданий
                        <span class="text-black dark:text-indigo-500 text-sm font-medium">
                            {{ user.count_order ? user.count_order : 'Еще нет' }} 
                        </span>
                    </p>
                    <p class="flex flex-col">
                        Средний рейтинг
                        
                        <span  class="flex text-black dark:text-indigo-500 text-sm font-medium">
                         <svg v-if="user.rating_count" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
										</path>
									</svg>
                                             
                            {{ user.rating_count ?  user.rating_count.toFixed(1) : 'Отсуствует' }} 
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
   
    <div class="rounded-lg   dark:bg-white  w-full">
                     <hooper :itemsToShow="5" :infiniteScroll="true">
      <slide v-for="photo in user.photos" :key="photo.id">
         <section @click="showPhotoFull(photo)" class="cursor-pointer mx-2 content bg-cover bg-center h-36 rounded-2xl" :style="{ backgroundImage: 'url(/thumbnail/thumbnail_' + photo.file_name + ')' }">
         </section>
                           </slide>
      
    </hooper>
      
      

         
            </div>
    <div class="flex items-center justify-end gap-4 mt-6">
      
        <button @click="togglePhone(user)" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none sm:text-sm">
           Связаться с фотографом
        </button>
    </div>
</div>

<infinite-loading spinner="spiral" :identifier="infiniteId" @infinite="infiniteHandler"><span slot="no-more">Фотографов больше нет</span></infinite-loading>
      
    

           </div>
                  </div>
    </div>  
    <photo-full ref="photoFull" :photo="selectedPhoto" :photos="photos" :photoFullVisible="photoFullVisible"></photo-full>   
      
      <div v-if="modal.show" @click.self="togglePhone" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-75 flex items-center justify-center p-3" style="background: rgba(0,0,0,.4)">
             
            <div class="animated items-center fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white rounded w-full md:h-auto md:shadow flex flex-col">
                <h2 class="text-xl  leading-8 font-medium tracking-tight text-gray-700 sm:text-xl">{{ modal.name }}</h2>
            <h2 class=" my-6 text-2xl  leading-8 font-bold tracking-tight text-gray-900 sm:text-xl">{{ modal.phone }}</h2>

                    <div class="flex items-center justify-end">
                        <button @click="togglePhone" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" type="button">
                            Закрыть
                        </button>
                     </div>
            </div>
      </div>  

        </div>
</template>

<script>
import photoFull from '../gallery/components/photo-full.vue'
import { Hooper, Slide } from "hooper";
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
      photos: [],
      infiniteId: +new Date(),
       selectedPhoto: {},
       photoFullVisible:false,
       modal: 
              {     show : false,
                    name: 'Игошев Илья',
                    phone : '',                 
                   
                },
    };
  },
  components: {TheMask, InfiniteLoading, Hooper, photoFull, Slide },
  methods: {
     togglePhone(user) {
                this.modal.show = !this.modal.show;
                this.modal.name = user.first_name+' '+user.last_name;
                (user.phone ? this.modal.phone = user.phone : this.modal.phone = 'Фотограф не указал телефон');
                 },

   selectPhoto(photo){
                if(_.findIndex(this.photos, (item) => { return photo.id == item.id; }) >= 0){
                    this.selectedPhoto = photo;                    
                    this.$refs.photoFull.startEventListeners();
                }

            },
        showPhotoFull(photo){
                this.photoFullVisible = true;
                this.selectedPhoto = photo;
            },
       
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
<style>
. {
  position: relative;
  box-sizing: border-box;
  width: 100%;
  height: 200px;
}
.hooper * {
  box-sizing: border-box;
}
.hooper-list {
  overflow: hidden;
  width: 100%;
  height: 100%;
}
.hooper-track {
  display: flex;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
}
.hooper.is-vertical .hooper-track {
  flex-direction: column;
  height: 200px;
}

.hooper.is-rtl {
  direction: rtl;
}

.hooper-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}
  
.hooper-slide {
  flex-shrink: 0;
  height: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}

</style>