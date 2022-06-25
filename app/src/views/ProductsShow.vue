<template>
  <div class="row mt-4" v-if="loading">
    <p class="display-1 text-center">Loading...</p>
  </div>

  <div class="row ms-0 me-0 mx-lg-auto" v-else>
    <!-- TODO: Rozważyć dodanie breadcrumbsów. -->
    <div class="container-fluid px-0 col-lg-5 mb-lg-2">
      <products-show-carousel :images="product.images"></products-show-carousel>
    </div>

    <div class="container-fluid col-lg-6">
      <p class="text-muted small">
        Product ID: <b>{{ $route.params.id }}</b>
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
        id: null,
        name: "",
        manufacturer: "",
        description: "",
        basePrice: 0.0,
        discountPercent: 0,
        stock: 0,
        specifications: [],
        images: [],
      },

      loading: true,
    };
  },

  computed: {
    productId() {
      return this.$route.params.id;
    },
  },

  beforeMount() {
    this.getProductFromApi();
  },

  methods: {
    addToCart() {
      if (this.$store.getters.isProductInCart(this.productId)) {
        this.$store.dispatch("changeCartModalStatus", { status: "duplicated" });

        console.info("Product is already in cart.");
        return false;
      }

      this.$store.dispatch("addProductToCart", { productId: this.productId });
      this.$store.dispatch("updateCartValue", {
        value: this.$refs.priceTag.$data.sellPrice,
      });
      this.$store.dispatch("changeCartModalStatus", { status: "added" });

      console.info("Product added to cart.");
      return true;
    },

    async getProductFromApi() {
      const product = await this.$api.helpGet("products/" + this.productId);

      this.loading = false;

      this.product = product;
      this.product.basePrice = Number(product.basePrice);
      this.product.images = JSON.parse(product.images);
      this.product.specifications = JSON.parse(product.specifications);
    },
  },
};
</script>
