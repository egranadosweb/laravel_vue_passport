import {createStore} from "vuex"
import CustomerModule from "./modules/customer.js"

export default createStore({
    modules : {
        customer : CustomerModule
    }
})