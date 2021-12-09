<template>
  <div id="app">
    ciao
    <Home />
    <!-- <Cart  /> -->
  </div>
</template>

<script>
import Home from "./components/Home.vue";
import Cart from "./components/Cart";
export default {
  name: "app",
  components: {
    Home,
    Cart
  }
};
</script>

<style lang='scss'>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
