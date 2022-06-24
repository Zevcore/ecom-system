<template>
  <div class="card">
    <img :src="mainImage.src" class="card-img-top" :alt="mainImage.alt" />
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
        :base-price="basePrice"
        :discount-percent="product.discountPercent"
        :is-small="true"
      ></app-price-tag>
    </div>
  </div>
</template>

<script>
import AppPriceTag from "@/components/AppPriceTag";
export default {
  name: "ProductsIndexProductCard",

  components: { AppPriceTag },

  props: {
    product: {
      required: true,
      type: Object,
    },
  },

  data() {
    return {
      mainImage: "",
      basePrice: 0.0,
    };
  },

  beforeMount() {
    this.mainImage = JSON.parse(this.product.images)[0];

    this.basePrice = Number(this.product.basePrice);
  },
};
</script>
