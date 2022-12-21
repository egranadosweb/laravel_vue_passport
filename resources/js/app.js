import './bootstrap';
import {createApp} from "vue"
import "bootstrap/dist/css/bootstrap.min.css"
import router from "./router"
import store from "./store"

import App from "./components/App.vue"
import Input from "./components/sub/forms/Input.vue"

const app = createApp(App)

app.component("Input", Input)

app.use(router)
    .use(store)
    .mount("#app")