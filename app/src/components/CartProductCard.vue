<template>
  <div class="card">
    <button
      type="button"
      class="btn bi bi-trash3 position-absolute top-0 start-100 translate-middle fs-1"
      style="margin-top: 1em; margin-left: -1em"
      @click="removeFromCart"
    >
      <span class="visually-hidden">remove product from cart</span>
    </button>
    <img
      :src="product.image.src"
      class="card-img-top"
      :alt="product.image.alt"
    />
    <div class="card-body">
      <h5 class="card-title">
        <router-link :to="{ name: 'ProductsShow', params: { id: product.id } }">
          {{ product.name }}
        </router-link>
      </h5>
      <p class="card-text">
        {{ product.manufacturer }}
      </p>
    </div>
    <div class="card-footer">
      <app-price-tag
        :base-price="product.basePrice"
        :discount-percent="product.discountPercent"
        ref="priceTag"
        is-small
      ></app-price-tag>
    </div>
  </div>
</template>

<script>
import AppPriceTag from "@/components/AppPriceTag";
export default {
  name: "CartProductCard",

  components: { AppPriceTag },

  props: {
    product: {
      required: true,
      type: Object,
    },
  },

  methods: {
    removeFromCart() {
      this.$store.dispatch("changeCartModalStatus", {
        status: "removed",
        productId: this.product.id,
        sellPrice: this.$refs.priceTag.$data.sellPrice,
      });
    },
  },
};
</script>
