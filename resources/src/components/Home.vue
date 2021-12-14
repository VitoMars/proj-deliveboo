<template>
    <div class="container">
        <div class="row g-4 mt-2">
            <div class="col-8">
                <div class="row">

                    <div v-for="product in products" :key="product.id" class="col-4">
                        <div v-if="product.visibility == 1" class="card p-2 mb-3 scroll">
                            <!-- <div>{{ product.cover }}</div> -->
                            <!-- <div v-if="product.cover">

                                </div> -->
                            <!-- @if ($plate->cover) -->

                            <!-- <img
                                    class="img-thumbnail mt-3"
                                    style="height: 250px; width: 100%"
                                    src="storage/app/plate_covers/XbvlQoq3pwD0cdTsNd3wbkRdiJldXUE17E7i5roR.jpg"
                                    alt="img"
                                /> -->
                            <!-- :src="require(`storage/${product.cover}/.jpg`)" -->
                            <!-- @else -->
                            
                            <img v-if="product.cover" :src="`/storage/${product.cover}`" alt=""
                            style="height: 160px">
                            <img v-if="!product.cover"
                                src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                                alt="img"
                                style="height: 160px">

                            <div class="card-body">
                                <div>
                                    <h5 class="card-title">
                                        {{ product.name }}
                                    </h5>
                                    <span class="fw-bold">Descrizione: </span>
                                    <div class="overflow">
                                        {{ product.description }}
                                    </div>
                                    <div class="m-2">
                                        <strong>Prezzo: </strong>{{ product.price }}€
                                    </div>
                                    <button
                                        class="btn my-btn-blue-plates d-flex align-items-center"
                                        @click="addToCart(product.id)"
                                    >
                                        <i class="fas fa-cart-plus me-1"></i> Aggiungi al carrello
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-if="product.visibility == 0" class="visibility-off card p-2 mb-3 scroll">
                            <!-- <div>{{ product.cover }}</div> -->
                            <!-- <div v-if="product.cover">

                                </div> -->
                            <!-- @if ($plate->cover) -->

                            <!-- <img
                                    class="img-thumbnail mt-3"
                                    style="height: 250px; width: 100%"
                                    src="storage/app/plate_covers/XbvlQoq3pwD0cdTsNd3wbkRdiJldXUE17E7i5roR.jpg"
                                    alt="img"
                                /> -->
                            <!-- :src="require(`storage/${product.cover}/.jpg`)" -->
                            <!-- @else -->
                            
                            <img v-if="product.cover" :src="`/storage/${product.cover}`" alt=""
                            style="height: 160px">
                            <img v-if="!product.cover"
                                src="https://www.buttalapasta.it/wp-content/uploads/2017/11/pizza-napoletana-vera-ricetta.jpg"
                                alt="img"
                                style="height: 160px">

                            <div class="card-body">
                                <div>
                                    <h5 class="card-title">
                                        {{ product.name }}
                                    </h5>
                                    <span class="fw-bold">Descrizione: </span>
                                    <div class="overflow">
                                        {{ product.description }}
                                    </div>
                                    <div class="m-2">
                                        <strong>Prezzo: </strong>{{ product.price }}€
                                    </div>
                                    <button
                                        class="btn my-btn-red-plates d-flex w-100 justify-content-center align-items-center"
                                    >
                                       <i class="fas fa-times-circle me-1"></i> Non Disponibile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
            <Cart @deleteCartItem="deleteCartItem" :cart="cart" />
            </div>
        </div>
    </div>
</template>

<script>
import Cart from "../components/Cart.vue";
export default {
    name: "Home",
    data() {
        return {
            products: [], // products are inserted on created
            cart: [],
            url: "http://127.0.0.1:8000/api/products",
            url_categories: "http://127.0.0.1:8000/api/categories",
            form: {
                id: -1,
            },
            // End Cart
        };
    }, // End data
    components: {
        Cart,
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
                key: "value",
            };
            const config = {
                headers: { Authorization: `Bearer ${this.api_token}` },
            };
            axios
                .post(this.url, config, bodyParameters)
                .then((response) => {
                    // console.log(response.data.results);
                    this.products = response.data.results;
                    // console.log(this.products);
                })
                .catch((reject) => {
                    // console.log(reject);
                });
        },

        deleteCartItem(index) {
            console.log(this.cart);
            this.cart.splice(index, 1);
            // console.log(this.cart)
        },

        addToCart(id) {
            this.form.id = id;
            axios
                .post("http://127.0.0.1:8000/api/products/plate", {
                    ...this.form,
                })
                .then((response) => {
                    // console.log(response);
                    this.cart.push(response.data.plates);
                })
                .catch((reject) => {
                    // console.log(reject);
                });
        },
    }, // End Methods
    computed: {},
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
