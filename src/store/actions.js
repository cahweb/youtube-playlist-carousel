import axios from 'axios'

export const actions = {
    async getVids({commit, state}) {
        const url = `${state.apiUrl}?part=contentDetails&playlistId=${state.playlistId}&key=${state.key}`

        const videos = await axios.get(url).then(response => {
            const result = response.data
            const vids = result.items.map(item => item.contentDetails.videoId)
            return vids
        })

        commit('updateVids', videos.slice(0, state.numVideos))
    }
}