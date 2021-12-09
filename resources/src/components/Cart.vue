<template>
  <div class="cart text-dark">
    <div v-for="(food, index) in showCart" :key="food.id">
      <span class="text-dark">{{ food.name }}</span>
      <button class="btn circle btn-secondary" @click="minus(index)">-</button>
      <button class="btn circle btn-secondary" @click="plus(index)">+</button>
      {{ food.quantity }}
    </div>
    <Payment v-if="brain" :authorization="token" @onSuccess="paymentOnSuccess" />
  </div>

</template>

<script>
import Payment from "../components/Payment.vue";
export default {
  name: "Cart",
  components: {
    Payment
  },
  props: ["cart"],
  data() {
    return {
      form: {
        dataClient: [],
        token: "",
        food: [],
      },
      showCart: [],
      brain: false,
      token: ''
    };
  },
  watch: {
    cart: function () {
      if (this.cart.length > 0) {
           this.form.food = this.cart;
      this.form.food[this.form.food.length - 1]['quantity'] = 1
      this.showCart = this.form.food;
      console.log(this.form.food)
      this.$forceUpdate();
      }
    },
  },
  created() {
    this.getToken();
  },
  methods: {
    plus(index) {
        this.form.food[index]['quantity'] += 1;
      this.$forceUpdate();
    },
    minus(index) {
      this.form.food[index]['quantity'] -= 1;
      if (this.form.food[index]['quantity'] < 1) {
   
        this.form.food.splice(index, 1);
             console.log(index)
        this.$emit("deleteCartItem", index);
      }
      this.$forceUpdate();
    },
    getToken() {
      
    }
  },
};
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