/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import JwPagination from 'jw-vue-pagination';
import VSwitch from 'v-switch-case';
import VueLazyload from 'vue-lazyload';







Vue.prototype.$appUrl = 'https://7637-2400-adc7-91b-8900-dc87-7a7e-beb7-8290.ngrok.io';


Vue.component('jw-pagination', JwPagination);
Vue.use(VSwitch)
Vue.use(VueLazyload)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('bodyfit-component', require('./components/BodyComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('attribute-one-component', require('./components/AttributeoneComponent.vue').default);
Vue.component('attribute-two-component', require('./components/AttributetwoComponent.vue').default);
Vue.component('attribute-three-component', require('./components/AttributethreeComponent.vue').default);
Vue.component('result-component', require('./components/ResultComponent.vue').default);
Vue.component('dummy-result',require('./components/Errorplaceholder').default)
Vue.component('placeholder-text',require('./components/Errorplaceholdertext').default)
// Vue.component('sekeleton',require('./components/Sekeleton').default)






/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',



});
