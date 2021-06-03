<template>

<div class="mx-auto">
       <div class=" " v-if="showGallery">
              <section class="grid 2xl:grid-cols-3 xl:grid-cols-3 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
               <article v-for="gallery in galleries" :key="gallery.id"  class="mx-auto group w-full shadow-xl  rounded-b-2xl transform duration-500 hover:-translate-y-1 ">
               
               <section @click="fetchGallery(gallery)" class="content bg-cover bg-center h-64 rounded-2xl" :style="(gallery.photo && gallery.photo.file_name)?{ backgroundImage: 'url(/thumbnail/thumbnail_' + gallery.photo.file_name + ')' }:'backgroundImage:url(/image/nophoto.jpg);'">
                                       <div class="flex items-end w-full h-full  text-white text-sm font-bold  p-4 rounded-2xl">
                        <div class="w-1/2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
                            <span>{{ gallery.photos.length }}</span>
                        </div>

                        
                                          </div>
                </section> 
                  <div class="my-4 px-4 flex items-end rounded-2xl">


                      <div class="">
                    <h2 class="mt-4 overflow-ellipsis overflow-hidden w-auto text-base font-medium text-Gray-700">{{ gallery.title }}</h2>
                    <p class="mt-2 overflow-ellipsis overflow-hidden text-sm text-gray-700"> {{ gallery.description }} </p>
                      </div>

                </div>
              
               </article>
        </section>
        </div>
        <div v-if="showPhoto">
<button @click="back" class="inline-flex items-center mb-4 px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                      Назад
                                  </button> 
                                  {{ title }}
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" > 
                    
                            <figure v-for="photo in photos" :key="photo.id" class="rounded-lg overflow-hidden">
                                <img @click="showPhotoFull(photo)" class="cursor-pointer object-cover transition transform hover:scale-110" :src="'/thumbnail/thumbnail_'+photo.file_name">
                            </figure>                           
                        </div>
                        </div>
                        <photo-full ref="photoFull" :photo="selectedPhoto" :photos="photos" :photoFullVisible="photoFullVisible"></photo-full>

    </div>
</template>

<script>
import photoFull from '../gallery/components/photo-full.vue'
    export default {
        components: {
           
            photoFull,
           
        },
                data() {
            return {
                gallery: [],
                galleries: {}, 
                photos: [],
                selectedPhoto: {},
                showPhoto:false,  
                showGallery: true, 
                photoFullVisible:false,   
                selectGallery: {}, 
                title:'', 
            }
        },
        methods: {

    
        back(){
             this.showPhoto = false;
             this.showGallery = true;
        },
        fetchGallery(gallery){
                axios.get('galleryphoto/' + gallery.id )
                    .then(response => {
                         this.showPhoto = true;
                         this.showGallery = false;

                         this.title = gallery.title;
                         console.log(gallery.title);
                        this.photos = response.data.photos;
                    })
                    .catch(response => {
                        console.log(response);
                    });
                    
            },

            getGalleries() {
                axios.get('gallery/' + window.location.href.split("/").slice(-1)[0] )
                     .then(response => {
                        this.galleries = response.data;
                        _.map(this.galleries, (gallery) => {
                            return _.assign(gallery.photo = {}, _.sample(gallery.photos));                                                        
                    });                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
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
         
            },
        mounted() {
            this.getGalleries();
            
            console.log('Component mounted.');
        }
    }
</script>
