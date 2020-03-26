import Vue from 'vue'

export const mutations = {
    updateVids(state, videos) {
        Vue.set(state, 'videoList', videos)
    }
}