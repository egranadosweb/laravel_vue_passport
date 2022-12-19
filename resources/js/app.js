import './bootstrap';
import {createApp} from "vue"
import "bootstrap/dist/css/bootstrap.min.css"
import router from "./router"
import store from "./store"

import App from "./components/App.vue"

const app = createApp(App)

//app.component("Btn", Btn)

app.use(router)
    .use(store)
    .mount("#app")