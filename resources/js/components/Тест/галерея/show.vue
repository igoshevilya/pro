<template><div>

     <section class="mt-3 grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
               <article v-for="photo in photos" :key="photo.id" class="mx-auto group w-full shadow-sm  rounded-b-2xl transform duration-500 hover:-translate-y-1 ">
                <section @click="showPhotoFull(photo)" class="cursor-pointer content bg-cover bg-center h-64 rounded-2xl" :style="{ backgroundImage: 'url(/thumbnail/thumbnail_' + photo.file_name + ')' }">
                  
                </section>
                   <div class=" flex p-2">
                        <div class="w-5/6 flex items-center">
                             
                                            <p class="text-sm font-normal italic">{{ photo.width }} x {{ photo.height }} px &nbsp</p>
                                            <p class="text-sm font-medium">{{ parseInt(photo.size/1024) }} KB</p>  
                         
                        </div>

                        <div class="w-1/6 flex items-center flex-row-reverse">
                             <button @click="deletePhoto(photo)" type="button" class="hover:text-red-600">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>
                            </button>
                        </div>
                              </div>            
                
               </article>
        </section>
         <div class="card margin-top" v-for="(post, index) in posts" :key="index">
          <div class="card-header">
            {{ post.title }}
          </div>
            <div class="card-body">
              {{ post.body }}
            </div>
        </div>
       <!--  <infinite-loading @infinite="getPosts"></infinite-loading> -->
            <infinite-loading @infinite="fetchGallery">
            
            </infinite-loading>
            
      <photo-full ref="photoFull" :photo="selectedPhoto" :photos="photos" :photoFullVisible="photoFullVisible"></photo-full>
           
    </div>
</template>
<script>
import InfiniteLoading from 'vue-infinite-loading';
  import photoFull from './components/photo-full.vue'

export default {
      components: {
           
            photoFull,
           InfiniteLoading
        },
    data: () => ({
       
        album:{},
        photos: [],
        isDragging: false,
        dragCount: 0,
        files: [],
        images: [],
          selectedPhoto: {},
       photoFullVisible:false,
       page: 1,
       posts: []
    
    }),
        mounted(){
           //this.getPosts();
            //this.fetchGallery();
            
        },

 
    methods:{

         //Select photo
            selectPhoto(photo){
                if(_.findIndex(this.photos, (item) => { return photo.id == item.id; }) >= 0){
                    this.selectedPhoto = photo;
                    this.editedPhoto = photo;
                    this.$refs.photoFull.startEventListeners();
                }

            },
        showPhotoFull(photo){
                this.photoFullVisible = true;
                this.selectedPhoto = photo;
            },

        
        
        fetchGallery($state) {
                axios.get('getphoto/' + window.location.href.split("/").slice(-1)[0], {
                    params: {
                         page: this.page,},
          }).then(({ data }) => {
                    if(data.data.length){
                    this.page+=1;
                    this.photos.push(...data.data);
                    $state.loaded();
                }else{
                        $state.complete();
                        }
      });
    },
  
     
        
       
         deletePhoto(photo){
                axios.delete('photo/' + photo.id)
               .then(response => {             
                     this.fetchGallery();                
                });
            }
        
    }
}
</script>
