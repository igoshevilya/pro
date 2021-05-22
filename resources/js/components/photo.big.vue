<template>
    <div class="modal bd-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <img :src="baseUrl + '/storage/images/photos/' + photo.file_name" alt="" style="width: 100%; height: 100%" v-if="photo">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'photo.big',
        props: ['app', 'photo'],


        data() {
            return {
                baseUrl: BASE_URL
            }
        }
    }
</script>

<style scoped>
    .modal-dialog{
        width: 100%;
    }
</style>
