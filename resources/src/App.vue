<template>
  <div id="app">
    <h1>Shopping Cart Example</h1>
    <router-link :class="{active: $route.name === 'Home'}" to="/">Home</router-link>
    <router-link :class="{active: $route.name === 'Cart'}" to="/cart">Cart</router-link>
    <hr>
    <h2>Products</h2>
    <ProductList/>
    <hr>
    <CartItemCard/>
  </div>
</template>

<script>

import ProductList from '../src/components/products/ProductList.vue'
import CartItemCard from '../src/components/cart/CartItemCard.vue'
 export default {

   mounted() {
        this.$store.commit('updateCartFromLocalStorage')
    },
      name: 'App',
      components: {
        ProductList,
        CartItemCard
      }
    }
</script>