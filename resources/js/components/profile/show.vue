<template>
<div>  
     <section class="mt-3 grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
               <article v-for="photo in photos" :key="photo.id" class="mx-auto group w-full shadow-sm  rounded-b-2xl transform duration-500 hover:-translate-y-1 ">
                <section @click="showPhotoFull(photo)" class="cursor-pointer content bg-cover bg-center h-64 rounded-2xl" :style="{ backgroundImage: 'url(/thumbnail/thumbnail_' + photo.file_name + ')' }">
                  
                </section>
                     
                
               </article>
        </section>
      <photo-full ref="photoFull" :photo="selectedPhoto" :photos="photos" :photoFullVisible="photoFullVisible"></photo-full>


    </div>
</template>
<script>
  import photoFull from '../gallery/components/photo-full.vue'
export default {
      components: {
           
            photoFull,
           
        },
    data: () => ({
       
        album:{},
        gallery: [],
        photos: [],
        files: [],
        images: [],
          selectedPhoto: {},
       photoFullVisible:false,
    
    }),
        mounted(){
            this.fetchGallery();
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





        fetchGallery(){
                axios.get('gallery/' + window.location.href.split("/").slice(-1)[0] )
                    .then(response => {
                     
                         console.log(response);
                        this.photos = response.data;
                       //this.photos =  response.data.photos;
                          console.log(photos);
                    })
                    .catch(response => {
                        console.log(response);
                    });
            },
     
        
   
       

    
       

        
    }
}
</script>
<style lang="scss" scoped>
    .uploader{
        width: 100%;
      
        color: rgb(36, 36, 36);
        padding: 40px 15px;
        text-align: center;
        border-radius: 14px;
        border: 2px dashed #6f42c1;
        font-size: 16px;
        position: relative;
        &.dragging {
            background: #6f42c1;
            color: #ffffff;
            border: 3px dashed #2196F3;
        }
        i {
            font-size: 16px;
        }
        .file-input {
            width: 200px;
            margin: auto;
            height: 60px;
            position: relative;
            label,
            input {
                background: #6f42c1;
                color: #ffffff;
                width: 100%;
                position: absolute;
                left: 0;
                right: 0;
                padding: 10px;
                border-radius: 4px;
                margin-top: 7px;
                cursor: pointer;
            }
            input {
                opacity: 0;
                z-index: -2;
            }
        }
        .images-preview{
          
            margin-top: 20px;
           
            .details{
                font-size: 12px;
               
                color: #000;
                display: flex;
                flex-direction: column;
                align-items: self-start;
                padding: 3px 6px;
                .name{
                    overflow: hidden;
                    height: 18px;
                }
            }
        }
        .upload-control{
         
            width: 100%;
           
            top: 0;
            left: 0;
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
            padding: 10px;
            padding-bottom: 16px;
            text-align: center;
            
        }
    }
    @import '~vue-toastr/src/vue-toastr.scss';
</style>
