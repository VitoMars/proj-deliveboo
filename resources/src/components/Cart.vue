<template>
    <div class="cart">
      <a class="item floatRight" @click="showCart"><!--Toggles cart on and off-->
          {{ cartSize }}
        <i class="large in cart icon"></i>
      </a>
      <table class="ui single line table">
        <tbody>
            <tr class="product" v-for="product in cartArr" :key="product">
                <td></td>
                <td><button class="ui circular icon button" @click="decreaseQuantity(product)"><i class="minus icon"></i></button></td>
                <td>{{ product.quantity }}</td>
                <td><button class="ui circular icon button" @click="increaseQuantity(product)"><i class="plus icon"></i></button></td>
                <td>{{ product.department }}</td>
                <td>{{ product.price | currency('€')}}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>Total: </td>
              <td class="alignRight">{{ cartTotal | currency('€') }}</td>
            </tr>
        </tbody>
      </table>
        <div class="btnBorder">
          <button class="ui inverted button" @click="clearCart"> Clear Cart </button>
          <button class="ui inverted button" @click="showCheckout"> Checkout </button>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Cart',
    props: ['cartSize','cartTotal','cartArr'],
    data() {
      return {
        }
    },
    methods: {
      showCart: function() {
        this.$emit('showCart');
      },
      clearCart: function() {
        this.$emit('clearCart');
      },
      removeFromCart: function(product) {
        this.$emit('removeFromCart', product);
      },
      showCheckout: function(product) {
        this.$emit('showCheckout');
      },
      decreaseQuantity: function(product) {
        this.$emit('decreaseQuantity', product);
      },
      increaseQuantity: function(product) {
        this.$emit('increaseQuantity', product);
      }
    }
  }
</script>

<style scoped>
.alignRight {
  text-align: right;
}
.btnBorder {
  padding: 5px 5px 5px 5px;
}
.cart {
  color: white;
}
.floatRight {
  float: right;
}
</style>