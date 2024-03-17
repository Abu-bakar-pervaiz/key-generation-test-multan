import {createApp} from 'vue'
import KeyCheck from './components/KeyCheck.vue'

const app = createApp({})
app.component('key-check',KeyCheck)
app.mount("#app")