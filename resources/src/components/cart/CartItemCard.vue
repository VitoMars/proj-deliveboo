<template>
  <div class="cart-item-card">
      <div class="header">
          <h3>{{ product.name }}</h3>
          <h3>In Cart{{ product.quantity }}</h3>
           <h3>Total Cost{{ item_cost.toFixed(2) }}</h3>
      </div>
      <p>{{ description }}</p>
  </div>
</template>

<script>
export default {
    props: ['product'],
    computed: {
        description() {
            return this.product.description.substring(0,120)
        },
        item_cost() {
            return this.product.price *  this.product.quantity 
        }
    }
}
</script>

<style>

</style>