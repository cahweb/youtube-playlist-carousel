import Video from '../Video'
import {mapState} from 'vuex'

export default {
    components: {
        'yt-video': Video,
    },
    
    data() {
        return {}
    },

    computed: {
        ...mapState([
            'videoList',
        ])
    }
}