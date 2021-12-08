<template>
<div class="card">
    <h3>{{ product.name }}</h3>

    <h5 class="price">{{ product.price.toFixed(2) }}</h5>
      <h5 class="description">{{description }}</h5>
      <p class="text-muted" >{{ product.category }}</p>
      <button @click="$emit('view-product', product)" class="view-product-button">
view
      </button>
</div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {
  props:['product'],
  computed: {
      description() {
          return this.product.description.substring(0, 150)
      }
  }

}
</script>