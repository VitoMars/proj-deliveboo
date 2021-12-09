<template>
  <div id="app">
      <div v-for="product in products" :key="product.id">
        {{ products }}
         <table class="ui single line table">
        <tbody>
            <tr class="product">
                <!-- <td><img :src="product.imgURL" class="ui tiny image" @click="removeFromCart(product)"><i class=""></i></img></td> -->
                <td><button class="ui circular icon button" @click="decreaseQuantity(product)"><i class="minus icon"></i></button></td>
                <td>{{ product.id }}</td>
                <td><button class="ui circular icon button" @click="increaseQuantity(product)"><i class="plus icon"></i></button></td>
                <td>{{ product.name }}</td>
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
      </div>
  </div>
</template>

<script>
import Cart from "./Cart.vue";
import Checkout from "./Checkout.vue";
export default {
  name: "Home",
  data() {
    return {
      show: false,
      showModal: false,
      searchBox: null,
      cartTotal: 0,
      filteredproducts: [],
      products: [], // products are inserted on created
      cartArray: [],
      url: "http://127.0.0.1:8000/api/products",
      api_token:
        "PjxdOC6c4TnANlK1aKMdg0gOLE5R6ImxN1ll7JJGCk93g1OlOO2hpzLcVGqHRG3L71GhNLVqQ0XBCuhk",
      // End Cart
    };
  }, // End data
  components: {
    "app-cart": Cart,
    "app-checkout": Checkout,
  },
  mounted: function () {
    // When the app is ready load the products
  },
  created() {
    this.getproducts();
  },
  methods: {
      getproducts() {
    const bodyParameters = {
        key: 'value'
    }
     const config = {
         headers:{ Authorization: `Bearer ${this.api_token}`}
     }
      axios
        .post(this.url , config, bodyParameters)
        .then((response) => {
          // console.log(response.data.results);
          this.products = response.data.results;
          console.log(this.products);
        })
        .catch((reject) => {
          console.log(reject);
        });
    },
    // filterDepartment: function (department) {
    //   // Filters products displayed by Department
    //   this.searchBox = null;
    //   this.filteredproducts = [];
    //   for (var i = 0; i < this.products.length; i++) {
    //     if (this.products[i].department.includes(department)) {
    //       this.filteredproducts.push(this.products[i]);
    //     }
    //   }
    // // },
    // filterCategory: function (category) {
    //   // Filters products displayed by Category
    //   this.searchBox = null;
    //   this.filteredproducts = [];
    //   for (var i = 0; i < this.products.length; i++) {
    //     if (this.products[i].sku.includes(category)) {
    //       this.filteredproducts.push(this.products[i]);
    //     }
    //   }
    // },
    // search: function () {
    //   // Searches all products when text changes
    //   this.filteredproducts = [];
    //   for (var i = 0; i < this.products.length; i++) {
    //     if (
    //       this.products[i].title
    //         .toUpperCase()
    //         .includes(this.searchBox.toUpperCase())
    //     ) {
    //       this.filteredproducts.push(this.products[i]);
    //     }
    //   }
    // },
    // getCartTotal: function () {
    //   this.cartTotal = 0;
    //   for (var i = 0; i < this.cartArray.length; i++) {
    //     this.cartTotal += this.cartArray[i].price * this.cartArray[i].quantity;
    //   }
    // },
  
  }, // End Methods
  computed: {
 
  },
};

</script>

<style scoped>
.modal {
  background-color: white;
  filter: alpha(opacity=10); /* IE */
  opacity: 0.1; /* Safari, Opera */
  -moz-opacity: 0.1; /* FireFox */
}
.alignLeft {
  text-align: left;
}
.cartPopup {
  right: 0em;
  position: fixed;
  text-align: right;
  background: rgba(0, 0, 0, 0.85);
  color: white;
  z-index: 2;
}
.fixed {
  right: 0em;
  top: 0em;
  background-color: white;
  width: 97.5vw;
  position: fixed;
  z-index: 2;
}
.margin {
  margin-right: auto;
  margin-left: auto;
  margin-bottom: auto;
  margin-top: 20px;
  width: 95%;
}
.stock {
  color: red;
  font-size: 12px;
}
</style>