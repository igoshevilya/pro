<template>

<div class="mx-auto">
     <div class="inline-block mr-2 mt-2">
              <button @click="toggleCreateService" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50 sm:text-sm">Создать услугу</button>
             </div>

    
    <!-----------Услуги--------->
    <div class=" py-6">
              <section class="grid 2xl:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 sm:grid-cols-2 grid-cols-1 gap-10">
              
               <article v-for="service in services" :key="service.id"  class="mx-auto group w-full   rounded-2xl shadow transform duration-500 border-t px-6 py-4">
                <div class="">
                    <h2 class="overflow-ellipsis overflow-hidden w-auto text-lg font-medium text-Gray-700">{{ service.title }}</h2>
                    <p class="mt-2 overflow-ellipsis overflow-hidden text-sm text-gray-700"> {{ service.description }} </p>
                </div>
 <div class="flex mt-2">

      <div class="w-1/3 flex items-center">
     <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
</svg>
<div>
<p class="text-base font-semibold text-gray-700 leading-none">{{ service.price }} ₽</p>
<p class="text-sm text-gray-500 leading-none">за час</p>
</div>
     </div>
      <div class="w-1/3 flex items-center">
     <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
<div>
<p class="text-base font-semibold text-gray-700 leading-none">{{ service.photo }}</p>
<p class="text-sm text-gray-500 leading-none">фото в час</p>
</div>
     </div>

     <div class="w-1/3  flex justify-end">
      <button @click="editservice(service)"  type="button" class="bg-yellow-300 text-white hover:shadow-lg hover:bg-yellow-400 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg></button>
<button @click="toggleDeleteService(service)"  type="button" class="ml-2 bg-red-400 text-white hover:shadow-lg hover:bg-red-500 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg></button>
                           
     </div>
 </div>




                    
              
               </article>
        </section>
           </div>
    <!-----------Услуги--------->
                 
                
     <!-----------MODAL--------->
        <div v-if="modalService.show" @click.self="toggleCreateService" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-75 flex items-center justify-center p-3" style="background: rgba(0,0,0,.4)">
            <div class="animated fadeInUp fixed shadow-inner max-w-2xl md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
                <h2 class=" mb-6 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-xl">{{ modalService.title }}</h2>
                <form @submit.prevent="serviceFormHandler" class="bg-white">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="title">
                            Название
                        </label>
                        <input type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="title" v-model="newService.title" placeholder="Название услуги" required>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mb-4">
                                          
                <div class="col-span-6">
                    <div class="flex justify-between">
                    <label for="price" class="block text-sm font-medium text-gray-700">Стоимость съёмки</label>
                    <span class="text-sm text-gray-500">₽ / час</span>
                    </div>
                        <input type="number" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="price" v-model="newService.price" placeholder="1000" required>
                    </div>
                    <div class=" col-span-6">
                        <div class="flex justify-between">
                           <label for="photo" class="block text-sm font-medium text-gray-700">    Обработанных фото</label>
                <span  class="text-sm text-gray-500">шт / час</span>
              </div>
                        
                        <input type="number" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="photo" v-model="newService.photo" placeholder="10" required>
                    </div>
                    </div>
                    <div class="mb-4">
                         <div class="flex justify-between">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание съемки</label>
                <span  class="text-sm text-gray-500">Необязательно</span>
              </div>
                        
                        <textarea rows="5" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="description" v-model="newService.description" placeholder="Расскажите подробнее о съемке">
                            </textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <button @click="toggleCreateService" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ modalService.confirmButtonText }}
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
        <!-----------END MODAL--------->
       <!-----------MODAL--------->
        <div v-if="modalDelete.show" @click.self="toggleDeleteService" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-75 flex items-center justify-center p-3" style="background: rgba(0,0,0,.4)">
            <div class="animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
                <h2 class=" mb-6 text-2xl  leading-8 font-bold tracking-tight text-gray-900 sm:text-xl">{{ modalDelete.title }}</h2>
               

                    <div class="flex items-center justify-between">
                        <button @click="toggleDeleteService" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" type="button">
                            Отмена
                        </button>
                        <button @click="deleteservice()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-400 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ modalDelete.confirmButtonText }}
                        </button>
                    </div>
           
                
            </div>
        </div>
        <!-----------END MODAL--------->
    
    </div>
</template>

<script>

    export default {
        data() {
            return {
                services: {},
                newService:{},
                modalService: {
                    show : false,
                    title : 'Создание услуги',
                    confirmButtonText : 'Сохранить',
                    action : 'store',
                },
                 modalDelete: {
                    show : false,
                    title : 'Удаление услуги',
                    confirmButtonText : 'Удалить',
                   
                },
            }
        },
        methods: {

               //TOGGLE MODAL FOR CREATE/EDIT service
           
             toggleCreateService() {
                this.modalService.show = !this.modalService.show;
                this.newService ={};
                this.modalService.title = 'Создание услуги';
                this.modalService.confirmButtonText = 'Создать услугу';
                this.modalService.action = 'store';
            },
            //GET ALL services
            getservices() {
                axios.get('getservice')
                     .then(response => {
                        this.services = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
          //service MODAL FORM HANDLER
            serviceFormHandler()
            {
                if(this.modalService.action == 'store'){
                    this.storeService();
                }
                else if(this.modalService.action == 'update'){
                    this.updateservice();
                }
                

            },

            //STORE NEW service
            storeService(){
                axios.post('service', {
                    service: this.newService,
                })
                    .then(response => {
                        //this.services.unshift(response.data);
                        this.toggleCreateService();
                        this.$toastr.s("Услуга создана");
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

          
            //DELETE service
             toggleDeleteService(service) {
                this.modalDelete.show = !this.modalDelete.show;
                this.modalDelete.title = 'Удаление услуги: '+ service.title;
                this.modalDelete.confirmButtonText = 'Удалить услугу';
                this.modalDelete.id = service.id;

            },
            deleteservice(service){
                      axios.delete('service/'+ this.modalDelete.id)
                       .then(response => {
                           this.modalDelete.show = false;
                            this.$toastr.e(`Услуга удалена`);
                            this.getservices();                 
                     
                    })
                       
            },

            //EDIT service
            editservice(service){
                this.modalService.show = true;
                this.modalService.title = 'Редактирование услуги: '+service.title;
                this.modalService.confirmButtonText = 'Обновить';
                this.modalService.action = 'update';
                this.newService.id = service.id;
                this.newService.title = service.title;
                this.newService.photo = service.photo;
                this.newService.price = service.price;
                this.newService.description = service.description;
            },
            
            //UPDATE service
            updateservice(){
                axios.put('service/' + this.newService.id, {
                    service: this.newService,
                })
                    .then(response => {
                       this.$toastr.i("Услуга отредактирована");
                       var service = response.data;
                       this.services.splice(_.findIndex(this.services, {id: service.id}), 1, service);
                       this.toggleCreateService()
                    })
                    .catch(response => {
                        console.log(response);
                    });
            }
        },
        mounted() {
            this.getservices();     
        }
    }
</script>
