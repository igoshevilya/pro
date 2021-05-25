<template><div>
    <div class="uploader" @dragenter="OnDragEnter" @dragleave="OnDragLeave" @dragover.prevent @drop="onDrop" :class="{dragging: isDragging}">
        
        <div class="upload-control" v-show="images.length">
            <label class="cursor-pointer inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm" for="file">Выбрать еще файлы</label>
            <button class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm" @click="upload">Загрузить</button>
        </div>
        
        <div v-show="!images.length">
             <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
            
                <p class="pl-1  text-sm text-gray-600">Перетащите свои изображения сюда<br>
                    или
                </p>
               
                <div class="file-input">
                    <label  for="file">Выбрать файлы</label>
                    <input type="file" @change="onInputChange" id="file" multiple>
                </div>
           
            <p class="text-xs text-gray-500">
                      PNG, JPG до 10Mb
                    </p>
        </div>

        <div class=" mx-auto" v-show="images.length">
            <div class="flex grid gap-8 row-gap-5 mb-8 sm:grid-cols-2 lg:grid-cols-4 sm:mx-auto">
            <div class="" v-for="(image, index) in images" :key="index">
               <div> <img class="object-cover w-full h-44 rounded shadow-sm" :src="image" :alt ="`Image Uploader ${image}`">
                <button @click="removeImage(index)">Удалить</button>
                  
               </div>
                
            </div>
        </div>
         </div>
            
    </div>
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
      <photo-full ref="photoFull" :photo="selectedPhoto" :photos="photos" :photoFullVisible="photoFullVisible"></photo-full>
           
    </div>
</template>
<script>
  import photoFull from './components/photo-full.vue'
export default {
      components: {
           
            photoFull,
           
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
                axios.get('getphoto/' + window.location.href.split("/").slice(-1)[0], {
                })
                    .then(response => {
                        this.gallery = response.data;
                        this.photos = this.gallery.photos;
                    })
                    .catch(response => {
                        console.log(response);
                    });
            },
     
        
        OnDragEnter(e){
            e.preventDefault();
            this.dragCount++;
            this.isDragging = true;
        },
        OnDragLeave(e){
            e.preventDefault();
            
            this.dragCount--;
            if (this.dragCount <= 0) {
                this.isDragging = false;
            }            
        },
        onInputChange(e) {
            const files = e.target.files;
            Array.from(files).forEach(file => this.addImages(file)); 
        },
        onDrop(e){
            e.preventDefault();
            e.stopPropagation();
            
            this.isDragging = false;
            const files = e.dataTransfer.files;
            Array.from(files).forEach(file => this.addImages(file));
        },
       
       addImages(file){
            if (!file.type.match('image.*')) {
                this.$toastr.e(`${file.name} не изображение!`);
                return;
            }
            this.files.push(file);
            const img = new Image(),
                reader = new FileReader();
            
            reader.onload = (e) => this.images.push(e.target.result);
            reader.readAsDataURL(file);
        },

        removeImage(index) {
            this.images.splice(index, 1);
             this.files.splice(index, 1);
        },
    
       
        upload(){
            const formData = new FormData();
            this.files.forEach(file => {
                formData.append('images[]', file, file.name);
          formData.append('gallery_id', this.gallery.id);
          
            });
            axios.post('photo/upload', formData)
                .then(response => {
                     this.images = [];
                     this.files = [];                    
                    this.$toastr.s("Фотографии загружены");
                       this.fetchGallery();
                })
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
