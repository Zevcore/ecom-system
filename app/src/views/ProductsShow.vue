<template>
  <div class="row ms-0 me-0 mx-lg-auto">
    <!-- TODO: Rozważyć dodanie breadcrumbsów. -->
    <products-show-carousel
      :images="product.images"
      class="px-0 col-lg-5 mb-lg-2"
    ></products-show-carousel>

    <div class="container-fluid col-lg-6">
      <p class="text-muted small">
        Product ID: <b>{{ product.id }}</b>
      </p>

      <h1 class="h2 mb-3">{{ product.name }}</h1>
      <!-- TODO: Rozważyć dodanie oceny produktu. -->

      <p class="fs-6 fw-light">{{ product.description }}</p>

      <products-show-specifications
        :specifications="product.specifications"
      ></products-show-specifications>

      <div class="container mt-2">
        <div class="d-flex flex-column">
          <s class="fs-6 fw-light text-muted price-tag" v-if="isProductOnSale">
            {{ product.basePrice.toFixed(2) }}
          </s>

          <div class="d-flex align-items-center">
            <span class="fs-1 fw-bold text-primary price-tag">
              {{ productSellPrice.toFixed(2) }}
            </span>

            <span
              class="fs-6 ms-2 badge bg-warning text-dark discount-tag"
              v-if="isProductOnSale"
            >
              {{ Math.round(product.discountPercent) }}
            </span>
          </div>
        </div>
      </div>

      <div class="d-grid mt-3">
        <button type="button" class="btn btn-success btn-lg" @click="addToCart">
          Add to cart
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import ProductsShowCarousel from "@/components/ProductsShowCarousel";
import ProductsShowSpecifications from "@/components/ProductsShowSpecifications";
export default {
  name: "ProductsShow",

  components: {
    ProductsShowSpecifications,
    ProductsShowCarousel,
  },

  data() {
    return {
      product: {
        id: this.$route.params.id,
        name: "Very good graphics card (Nvidia)",
        description:
          "Is very good graphics card I sell go buy please, I use for many years it work real nice much recommend haha cheers yes.",
        basePrice: 420.0,
        discountPercent: 83.571,
        stock: 15,
        specifications: [
          "16GB 256-Bit GDDR6",
          "Boost Clock 2105 MHz",
          "1 x HDMI 2.1 VRR, 2 x DisplayPort 1.4",
          "3840 Stream Processors",
          "PCI Express 4.0 x16",
          "AMD RDNA 2",
        ],
        images: [
          {
            id: 1,
            src: "https://via.placeholder.com/300",
            alt: "Placeholder image.",
            active: true,
          },
          {
            id: 2,
            src: "https://via.placeholder.com/300",
            alt: "Placeholder image.",
          },
          {
            id: 3,
            src: "https://via.placeholder.com/300",
            alt: "Placeholder image.",
          },
        ],
      },
    };
  },

  computed: {
    productReducedPrice() {
      return (this.product.discountPercent / 100) * this.product.basePrice;
    },

    productSellPrice() {
      return this.product.basePrice - this.productReducedPrice;
    },

    isProductOnSale() {
      return (
        this.product.discountPercent !== undefined &&
        this.product.discountPercent !== 0
      );
    },
  },

  methods: {
    addToCart() {
      if (this.$store.getters.isProductInCart(this.product.id)) {
        console.info("Product is already in cart.");
        return false;
      }

      this.$store.dispatch("addProductToCart", { productId: this.product.id });
      console.info("Product added to cart.");
      return true;
    },
  },
};
</script>
