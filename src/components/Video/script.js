export default {
    props: {
        vidId: String,
    },

    data() {
        return {
            urlBase: 'https://www.youtube.com/embed/',
        }
    },

    computed: {
        srcUrl() {
            return `${this.urlBase}${this.vidId}`
        }
    }
}