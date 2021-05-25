<template>
    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-4">Альбомы</h1>
        </div>

        <spinner v-if="loading"></spinner>
        <div class="row" v-else>
            <div class="col-md-3" v-for="(album, index) in albums" :key="index">
              <a :href="album.id">  
                  
                    <img :src="baseUrl + '/storage/images/photos/' + album.latestPhoto.file_name" class="card-img-top" v-if="album.latestPhoto" style="height: 250px" alt="test">
                    <hr>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ album.title }}</h5>
                   
                </div></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'album.index',
        
        data() {
            return {
             
                albums: null,
                loading: false,
            }
        },

        mounted() {
        
                this.getAlbums();
       
        },

        methods: {
            getAlbums() {
                axios.get('album')
                    .then(response => {
                        this.albums = response.data;
                    })
            },

            goToAlbum(album) {
                const albums = '1'
                this.push({ path: `/user/${albums}` } )
            }
        }
    }


</script>

<style>
    .card {
        cursor: pointer;
    }
</style>
