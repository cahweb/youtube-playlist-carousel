import Vue from 'vue'
import Vuex from 'vuex'

import {actions} from './actions'
import {getters} from './getters'
import {mutations} from './mutations'

import {gInfo} from '../assets/priv/g-info'

Vue.use(Vuex)

const state = {
  ...gInfo,
  numVideos: 3,
  videoList: [],
  featured: 0,
}

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters,
})
