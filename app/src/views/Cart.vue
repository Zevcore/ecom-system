<template>
  <div class="row mt-4" v-if="loading">
    <p class="display-1 text-center">Loading...</p>
  </div>

  <div v-else>
    <div class="row ms-0 me-0 mx-lg-auto" v-if="cartProductsCount">
      <div class="container-fluid col-lg-7">
        <h1 class="my-3 mb-lg-4">
          Your Cart <b>({{ cartProductsCount }})</b>
        </h1>

        <div class="row row-cols-1 row-cols-lg-2 g-4">
          <div class="col" v-for="product in products" :key="product.id">
            <cart-product-card :product="product"></cart-product-card>
          </div>
        </div>
      </div>

      <div class="container-fluid col-lg-5 mt-5 mt-lg-4">
        <div class="cart-value">
          <p class="text-center h4">
            Cart value:
            <b class="text-primary">{{ cartValue.toFixed(2) }} PLN</b>
          </p>
        </div>
        <div class="cart-buttons mt-4">
          <div class="d-grid mt-3">
            <router-link
              :to="{ name: 'OrdersCreate' }"
              type="button"
              class="btn btn-success btn-lg"
            >
              Checkout
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <div v-else>
      <p class="display-6 text-center mt-4">No products in cart.</p>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import CartProductCard from "@/components/CartProductCard";
export default {
  name: "Cart",

  components: { CartProductCard },

  data() {
    return {
      products: [],
      loading: true,
    };
  },

  computed: {
    ...mapGetters(["cartProductsCount"]),

    productIds() {
      return this.$store.state.cartProducts;
    },

    cartValue() {
      return this.$store.state.cartValue;
    },
  },

  methods: {
    async getProductsData() {
      const urlProductIds = this.productIds.join(",");

      this.products = await this.$api.helpGet(
        "cart/products?ids=" + urlProductIds
      );

      this.loading = false;
    },
  },

  beforeMount() {
    if (this.cartProductsCount > 0) {
      this.getProductsData();
    } else {
      this.loading = false;
    }
  },
};
</script>
