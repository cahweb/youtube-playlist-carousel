import Carousel from '../Carousel'
import {mapState} from 'vuex'

export default {
    components: {
        'carousel': Carousel,
    },
    
    data() {
        return {}
    },

    computed: {
        ...mapState([
            'playlistId',
        ])
    }
}