<template>
  <div class="background">
  <div class="modal">
    <div class="modal-background">
      <p class="checkout">Checkout Area</p>
      <table class="ui single line table">
        <tbody>
            <tr class="product" v-for="product in cartArr" :key="product">
                <td></td>
                <td>{{ product.quantity }}</td>
                <td>{{ product.department }}</td>
                <td>{{ product.price | currency('€')}}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>Total: </td>
              <td class="alignRight">{{ cartTotal | currency('€') }}</td>
            </tr>
        </tbody>
      </table>
      <button class="ui button" @click="showCheckout">Cancel</button>
      <div class="ui vertical animated button" tabindex="0" @click="confirmation">
  <div class="visible content">Confirm</div>
  <div class="hidden content">
    <i class="credit card alternative icon"></i>
  </div>
</div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'Checkout',
  props: ['cartArr', 'cartTotal'],
  data() {
    return {
      }
  },
  methods: {
    showCheckout: function() {
      this.$emit('showCheckout');
    },
    confirmation: function(){
      this.showCheckout();
      this.$emit('clearCart');
    }
  }, // End Methods
  ready: function() {
    $('.ui.modal')
      .modal('show');
  } // End Ready
}
</script>

<style scoped>
.modal {
  z-index: 99;
  position: fixed;
  top:50%;
  left:50%;
}
.modal-background {
  width: 30em;
  min-height: 18em;
  margin-top: -9em;
  margin-left: -15em;
  border: 2px solid #000000;
  background-color: #343434;
  color: #ffffff;
  opacity: 0.9;
}
.checkout {
  text-align: center;
  font-size: 30px;
}
.alignRight {
  text-align: right;
}
</style>