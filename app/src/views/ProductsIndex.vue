<template>
  <div class="row mt-4" v-if="loading">
    <p class="display-1 text-center">Loading...</p>
  </div>

  <div class="row mx-auto my-4" v-else>
    <h2 class="mb-4 mb-lg-4">Products listing</h2>

    <div class="container-fluid">
      <products-index-pagination
        :current-page="currentPage"
        @changePageClick="changePage"
      ></products-index-pagination>

      <div class="row row-cols-1 row-cols-md-4 g-4 my-3">
        <div
          class="col mt-3 mb-2"
          v-for="product in products"
          :key="product.id"
        >
          <products-index-product-card
            :product="product"
          ></products-index-product-card>
        </div>
      </div>

      <products-index-pagination
        :current-page="currentPage"
        @changePageClick="changePage"
      ></products-index-pagination>
    </div>
  </div>
</template>

<script>
import ProductsIndexPagination from "@/components/ProductsIndexPagination";
import ProductsIndexProductCard from "@/components/ProductsIndexProductCard";
export default {
  name: "ProductsIndex",

  components: { ProductsIndexProductCard, ProductsIndexPagination },

  data() {
    return {
      products: [],
      currentPage: 1,
      loading: true,
    };
  },

  beforeMount() {
    this.getProductsFromApi();
  },

  methods: {
    async getProductsFromApi() {
      const products = await this.$api.helpGet("products");

      this.loading = false;

      this.products = products;
    },

    changePage(pageNumber = null) {
      if (pageNumber === null) {
        this.currentPage++;
        return;
      }

      this.currentPage = pageNumber;
    },
  },
};
</script>
