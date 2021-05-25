/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import Toastr from "vue-toastr";
Vue.use(Toastr);
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('image-upload', require('./components/ImagesUpload.vue').default);
Vue.component('ava-upload', require('./components/AvatarUpload.vue').default);
//Vue.component('lightbox', require('./components/Lightbox.vue').default);
//Vue.component('create-album', require('./components/AlbumCreate.vue').default);
//Vue.component('album-index', require('./components/AlbumIndex.vue').default);
/**I:\OpenServer\domains\pro\resources\js\components\ImageUpload.vue
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 Vue.component('gallery', require('./components/gallery/index.vue').default);
 Vue.component('galleryshow', require('./components/gallery/show.vue').default);








const app = new Vue({
    el: '#app',
});
