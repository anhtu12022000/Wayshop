
require('./bootstrap');

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

  el: '#chatAdmin',
  vuetify,

  render: h => h(chatAdmin)

});
