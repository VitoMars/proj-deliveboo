<template>
    <div class="container">
        <div class="cart text-dark">
            <div
                v-for="(food, index) in showCart"
                :key="food.index"
                class="d-flex flex-column align-items-start mt-2"
            >
                <div class="my-2">
                    <!-- Minus -->
                    <button class="btn circle btn-light" @click="minus(index)">
                        <i class="fas fa-minus text-dark"></i>
                    </button>
                    <!-- Quantità -->
                    <span>{{ food.quantity }}</span>
                    <!-- Plus -->
                    <button class="btn circle btn-light" @click="plus(index)">
                        <i class="fas fa-plus text-dark"></i>
                    </button>
                    <!-- Nome Piatto -->
                    <span>{{ food.name }}</span>
                </div>
            </div>
            <div class="d-flex cart_food_price text-dark">
                Totale: {{ total | currency("€") }}
            </div>
            <FormClient v-if="dataForm" @updateForm="FormData" />
            <Payment
                v-if="brain"
                :authorization="token"
                @onSuccess="paymentOnSuccess"
            />
        </div>
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
                this.total = 0;
                this.form.food.map((food) => {
                    this.total += food.price;
                });
                this.showCart = this.form.food;
                // console.log(this.form.food);
                this.$forceUpdate();
            }
        },
    },
    // mounted() {
    //     if (localStorage.getItem("quantity")) {
    //         try {
    //             this.form.quantity = JSON.parse(
    //                 localStorage.getItem("quantity")
    //             );
    //         } catch (e) {
    //             localStorage.removeItem("quantity");
    //         }
    //     }
    //     if (localStorage.getItem("total")) {
    //         try {
    //             this.total = JSON.parse(localStorage.getItem("total"));
    //         } catch (e) {
    //             localStorage.removeItem("total");
    //         }
    //     }
    //     if (localStorage.getItem("oldLength")) {
    //         try {
    //             this.oldLength = JSON.parse(localStorage.getItem("oldLength"));
    //         } catch (e) {
    //             localStorage.removeItem("oldLength");
    //         }
    //     }
    // },
    created() {
        this.getToken();
        this.getCartTotal();
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
            let cart = {
                ciao: "ciao",
            };
            axios
                .post("http://127.0.0.1:8000/api/makepayment", { ...cart })
                .then((response) => {
                    console.log(response);
                });
        },
        FormData(form) {
            this.form.dataClient = form;
            this.dataForm = false;
        },
        getCartTotal: function () {
            this.total = 0;
            this.form.food.forEach((element) => {
                this.total += element.price * element.quantity;
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
