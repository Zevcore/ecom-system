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

      <h1 class="h2 mb-3">{{ product.name }} ({{ product.manufacturer }})</h1>
      <!-- TODO: Rozważyć dodanie oceny produktu. -->

      <p class="fs-6 fw-light">{{ product.description }}</p>

      <products-show-specifications
        :specifications="product.specifications"
      ></products-show-specifications>

      <div class="container mt-2">
        <app-price-tag
          :base-price="product.basePrice"
          :discount-percent="product.discountPercent"
          ref="priceTag"
        ></app-price-tag>
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
import AppPriceTag from "@/components/AppPriceTag";
export default {
  name: "ProductsShow",

  components: {
    AppPriceTag,
    ProductsShowSpecifications,
    ProductsShowCarousel,
  },

  data() {
    return {
      product: {
        id: this.$route.params.id,
        name: "Very good graphics card",
        manufacturer: "Nvidia",
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

  methods: {
    addToCart() {
      if (this.$store.getters.isProductInCart(this.product.id)) {
        this.$store.dispatch("changeCartModalStatus", { status: "duplicated" });

        console.info("Product is already in cart.");
        return false;
      }

      this.$store.dispatch("addProductToCart", { productId: this.product.id });
      this.$store.dispatch("updateCartValue", {
        value: this.$refs.priceTag.$data.sellPrice,
      });
      this.$store.dispatch("changeCartModalStatus", { status: "added" });

      console.info("Product added to cart.");
      return true;
    },
  },
};
</script>
