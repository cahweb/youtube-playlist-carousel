import Vue from 'vue'
import Vuex from 'vuex'

import {actions} from './actions'
import {getters} from './getters'
import {mutations} from './mutations'

Vue.use(Vuex)

const state = {
  apiUrl: "https://www.googleapis.com/youtube/v3/playlistItems",
  key: "AIzaSyAmfD36Ih9POOK4omuZ42AyN5pRljqSZPU",
  channelId: "UCfG165JuNksHsmBasaIYVRw",
  playlistId: "PLC_-PBK7h1hrqrncTPUT1TZkNbrL-LDZl",
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
