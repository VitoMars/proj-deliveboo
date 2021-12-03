import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/contacts",
            name: "contacts",
            component: Contacts,
        },
        {
            path: "/about-us",
            name: "about-us",
            component: AboutUs,
        },
    ],
});

export default router;
