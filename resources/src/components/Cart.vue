<template>
  <div class="cart text-dark">
    <div v-for="(food, index) in showCart" :key="food.index">
      <span class="text-dark">{{ food.name }}</span>
      <div><span class="cart_food_name">Total:</span><span class="cart_food_price"> {{total}}€</span></div>
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
        total:0,
        
      },
      showCart: [],
      brain: false,
      token: '',
      url: 'http://127.0.0.1:8000/api/generate',
      paymentOnSuccess: []
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
     axios
        .get(this.url)
        .then((response) => {
          // console.log(response.data.results);
          this.brain = true;
          this.token = response.data.token;
        })
        .catch((reject) => {
        });
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