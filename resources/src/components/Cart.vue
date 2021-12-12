<template>
  <div class="cart text-dark">
    <div v-for="(food, index) in showCart" :key="food.index">
      <span class="text-dark">{{ food.name }}</span>
      <div>
        <span class="cart_food_name">Total:</span
        ><span class="cart_food_price text-dark">
          {{ total | currency("€") }}€</span
        >
      </div>
      <button class="btn circle btn-secondary" @click="minus(index)">-</button>
      <button class="btn circle btn-secondary" @click="plus(index)">+</button>
      {{ food.quantity }}
    </div>
    <FormClient v-if="dataForm" @updateForm="FormData" />
    <div class="cartOrder">
      <div v-for="(food, index) in showCart" :key="food.index">
        <h3>Il tuo Ordine</h3>
        <span class="text-dark">{{ food.name }}</span>
        <div><p class="cart_food_price text-dark">
            <p>Spese di consegna 10€</p>
            <p>Spese di servizio 2€</p>
            <span>Mancia per il Raider:</span>
            <button class="btn circle btn-secondary" @click="minus(index)">-</button>
      <button class="btn circle btn-secondary" @click="plus(index)">+</button>
            <p>Totale: {{ total | currency("€") }}€</p>
        </div>
      </div>
    </div>

    <Payment
      v-if="brain"
      :authorization="token"
      @onSuccess="paymentOnSuccess"
    />
  </div>
</template>

<script>
import Payment from "../components/Payment.vue";
import FormClient from "../components/FormClient.vue";
export default {
  name: "Cart",
  components: {
    Payment,
    FormClient,
  },
  props: ["cart", "reset"],
  data() {
    return {
      form: {
        dataClient: [],
        token: "",
        food: [],
      },
      showCart: [],
      brain: false,
      token: "",
      url: "http://127.0.0.1:8000/api/generate",
      oldLength: 0,
      total: 0,
      dataForm: true,
      token: "",
      brain: false,
      showOrder: [],
      filteredProducts: [],
    };
  },
  watch: {
    cart: function () {
      if (this.cart.length > 0) {
        this.form.food = this.cart;
        this.form.food[this.form.food.length - 1]["quantity"] = 1;
        this.showCart = this.form.food;
        // console.log(this.form.food);
        this.$forceUpdate();
      }
    },
  },
  mounted() {
    if (localStorage.getItem("quantity")) {
      try {
        this.form.quantity = JSON.parse(localStorage.getItem("quantity"));
      } catch (e) {
        localStorage.removeItem("quantity");
      }
    }
    if (localStorage.getItem("total")) {
      try {
        this.total = JSON.parse(localStorage.getItem("total"));
      } catch (e) {
        localStorage.removeItem("total");
      }
    }
    if (localStorage.getItem("oldLength")) {
      try {
        this.oldLength = JSON.parse(localStorage.getItem("oldLength"));
      } catch (e) {
        localStorage.removeItem("oldLength");
      }
    }
  },
  created() {
    this.getToken();
    this.getCartTotal();
  },
  computed: {
    // cartSize: function () {
    //   // Calculates the number of products in the Cart
    //   this.showOrder = this.total;
    // },
  },
  methods: {
    plus(index) {
      this.form.food[index]["quantity"] += 1;
      this.getCartTotal();
      this.$forceUpdate();
    },
    minus(index) {
      this.form.food[index]["quantity"] -= 1;
      if (this.form.food[index]["quantity"] < 1) {
        this.form.food.splice(index, 1);
        // console.log(index);
        this.$emit("deleteCartItem", index);
      }
      this.getCartTotal();
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
        .catch((reject) => {});
    },
    paymentOnSuccess(nonce) {
      this.form.token = nonce;
      this.buy();
    },
    buy() {
      axios
        .post("http://127.0.0.1:8000/api/makepayment", { ...this.form })
        .then((response) => {
          // console.log(response);
        });
    },
    FormData(form) {
      this.form.dataClient = form;
      this.dataForm = false;
    },
    // savecart() {
    //   let quantity = JSON.stringify(this.form.quantity);
    //   localStorage.setItem("quantity", quantity);
    //   let total = JSON.stringify(this.total);
    //   localStorage.setItem("total", total);
    //   let oldLength = JSON.stringify(this.oldLength);
    //   localStorage.setItem("oldLength", oldLength);
    // },

    getCartTotal: function () {
      this.form.food.forEach((element) => {
        this.total = element.price * element.quantity;
      });
    },
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