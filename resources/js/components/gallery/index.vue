<template>

<div class="mx-auto">
     <div class="inline-block mr-2 mt-2">
              <button @click="toggleCreateGallery" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Создать альбом</button>
             </div>
   
    <!-----------GALLERY--------->
    <div class=" py-6">
              <section class="grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
               <article v-for="gallery in galleries" :key="gallery.id"  class="mx-auto group w-full shadow-xl  rounded-b-2xl transform duration-500 hover:-translate-y-1 ">
               <a :href="`gallery/${gallery.id}/`" class="hover:text-green-600"> 
               <section class="content bg-cover bg-center h-64 rounded-2xl" :style="(gallery.photo && gallery.photo.file_name)?{ backgroundImage: 'url(/thumbnail/thumbnail_' + gallery.photo.file_name + ')' }:'backgroundImage:url(/image/nophoto.jpg);'">
                                       <div class="flex items-end w-full h-full  text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
                            <span>{{ gallery.photos.length }}</span>
                        </div>

                        
                                          </div>
                </section> </a>
                  <div class="my-4 px-4 flex items-end rounded-2xl">


                      <div class="w-3/4">
                    <h2 class="mt-4 overflow-ellipsis overflow-hidden w-auto text-base font-medium text-indigo-700">{{ gallery.title }}</h2>
                    <p class="mt-2 overflow-ellipsis overflow-hidden text-sm text-gray-700"> {{ gallery.description }} </p>
                      </div>


                    <div class="w-1/4 flex justify-end ">
                        
                            <button @click="editGallery(gallery)"  type="button" class="hover:text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg></button>
                            <button @click="toggleDeleteGallery(gallery)" type="button" class="hover:text-red-600">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>
                            </button>   
                        </div>
                </div>
              
               </article>
        </section>
           </div>
    <!-----------END GALLERY--------->
                 
                
     <!-----------MODAL--------->
        <div v-if="modalGallery.show" @click.self="toggleCreateGallery" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-75 flex items-center justify-center p-3" style="background: rgba(0,0,0,.4)">
            <div class="animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
                <h2 class=" mb-6 text-2xl leading-8 font-bold tracking-tight text-gray-900 sm:text-xl">{{ modalGallery.title }}</h2>
                <form @submit.prevent="galleryFormHandler" class="bg-white" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="title">
                            Название
                        </label>
                        <input type="text" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="title" v-model="newGallery.title" placeholder="Название альбома" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="description">
                            Описание
                        </label>
                        <textarea rows="5" class="border  py-2 px-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none" id="description" v-model="newGallery.description" placeholder="Описание альбома" required>
                            </textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <button @click="toggleCreateGallery" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ modalGallery.confirmButtonText }}
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
        <!-----------END MODAL--------->
       <!-----------MODAL--------->
        <div v-if="modalDelete.show" @click.self="toggleDeleteGallery" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-75 flex items-center justify-center p-3" style="background: rgba(0,0,0,.4)">
            <div class="animated fadeInUp fixed shadow-inner max-w-md md:relative pin-b pin-x align-top m-auto justify-end md:justify-center p-8 bg-white md:rounded w-full md:h-auto md:shadow flex flex-col">
                <h2 class=" mb-6 text-2xl  leading-8 font-bold tracking-tight text-gray-900 sm:text-xl">{{ modalDelete.title }}</h2>
               

                    <div class="flex items-center justify-between">
                        <button @click="toggleDeleteGallery" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" type="button">
                            Отмена
                        </button>
                        <button @click="deleteGallery()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-400 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
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
                galleries: {},
                newGallery:{},
                modalGallery: {
                    show : false,
                    title : 'Создание нового альбома',
                    confirmButtonText : 'Сохранить',
                    action : 'store',
                },
                 modalDelete: {
                    show : false,
                    title : 'Удаление альбома',
                    confirmButtonText : 'Удалить',
                   
                },
            }
        },
        methods: {

               //TOGGLE MODAL FOR CREATE/EDIT GALLERY
           
             toggleCreateGallery() {
                this.modalGallery.show = !this.modalGallery.show;
                this.newGallery ={};
                this.modalGallery.title = 'Создание нового альбома';
                this.modalGallery.confirmButtonText = 'Создать альбом';
                this.modalGallery.action = 'store';
            },
            //GET ALL GALLERIES
            getGalleries() {
                axios.get('/ph/gallery/getgallery')
                     .then(response => {
                        this.galleries = response.data;
                        _.map(this.galleries, (gallery) => {
                            return _.assign(gallery.photo = {}, _.sample(gallery.photos));
                             
                              //return _.assign(gallery.photo, _.head(gallery.photos));
                        });
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
          //GALLERY MODAL FORM HANDLER
            galleryFormHandler()
            {
                if(this.modalGallery.action == 'store'){
                    this.storeGallery();
                }
                else if(this.modalGallery.action == 'update'){
                    this.updateGallery();
                }
                

            },

            //STORE NEW GALLERY
            storeGallery(){
                axios.post('gallery', {
                    gallery: this.newGallery,
                })
                    .then(response => {
                        this.galleries.unshift(response.data);
                        this.toggleCreateGallery();
                    })
                    .catch(response => {
                        console.log(error);
                    });
            },

            //ACTIVATE/DEACTIVATE GALLERY
            toggleGalleryStatus(id){
                axios.put('gallery/status/' + id, {
                    })
                    .then(response => {
                        //console.log(response);
                    })
                    .catch(response => {
                        console.log(response);
                    });
            },

            //DELETE GALLERY
             toggleDeleteGallery(gallery) {
                this.modalDelete.show = !this.modalDelete.show;
                this.modalDelete.title = 'Удаление альбома: '+ gallery.title;
                this.modalDelete.confirmButtonText = 'Удалить альбом';
                this.modalDelete.id = gallery.id;

            },
            deleteGallery(gallery){
                
             
                        axios.delete('gallery/'+ this.modalDelete.id)
                       .then(response => {
                           this.modalDelete.show = false;
                            this.getGalleries();                 
                        
                       
                       
                        
                       /*  this.toggleCreateGallery(); */
                    })
                       
            },

            //EDIT GALLERY
            editGallery(gallery){
                this.modalGallery.show = true;
                this.modalGallery.title = 'Редактирование альбома '+gallery.title;
                this.modalGallery.confirmButtonText = 'Обновить';
                this.modalGallery.action = 'update';
                this.newGallery.id = gallery.id;
                this.newGallery.title = gallery.title;
                this.newGallery.description = gallery.description;
            },
            
            //UPDATE GALLERY
            updateGallery(){
                axios.put('gallery/' + this.newGallery.id, {
                    gallery: this.newGallery,
                })
                    .then(response => {
                        var gallery = response.data;
                        _.assign(gallery.photo = {}, _.sample(gallery.photos));
                        this.galleries.splice(_.findIndex(this.galleries, {id: gallery.id}), 1, gallery);
                        this.toggleCreateGallery()
                    })
                    .catch(response => {
                        console.log(response);
                    });
            }
        },
        mounted() {
            this.getGalleries();
            console.log('Component mounted.');
        }
    }
</script>
