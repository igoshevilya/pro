<template>
<div>
        <form @submit.prevent="profileUpload" method="POST" enctype="multipart/form-data">
          
          
                 
                
               <div class="flex items-center justify-center my-2">
            <label for="customFile" class="cursor-pointer flex flex-col border-2 rounded-lg border-dashed w-full h-full p-2 hover:bg-gray-100 hover:border-purple-300 group">
                <div class="flex flex-col items-center justify-center ">
                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 ">Выбрать фото</p>
                </div>
         <input type="file" @change="imageSelected"  class="hidden" id="customFile">
            </label>
        </div>
               






             
            <div v-if="imagepreview" class="mt-3">
                <img :src="imagepreview" class=" rounded"  style="max-height:100px;">
            </div>
          



             <div class="mt-1 flex items-center">
                <div v-if="imagepreview" class="mr-3">
                <img :src="imagepreview" class="h-12 w-12 mx-auto rounded-full object-cover">
                 </div>
                  <button class=" bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-50" type="submit">Загрузить</button>
                  </div>

        </form>
        </div>
</template>
<script>
export default {
    data(){
        return{
            image: null,
            imagepreview: null,
        }
    },

    methods:{
        imageSelected(e){
            this.image = e.target.files[0];

            let reader = new FileReader();
            reader.readAsDataURL(this.image);
            reader.onload = e => {
            this.imagepreview = e.target.result;
               };
        },

        profileUpload(){
            let data = new FormData;
            data.append('image', this.image);
            axios.post('./avatar', data)
            .then(()=>{
                 console.log("good");
            }).catch(()=>{

            })
        }
    }
}
</script>