Vue.config.devtools = true;
window.Vue = require('vue');


// import Vue from 'vue'
import App from '../src/App.vue'
import store from './store'

Vue.component('shopping-cart', require('../src/App.vue').default);

new Vue({
  el: '#app',
  store,
  render: h => h(App)
})
