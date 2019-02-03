import Vue from 'vue'
import Router from 'vue-router'
import home from '@/pages/home.vue'
import auth from './auth/index'
Vue.use(Router)

let routes = [];
routes.push(auth);

routes[0].push({
  path: '/',
  name: 'Home',
  component: home
});


export default new Router({
  mode: 'history',
  routes: routes[0]
})
