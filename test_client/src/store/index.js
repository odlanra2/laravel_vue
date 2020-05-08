import Vue from 'vue'
import Vuex from 'vuex'
import login from './modules/login'
import * as getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: true,
  getters,
   modules: {
     login,
  },
  state: {},
  mutations: {},
})
