// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
window.axios = require("axios");
import Vue from "vue";
import vueResource from "vue-resource"; //Allows jSon to be imported and used
import Vue2Filters from "vue2-filters"; // Allows use of currency
import VueRouter from "vue-router";
import App from "./App";
import vueBraintree from "vue-braintree";

// Test di Vito
import Cart from "./components/Cart.vue";
import Home from "./components/Home";
Vue.component("Home", require("./components/Home.vue"));
//

Vue.use(vueBraintree);

Vue.use(vueResource);
Vue.use(Vue2Filters);
Vue.use(VueRouter);

Vue.component("vue-App", require("./App.vue"));
const router = new VueRouter({
    mode: "history",
    base: __dirname,
    routes: [{ path: "/", component: Home }],
});

Vue.config.productionTip = false;

/* eslint-disable no-new */
new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
    components: {
        Home: require("./components/Home.vue"),
    },
});

// const Home = new Vue({
//     el: "#app",
//     render: (h) => h(Home),
// });
