/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
// import VueRouter from 'vue-router'
// import io from 'socket.io-client';

// window.io = io;
// window.socket = io('http://dailyshop.com:3000');
// Vue.use(VueRouter)
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('login-component', require('./components/LoginComponent.vue').default);


// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
// const routes = [
//   { 
//   	path: '/login', 
//   	component: require('./components/LoginComponent.vue').default 
//   },
//   { 
//   	path: '/home', 
//   	component: require('./components/HomeComponent.vue').default 
//   },
// ]

// // 3. Create the router instance and pass the `routes` option
// // You can pass in additional options here, but let's
// // keep it simple for now.
// Vue.prototype.$host_url = "http://dailyshop.com/api";
// const router = new VueRouter({
//   routes // short for `routes: routes`
// });

// const app = new Vue({
//     el: '#app',
//     router
// });

window.Vue = require('vue');
import io from 'socket.io-client';
import Swal from 'sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';

window.io = io;
window.Swal = Swal;
window.socket = io('http://dailyshop.com:3000');

Vue.prototype.$host_url = "http://dailyshop.com/api";
import App from './App.vue';
import Login from './components/LoginComponent.vue';
import chatAdmin from './components/chatAdminComponent.vue';

import vuetify from './vuetify';

import NewAds from './components/NewAds.vue';

import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);




new Vue({

  el: '#ads',
  vuetify,
  render: h => h(NewAds)

});

new Vue({

  el: '#app',
  vuetify,

  render: h => h(App)

});


new Vue({

  el: '#login',
  vuetify,

  render: h => h(Login)

});

new Vue({

  el: '#chatAdmin',
  vuetify,

  render: h => h(chatAdmin)

});
