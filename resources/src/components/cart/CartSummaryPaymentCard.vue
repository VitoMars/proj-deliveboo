<template>
  <div class="cart-item-card">
      <h3>
          Cart Total: $ {{ cart_total.toFixed(2) }}
          <div class="view-product-button">
              Pay by credict card
          </div>
      </h3>
  </div>
</template>

<script>
export default {
    props: ['products'],
    computed: {
        cart_total() {
            return this.$store.getters.cart_total
        }
    }
}
</script>

<style>

</style>