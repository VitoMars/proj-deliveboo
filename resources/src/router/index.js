import { createRouter, createWebHystory } from "vue-router";

import Home from "../views/Home.vue";
import Home from "../views/Cart.vue";


const routes = [
    {
        path: '/',
        name: 'Home',
        components: Home
    },
    {
        path: '/cart',
        name: 'Cart',
        components: Cart
    },
]

const router = createRouter({
    history: createWebHystory(process.env.BASE_URL),
    routes
})
export default router

