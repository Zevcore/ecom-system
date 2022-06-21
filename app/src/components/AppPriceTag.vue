<template>
  <div class="d-flex flex-column">
    <s class="fs-6 fw-light text-muted price-tag" v-if="isProductOnSale">
      {{ basePrice.toFixed(2) }}
    </s>

    <div class="d-flex align-items-center">
      <span
        class="fs-1 fw-bold text-primary price-tag"
        :class="{ 'fs-3': isSmall }"
      >
        {{ sellPrice.toFixed(2) }}
      </span>

      <span
        class="fs-6 ms-2 badge bg-warning text-dark discount-tag"
        v-if="isProductOnSale"
      >
        {{ Math.round(discountPercent) }}
      </span>
    </div>
  </div>
</template>

<script>
export default {
  name: "AppPriceTag",

  data() {
    return {
      sellPrice: 0,
    };
  },

  props: {
    basePrice: {
      required: true,
      type: Number,
    },

    discountPercent: {
      required: true,
      type: Number,
    },

    isSmall: {
      required: false,
      default: false,
      type: Boolean,
    },
  },

  computed: {
    productReducedPrice() {
      return (this.discountPercent / 100) * this.basePrice;
    },

    isProductOnSale() {
      return this.discountPercent !== undefined && this.discountPercent !== 0;
    },
  },

  methods: {
    setProductSellPrice() {
      if (this.discountPercent === 0) {
        this.sellPrice = this.basePrice;

        return;
      }

      this.sellPrice = this.basePrice - this.productReducedPrice;
    },
  },

  mounted() {
    this.setProductSellPrice();
  },
};
</script>
