import Vue from 'vue'
import Router from 'vue-router'
import home from '@/pages/home.vue'
import login from '@/pages/usuario/login'
import registro from '@/pages/usuario/registro'
import confirmaremail from '@/pages/usuario/confirmaremail'
import esquecisenha from '@/pages/usuario/esquecisenha'
import resetarsenha from '@/pages/usuario/resetarsenha'
Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: home
    },
    {
      path: '/login',
      name: 'Login',
      component: login
    },
    {
      path: '/registro',
      name: 'Registro',
      component: registro
    },
    {
      path: '/confirmaremail',
      name: 'Confirmar Email',
      component: confirmaremail
    },
    {
      path: '/esquecisenha',
      name: 'Esqueci Senha',
      component: esquecisenha
    },
    {
      path: '/resetarsenha/:token',
      name: 'Esqueci Senha',
      component: resetarsenha
    },
  ]
})
