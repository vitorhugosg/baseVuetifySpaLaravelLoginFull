// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import './plugins/vuetify'
import '@/plugins/vuetify'
import App from './App'
import router from './router'
import store from './store/index'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'roboto-fontface/css/roboto/roboto-fontface.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
Vue.use(VueAxios, axios)
Vue.use(BootstrapVue);
import VueSweetalert2 from 'vue-sweetalert2';
const options = {
  confirmButtonColor: '#3f51b5',
  cancelButtonColor: '#f44336'
}
Vue.use(VueSweetalert2, options)
Vue.config.productionTip = false
if(process.env.NODE_ENV == 'development'){

  sessionStorage.setItem('urlAPI', 'http://127.0.0.1:8000/api/');
}else{

  sessionStorage.setItem('urlAPI', 'https://hmg.api.creddent.com.br/api/');
}


/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  router,
  components: { App },
  template: '<App/>'
})
