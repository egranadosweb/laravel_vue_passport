
import {createRouter, createWebHistory} from "vue-router"
import App from "../components/App.vue"
import NotFound from "../components/NotFound.vue"
import CustomerIndex from "../components/customer/Index.vue"
import CustomerCreate from "../components/customer/Create.vue"

const routes = [
    {
        path : "/" ,
        component : App,
        name : "App"
    },
    {
        path : "/customers" ,
        component : CustomerIndex,
        name : "CustomerIndex"
    },
    {
        path : "/customers/create" ,
        component : CustomerCreate,
        name : "CustomerCreate"
    },
    {
        path : "/:pathMatch(.*)*" ,
        component : NotFound,
        name : "NotFound"
    },
    
]

export default createRouter({
    history : createWebHistory(import.meta.env.BASE_URL),
    routes
})