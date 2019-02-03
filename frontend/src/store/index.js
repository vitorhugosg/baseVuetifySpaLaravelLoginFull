import Vue from 'vue'
import Vuex from 'vuex'
import usuario from './modules/usuario/index'
import helpers from './modules/helpers/index'
Vue.use(Vuex)
const state = new Vuex.Store({
  modules: {
    usuario,
    helpers
  }
})
export default state


