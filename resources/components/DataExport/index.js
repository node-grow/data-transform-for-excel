import Index from './Index.vue'
import {createApp} from "vue";

export default (props) => {
    console.log('props===>', props)
    return createApp(Index, props)
}
